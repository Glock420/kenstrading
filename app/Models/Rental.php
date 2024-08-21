<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'rentals';
    protected $primaryKey = 'rentid';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'custid');
    }

    // Define the relationship with the Car model
    public function car()
    {
        return $this->belongsTo(Car::class, 'carid');
    }
}
