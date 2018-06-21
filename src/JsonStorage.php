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
    const FILE_NAME = 'data.json';
    /**
     * Store value by key.
     *
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $array = array(
            $key => $value
        );
        $json=json_encode($array);
        file_put_contents(self::FILE_NAME, $json, FILE_APPEND | LOCK_EX);

    }

    /**
     * Gets value by key.
     *
     * @param string $key
     */
    public function get($key)
    {
        $json = file_get_contents(self::FILE_NAME);
        $array=json_decode($json,true);
        return $array[$key];
    }

    /**
     * Check whether value is exist by key.
     */
    public function has($key)
    {
        $json = file_get_contents(self::FILE_NAME);
        $array=json_decode($json,true);
        return isset($array[$key]);
    }

    /**
     * Removes value by key.
     *
     * @param string $key
     */
    public function remove($key)
    {
        $json = file_get_contents(self::FILE_NAME);
        $array=json_decode($json,true);
        unset($array[$key]);
        $json=json_encode($array);
        file_put_contents(self::FILE_NAME,$json);

    }

    /**
     * Clear storage.
     *
     * @param string $key
     */
    public function clear($key)
    {
        $json = file_get_contents(self::FILE_NAME);
        $array=json_decode($json,true);
        $array[$key]='';
        $json=json_encode($array);
        file_put_contents(self::FILE_NAME,$json,FILE_APPEND);
    }
}