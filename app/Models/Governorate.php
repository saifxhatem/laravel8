<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;
    protected $fillable = [
      'name'
    ];
    //relationships
    public function areas()
    {
      return $this->hasMany(Area::class);
    }
    public function addresses()
    {
      return $this->hasManyThrough(Addresses::class, Area::class);
    }
}
