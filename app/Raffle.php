<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    protected $fillable = ['title', 'max_tickets', 'active'];
}
