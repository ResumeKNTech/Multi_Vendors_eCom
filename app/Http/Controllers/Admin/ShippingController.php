<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
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
        $rules = [
            'area' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ];

        $messages = [
            'area.required' => 'Vùng giao hàng không được để trống.',
            'price.required' => 'Giá không được để trống.',
            'price.numeric' => 'Giá phải là một số.',
            'price.min' => 'Giá không được nhỏ hơn 0.',
            'status.required' => 'Trạng thái là bắt buộc.',
            'status.in' => 'Trạng thái không hợp lệ.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');
        $data['created_at'] = now();
        DB::table('shippings')->insert($data);
        return redirect()->route('admin.shipping.index')->with('success', 'Bạn đã tạo thành công.');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'area' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ];

        $messages = [
            'area.required' => 'Vùng giao hàng không được để trống.',
            'price.required' => 'Giá không được để trống.',
            'price.numeric' => 'Giá phải là một số.',
            'price.min' => 'Giá không được nhỏ hơn 0.',
            'status.required' => 'Trạng thái là bắt buộc.',
            'status.in' => 'Trạng thái không hợp lệ.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');
        $data['updated_at'] = now();
        DB::table('shippings')->where('id', $id)->update($data);
        return redirect()->route('admin.shipping.index')->with('success', 'Bạn đã chỉnh sửa thành công.');
    }


    public function destroy($id)
    {


        DB::table('shippings')->where('id', $id)->delete();

        return redirect()->route('admin.category.index')->with('success', 'Bạn đã xóa thành công.');
    }
}
