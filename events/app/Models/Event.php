<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use App\Models\Attendee;
class Event extends Model
{
    protected $fillable = ['eventName','date','location'];
    public function attendees(){
        return $this->hasMany(Attendee::class);
    }
}
