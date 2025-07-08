<?php

namespace App\Http\Controllers;

use App\Models\ReportCategoryModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReportCategoryController extends Controller
{
    public function index()
    {
        return view('admin.home.reportcategorylist');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = ReportCategoryModel::select('*')->orderBy('id','desc');
            return DataTables::of($data)
                    ->addIndexColumn()
               ->addColumn('content', function($row){
                $contents = strip_tags($row->content);
                return $contents;
              })
              ->addColumn('icon', function($row){
                  if (!empty($row->icon)) {
                      $iconPath = $row->icon; // or use Storage::url($row->icon) if stored in Laravel's storage
                      return '<img src="'.$iconPath.'" alt="icon" width="40" height="40">';
                  }
                  return '';
              })


              ->addColumn('action', function($row){
                if(auth()->user()->can('reportcategory-edit'))
                {
                  $editbtn='<a  href="'.url('admin/reportcategory/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                }
                else
                {
                  $editbtn='';
                }
                if(auth()->user()->can('reportcategory-delete'))
                {
                  $deletebtn='<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal'.$row->id.'"><i class="fa fa-trash"></i></a>';
                }
                else
                {
                  $deletebtn='';
                }
                $btn = $editbtn.'|'.$deletebtn.'
        <div class="modal fade" id="DeleteModal'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="'.url('admin/reportcategory/delete/').'/'.$row->id.'" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <input type="hidden" name="_token" value="'.@csrf_token().'">
                <div class="modal-body"> Are you sure you want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>';

                            return $btn;
                    })
                    ->rawColumns(['content','icon','action'])
                    ->make(true);
        }
    }

    public function add()
    {
        return view('admin.home.addreportcategory');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'cat_name' => 'required|unique:report_category',
        ]);
        $input = $request->all();
        ReportCategoryModel::create($input);
        return redirect('/admin/reportcategory')->with('success','Category created successfully.');


    }
   public function edit($id)
   {
    $reportcategory=ReportCategoryModel::find($id);
      if($reportcategory =='')
      {
        return redirect('admin/reportcategory/')
        ->with('error',"Category is Not Avaiable");
      }
      else
      {
        $data['category']=$reportcategory;
       return view('admin.home.editreportcategory',$data);
      }
   }

   public function update($id,Request $request)
   {
    $request->validate([
        'cat_name' => 'required',
    ]);
      $input = $request->all();
      $career=ReportCategoryModel::find($id);
      $career->update($input);

        return redirect('admin/reportcategory/')->with('success','Category updated successfully');
   }
  public function delete($id)
  {
    $careers=ReportCategoryModel::find($id);
    $careers->delete();
    return redirect('admin/reportcategory/')->with('success','Category Deleted successfully');
  }
}
