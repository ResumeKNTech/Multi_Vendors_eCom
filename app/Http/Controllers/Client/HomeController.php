<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('user.index');
    }
     // Order
     public function orderIndex(){
        $orders=Order::orderBy('id','DESC')->where('user_id',auth()->user()->id)->paginate(10);
        return view('user.order.index')->with('orders',$orders);
    }
    public function userOrderDelete($id)
    {
        $order = Order::find($id);
        if ($order) {
            if (in_array($order->status, ["process", "delivered", "cancel"])) {
                return redirect()->back()->with('error', 'You cannot delete this order now.');
            } else {
                $status = $order->delete();
                if ($status) {
                    return redirect()->route('user.order.index')->with('success', 'Order successfully deleted.');
                } else {
                    return redirect()->route('user.order.index')->with('error', 'Order cannot be deleted.');
                }
            }
        } else {
            return redirect()->back()->with('error', 'Order not found.');
        }
    }


    public function orderShow($id)
    {
        $order=Order::find($id);
        // return $order;
        return view('user.order.show')->with('order',$order);
    }
}
