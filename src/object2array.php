<?php

if (!function_exists('object2array'))
{
    function objToArray($obj, &$arr)
    {
        // if not valid...
        if(!is_object($obj) and !is_array($obj))
        {
            // return
            return $obj;
        }

        // init
        $arr = array();

        // foreach...
        foreach ($obj as $key => $value)
        {
            if (!empty($value))
            {
                $arr[$key] = array();

                // recursive
                objToArray($value, $arr[$key]);
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