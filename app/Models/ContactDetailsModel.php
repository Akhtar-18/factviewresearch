<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactDetailsModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="contact_details";
    protected $primaryKey = "id";
    protected $fillable = ['company_name','address','no_prefix','contact_no','email_address','facebook','twitter','instagram','linkedin','company_logo'];
}
