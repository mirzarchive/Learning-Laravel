<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index', [
            'posts' => Post::orderBy('updated_at')->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {

        // $post = new Post();

        // $post->title = $request->title;
        // $post->excerpt = $request->excerpt;
        // $post->body = $request->body;
        // $post->min_to_read = $request->min_to_read;
        // $post->image_path = 'unavailable';
        // $post->is_published = $request->is_published === 'on';

        // $post->save();

        $request->validated();

        $post = Post::create($request
            ->merge([
                'image_path' => $this->storeFile($request),
                'is_published' => $request->is_published === 'on'
            ])
            ->except(['_token', '_method']));

        $post->meta()->create([]);

        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('blog.show', [
            'post' => Post::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('blog.edit', [
            'post' => Post::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, string $id)
    {
        $request->validated();

        Post::where('id', $id)->update($request
            ->merge([
                'is_published' => $request->is_published === 'on'
            ])
            ->except(['_token', '_method']));

        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);

        return redirect(route('blog.index'))->with('message', 'The Post successfuly deleted');
    }

    private function storeFile(PostFormRequest $request)
    {
        $newPayloadFileName = uniqid() . "-{$request->title}.{$request->image->extension()}";

        return $request->image->move(public_path('images'), $newPayloadFileName);
    }
}
