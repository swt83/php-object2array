<?php

if (!function_exists('object2array'))
{
    function object2array($object)
    {
        // if not fixable...
        if(!is_object($object) and !is_array($object))
        {
            // return
            return $object;
        }

        // init
        $array = array();

        // foreach...
        foreach ($object as $key => $value)
        {
            // if empty...
            if (empty($value))
            {
                // save whatever it is
                $array[$key] = $value;
            }

            // else NOT empty...
            else
            {
                // prep to split it up
                $array[$key] = array();

                // recursive function
                $array[$key] = object2array($value);
            }
        }

        // return
        return $array;
    }
}