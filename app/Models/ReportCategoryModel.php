<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportCategoryModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="report_category";
    protected $primaryKey = "id";
    protected $fillable = ['cat_name','icon'];

    public function getSubCategory()
    {
        return $this->hasMany(ReportSubCategoryModel::class,'category_id','id')->select(['category_id','sub_category']);
    }


}
