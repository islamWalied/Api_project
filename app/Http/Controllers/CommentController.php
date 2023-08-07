<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 20;

        $comment = Comment::query()->paginate($pageSize);
        return CommentResource::collection($comment);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Comment $comment,Request $request)
    {
        $comment = Comment::query()->create([
           'body' =>$request->body,
           'user_id' =>$request->user_id,
           'post_id' =>$request->post_id,
        ]);

        return new CommentResource($comment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Comment $comment,Request $request)
    {
        $updated = $comment->update([
            'body' =>$request->body,
            'user_id' =>$request->user_id,
            'post_id' =>$request->post_id,
        ]);
        if(!$updated){
            return new JsonResponse([
                'errors' => 'failed to update model',
            ],400);
        }
        return new CommentResource($comment);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $deleted = $comment->forceDelete();

        if(!$deleted){
            return new JsonResponse([
                'errors' => 'failed to update model',
            ],400);
        }
        return new CommentResource($comment);
    }
}
