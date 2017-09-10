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
            $to_remove = [];
            foreach(Session::get('items') as $item)
            {
                $item_time = $item[0][4];
                if($item_time+1500 < time())         // HERE ADD 1500: $item_time + 1500
                {
//                    session()->pull('items.'.$item_time);
                    array_push($to_remove, 'items.'.$item_time);
                }
            }
            foreach($to_remove as $session_id)
            {
                session()->pull($session_id);
            }
        }

        return view('timer.index');
    }

    public function add(Request $request)
    {
        $allrequest = $request->all();

        $offset = 0;
        if($allrequest['offset'] == "-")
        {
            $offset = 0;
        }
        else if($allrequest['offset'] == "1 min")
        {
            $offset = 60;
        }
        else if($allrequest['offset'] == "2 mins")
        {
            $offset = 120;
        }
        else if($allrequest['offset'] == "3 mins")
        {
            $offset = 180;
        }
        else if($allrequest['offset'] == "4 mins")
        {
            $offset = 240;
        }
        else if($allrequest['offset'] == "5 mins")
        {
            $offset = 300;
        }

        session()->push('items.'.(time()-$offset), array($allrequest['itemname'], $allrequest['enhancement'],
            $allrequest['accumulatedtrades'], $allrequest['offset'], time()-$offset));

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
