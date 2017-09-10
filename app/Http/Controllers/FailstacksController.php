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

        if(count($all_items) > 0)
        {
            return view('failstacks.index')->with('next_item', reset($all_items));
        }
        return view('failstacks.index')->with('next_item', null);
    }
}
