<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportsModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="reports";
    protected $primaryKey = "id";
    protected $fillable = ['category_id',
                            'sub_category_id',
                                'heading',
                                'url',
                                'description',
                                'segment',
                                'toc',
                                'methodology',
                                'publish_month' ,
                                'pages',
                                'graphical_data',
                                'image',
                                'image_alt',
                                'customized',
                                'schema',
                                'meta_title',
                                'meta_des',
                                'metal_keywords'
                            ];
        public function getCategoryName()
        {
            return $this->hasOne(ReportCategoryModel::class,'id','category_id')->select(['id','cat_name']);
        }
         public function getSubCategoryName()
        {
            return $this->hasOne(ReportSubCategoryModel::class,'id','sub_category_id')->select(['id','sub_category']);
        }
        public function getReportLicenses()
        {
            return $this->hasOne(ReportsLicenseModel::class,'report_id','id')->select(['report_id','id','single_user','multi_user','enterprise_user']);
        }

        public function getReportFaq()
        {
            return $this->hasMany(ReportsFaqModel::class,'report_id','id')->select(['report_id','id','question','answer']);
        }

        public function getReportmarketgraph()
        {
            return $this->hasMany(MarketGraphicalModel::class,'report_id','id')->select(['report_id','id','marketyear','marketvalue']);
        }

        public function getReportmarketsharegraph()
        {
            return $this->hasMany(MarketShareGraphicalModel::class,'report_id','id')->select(['report_id','id','marketsharename','marketsharevalue']);
        }

        public function getReportSegmentgraph()
        {
            return $this->hasMany(SegmentGraphicalModel::class,'report_id','id')->select(['report_id','id','segmentname','segmentvalue']);
        }
        public function getReportRegiongraph()
        {
            return $this->hasMany(RegionGraphicalModel::class,'report_id','id')->select(['report_id','id','regionname','regionvalue']);
        }
        public function getReportCAGR()
        {
            return $this->hasOne(CagrModel::class,'report_id','id')->select(['report_id','id','cagr']);
        }
        public function getReportTypeSegmentgraph()
        {
            return $this->hasMany(SegmentType::class,'report_id','id')->select(['report_id','id','segmenttypename']);
        }
        public function getReportTblSummary()
        {
            return $this->hasMany(TblSummary::class,'report_id','id')->select(['report_id','id','heading','details'])->limit(10);
        }
}

