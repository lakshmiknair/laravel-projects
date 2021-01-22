<?php
namespace App\Http\Controllers;
use App\Discussion;
use App\User;
use Auth;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Notification;
class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discuss');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>'required',
            'content' =>'required',
            'channel_id'=>'required'            
        ]);

        $discussion = Discussion::create([
            'title' => $request->title,
            'content' => $request->content,
            'channel_id'=> $request->channel_id,
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->title),
        ]);
        session()->flash('success_message','Disscussion Added Successfully');  
        return redirect(route('discussions.show',['slug'=> $discussion->slug]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $discussion = Discussion::where('slug', $slug)->first();
        $best_answer  = $discussion->replies()->where('best_answer',1)->first();
        return view('discussions.show')->with('discuss',$discussion)->with('best_answer',$best_answer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('discussions.edit', ['discussion' => Discussion::where('slug',$slug)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required'
        ]);

        $d = Discussion::find($id);
        $d->content =  $request->content;
        $d->save();
        session()->flash('success_message','Discussion updated Successfully');
        return redirect(route('discussions.show',['slug'=> $d->slug]));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reply(Request $request,$id)
    {
       $d = Discussion::find($id);
      $watchers = array();
        $reply = Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => $request->content
        ]);

      $reply->user->points +=25;
      $reply->user->save();
        foreach($d->watchers as $watcher):
                array_push($watchers, User::find($watcher->user_id));//only userid
        endforeach;

        Notification::send($watchers, new \App\Notifications\NewReplyAdded($d));

        session()->flash('success_message','Replied Successfully');
  
        return redirect()->back();

       
    }
}
