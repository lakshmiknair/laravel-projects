<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index')
       
        ->with( 'categories' , Category::take(5)->get())
        ->with('first_post' ,Post::orderBy('created_at', 'desc')->first())
        ->with('second_post' , Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
        ->with('third_post' , Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
        ->with('career', Category::find(6))
        ->with('tutorial', Category::find(5))
        ->with('setting', Setting::first());
        
    }
    public function singlePost($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $next = Post::where('id', '>', $post->id)->min('id');
        $prev = Post::where('id','<', $post->id)->max('id');
        return view('singlePost')->with('post',$post)
                            ->with('title',$post->title)
                            ->with('setting', Setting::first())
                            ->with('next', Post::find($next))
                            ->with('prev', Post::find($prev))
                            ->with('categories',Category::take(4)->get());
    }

    public function category($id)
    {
        $category = Category::find($id);
        return view('category')->with('setting', Setting::first())                               
                               ->with('category', $category)
                               ->with('categories',Category::take(4)->get());
    }
    public function tag($id)
    {
        $tag = Tag::find($id);
        return view('tag')->with('setting', Setting::first())                               
                          ->with('tag', $tag)
                          ->with('categories',Category::take(4)->get())
                          ->with('tags',Tag::take(4)->get());
    }


}
