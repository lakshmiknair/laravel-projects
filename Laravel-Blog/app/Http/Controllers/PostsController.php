<?php
namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Tag;
use Auth;
use App\Http\Requests\CreatePostsRequest;
use App\Http\Requests\updatePostsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if(count($categories) == 0 || count($tags) == 0)
        {
            session()->flash('info_message','Create Category and tag first , then create post');
            return redirect()->back();
        }
        return view('admin.posts.create')->with(['categories'=> $categories, 'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(CreatePostsRequest $request)
    public function store(Request $request)
    {
    
     // dd($request->all());
    /*  $this->validate($request, [
        'title' =>'required|unique:Post',          
        'featured' => 'required|image',
        'content' =>'required',
        'category_id' =>'required',
        'tags'=>'required'
      ]);*/
     //$category = new Category();
    $featured  = $request->featured;
    $featured_new = time().$featured->getClientOriginalName();
    $featured->move('uploads/posts', $featured_new);
 
    $post = Post::create ([
         'title' => $request->title,       
         'content' => $request->content,
         'slug' => Str::slug($request->title),
         'featured' => 'uploads/posts/'.$featured_new,
        'category_id'=>$request->category_id,
        'user_id' => Auth::id()

     ]);
     $post->tags()->attach($request->tags);
      
     session()->flash('success_message','Post Added Successfully');
  
     return redirect(route('posts'));
     //return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post = Post::find($id);
       $tags = Tag::all();
        return view('admin.posts.edit')->with(['post'=> $post,'categories' => Category::all(),'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function update(UpdatePostsRequest $request, Post $post)
    {
       // dd('ddd');
        $post->update([
            'title' =>$request->title,
            'description' =>$request->description,
            'content' =>$request->content
        ]); 
       
        session()->flash('success_message','Post Updated Successully');
        return redirect(route('post.index'));
    }*/
    public function update(Request $request,$id)
    {
       /* $this->validate($request, [
            'title' =>'required|unique:Post',          
           
            'content' =>'required',
            'category_id' =>'required'
          ]);*/
         //$category = new Category();

         $post = Post::find($id);
         if($request->hasFile('featured'))
         {
        $featured  = $request->featured;
        $featured_new = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new);
        $post->featured = 'uploads/posts/'.$featured_new;
         }
        $post->title =  $request->title;  
         $post->content = $request->content;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        session()->flash('success_message','Post Updated Successully');
        return redirect(route('posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('success-message','Post deleted successfully');
        return redirect(route('post.index'));

    }
    */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        session()->flash('delete_message','Post successfully trashed');
        return redirect(route('posts'));
    }
    public function trashed()
    {
        $posts= Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts' , $posts);

    }
    public function kill($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        session()->flash('delete_message','Post successfully Deleted');
        return redirect()->back();
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        session()->flash('delete_message','Post successfully restored');
        return redirect()->back();
    }
}
