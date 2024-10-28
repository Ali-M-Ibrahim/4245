<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //R
        //select * from posts;
        $data = Post::all();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //C
        $data = Post::create($request->all());
        return response()->json(["code"=>"201",'message'=>"created"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //R
        $data = Post::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //U
        $data = Post::find($id);
        $data->fill($request->all());
        $data->save();
        return response()->json(["code"=>"201",'message'=>"updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //D
        $data = Post::find($id);
        $data->delete();
        return response()->json(["code"=>"200",'message'=>"deleted"]);
    }
}
