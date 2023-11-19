<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\Notification;

use Helper;
use Illuminate\Support\Str;
use App\Notifications\StatusNotification;

class OrderController extends Controller
{

    public function index()
    {
        $orders=Order::orderBy('id','DESC')->paginate(10);
        return view('admin.order.index')->with('orders',$orders);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'string|required',
            'last_name'=>'string|required',
            'address1'=>'string|required',
            'address2'=>'string|nullable',
            'coupon'=>'nullable|numeric',
            'phone'=>'numeric|required',
            'post_code'=>'string|nullable',
            'email'=>'string|required'
        ]);
        // return $request->all();

        if (empty(Cart::where('user_id', auth()->user()->id)->where('order_id', null)->first())) {
            return back()->with('error', 'Cart is Empty!');
        }



        $order=new Order();
        $order_data=$request->all();
        $order_data['order_number']='ORD-'.strtoupper(Str::random(10));
        $order_data['user_id']=$request->user()->id;
        $order_data['shipping_id']=$request->shipping;
        $shipping=Shipping::where('id',$order_data['shipping_id'])->pluck('price');
        // return session('coupon')['value'];
        $order_data['sub_total']=Helper::totalCartPrice();
        $order_data['quantity']=Helper::cartCount();
        if(session('coupon')){
            $order_data['coupon']=session('coupon')['value'];
        }
        if($request->shipping){
            if(session('coupon')){
                $order_data['total_amount']=Helper::totalCartPrice()+$shipping[0]-session('coupon')['value'];
            }
            else{
                $order_data['total_amount']=Helper::totalCartPrice()+$shipping[0];
            }
        }
        else{
            if(session('coupon')){
                $order_data['total_amount']=Helper::totalCartPrice()-session('coupon')['value'];
            }
            else{
                $order_data['total_amount']=Helper::totalCartPrice();
            }
        }
        // return $order_data['total_amount'];
        $order_data['status']="new";
        if(request('payment_method')=='paypal'){
            $order_data['payment_method']='paypal';
            $order_data['payment_status']='paid';
        }
        else{
            $order_data['payment_method']='cod';
            $order_data['payment_status']='Unpaid';
        }
        $order->fill($order_data);
        $status=$order->save();
        if($order)
        $users = User::whereIn('type_user', ['vendor', 'admin'])->first();

        $details=[
            'title'=>'New order created',
            'actionURL'=>route('order.show',$order->id),
            'fas'=>'fa-file-alt'
        ];
        Notification::send($users, new StatusNotification($details));
        if(request('payment_method')=='paypal'){
            return redirect()->route('payment')->with(['id'=>$order->id]);
        }
        else{
            session()->forget('cart');
            session()->forget('coupon');
        }
        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);

        return redirect()->route('index')->with('success', 'Your product successfully placed in order');

    }


    public function show($id)
    {
        $order=Order::find($id);
        // return $order;
        return view('admin.order.show')->with('order',$order);
    }

    public function edit($id)
    {
        $order=Order::find($id);
        return view('admin.order.edit')->with('order',$order);
    }


    public function update(Request $request, $id)
    {
        $order=Order::find($id);
        $this->validate($request,[
            'status'=>'required|in:new,process,delivered,cancel'
        ]);
        $data=$request->all();
        // return $request->status;
        if($request->status=='delivered'){
            foreach($order->cart as $cart){
                $product=$cart->product;
                // return $product;
                $product->stock -=$cart->quantity;
                $product->save();
            }
        }
        $status=$order->fill($data)->save();
        if($status){
            return redirect()->route('admin.order.index')->with('success', 'Successfully updated order');
        } else {
            return redirect()->route('admin.order.index')->with('error', 'Error while updating order');
        }

    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order) {
            $status = $order->delete();
            if ($status) {
                return redirect()->route('admin.order.index')->with('success', 'Order successfully deleted');
            } else {
                return redirect()->route('admin.index')->with('error', 'Order cannot be deleted');
            }
        } else {
            return redirect()->back()->with('error', 'Order not found');
        }
    }


    public function orderTrack(){
        return view('client.pages.order-track');
    }

    public function productTrackOrder(Request $request)
    {
        $order = Order::where('user_id', auth()->user()->id)
                      ->where('order_number', $request->order_number)
                      ->first();

        if ($order) {
            if ($order->status == "new") {
                return redirect()->route('index')->with('success', 'Your order has been placed. Please wait.');
            } elseif ($order->status == "process") {
                return redirect()->route('index')->with('success', 'Your order is under processing. Please wait.');
            } elseif ($order->status == "delivered") {
                return redirect()->route('index')->with('success', 'Your order has been successfully delivered.');
            } else {
                return redirect()->route('index')->with('error', 'Your order was canceled. Please try again.');
            }
        } else {
            return back()->with('error', 'Invalid order number. Please try again.');
        }
    }

    // PDF generate
    public function pdf(Request $request){
        $order=Order::getAllOrder($request->id);
        // return $order;
        $file_name=$order->order_number.'-'.$order->first_name.'.pdf';
        // return $file_name;
        $pdf=PDF::loadview('admin.order.pdf',compact('order'));
        return $pdf->download($file_name);
    }
    // Income chart
    public function incomeChart(Request $request){
        $year=\Carbon\Carbon::now()->year;
        // dd($year);
        $items=Order::with(['cart_info'])->whereYear('created_at',$year)->where('status','delivered')->get()
            ->groupBy(function($d){
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });
            // dd($items);
        $result=[];
        foreach($items as $month=>$item_collections){
            foreach($item_collections as $item){
                $amount=$item->cart_info->sum('amount');
                // dd($amount);
                $m=intval($month);
                // return $m;
                isset($result[$m]) ? $result[$m] += $amount :$result[$m]=$amount;
            }
        }
        $data=[];
        for($i=1; $i <=12; $i++){
            $monthName=date('F', mktime(0,0,0,$i,1));
            $data[$monthName] = (!empty($result[$i]))? number_format((float)($result[$i]), 2, '.', '') : 0.0;
        }
        return $data;
    }
}
