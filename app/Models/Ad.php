<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    public function type()
    {

        return $this->hasOne(Type::class, 'id', 'type_id');

    }

    public function color()
    {

        return $this->hasOne(Color::class, 'id', 'color_id');

    }

    public function user()
    {

        return $this->hasOne(User::class, 'id', 'user_id');

    }
}
