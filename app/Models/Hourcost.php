<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hourcost extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function type()
    {
        return $this->belongsTo(Slottype::class);
    }
}