<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Floor;

class Block extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
    public function slots(){
        return  $this->hasMany(Parkingslot::class);
    }
}
