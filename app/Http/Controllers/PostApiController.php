<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostApiController extends Controller
{
    public function get()
    {
        return Post::all();
    }
    
    public function getId($id)
    {
        return Post::where('id', $id)->get();
    }

    public function post()
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        return Post::create([
            'title' => request('title'),
            'content' => request('content'),
        ]);
    }

    public function update(Post $idToUpdate)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $success = $idToUpdate->update([
            'title' => request('title'),
            'content' => request('content'),
        ]);

        return [
            'success'  => $success
        ];
    }

    public function delete(Post $idToDelete)
    {
        $success = $idToDelete->delete();

        return [
            'success' => $success
        ];
    }
}