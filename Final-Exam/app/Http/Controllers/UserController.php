<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return User::all();

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
            'name' => 'required|string|min:2',
            'email'=> 'required|string|unique:users',
            'password' => 'required|string|min:3|max:10|confirmed'
        ]);
        User::create($request->all());
        return response()->json(['message'=> 'User created successfull']);
    }
    /**
     * show all posts and comments of user
     * @return users, posts and comments
     * 
     */
    public function getPostsComments()
    {
        return User::with('posts','posts.comments')->get();
    }

        /**
     * show all posts, comments, likes of user
     * @return users, posts, comments, likes
     * 
     */
    public function getPostsCommentsLikes()
    {
        return User::with('posts','posts.comments', 'posts.likes')->get();
    }
        /**
     * show all posts and comments of user by id
     * @return users, posts, comments, likes
     * 
     */
    public function showPostsCommentsLikes($id)
    {
        return User::with('posts','posts.comments', 'posts.likes')->findOrFail($id);
    }

        /**
     * show all number of posts and comments of each user
     * @return users, number of posts and comments
     * 
     */
    public function countPostsComments()
    {
        return User::withCount('posts','comments')->get();
    }
}
