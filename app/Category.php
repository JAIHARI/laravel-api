<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getResults($name = null){
        return $this->where('name', 'LIKE', "%{$name}%")->get();
    }
}
