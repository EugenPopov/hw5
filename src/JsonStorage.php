<?php
/**
 * Created by PhpStorm.
 * User: eugene
 * Date: 21.06.18
 * Time: 14:11
 */

namespace liw\src;


class JsonStorage implements KeyValueStorageInterface
{

    /**
     * Store value by key.
     *
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        // TODO: Implement set() method.
    }

    /**
     * Gets value by key.
     *
     * @param string $key
     */
    public function get($key)
    {
        // TODO: Implement get() method.
    }

    /**
     * Check whether value is exist by key.
     */
    public function has($key)
    {
        // TODO: Implement has() method.
    }

    /**
     * Removes value by key.
     *
     * @param string $key
     */
    public function remove($key)
    {
        // TODO: Implement remove() method.
    }

    /**
     * Clear storage.
     *
     * @param string $key
     */
    public function clear($key)
    {
        // TODO: Implement clear() method.
    }
}