<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
      'name'
    ];

    //relationships
    public function addresses()
    {
      return $this->hasMany(Addresses::class); //area can have many addresses
    }
    public function governorate()
    {
      return $this->belongsTo(Governorate::class); //governorate can have many areas
    }
}
