<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportEnquiryModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="enquiry";
    protected $primaryKey = "id";
    protected $fillable = ['report_id','types','name','email','country','contact_no','organizations','others'];
}
