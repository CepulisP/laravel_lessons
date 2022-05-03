<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function sender()
    {

        return $this->hasOne(User::class, 'id', 'sender_id');

    }

    public function recipient()
    {

        return $this->hasOne(User::class, 'id', 'recipient_id');

    }

}
