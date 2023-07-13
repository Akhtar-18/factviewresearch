<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportsLicenseModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="reportlicense";
    protected $primaryKey = "id";
    protected $fillable = ['report_id','single_user','multi_user','enterprise_user'];
}
