<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportSummeryDetail extends Model
{
    use HasFactory;
    protected $fillable = ['report_id','heading','details'];
}
