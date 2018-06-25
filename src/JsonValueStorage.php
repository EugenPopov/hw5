<?php

namespace liw\src;


class JsonValueStorage implements KeyValueStorageInterface
{
    const FILE_NAME = 'data.json';

    public function set($key, $value) :void
    {
        $json = file_get_contents(self::FILE_NAME);
        $array=json_decode($json,true);
        if(!isset($array[$key]))
        {
            $array[$key] = $value;
            $json = json_encode($array);
            file_put_contents(self::FILE_NAME, $json, LOCK_EX);
        }
    }

    public function get($key)
    {
        $json = file_get_contents(self::FILE_NAME);
        $array=json_decode($json,true);
        if(isset($array[$key]))
            return $array[$key];
    }

    public function has($key) :bool
    {
        $json = file_get_contents(self::FILE_NAME);
        $array=json_decode($json,true);
        return isset($array[$key]);
    }

    public function remove($key) :void
    {
        $json = file_get_contents(self::FILE_NAME);
        $array=json_decode($json,true);
        if(isset($array[$key]))
        {
            unset($array[$key]);
            $json = json_encode($array);
            file_put_contents(self::FILE_NAME, $json);
        }
    }

    public function clear() :void
    {
        file_put_contents(self::FILE_NAME,'',LOCK_EX);
    }
}