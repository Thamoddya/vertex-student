<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'mobile',
        'email',
        'event_id'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

}
