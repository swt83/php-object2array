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

        // if is object...
        if (is_object($object))
        {
            // if has method toArray()...
            if (method_exists($object, 'toArray'))
            {
                return $object->toArray();
            }

            // if has method to_array()...
            if (method_exists($object, 'to_array'))
            {
                return $object->to_array();
            }
        }

        // init
        $array = [];

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