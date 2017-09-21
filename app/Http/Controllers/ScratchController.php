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
            if(isset($_COOKIE['comment-'.$allrequest['time']]))
            {
                setcookie("comment-".$allrequest['time'], "", time() - 3600);
            }
        }
        else if($allrequest['submit'] == 'update')
        {
            if(isset($_COOKIE['comment-'.$allrequest['time']]))
            {
                setcookie("comment-".$allrequest['time'], "", time() - 3600);
            }

            $c = array(urlencode($allrequest['s_title']), urlencode($allrequest['s_comment']));
            setcookie("comment-".time(), serialize($c), time()+60*60*24*365);
        }

        return redirect()->back();
    }
}
