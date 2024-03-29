<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Consumer;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consumers = Consumer::all();
        return view('comments.index', ['consumers' => $consumers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
        $comment->delete();
        return redirect()->route('consumers.show')->
            with('message', 'Consumer was destroyed');
    }

    public function apiIndex()
    {
        $comments = Comment::all();
        return $comments;
    }

    public function apiStore(Request $request)
    {
        $data = $request->validate([
            'comment_text' => 'required|max:255',
            'consumer_id' => 'required',
        ]);

        $e = new Comment();
        $e->comment_text = $request['comment_text'];
        $e->consumer_id = $request['consumer_id'];
        $e->save();
        return $e;
    }

    public function apiDestroy(Request $request) 
    {
        $request -> delete();
    }
}
