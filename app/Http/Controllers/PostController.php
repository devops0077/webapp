<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class PostController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        // dd($posts);

        return view('posts.all_posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate POST

        $request->validate([
            'post_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'body' => 'required|string',
            'image_big' => 'nullable|image',

        ]);

        $slug = str_replace(' ', '-', $request->post_title);

        // dd($slug);

        $post = new Post([
            'user_id' => auth()->user()->id,
            'post_title' => $request->post_title,
            'meta_description' => $request->meta_description,
            'keywords' => $request->keywords,
            'body' => $request->body,
            'slug' => $slug,
        ]);

        try {
            $post->save();

            return redirect()->route('all_post')->with('success', 'Post Created Successfully');
        } catch (Exception) {
            return redirect()->back()->with('fail', 'Post not Saved, check and try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        if ($post) {
            return view('posts.show_post', compact('post'));
        } else {
            return redirect()->back()->with('fail', 'Post not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)

    {
        //dd($post);
        return view('posts.edit_post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // validate POST

        $request->validate([
            'post_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'body' => 'required|string',
            'image_big' => 'nullable|image',

        ]);

        $slug = str_replace(' ', '-', $request->post_title);

        // dd($slug);



        try {
            $post->update([
                'post_title' => $request->post_title,
                'meta_description' => $request->meta_description,
                'keywords' => $request->keywords,
                'body' => $request->body,
                'slug' => $slug,
            ]);

            return redirect()->route('all_post')->with('success', 'Post Updated Successfully');
        } catch (Exception) {
            return redirect()->back()->with('fail', 'Update failed, please check and try again.');
        }
    }

    //


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('all_post')->with('success', 'Post Deleted Successfully');
    }
}
