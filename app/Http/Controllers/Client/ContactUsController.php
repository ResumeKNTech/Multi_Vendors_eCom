<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
class ContactUsController extends Controller
{
    public function contactUs()
    {
        return view('client.pages.contact-us');
    }

    public function store(Request $request)
    {
        // Lấy người dùng đang đăng nhập
        $user  = Auth::user();
        $message = Message::create($request->all());
 

        // return $message;
        $data = array();
        $data['url'] = route('admin.message.show', $message->id);
        $data['date'] = $message->created_at->format('F d, Y h:i A');
        $data['name'] = $message->name;
        $data['email'] = $message->email;
        $data['phone'] = $message->phone;
        $data['message'] = $message->message;
        $data['subject'] = $message->subject;
        $data['user_image'] = $user->user_image;
   
        // return $data;    
        event(new MessageSent($data));
        exit();
    }
    public function show(Request $request, $id)
    {
        $message = Message::find($id);
        if ($message) {
            $message->read_at = \Carbon\Carbon::now();
            $message->save();
            return view('admin.message.show')->with('message', $message);
        } else {
            return back();
        }
    }
}
