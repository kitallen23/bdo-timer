<?php

namespace App\Http\Controllers;

use App\Traits\Utility;
use Illuminate\Http\Request;

class ScratchController extends Controller
{
    use Utility;

    public function index()
    {
        $all_items = $this->sortSession();

        $next_items = array();
        foreach($all_items as $key => $item)
        {
            $next_key = $this->get_next_array_key($all_items, $key);

            $next_items[$key] = $next_key != false? $next_key : "default";
        }

        reset($all_items);
        $first_item = key($all_items);
        if(!$first_item)
        {
            $first_item = "default";
        }

        $all_comments = $this->sortCookieScratch();
//        dd($_COOKIE);

        return view('scratch.index')->with(compact('all_items', 'next_items', 'first_item', 'all_comments'));
    }

    public function add(Request $request)
    {
        $allrequest = $request->all();
        $c = array(urlencode($allrequest['s_title']), urlencode($allrequest['s_comment']));
        setcookie("comment-".time(), serialize($c), time()+60*60*24*365);

        return redirect()->route('scratch.index');
    }

    public function update(Request $request)
    {
        $allrequest = $request->all();

        if($allrequest['submit'] == 'remove')
        {
            if(isset($_COOKIE['comment-'.$allrequest['timestamp']]))
            {
                setcookie("comment-".$allrequest['timestamp'], "", time() - 3600);
            }
        }
        else if($allrequest['submit'] == 'update')
        {
            if(isset($_COOKIE['comment-'.$allrequest['timestamp']]))
            {
                setcookie("comment-".$allrequest['timestamp'], "", time() - 3600);
            }

            $c = array(urlencode($allrequest['s_title']), urlencode($allrequest['s_comment']));
            setcookie("comment-".time(), serialize($c), time()+60*60*24*365);
        }

        return redirect()->back();
    }

    public function autosave(Request $request)
    {
        if (\Request::ajax())
        {
            $allrequest = $request->all();
            $title = $request->input('s_title');
            $comment = $request->input('s_comment');
            $time = $request->input('timestamp');

            if($comment == "" && $title == "")
            {
                setcookie("comment-".$time, "", time() - 3600);

                return response()->json(array('msg'=> "Empty comment removed successfully"), 200);
            }
            // Remove old
            setcookie("comment-".$time, "", time() - 3600);
            // Create/set new
            $newtime = time();
            $c = array(urlencode($title), urlencode($comment));
            setcookie("comment-".$newtime, serialize($c), time()+60*60*24*365);

            return response()->json(array('msg'=> "Autosave completed successfully", 'newtime'=>''.$newtime), 200);
        }
        return response()->json(array('msg'=> "Internal error autosaving"), 500);
    }
}
