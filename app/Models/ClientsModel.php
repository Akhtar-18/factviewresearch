<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientsModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "clients";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'image'];
}
