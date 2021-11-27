<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCard extends Model
{
    use HasFactory;

    protected $table = 'event_cards';

    protected $fillable = [
        'name',
        'address',
        'img',
        'link'
    ];
}
