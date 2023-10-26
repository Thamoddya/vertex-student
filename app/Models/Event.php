<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable=[
        'event_name',
        'venue',
        'started_date',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'event_id');
    }

}
