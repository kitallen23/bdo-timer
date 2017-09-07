<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TimerController extends Controller
{
    public function index()
    {
//        session()->flush();

        // Clear expired items in session
        // NEEDS TESTING
        if(Session::has('items'))
        {
            foreach(Session::get('items') as $item)
            {
                $item_time = $item[0][4];
                if($item_time+1500 < time())
                {
                    session()->pull('items.'.$item_time);
                }
            }
        }

        return view('timer.index');
    }

    public function add(Request $request)
    {
        $allrequest = $request->all();

        session()->push('items.'.time(), array($allrequest['itemname'], $allrequest['enhancement'],
            $allrequest['accumulatedtrades'], $allrequest['offset'], time()));

        return redirect()->route('timer.index');
    }

    public function update(Request $request)
    {
        $allrequest = $request->all();

        // Abort early if session has expired
        if(!Session::has('items.'.$allrequest['time']))
            return redirect()->route('timer.index');

        if($allrequest['submit'] == 'remove')
        {
            session()->pull('items.'.$allrequest['time']);
        }
        else if($allrequest['submit'] == 'update')
        {
            // Obtain and modify
            $item = session()->pull('items.'.$allrequest['time']);
            $item[0][1] = $allrequest['enhancement'];
            $item[0][2] = $allrequest['accumulatedtrades'];

            // Save back to session
            session()->push('items.'.$allrequest['time'], array($item[0][0], $item[0][1], $item[0][2], $item[0][3], $item[0][4]));
        }

        return redirect()->route('timer.index');
    }
}
