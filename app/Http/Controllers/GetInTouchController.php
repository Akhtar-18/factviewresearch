<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetInTouchRequest;
use App\Models\GetInTouchModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GetInTouchController extends Controller
{
  function __construct()
  {
       $this->middleware('permission:getintouch-list|getintouch-create|getintouch-edit|getintouch-delete', ['only' => ['index','show']]);
       $this->middleware('permission:getintouch-create', ['only' => ['create','store']]);
       $this->middleware('permission:getintouch-edit', ['only' => ['edit','update']]);
       $this->middleware('permission:getintouch-delete', ['only' => ['destroy']]);
  }

    public function index()
    {
        return view('admin.home.getintouch');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = GetInTouchModel::select('*')->orderBy('id','desc');
            return DataTables::of($data)
                    ->addIndexColumn()
               ->addColumn('content', function($row){
                $contents = strip_tags($row->content);
                return $contents;
              })

              ->addColumn('action', function($row){
                if(auth()->user()->can('getintouch-edit'))
                {
                  $editbtn='<a  href="'.url('admin/getintouch/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                }
                else
                {
                  $editbtn='';
                }
                if(auth()->user()->can('getintouch-delete'))
                {
                  $deletebtn='<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal'.$row->id.'"><i class="fa fa-trash"></i></a>';
                }
                else
                {
                  $deletebtn='';
                }


                $btn =  $editbtn.'|'.$deletebtn.'

        <div class="modal fade" id="DeleteModal'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="'.url('admin/getintouch/delete/').'/'.$row->id.'" method="post">
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
        return view('admin.home.addgetintouch');
    }

    public function submit(GetInTouchRequest $request)
    {
        $request->validated();
        $input = $request->all();
        GetInTouchModel::create($input);
        return redirect('/admin/getintouch')->with('success','Post created successfully.');


    }
   public function edit($id)
   {
    $getintouch=GetInTouchModel::find($id);
      if($getintouch =='')
      {
        return redirect('admin/getintouch/')
        ->with('error',"Post is Not Avaiable");
      }
      else
      {
        $data['getintouch']=$getintouch;
       return view('admin.home.editgetintouch',$data);
      }
   }

   public function update($id,GetInTouchRequest $request)
   {
    $request->validated();
      $input = $request->all();
      $about=GetInTouchModel::find($id);
      $about->update($input);

        return redirect('admin/getintouch/')->with('success','Post updated successfully');
   }
  public function delete($id)
  {
    $about=GetInTouchModel::find($id);
    $about->delete();
    return redirect('admin/getintouch/')->with('success','Post Deleted successfully');
  }
}
