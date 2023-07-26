<?php

namespace App\Http\Controllers;

use App\Models\ReportCategoryModel;
use App\Models\ReportSubCategoryModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReportSubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.home.reportsubcategory.list');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = ReportSubCategoryModel::with('getCategoryName')->select(['id','category_id','sub_category'])->orderBy('id','desc');
            return DataTables::of($data)
                    ->addIndexColumn()
               ->addColumn('category_id', function($row){
                $contents = strip_tags($row->getCategoryName->cat_name);
                return $contents;
              })

               
              ->addColumn('action', function($row){
                if(auth()->user()->can('reportcategory-edit'))
                {
                  $editbtn='<a  href="'.url('admin/reportsubcategory/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
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
        <form action="'.url('admin/reportsubcategory/delete/').'/'.$row->id.'" method="post">
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
                    ->rawColumns(['category_id','action'])
                    ->make(true);
        }
    }

    public function add()
    {
        $data['categoryData']=ReportCategoryModel::all();
        return view('admin.home.reportsubcategory.create',$data);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'sub_category'=>'required',
        ]);
        $input = $request->all();
        ReportSubCategoryModel::create($input);
        return redirect('/admin/reportsubcategory')->with('success','SubCategory created successfully.');

        
    }
   public function edit($id)
   {
    $reportcategory=ReportSubCategoryModel::find($id);
    $data['categoryData']=ReportCategoryModel::all();
      if($reportcategory =='')
      {
        return redirect('admin/reportsubcategory/')
        ->with('error',"Category is Not Avaiable");
      }
      else
      {
        $data['subcategory']=$reportcategory;
       return view('admin.home.reportsubcategory.edit',$data);
      }
   }

   public function update($id,Request $request)
   {
    $request->validate([
        'category_id' => 'required',
        'sub_category'=>'required',
    ]);
      $input = $request->all();
      $career=ReportSubCategoryModel::find($id);        
      $career->update($input);
  
        return redirect('admin/reportsubcategory/')->with('success','Sub Category updated successfully');
   }
  public function delete($id)
  {
    $careers=ReportSubCategoryModel::find($id);   
    $careers->delete();
    return redirect('admin/reportsubcategory/')->with('success','Sub Category Deleted successfully');
  }
  public function getSubCategory(Request $request)
  {
    $getSubCategory=ReportSubCategoryModel::select(['id','category_id','sub_category'])->where('category_id',$request->category_id)->get();
    foreach($getSubCategory as $list)
    {
      if($request->subcategoryid==$list->id)
      {
        echo '<option value="'.$list->id.'" selected>'.$list->sub_category.'</option>';
      }
      else
      {
        echo '<option value="'.$list->id.'">'.$list->sub_category.'</option>';
      }
        
    }
  } 
}
