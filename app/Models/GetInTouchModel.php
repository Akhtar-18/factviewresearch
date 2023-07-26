<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GetInTouchModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="getintouch";
    protected $primaryKey = "id";
    protected $fillable = ['heading','content'];
}
