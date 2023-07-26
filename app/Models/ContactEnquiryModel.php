<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactEnquiryModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="contact_enquiry";
    protected $primaryKey = "id";
    protected $fillable = ['name','email','country','contact_no','subject','msg'];
}
