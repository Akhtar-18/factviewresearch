<?php

namespace App\Imports;

use App\Models\ReportsModel;
use App\Models\SegmentGraphicalModel;
use App\Models\SegmentType;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SegmentImport implements ToCollection, WithChunkReading, ShouldQueue, WithHeadingRow
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
                if (isset($row['type'])) {
                    $SegmentType = SegmentType::where('segmenttypename', $row['type'])->first();
                    if ($SegmentType) {
                        $segment_types_id = $SegmentType->id;
                    } else {
                        $SegmentData = SegmentType::create(['segmenttypename' => $row['type'], 'report_id' => $report_id]);
                        $segment_types_id = $SegmentData->id;
                    }
                    if (isset($row['segment'])) {
                        SegmentGraphicalModel::create([
                            'report_id' => $report_id,
                            'segment_types' => $segment_types_id,
                            'segmentname' => $row['segment'],
                            'segmentvalue' => $row['segment_value'],
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
