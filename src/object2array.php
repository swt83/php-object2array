<?php

if (!function_exists('object2array'))
{
    function object2array($obj, &$arr = array())
    {
        // if not valid...
        if(!is_object($obj) and !is_array($obj))
        {
            // return
            return $obj;
        }

        // foreach...
        foreach ($obj as $key => $value)
        {
            if (!empty($value))
            {
                $arr[$key] = array();

                // recursive
                object2array($value, $arr[$key]);
            }
            else
            {
                $arr[$key] = $value;
            }
        }

        // return
        return $arr;
    }
}