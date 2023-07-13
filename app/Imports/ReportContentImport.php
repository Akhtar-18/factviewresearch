<?php

namespace App\Imports;

use App\Models\ReportCategoryModel;
use App\Models\ReportsLicenseModel;
use App\Models\ReportsModel;
use App\Models\ReportSubCategoryModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ReportContentImport implements ToCollection, WithChunkReading , ShouldQueue,WithHeadingRow
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

        $dataCategory=ReportCategoryModel::where('cat_name',$row['category'])->first();
        if(isset($dataCategory->cat_name))
        {
            $category_id=$dataCategory->id;
        }
        else
        {
            $category=ReportCategoryModel::create(['cat_name'=>$row['category']]);
            $category_id=$category->id;
        }


        $dataSubcategory=ReportSubCategoryModel::where('sub_category',$row['sub_category'])->first();
        if(isset($dataSubcategory->sub_category))
        {
            $subcategory_id=$dataSubcategory->id;
        }
        else
        {
            $subcategory=ReportSubCategoryModel::create(['category_id'=>$category_id,'sub_category'=>$row['sub_category']]);
            $subcategory_id=$subcategory->id;
        }

        $dataReport=ReportsModel::where('heading',$row['heading'])->first();

        if(isset($dataReport->heading))
        {

        }
        else
        {
            $reports= ReportsModel::create([
                'category_id' => $category_id,
                'sub_category_id' => $subcategory_id,
                'heading' => $row['heading'],
                'url'=>\Str::slug($row['heading']),
                'description'=>$row['description'],
                'segment'=>$row['segment'],
                'toc'=>$row['toc'],
                'methodology'=>$row['methodology'],
                'publish_month'=>$this->transformDate($row['publish_month']),
                'pages'=>$row['pages'],
                'customized'=>$row['customized'],
            ]);
            $report_id=$reports->id;
            ReportsLicenseModel::create(['report_id'=>$report_id,'single_user'=>$row['single_user'],'multi_user'=>$row['multi_user'],'enterprise_user'=>$row['enterprise_user']]);
        }


        }
    }


    public function chunkSize(): int
    {
        return 1000;
    }

    public function transformDate($value, $format = 'Y-m-d')
{
    try {
        return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    } catch (\ErrorException $e) {
        return \Carbon\Carbon::createFromFormat($format, $value);
    }
}
}
