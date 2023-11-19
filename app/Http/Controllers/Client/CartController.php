<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Support\Str;

class CartController extends Controller
{
    protected $product = null;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart(Request $request)
    {
        // dd($request->all());
        if (empty($request->slug)) {
            return back()->with('error', 'Error please try again');
        }
        $product = Product::where('slug', $request->slug)->first();
        // return $product;
        if (empty($product)) {
            return back()->with('error', 'Error please try again');
        }

        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id', null)->where('product_id', $product->id)->first();
        // return $already_cart;
        if ($already_cart) {
            // dd($already_cart);
            $already_cart->quantity = $already_cart->quantity + 1;
            $already_cart->amount = $product->price + $already_cart->amount;
            // return $already_cart->quantity;
            if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error', 'Stock not sufficient!.');
            $already_cart->save();
        } else {

            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $product->id;
            if (is_null($product->offer_price)) {
                // Nếu offer_price là null, sử dụng giá gốc của sản phẩm
                $cart->price = $product->price;
            } else {
                // Nếu offer_price không phải là null, trừ đi giá khuyến mãi từ giá gốc
                $cart->price = $product->offer_price;
            }

            $cart->quantity = 1;
            $cart->amount = $cart->price * $cart->quantity;
            if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error', 'Stock not sufficient!.');
            $cart->save();
            $wishlist = Wishlist::where('user_id', auth()->user()->id)->where('cart_id', null)->update(['cart_id' => $cart->id]);
        }
        return back()->with('success', 'Product successfully added to cart.');
    }

    public function singleAddToCart(Request $request)
    {
        $request->validate([
            'slug'      =>  'required',
            'quant'      =>  'required',
        ]);
        // dd($request->quant[1]);


        $product = Product::where('slug', $request->slug)->first();
        if ($product->stock < $request->quant[1]) {
            return back()->with('error', 'Out of stock, You can add other products.');
        }
        if (($request->quant[1] < 1) || empty($product)) {
            // Và cũng áp dụng cho các thông báo khác:
            return back()->with('error', 'Stock not sufficient!.');
        }

        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id', null)->where('product_id', $product->id)->first();

        // return $already_cart;

        if ($already_cart) {
            $already_cart->quantity = $already_cart->quantity + $request->quant[1];
            // $already_cart->price = ($product->price * $request->quant[1]) + $already_cart->price ;
            $already_cart->amount = ($product->price * $request->quant[1]) + $already_cart->amount;

            if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error', 'Stock not sufficient!.');

            $already_cart->save();
        } else {

            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $product->id;
            if (is_null($product->offer_price)) {
                // Nếu offer_price là null, sử dụng giá gốc của sản phẩm
                $cart->price = $product->price;
            } else {
                // Nếu offer_price không phải là null, trừ đi giá khuyến mãi từ giá gốc
                $cart->price = $product->offer_price;
            }

            $cart->quantity = $request->quant[1];
            // Tính toán 'amount' dựa trên 'offer_price' nếu có, nếu không thì dùng 'price'
            $cart->amount = $cart->price * $cart->quantity;

            if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error', 'Stock not sufficient!.');
            // return $cart;
            $cart->save();
        }
        return back()->with('success', 'Product successfully added to cart.');
    }

    public function cartDelete(Request $request)
    {
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->delete();
            return back()->with('success', 'Cart successfully removed');
        }
        return back()->with('error', 'Error please try again');
    }

    public function cartUpdate(Request $request)
    {
        // dd($request->all());
        if ($request->quant) {
            $error = array();
            $success = '';
            // return $request->quant;
            foreach ($request->quant as $k => $quant) {
                // return $k;
                $id = $request->qty_id[$k];
                // return $id;
                $cart = Cart::find($id);
                // return $cart;
                if ($quant > 0 && $cart) {
                    // return $quant;

                    if ($cart->product->stock < $quant) {
                        return back()->with('error', 'Invalid Products');
                    }
                    $cart->quantity = ($cart->product->stock > $quant) ? $quant  : $cart->product->stock;
                    // return $cart;

                    if ($cart->product->stock <= 0) continue;
                    $after_price = ($cart->product->price - ($cart->product->price * $cart->product->offer_price) / 100);
                    $cart->amount = $after_price * $quant;
                    // return $cart->price;
                    $cart->save();
                    $success = 'Cart successfully updated!';
                } else {
                    $error[] = 'Cart Invalid!';
                }
            }
            return back()->with($error)->with('success', $success);
        } else {
            return back()->with('Cart Invalid!');
        }
    }


    public function checkout(Request $request)
    {

        return view('client.pages.checkout');
    }
}
