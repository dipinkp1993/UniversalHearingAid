<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agents extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primarykey='agent_id';
    protected $fillable=['agent_name','contact_number','deleted_at'];
}
