<?php

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
