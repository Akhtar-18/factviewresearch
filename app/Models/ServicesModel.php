<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicesModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="services";
    protected $primaryKey = "id";
    protected $fillable = ['heading','content'];
}
