<?php
namespace liw\src;
use Symfony\Component\Yaml\Yaml;
const FILE_NAME = 'storage1.yaml';
class YamlStorage implements KeyValueStorageInterface
{
    const FILE_NAME = 'storage.yaml';
    public function set($key, $value)
    {

        $array = array(
            $key => $value
        );
        $yaml = Yaml::dump($array);
        file_put_contents(self::FILE_NAME, $yaml, FILE_APPEND | LOCK_EX);
    }
    public function get($key)
    {
        $array = Yaml::parseFile(self::FILE_NAME);
        return $array[$key];
    }
    public function has($key)
    {
        $array = Yaml::parseFile(self::FILE_NAME);
        return isset($array[$key]);
    }
    public function remove($key)
    {
        $array = Yaml::parseFile(self::FILE_NAME);
        unset($array[$key]);
        file_put_contents(self::FILE_NAME, $array,  LOCK_EX);
    }

    public function clear($key)
    {
        $array = Yaml::parseFile(self::FILE_NAME);
        $array[$key]='';
        file_put_contents(self::FILE_NAME, $array,  LOCK_EX);
    }
}