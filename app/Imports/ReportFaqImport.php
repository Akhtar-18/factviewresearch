<?php

namespace App\Imports;

use App\Models\ReportsFaqModel;
use App\Models\ReportsModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReportFaqImport implements ToCollection ,WithChunkReading , ShouldQueue,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {


        foreach ($rows as $row)
        {

            $dataReport=ReportsModel::where('heading',$row['heading'])->first();

            $report_id=$dataReport->id;
            if(isset($report_id))
            {
                ReportsFaqModel::create([
                    'report_id' => $report_id,
                    'question' => $row['question'],
                    'answer' => $row['answer'],
                ]);
            }

        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
