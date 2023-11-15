<?php

namespace App\Http\Controllers\Client;
use App\Models\PostComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\StatusNotification;
class PostCommentController extends Controller
{
    public function index()
    {
        $comments=PostComment::getAllComments();
        return view('admin.comment.index')->with('comments',$comments);
    }

    public function store(Request $request)
    {

        $data=$request->all();
        $data['user_id']=$request->user()->id;
        $data['status']='active';
        $status=PostComment::create($data);


        if ($status) {
            return redirect()->back()->with('success', 'Thanks for comment');
        } else {
            return redirect()->back()->with('error', 'Please try again');
        }
    }
}
