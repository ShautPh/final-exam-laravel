<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Like::all();

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'like_number' => "required|integer",
            'user_id' => 'required|integer',
            'post_id' => 'required|integer'
        ]);
        $like = new Like();
        $like->like_number = $request->like_number;
        $like->user_id = $request->user_id;
        $like->post_id = $request->post_id;
        $like->save();
        return response()->json(['message'=> 'Like created successfull']);
    }
}
