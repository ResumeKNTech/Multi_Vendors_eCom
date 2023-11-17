<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Notification;

use App\Notifications\StatusNotification;
use App\Models\User;
use App\Models\ProductReview;

class ProductReviewController extends Controller
{

    public function index(){
        $reviews=ProductReview::getAllReview();

        return view('admin.review.index')->with('reviews',$reviews);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'rate'=>'required|numeric|min:1'
        ]);
        $product_info=Product::getProductBySlug($request->slug);
        //  return $product_info;
        // return $request->all();
        $data=$request->all();
        $data['product_id']=$product_info->id;
        $data['user_id']=$request->user()->id;
        $data['status']='active';
        // dd($data);
        $status=ProductReview::create($data);

        $user=User::where('type_user','vendor')->get();
        $details=[
            'title'=>'New Product Rating!',
            'actionURL'=>route('product-detail',$product_info->slug),
            'fas'=>'fa-star'
        ];
        Notification::send($user,new StatusNotification($details));
        if ($status) {
            return redirect()->back()->with('success', 'Thanks for comment');
        } else {
            return redirect()->back()->with('error', 'Please try again');
        }

    }
}
