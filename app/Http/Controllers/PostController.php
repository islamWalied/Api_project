<?php

namespace App\Http\Controllers;

use App\Events\Models\post\PostCreated;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        event(new PostCreated(Post::factory()->make()));
        $pageSize = $request->page_size ?? 20;
        $post = Post::query()->paginate($pageSize);
        return PostResource::collection($post);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,PostRepository $repository)
    {
        $created = $repository->create($request->only([
            'title','body','user_ids',
        ]));


        return new PostResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post,PostRepository $repository)
    {

        $post = $repository->update($post , $request->only([
            'title',
            'body',
            'user_ids',
        ]));
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post,PostRepository $repository)
    {
        $post = $repository->forceDelete($post);

        return new PostResource($post);
    }
}
