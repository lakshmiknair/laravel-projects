<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;

use Auth;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch(request('filter')){

            case 'me':
                $discussions = Discussion::where('user_id', Auth::id())->paginate(3);
                break;
                case 'solved':
                    $answered = array();
                    foreach(Discussion::all() as $d ):
                            if($d->hasBestAnswer())
                            {
                                array_push($answered, $d);
                            }
                    endforeach;

                    $discussions = new Paginator($answered, 3);
                    break;
                    case 'unsolved':
                        $answered = array();
                        foreach(Discussion::all() as $d ):
                                if(!$d->hasBestAnswer())
                                {
                                    array_push($answered, $d);
                                }
                        endforeach;
    
                        $discussions = new Paginator($answered, 3);
                        break;
                default:
                $discussions = Discussion::orderBy('created_at','desc')->paginate(3);
                break;
        }
      
        return view('forum',['discussions'=>$discussions]);
    }

    public function channel($slug)
    {
        $channel = Channel::where('slug',$slug)->first();
        return view('channel')->with('discussions', $channel->discussions()->paginate(5));
    }
}
