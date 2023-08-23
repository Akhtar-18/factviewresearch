<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioAndVideo extends Model
{
    use HasFactory;
    protected $table="audioandvideos";
    protected $primaryKey = "id";
    protected $fillable = ['audio','video'];
}
