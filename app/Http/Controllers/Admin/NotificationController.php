<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function createNotification(Request $request)
    {
        $user_id = auth()->id();
        $message = $request->input('message');

        DB::table('notifications')->insert([
            'user_id' => $user_id,
            'message' => $message,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Thông báo đã được tạo.');
    }
    public function markAsRead($notificationId)
    {
        $user_id = auth()->id();

        DB::table('notifications')
            ->where('id', $notificationId)
            ->where('user_id', $user_id)
            ->update(['read_at' => now()]);

        return redirect()->back()->with('success', 'Thông báo đã được đánh dấu là đã đọc.');
    }

}
