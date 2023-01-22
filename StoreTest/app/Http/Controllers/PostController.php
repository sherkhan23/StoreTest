<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use App\Models\CategoryLevel;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Filters\PostFilter;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function getPost(Request $request, PostFilter $filter){

        $post = Post::query();


        if ($request->filled('price_from')){
            $post->where('price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')){
            $post->where('price', '<=', $request->price_to);
        }

        if ($request->filled('search_field')){
            $post->where('postName', 'LIKE', '%'.$request->search_field.'%');
        }

        if ($request->filled('search_field')){
            $post->where('postName', 'LIKE', '%'.$request->search_field.'%');
        }

        $getPost = $post
            ->join('post_parameters', function ($join) {
                $join->on('posts.post_id', '=', 'post_parameters.post_id');
            })
            ->join('category_levels', function ($join) {
                $join->on('posts.category_level_id', '=', 'category_levels.category_level_id');
            })
//            ->filter($filter)
            ->paginate();

        $categoryLevel = CategoryLevel::all();


        return view('catalog', compact('getPost', 'categoryLevel'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
