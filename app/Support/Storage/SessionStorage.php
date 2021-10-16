<?php

namespace App\Support\Storage;

use App\Support\Storage\Contracts\StorageInterface;
use Countable;

class SessionStorage implements StorageInterface , Countable
{

    public function get($index)
    {
        // TODO: Implement get() method.
    }

    public function set($index, $value)
    {
        // TODO: Implement set() method.
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
