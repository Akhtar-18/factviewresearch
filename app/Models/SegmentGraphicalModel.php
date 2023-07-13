<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SegmentGraphicalModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "segment_graphical";
    protected $primaryKey = "id";
    protected $fillable = ['report_id', 'segmentname', 'segmentvalue'];
}
