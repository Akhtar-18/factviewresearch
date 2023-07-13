<?php
	namespace App\Exports;
	use App\Models\ReportsModel;
	use Maatwebsite\Excel\Concerns\FromCollection;

	class ExportReport implements FromCollection {
		public function collection()
		{
			return ReportsModel::select('heading','url')->get();
		}
	}
?>
