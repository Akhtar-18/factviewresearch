<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportPayment extends Model
{
    use HasFactory;
    
    protected $primaryKey = "id";
    protected $fillable = ['report_id','name','company_name','job_title','country_name','state_name','city_name','zip_code','email','contact','lisence_amount','address','status'];
    public function getReportName()
    {
        return $this->hasOne(ReportsModel::class,'id','report_id')->select(['id','heading']);
    }
}
