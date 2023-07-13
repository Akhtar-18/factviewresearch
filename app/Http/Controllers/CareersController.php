<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareersRequest;
use App\Models\CareersModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CareersController extends Controller
{
  function __construct()
  {
         $this->middleware('permission:careers-list|careers-create|careers-edit|careers-delete', ['only' => ['index','store']]);
         $this->middleware('permission:careers-create', ['only' => ['create','store']]);
         $this->middleware('permission:careers-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:careers-delete', ['only' => ['destroy']]);
  }
    
    public function index()
    {
        return view('admin.home.careersslist');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = CareersModel::select('*')->orderBy('id','desc');
            return DataTables::of($data)
                    ->addIndexColumn()
               ->addColumn('content', function($row){
                $contents = strip_tags($row->content);
                return $contents;
              })

               
              ->addColumn('action', function($row){
                if(auth()->user()->can('careers-edit'))
                {
                  $editbtn='<a  href="'.url('admin/careers/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                }
                else
                {
                  $editbtn='';
                }
                if(auth()->user()->can('careers-delete'))
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
        <form action="'.url('admin/careers/delete/').'/'.$row->id.'" method="post">
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
                    ->rawColumns(['content','action'])
                    ->make(true);
        }
    }

    public function add()
    {
        return view('admin.home.addcareers');
    }

    public function submit(CareersRequest $request)
    {
        $request->validated();
        $input = $request->all();
        CareersModel::create($input);
        return redirect('/admin/careers')->with('success','Post created successfully.');

        
    }
   public function edit($id)
   {
    $careers=CareersModel::find($id);
      if($careers =='')
      {
        return redirect('admin/careers/')
        ->with('error',"careers is Not Avaiable");
      }
      else
      {
        $data['career']=$careers;
       return view('admin.home.editcareers',$data);
      }
   }

   public function update($id,CareersRequest $request)
   {
      $request->validated();
      $input = $request->all();
      $career=CareersModel::find($id);        
      $career->update($input);
  
        return redirect('admin/careers/')->with('success','Post updated successfully');
   }
  public function delete($id)
  {
    $careers=CareersModel::find($id);   
    $careers->delete();
    return redirect('admin/careers/')->with('success','Post Deleted successfully');
  }
}
