<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportSubCategoryModel extends Model
{
    use HasFactory,SoftDeletes;
    use HasFactory,SoftDeletes;
    protected $table="report_subcategory";
    protected $primaryKey = "id";
    protected $fillable = ['category_id','sub_category'];
    public function getCategoryName()
    {
        return $this->hasOne(ReportCategoryModel::class,'id','category_id')->select(['id','cat_name']);
    }
}
