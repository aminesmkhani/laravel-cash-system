<?php

namespace App\Support\Storage;

use App\Support\Storage\Contracts\StorageInterface;
use Countable;

class SessionStorage implements StorageInterface , Countable
{
    private $bucket;

    public function __construct($bucket = 'default')
    {
        $this->bucket = $bucket;
    }

    public function get($index)
    {
        return session()->get($this->bucket . '.' . $index);
    }

    public function set($index, $value)
    {
       return session()->put($this->bucket . '.' . $index, $value);
    }

    public function all()
    {
        return session()->get($this->bucket);
    }

    public function exists($index): bool
    {
        return session()->has($this->bucket . '.' . $index);
    }

    public function unset($index)
    {
        // TODO: Implement unset() method.
    }

    public function clear()
    {
        // TODO: Implement clear() method.
    }

    public function count()
    {
        // TODO: Implement count() method.
    }

}
