<?php

namespace App\Http\Controllers;

use App\Traits\Utility;
use Illuminate\Http\Request;

class FailstacksController extends Controller
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

//        dd($all_items, $next_items, $first_item);
        return view('failstacks.index')->with(compact('all_items', 'next_items', 'first_item'));
    }
}
