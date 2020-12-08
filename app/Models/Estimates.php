<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimates extends Model
{
    use HasFactory;
    protected $fillable=['cust_name','agentid','machine_name','machine_number','estimated_price','age_id'];
}
