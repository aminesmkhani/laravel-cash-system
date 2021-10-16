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
        // TODO: Implement get() method.
    }

    public function set($index, $value)
    {
       return session()->put('items.id', '5');
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function exists($index)
    {
        // TODO: Implement exists() method.
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
