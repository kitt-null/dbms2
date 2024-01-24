<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use App\Models\Event;
class Attendee extends Model
{
    use HasFactory;

    protected $fillable = ['event_id','name'];
        
    public function events(){
        return $this->belongsTo(Event::class,);
    }
}
