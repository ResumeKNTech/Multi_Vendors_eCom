<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;

class WishListController extends Controller
{
    protected $product = null;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function wishlist(Request $request)
    {
        if (empty($request->slug)) {
            return back()->with('error', 'Sản Phẩm không hợp lệ');
        }

        $product = Product::where('slug', $request->slug)->first();
        if (empty($product)) {
            return back()->with('error', 'Sản Phẩm không hợp lệ');
        }

        $already_wishlist = Wishlist::where('user_id', auth()->user()->id)
            ->where('cart_id', null)
            ->where('product_id', $product->id)
            ->first();
        if ($already_wishlist) {
            return back()->with('error', 'Sản phẩm đã ở trong yêu thích');
        } else {
            $wishlist = new Wishlist;
            $wishlist->user_id = auth()->user()->id;
            $wishlist->product_id = $product->id;
            if (is_null($product->offer_price)) {
                // Nếu offer_price là null, sử dụng giá gốc của sản phẩm
                $wishlist->price = $product->price;
            } else {
                // Nếu offer_price không phải là null, trừ đi giá khuyến mãi từ giá gốc
                $wishlist->price = $product->offer_price;
            }
            $wishlist->quantity = 1;
            $wishlist->amount = $wishlist->price * $wishlist->quantity;
            if ($wishlist->product->stock < $wishlist->quantity || $wishlist->product->stock <= 0) {
                return back()->with('error', 'Giỏ hàng rỗng!.');
            }
            $wishlist->save();
            return back()->with('success', 'Sản phẩm đã được thêm vào yêu thích');
        }
    }

    public function wishlistDelete(Request $request)
    {
        $wishlist = Wishlist::find($request->id);
        if ($wishlist) {
            $wishlist->delete();
            return back()->with('success', 'Xóa khỏi yêu thích thành công');
        }
        return back()->with('error', 'Lỗi, vui lòng thử lại');
    }
}
