<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;
    protected $guarded=[];

    
    public function slot()
    {
        return $this->belongsTo(Parkingslot::class);
    }
    public function cost()
    {
        return $this->belongsTo(Hourcost::class);
    }
    
    
}
