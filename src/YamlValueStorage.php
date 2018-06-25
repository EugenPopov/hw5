<?php
namespace liw\src;
use Symfony\Component\Yaml\Yaml;
const FILE_NAME = 'storage1.yaml';
class YamlValueStorage implements KeyValueStorageInterface
{
    private $file_name;

    public function __construct($file)
    {
        $this->file_name=$file;
    }

    private function getContent($file) :?array
    {
        if(!file_exists($file))
            file_put_contents($file,'',LOCK_EX);
        return Yaml::parseFile($file);
    }

    public function set($key, $value) :void
    {
        $storage = $this->getContent($this->file_name);
        if(!isset($storage[$key]))
        {
            $array[$key] = $value;
            $yaml = Yaml::dump($array);
            file_put_contents($this->file_name, $yaml, FILE_APPEND | LOCK_EX);
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
            $yaml = Yaml::dump($array);
            file_put_contents($this->file_name, $yaml, LOCK_EX);
        }
    }

    public function clear() :void
    {
        file_put_contents($this->file_name, '',  LOCK_EX);
    }

}