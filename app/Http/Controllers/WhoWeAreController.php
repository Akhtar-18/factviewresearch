<?php

namespace App\Http\Controllers;

use App\Http\Requests\WhoWeAreRequest;
use App\Models\WhoWeModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WhoWeAreController extends Controller
{
  function __construct()
    {
         $this->middleware('permission:whowe-list|whowe-create|whowe-edit|whowe-delete', ['only' => ['index','show']]);
         $this->middleware('permission:whowe-create', ['only' => ['create','store']]);
         $this->middleware('permission:whowe-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:whowe-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('admin.home.whowelist');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = WhoWeModel::select('*')->orderBy('id','desc');
            return DataTables::of($data)
                    ->addIndexColumn()
               ->addColumn('content', function($row){
                $contents = strip_tags($row->content);
                return $contents;
              })


              ->addColumn('action', function($row){
                if(auth()->user()->can('whowe-edit'))
                {
                  $editbtn='<a  href="'.url('admin/whowe/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                }
                else
                {
                  $editbtn='';
                }
                if(auth()->user()->can('whowe-delete'))
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
        <form action="'.url('admin/whowe/delete/').'/'.$row->id.'" method="post">
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
        return view('admin.home.addwhowe');
    }

    public function submit(WhoWeAreRequest $request)
    {
        $request->validated();
        $input = $request->all();
        WhoWeModel::create($input);
        return redirect('/admin/whowe')->with('success','Post created successfully.');


    }
   public function edit($id)
   {
    $whowe=WhoWeModel::find($id);
      if($whowe =='')
      {
        return redirect('admin/whowe/')
        ->with('error',"Post is Not Avaiable");
      }
      else
      {
        $data['whowe']=$whowe;
       return view('admin.home.editwhowe',$data);
      }
   }

   public function update($id,WhoWeAreRequest $request)
   {
      $request->validated();
      $input = $request->all();
      $whowe=WhoWeModel::find($id);
      $whowe->update($input);

        return redirect('admin/whowe/')->with('success','Post updated successfully');
   }
  public function delete($id)
  {
    $whowe=WhoWeModel::find($id);
    $whowe->delete();
    return redirect('admin/whowe/')->with('success','Post Deleted successfully');
  }
}
