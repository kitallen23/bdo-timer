<?php
namespace App\Traits;

use Illuminate\Support\Facades\Session;

trait Utility
{
    public function sortSession()
    {
        $all_items = array();
        if(Session::has('items'))
        {
            foreach(Session::get('items') as $item)
            {
                $all_items[$item[0][4]] = array($item[0][0], $item[0][1], $item[0][2], $item[0][3], $item[0][4]);
            }
        }
        ksort($all_items);
        return $all_items;
    }

    public function sortCookieScratch()
    {
        $all_scratch = array();

        foreach($_COOKIE as $ckey => $cvalue)
        {
            if(strpos($ckey, "comment-") === 0)
            {
                $comment = unserialize($cvalue);
                $all_scratch[substr($ckey, 8)] = array(urldecode($comment[0]), urldecode($comment[1]));
            }
        }
        krsort($all_scratch);
        return $all_scratch;
    }

    public function get_next_array_key($array,$key)
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