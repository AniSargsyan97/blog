<?php


namespace App\Service;


use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
        DB::beginTransaction();
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);

        $data['preview'] = Storage::disk('public')->put('/images', $data['preview']);
        $data['image'] = Storage::disk('public')->put('/images', $data['image']);

        $post = Post::firstOrCreate($data);
        $post->tags()->attach($tagIds);
        DB::commit();

        } catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {

        DB::beginTransaction();
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);

        $data['preview'] = Storage::disk('public')->put('/images', $data['preview']);
        $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        $post->update($data);
        $post->tags()->sync($tagIds);
        DB::commit();

        } catch (Exception $exception){
            DB::rollBack();
            abort(505);
        }

        return $post;
    }
}
