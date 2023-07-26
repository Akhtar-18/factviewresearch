<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactDetailsRequest;
use App\Models\ContactDetailsModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactDetailsController extends Controller
{
  function __construct()
  {
         $this->middleware('permission:contactdetails-list|contactdetails-create|contactdetails-edit|contactdetails-delete', ['only' => ['index','store']]);
         $this->middleware('permission:contactdetails-create', ['only' => ['create','store']]);
         $this->middleware('permission:contactdetails-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:contactdetails-delete', ['only' => ['destroy']]);
  }
    public function index()
    {
        return view('admin.home.contactdetailslist');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = ContactDetailsModel::select('*')->orderBy('id','desc');
            return DataTables::of($data)
                    ->addIndexColumn()


              ->addColumn('action', function($row){
                if(auth()->user()->can('contactdetails-edit'))
                {
                  $editbtn='<a  href="'.url('admin/contactdetails/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                }
                else
                {
                  $editbtn='';
                }
                if(auth()->user()->can('contactdetails-delete'))
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
        <form action="'.url('admin/contactdetails/delete/').'/'.$row->id.'" method="post">
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
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function add()
    {
        return view('admin.home.addcontactdetails');
    }

    public function submit(ContactDetailsRequest $request)
    {
        $request->validated();
        if ($image = $request->file('company_logo')) {
          $destinationPath = public_path('/').'company_logo/';
          $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
          $image->move($destinationPath, $postImage);
          $input['company_logo'] = "$postImage";
      }
        $input = $request->all();
        ContactDetailsModel::create($input);
        return redirect('/admin/contactdetails')->with('success','Post created successfully.');


    }
   public function edit($id)
   {
    $contacts=ContactDetailsModel::find($id);
      if($contacts =='')
      {
        return redirect('admin/contactdetails/')
        ->with('error',"Post is Not Avaiable");
      }
      else
      {
        $data['contact']=$contacts;
       return view('admin.home.editcontactdetails',$data);
      }
   }

   public function update($id,ContactDetailsRequest $request)
   {
      $request->validated();
      $input = $request->all();
      $service=ContactDetailsModel::find($id);
      if ($image = $request->file('company_logo')) 
        {
            $destinationPath = public_path('/').'company_logo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['company_logo'] = "$postImage";
        }
        else
        {
            unset($input['company_logo']);
        }

      $service->update($input);

        return redirect('admin/contactdetails/')->with('success','Post updated successfully');
   }
  public function delete($id)
  {
    //return $id;exit;
    $service=ContactDetailsModel::find($id);
    // dd($service);
    if($service==null)
    {
      return redirect('admin/contactdetails/');
    }
    $service->delete();
    return redirect('admin/contactdetails/')->with('success','Post Deleted successfully');
  }
}
