<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SegmentType extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $fillable = ['report_id', 'segmenttypename'];
    public function getReportsSegmentgraph()
    {
        return $this->hasMany(SegmentGraphicalModel::class,'segment_types','id')->select(['report_id','id','segmentname','segmentvalue','segment_types']);
    }
}
