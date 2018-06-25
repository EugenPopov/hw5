<?php

namespace liw\src;


class JsonValueStorage implements KeyValueStorageInterface
{
    private $file_name;

    public function __construct($file)
    {
        $this->file_name=$file;
    }

    private function getContent($file): ?array
    {
        if(!file_exists($file))
            file_put_contents($file,'',LOCK_EX);
        $string = file_get_contents($file);
        return json_decode($string,true);
    }

    public function set($key, $value) :void
    {

        $array = $this->getContent($this->file_name);
        if(!isset($array[$key]))
        {
            $array[$key] = $value;
            $json = json_encode($array);
            file_put_contents($this->file_name, $json, LOCK_EX);
        }
    }

    public function get(string $key)
    {
        $array = $this->getContent($this->file_name);
        if(isset($array[$key]))
            return $array[$key];
    }

    public function has($key) :bool
    {
        $array = $this->getContent($this->file_name);
        return isset($array[$key]);
    }

    public function remove($key) :void
    {
        $array = $this->getContent($this->file_name);
        if(isset($array[$key]))
        {
            unset($array[$key]);
            $json = json_encode($array);
            file_put_contents($this->file_name, $json);
        }
    }

    public function clear() :void
    {
        file_put_contents($this->file_name,'',LOCK_EX);
    }
}