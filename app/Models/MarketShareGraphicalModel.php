<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketShareGraphicalModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "market_shares_graphical";
    protected $primaryKey = "id";
    protected $fillable = ['report_id', 'marketsharename', 'marketsharevalue'];
}
