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

    public function update(Request $request)
    {
//        $allrequest = $request->all();
//
//        // Abort early if session has expired
//        if(!Session::has('items.'.$allrequest['time']))
//            return redirect()->route('timer.index');
//
//        if($allrequest['submit'] == 'remove')
//        {
//            session()->pull('items.'.$allrequest['time']);
//        }
//        else if($allrequest['submit'] == 'update')
//        {
//            // Obtain and modify
//            $item = session()->pull('items.'.$allrequest['time']);
//            $item[0][1] = $allrequest['enhancement'];
//            $item[0][2] = $allrequest['accumulatedtrades'];
//
//            // Save back to session
//            session()->push('items.'.$allrequest['time'], array($item[0][0], $item[0][1], $item[0][2], $item[0][3], $item[0][4]));
//        }

        return redirect()->back();
    }
}
