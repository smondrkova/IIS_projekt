<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['event_name', 'date_of_event', 'time_of_event', 'place_of_event', 'entry_fee', 'category', 'description', 'photo'];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    public function toggleComplete(){
        $this->completed = !$this->completed;
        $this->save();
    }
}
