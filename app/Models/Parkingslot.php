<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkingslot extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
    public function block()
    {
        return $this->belongsTo(Block::class);
    }
    
    public function type()
    {
        return $this->belongsTo(Slottype::class,'slot_type','id');
    }

}
