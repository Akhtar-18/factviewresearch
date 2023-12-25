<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientsRequest;
use App\Models\ClientsModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ClientsController extends Controller
{
  function __construct()
  {
         $this->middleware('permission:clients-list|clients-create|clients-edit|clients-delete', ['only' => ['index','store']]);
         $this->middleware('permission:clients-create', ['only' => ['create','store']]);
         $this->middleware('permission:clients-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:clients-delete', ['only' => ['destroy']]);
  }
    public function index()
    {
        return view('admin.home.clients');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = ClientsModel::select('*')->orderBy('id','desc');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function($row){
                      $btns = '<img src="'.$row->image.'" width="100">';
                      return $btns;
               })

               
              ->addColumn('action', function($row){
                if(auth()->user()->can('clients-edit'))
                {
                  $editbtn='<a  href="'.url('admin/clients/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                }
                else
                {
                  $editbtn='';
                }
                if(auth()->user()->can('clients-delete'))
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
        <form action="'.url('admin/clients/delete/').'/'.$row->id.'" method="post">
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
                    ->rawColumns(['image','action'])
                    ->make(true);
        }
    }

    public function add()
    {
        return view('admin.home.addclients');
    }

    public function submit(ClientsRequest $request)
    {
        $request->validated();
        $input = $request->all();
  
        // if ($image = $request->file('image')) {
        //     $destinationPath = public_path('/').'/clients/images/';
        //     $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $postImage);
        //     $input['image'] = "$postImage";
        // }
        $input['image'] = $request->image;
        ClientsModel::create($input);
        return redirect('/admin/clients')->with('success','Post created successfully.');

        
    }
   public function edit($id)
   {
    $client=ClientsModel::find($id);
      if($client =='')
      {
        return redirect('admin/client/')
        ->with('error',"Client is Not Avaiable");
      }
      else
      {
        $data['clients']=$client;
       return view('admin.home.editclients',$data);
      }
   }

   public function update($id,Request $request)
   {
      $input = $request->all();
      $slider=ClientsModel::find($id);    
  
        // if ($image = $request->file('image')) 
        // {
        //     $destinationPath = public_path('/').'/clients/images/';
        //     $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $postImage);
        //     $input['image'] = "$postImage";
        // }
        // else
        // {
        //     unset($input['image']);
        // }
        $input['image'] = $request->image;
        $slider->update($input);
  
        return redirect('admin/clients/')->with('success','Post updated successfully');
   }
  public function delete($id)
  {
    $Clients=ClientsModel::find($id);   
    $destinationPath = public_path('/').'/clients/images/';
    $destinationPathimage=$destinationPath.$Clients->image;
    unlink($destinationPathimage); 
    $Clients->delete();
    return redirect('admin/clients/')->with('success','Post Deleted successfully');
  }
}
