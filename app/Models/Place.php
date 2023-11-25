<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'address',
        'description',
        'photo',    
    ];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Define a one-to-many relationship with the Event model.
     */
    public function events()
    {
        return $this->hasMany(Event::class, 'place_of_event');
    }
}
