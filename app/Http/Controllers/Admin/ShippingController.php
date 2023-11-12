<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
    public function index()
    {
        $shippings = DB::table('shippings')->get();
        return view('admin.shipping.index', ['shippings' => $shippings]);
    }


    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at']=new \DateTime();
        DB::table('shippings')->insert($data);
        return redirect()->route('admin.shipping.index')->with('success', 'Bạn đã tạo thành công.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at']=new \DateTime();
        DB::table('shippings')->where('id', $id)->update($data);
        return redirect()->route('admin.shipping.index')->with('success', 'Bạn đã chỉnh sửa thành công.');
    }

    public function destroy($id)
    {


        DB::table('shippings')->where('id', $id)->delete();

        return redirect()->route('admin.category.index')->with('success', 'Bạn đã xóa thành công.');
    }
}
