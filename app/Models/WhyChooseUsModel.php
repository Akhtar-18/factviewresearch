<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhyChooseUsModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="whychooseus";
    protected $primaryKey = "id";
    protected $fillable = ['heading','content'];
}
