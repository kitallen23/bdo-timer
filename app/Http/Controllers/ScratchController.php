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
        $keys = array_keys($all_items);
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

//        setcookie("comment-456", urlencode("four-five '\n;\nsix"),time()+100);
//        setcookie("comment-123", urlencode("ONE TWO THREE!! >:)"),time()+100);
//        setcookie("comment-082", urlencode("082 ZEROEIGHTTWO"),time()+100);
//        $c = array(urlencode("The title"), urlencode("The contents of the comment!"));
//        setcookie("comment-123", serialize($c), time()+100);

        $all_comments = $this->sortCookieScratch();
        //dd($all_comments);

        return view('scratch.index')->with(compact('all_items', 'next_items', 'first_item', 'all_comments'));
    }

    public function add(Request $request)
    {
        $allrequest = $request->all();
        $c = array(urlencode($allrequest['s_title']), urlencode($allrequest['s_comment']));
        setcookie("comment-".time(), serialize($c), time()+60*60*24*365);
        return redirect()->route('scratch.index');
    }
}
