<?php
namespace App\Exports;

use App\Models\ReportsModel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ExportReport implements FromQuery, WithMapping, WithHeadings
{

	use Exportable;
	public function query()
	{
		/*return ReportsModel::join('report_category','report_category.id','=','reports.category_id')
							 ->join('report_subcategory','report_subcategory.id','=','reports.sub_category_id')
							 ->select(['report_category.cat_name','report_subcategory.sub_category','reports.heading','reports.url']);*/
		return ReportsModel::join('report_category', 'report_category.id', '=', 'reports.category_id')
			->select(['report_category.cat_name', 'reports.heading', 'reports.url', 'reports.pages', 'reports.publish_month']);

	}
	public function map($row): array
	{
		return [
			$row->cat_name,
			$row->heading,
			URL::to('report/') . '/' . $row->url,
			$row->pages,
			$row->publish_month
		];
	}

	public function headings(): array
	{
		return [
			'Category',
			'Title',
			'Url',
			'Pages',
			'Publish Month'
		];
	}

}
?>
