<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = DB::table('categories')
            ->where('categories.slug', $request->slug)
            ->join('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
            ->select('sub_categories.*')
            ->get();
        return view('client.pages.index', ['categories' => $categories]);
    }
}
