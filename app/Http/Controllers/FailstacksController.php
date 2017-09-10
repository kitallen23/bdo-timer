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

        return view('failstacks.index')->with('all_items', $all_items);
    }
}
