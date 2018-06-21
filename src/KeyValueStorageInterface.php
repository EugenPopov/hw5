<?php

namespace liw\src;


interface KeyValueStorageInterface
{
    /**
     * Store value by key.
     *
     * @param string $key
     * @param mixed  $value
     */
    public function set($key, $value);

    /**
     * Gets value by key.
     *
     * @param string $key
     */
    public function get($key);

    /**
     * Check whether value is exist by key.
     */
    public function has($key);

    /**
     * Removes value by key.
     *
     * @param string $key
     */
    public function remove($key);

    /**
     * Clear storage.
     *
     * @param string $key
     */
    public function clear($key);
}
