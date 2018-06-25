<?php

namespace liw\src;


class MemoryValueStorage implements KeyValueStorageInterface
{

    private $storage=[];

    public function set($key, $value) :void
    {
        $this->storage[$key] = $value;
    }


    public function get($key)
    {
        if(isset($this->storage[$key]))
            return $this->storage[$key];
    }


    public function has($key) :bool
    {
        return isset($this->storage[$key]);
    }


    public function remove($key) :void
    {
        if(isset($this->storage[$key]))
            unset($this->storage[$key]);
    }


    public function clear() :void
    {
        $this->storage=[];
    }
}