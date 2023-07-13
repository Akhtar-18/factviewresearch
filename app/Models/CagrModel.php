<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CagrModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "cagr_graphical";
    protected $primaryKey = "id";
    protected $fillable = ['report_id', 'cagr'];

}
