<?php

namespace App\Repositories;

use App\Events\Models\post\PostCreated;
use App\Events\Models\post\PostDeleted;
use App\Events\Models\post\PostUpdated;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepository
{
    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes){

            $created = Post::query()->create([
                'title' => data_get($attributes,'title','untitled'),
                'body' => data_get($attributes,'body'),
            ]);

            if($userIds = data_get($attributes, 'user_ids'))
                $created->users()->sync($userIds);

            event(new PostCreated($created));
            return $created;

        });
    }
    public function update(Post $post, array $attributes)
    {
        return DB::transaction(function () use ($post, $attributes){

                $updated = $post->update([
                    'title' => data_get($attributes,'title', $post->title),
                    'body' => data_get($attributes,'body', $post->body),
                ]);


                if(!$updated){
                    throw new \Exception('failed to update');
                }
                if($userIds = data_get($attributes, 'user_ids'))
                    $post->users()->sync($userIds);
                event(new PostUpdated($post));

            return $post;
        });
    }
    public function forceDelete(Post $post)
    {
        return DB::transaction(function () use ($post){

            $deleted = $post->forceDelete();

            if(!$deleted){
                throw new \Exception('failed to delete');
            }
            event(new PostDeleted($post));
            return $post;
        });

    }
}
