<?php

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    protected $table = 'financials';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
