<?php

namespace App\Http\Controllers;

use App\Http\Requests\WhyChooseUsRequest;
use App\Models\WhyChooseUsModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WhyChooseUsController extends Controller
{
  function __construct()
    {
         $this->middleware('permission:whychoose-list|whychoose-create|whychoose-edit|whychoose-delete', ['only' => ['index','show']]);
         $this->middleware('permission:whychoose-create', ['only' => ['create','store']]);
         $this->middleware('permission:whychoose-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:whychoose-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('admin.home.whychooseuslist');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = WhyChooseUsModel::select('*')->orderBy('id','desc');
            return DataTables::of($data)
                    ->addIndexColumn()
               ->addColumn('content', function($row){
                $contents = strip_tags($row->content);
                return $contents;
              })


              ->addColumn('action', function($row){
                if(auth()->user()->can('whychoose-edit'))
                {
                  $editbtn='<a  href="'.secure_url('admin/whychoose/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                }
                else
                {
                  $editbtn='';
                }
                if(auth()->user()->can('whychoose-delete'))
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
        <form action="'.secure_url('admin/whychoose/delete/').'/'.$row->id.'" method="post">
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
        return view('admin.home.addwhychoose');
    }

    public function submit(WhyChooseUsRequest $request)
    {
        $request->validated();
        $input = $request->all();
        WhyChooseUsModel::create($input);
        return redirect('/admin/whychoose')->with('success','Post created successfully.');


    }
   public function edit($id)
   {
    $whychoose=WhyChooseUsModel::find($id);
      if($whychoose =='')
      {
        return redirect('admin/whychoose/')
        ->with('error',"Post is Not Avaiable");
      }
      else
      {
        $data['whychoose']=$whychoose;
       return view('admin.home.editwhychoose',$data);
      }
   }

   public function update($id,WhyChooseUsRequest $request)
   {
      $request->validated();
      $input = $request->all();
      $whychoose=WhyChooseUsModel::find($id);
      $whychoose->update($input);

        return redirect('admin/whychoose/')->with('success','Post updated successfully');
   }
  public function delete($id)
  {
    $whychoose=WhyChooseUsModel::find($id);
    $whychoose->delete();
    return redirect('admin/whychoose/')->with('success','Post Deleted successfully');
  }
}
