<?php

use Illuminate\Database\Eloquent\Model;

class Moderator extends Model
{
    protected $table = 'moderators';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
