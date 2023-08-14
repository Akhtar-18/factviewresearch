<?php

namespace App\Imports;

use App\Models\CagrModel;
use App\Models\MarketGraphicalModel;
use App\Models\MarketShareGraphicalModel;
use App\Models\RegionGraphicalModel;
use App\Models\ReportsModel;
use App\Models\SegmentGraphicalModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MarketValues implements ToCollection, WithChunkReading, ShouldQueue, WithHeadingRow
{
    /**
     * @param Collection $row
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $dataReport = ReportsModel::where('heading', $row['heading'])->first();

            $report_id = $dataReport->id;
            if (isset($report_id)) {
                MarketGraphicalModel::create([
                    'report_id' => $report_id,
                    'marketyear' => $row['market_year'],
                    'marketvalue' => $row['market_value'],
                ]);
                // if(isset($row['segment']))
                // {
                //     SegmentGraphicalModel::create([
                //         'report_id' => $report_id,
                //         'segmentname' => $row['segment'],
                //         'segmentvalue' => $row['segment_value'],
                //     ]);
                // }
                if (isset($row['market_share'])) {
                    MarketShareGraphicalModel::create([
                        'report_id' => $report_id,
                        'marketsharename' => $row['market_share'],
                        'marketsharevalue' => $row['market_share_value'],
                    ]);
                }
                if (isset($row['region'])) {
                    RegionGraphicalModel::create([
                        'report_id' => $report_id,
                        'regionname' => $row['region'],
                        'regionvalue' => $row['region_value'],
                    ]);
                }
                if (isset($row['cagr'])) {
                    $getcagr = CagrModel::where('report_id', $report_id)->first();
                    if ($getcagr) {
                        $getcagr->update(['cagr' => $row['cagr']]);
                    } else {
                        CagrModel::create([
                            'report_id' => $report_id,
                            'cagr' => $row['cagr'],
                        ]);
                    }
                }


            }

        }
    }
    public function chunkSize(): int
    {
        return 1000;
    }
}
