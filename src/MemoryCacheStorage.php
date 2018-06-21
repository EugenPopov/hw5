<?php

namespace liw\src;


class MemoryCacheStorage implements KeyValueStorageInterface
{

    private $storage=[];


    public function set($key, $value)
    {
        return $this->storage[$key] = $value;
    }


    public function get($key)
    {
        return $this->storage[$key];
    }


    public function has($key)
    {
        return isset($this->storage[$key]);
    }


    public function remove($key)
    {
        unset($this->storage[$key]);
    }


    public function clear($key)
    {
        $this->storage=[];
    }
}