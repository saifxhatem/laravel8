<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'governorate', 'area', 'address'
    ];
    protected $table = 'customer_addresses'; //this is needed to override default table name

    //relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //new relationships
    public function area()
    {
      return $this->belongsTo(Area::class);
    }
}
