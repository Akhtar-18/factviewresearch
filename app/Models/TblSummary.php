<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblSummary extends Model
{
    use HasFactory;protected 
    $table="tbl_summary";
    protected $primaryKey = "id";
    protected $fillable = ['report_id','heading','details'];
}
