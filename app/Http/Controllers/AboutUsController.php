<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUsModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AboutUsController extends Controller
{
    function __construct()
  {
       $this->middleware('permission:aboutus-list|aboutus-create|aboutus-edit|aboutus-delete', ['only' => ['index','show']]);
       $this->middleware('permission:aboutus-create', ['only' => ['create','store']]);
       $this->middleware('permission:aboutus-edit', ['only' => ['edit','update']]);
       $this->middleware('permission:aboutus-delete', ['only' => ['destroy']]);
  }
    public function index()
    {
        return view('admin.home.aboutus');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = AboutUsModel::select('*')->orderBy('id','desc');
            return DataTables::of($data)
                    ->addIndexColumn()
               ->addColumn('content', function($row){
                $contents = strip_tags($row->content);
                return $contents;
              })


              ->addColumn('action', function($row)
              {

                if(auth()->user()->can('aboutus-edit'))
                {
                  $editbtn='<a  href="'.url('admin/aboutus/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                }
                else
                {
                  $editbtn='';
                }
                if(auth()->user()->can('aboutus-delete'))
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
        <form action="'.url('admin/aboutus/delete/').'/'.$row->id.'" method="post">
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
        return view('admin.home.addaboutus');
    }

    public function submit(AboutUsRequest $request)
    {
        $request->validated();
        $input = $request->all();
        AboutUsModel::create($input);
        return redirect('/admin/aboutus')->with('success','About created successfully.');


    }
   public function edit($id)
   {
    $about=AboutUsModel::find($id);
      if($about =='')
      {
        return redirect('admin/aboutus/')
        ->with('error',"Slider is Not Avaiable");
      }
      else
      {
        $data['about']=$about;
       return view('admin.home.editabout',$data);
      }
   }

   public function update($id,Request $request)
   {
      $input = $request->all();
      $about=AboutUsModel::find($id);
      $about->update($input);

        return redirect('admin/aboutus/')->with('success','About updated successfully');
   }
  public function delete($id)
  {
    $about=AboutUsModel::find($id);
    $about->delete();
    return redirect('admin/aboutus/')->with('success','About Deleted successfully');
  }
}
