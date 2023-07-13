<?php

namespace App\Imports;

use App\Models\ReportsModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SeoImports implements ToCollection,ShouldQueue,WithChunkReading,WithHeadingRow
{
    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {

            $dataReport=ReportsModel::where('heading',$row['heading'])->first();

            $report_id=$dataReport->id;
            if(isset($report_id))
            {
                $dataInsert=['schema'=>$row['schema'],
                'meta_title'=>$row['meta_title'],
                'meta_des'=>$row['meta_des'],
                'metal_keywords'=>$row['metal_keywords']];
                $dataReport->update($dataInsert);
            }
           
                
            
           
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
