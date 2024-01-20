<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicesRequest;
use App\Models\ServicesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:services-list|services-create|services-edit|services-delete', ['only' => ['index','show']]);
         $this->middleware('permission:services-create', ['only' => ['create','store']]);
         $this->middleware('permission:services-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:services-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('admin.home.serviceslist');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = ServicesModel::select('*')->orderBy('id','desc');
            return DataTables::of($data)
                    ->addIndexColumn()

                  ->addColumn('slug', function ($row) {
                      if (isset($row->slug)) {
                          $contents = URL::to('services/') . '/' . $row->slug;
                          $slug = '<a  href="' . $contents . '">' . $contents . '</a>';
                      } else {
                          $slug = '';
                      }

                      return $slug;
                  })

               ->addColumn('content', function($row){
                $contents = strip_tags($row->content);
                return $contents;
              })


              ->addColumn('action', function($row){
                if(auth()->user()->can('services-edit'))
                {
                  $editbtn='<a  href="'.secure_url('admin/services/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                }
                else
                {
                  $editbtn='';
                }
                if(auth()->user()->can('services-delete'))
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
        <form action="'.secure_url('admin/services/delete/').'/'.$row->id.'" method="post">
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
                    ->rawColumns(['slug','content','action'])
                    ->make(true);
        }
    }

    public function add()
    {
        return view('admin.home.addservices');
    }

    public function submit(ServicesRequest $request)
    {
        $request->validated();
        $input = $request->all();
        ServicesModel::create($input);
        return redirect('/admin/services')->with('success','Services created successfully.');


    }
   public function edit($id)
   {
    $services=ServicesModel::find($id);
      if($services =='')
      {
        return redirect('admin/services/')
        ->with('error',"Services is Not Avaiable");
      }
      else
      {
        $data['service']=$services;
       return view('admin.home.editservices',$data);
      }
   }

   public function update($id,Request $request)
   {
      //$request->validated();
      $input = $request->all();
      $service=ServicesModel::find($id);
      $service->update($input);

        return redirect('admin/services/')->with('success','Services updated successfully');
   }
  public function delete($id)
  {
    $service=ServicesModel::find($id);
    $service->delete();
    return redirect('admin/services/')->with('success','Services Deleted successfully');
  }
}
