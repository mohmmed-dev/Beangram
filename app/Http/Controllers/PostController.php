<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\user;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use FFMpeg;
use FFMpeg\FFProbe;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suggested_users = auth()->user()->suggested_users();
        $ids = auth()->user()->following()->wherePivot('confirmed',true)->get()->pluck('id');
        $posts = post::wherein('user_id',$ids)->latest()->get();
        return view('posts.home',compact(['posts','suggested_users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required',
            'file' => ['required','file','mimes:mp4,mov,ogg']
        ]);
        $video = $request->file('file')->store('posts','public');
        $arr = [$video];
        $data['file'] =  json_encode($arr);
        $data["slug"] = Str::random(10);
        $data["file_type"] =  'video';
        $data["user_id"] = auth()->id();
        Post::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        Gate::authorize('update',$post);
        return view("posts.edit", compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        Gate::authorize('update',$post);
        $data = $request->validate([
        'description' => 'required',
        ]);
    $post->update($data);
    return redirect('/p/'.$post->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        Gate::authorize('delete',$post);
        Storage::delete('public/'.$post->image);
        $post->delete();
        return redirect()->route("home");
    }
    
    public function explore() {
    $posts = Post::whereRelation("owner", 'privavte_account','=',0)->whereNot('user_id', auth()->id())->simplePaginate(12);
    return view('posts.explore' ,compact('posts'));
    }
}
