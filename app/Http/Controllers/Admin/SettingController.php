<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function settings()
    {
        $data = DB::table('settings')->first();
        return view('admin.setting.settings')->with('data', $data);
    }

    public function settingsUpdate(Request $request)
    {
        // Validate request
        $this->validate($request, [
            'short_des' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'logo' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $data = $request->except('_token');

        // Upload main image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('setting'), $filename);
            $data['photo'] = 'setting/' . $filename;
        }
        // Upload main image
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('setting'), $filename);
            $data['logo'] = 'setting/' . $filename;
        }

        // Update settings
        $status = DB::table('settings')
            ->update($data);

        if ($status) {
            return redirect()->back()->with('success', 'Setting successfully updated');
        } else {
            return redirect()->back()->with('error', 'Please try again');
        }
    }
}
