<?php
namespace liw\src;
use Symfony\Component\Yaml\Yaml;
const FILE_NAME = 'storage1.yaml';
class YamlValueStorage implements KeyValueStorageInterface
{
    const FILE_NAME = 'storage.yaml';

    public function set($key, $value) :void
    {
        $storage = Yaml::parseFile(self::FILE_NAME);
        if(!isset($storage[$key]))
        {
            $array[$key] = $value;
            $yaml = Yaml::dump($array);
            file_put_contents(self::FILE_NAME, $yaml, FILE_APPEND | LOCK_EX);
        }
    }

    public function get($key)
    {
        $array = Yaml::parseFile(self::FILE_NAME);
        if(isset($array[$key]))
            return $array[$key];
    }

    public function has($key) :bool
    {
        $array = Yaml::parseFile(self::FILE_NAME);
        return isset($array[$key]);
    }

    public function remove($key) :void
    {
        $array = Yaml::parseFile(self::FILE_NAME);

        if(isset($array[$key]))
        {
            unset($array[$key]);
            $yaml = Yaml::dump($array);
            file_put_contents(self::FILE_NAME, $yaml, LOCK_EX);
        }
    }

    public function clear() :void
    {
        file_put_contents(self::FILE_NAME, '',  LOCK_EX);
    }
}