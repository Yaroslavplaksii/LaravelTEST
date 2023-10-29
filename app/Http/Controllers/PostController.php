<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
    * @OA\GET(
     *     path="/api/posts",
     *     summary=" Display a listing of the resource.",
     *    
     *     @OA\Response(response="200", description="\Illuminate\Http\Response"),
     * )
     */
    public function index()
    {
        $posts = Post::all();
        return [
            "status" => 200,
            "data" => $posts
        ];
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
    * @OA\Post(
     *     path="/api/posts",
     *     summary="Store a newly created resource in storage.",
     *      @OA\Parameter(
     *          name="",
     *         in="query",
     *         description="Illuminate\Http\Request $request",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="\Illuminate\Http\Response")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'publish' => 'required|integer'
        ]);

        $post = Post::create($request->all());
            if ($post) {
                return [
                    "status" => 200,
                    "data" => $post
                ];
            }      
    }

      /**
    * @OA\GET(
     *     path="/api/post/{$id}",
     *     summary="Display the specified resource.",
     *      @OA\Parameter(
     *          name="id",
     *         in="query",
     *         description="Illuminate\Http\Request $request",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="\Illuminate\Http\Response")
     * )
     */
    public function show(Post $post)
    {
        return [
            "status" => 200,
            "data" => $post
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

        /**
    * @OA\PUT(
     *     path="/api/post/{$id}",
     *     summary=" Update the specified resource in storage.",
     *      @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Post $post",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="\Illuminate\Http\Response")
     * )
     */
    public function update(Request $request, Post $post)
    {     
        if(Gate::allows('create-update')) {
            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'publish' => 'required|integer'
            ]);
            $post = Post::find($request->id);
            $post->update($request->all());
            return [
                "status" => 200,
                "data" => $post,
                "msg" => "The post was updated successfully!!!"
            ];
        }
        return [
            "status" => 401,
            "msg" => "The post was not updated. You do not have permition!!!"
        ];
    }
       /**
    * @OA\DELETE(
     *     path="/api/post/{$id}",
     *     summary="Remove the specified resource from storage.",
     *      @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Post $post",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="\Illuminate\Http\Response")
     * )
     */
    public function destroy(Post $post)
    {    
        // $this->authorize('delete');
        // auth()->user()->can('delete', $post)
        $post->delete();
        return [
            "status" => 200,
            "msg" => "The post was deleted successfully!!!!"
        ];
    }
}