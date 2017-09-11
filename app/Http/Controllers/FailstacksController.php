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

            $next_items[$key] = $next_key != false? $next_key : "";
        }

        reset($all_items);
        $first_item = key($all_items);

//        dd($all_items, $next_items, $first_item);
        return view('failstacks.index')->with(compact('all_items', 'next_items', 'first_item'));
    }

    function get_next_array_key($array,$key)
    {
        $keys = array_keys($array);
        $position = array_search($key, $keys);
        $nextKey = "";
        if (isset($keys[$position + 1])) {
            $nextKey = $keys[$position + 1];
        }
        return $nextKey;
    }
}
