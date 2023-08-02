<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Models\TestimonialModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    
  function __construct()
    {
         $this->middleware('permission:testimonials-list|testimonials-create|testimonials-edit|testimonials-delete', ['only' => ['index','show']]);
         $this->middleware('permission:testimonials-create', ['only' => ['create','store']]);
         $this->middleware('permission:testimonials-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:testimonials-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('admin.home.testimonialslist');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = TestimonialModel::select('*')->orderBy('id','desc');
            return DataTables::of($data)
                    ->addIndexColumn()
               ->addColumn('comments', function($row){
                $contents = strip_tags($row->comments);
                return $contents;
              })
              ->addColumn('client_image', function($row){
                $contents = '<img src="'.URL::to('testimonials/client_image/').'/'.$row->client_image.'" width="150">';
                return $contents;
              })

               
              ->addColumn('action', function($row){
                if(auth()->user()->can('testimonials-edit'))
                {
                  $editbtn='<a  href="'.url('admin/testimonials/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                }
                else
                {
                  $editbtn='';
                }
                if(auth()->user()->can('testimonials-delete'))
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
        <form action="'.url('admin/testimonials/delete/').'/'.$row->id.'" method="post">
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
                    ->rawColumns(['client_image','comments','action'])
                    ->make(true);
        }
    }

    public function add()
    {
        return view('admin.home.addtestimonials');
    }

    public function submit(TestimonialRequest $request)
    {
        $request->validated();
        if ($request->file('client_image'))
        {
          $client_image=ImageUpload('testimonials/client_image',$request->file('client_image'));
        }
        else
        {
          $client_image="";
        }
        $input['client_image']=$client_image;
        $input = $request->all();
        TestimonialModel::create($input);
        return redirect('/admin/testimonials')->with('success','Post created successfully.');

        
    }
   public function edit($id)
   {
    $testimonials=TestimonialModel::find($id);
      if($testimonials =='')
      {
        return redirect('admin/testimonials/')
        ->with('error',"testimonials is Not Avaiable");
      }
      else
      {
        $data['testimonial']=$testimonials;
       return view('admin.home.edittestimonials',$data);
      }
   }

   public function update($id,TestimonialRequest $request)
   {
      $request->validated();
      $input = $request->all();
      $testimonial=TestimonialModel::find($id);     
      if ($request->file('client_image'))
      {
        $client_image=ImageUpload('testimonials/client_image',$request->file('client_image'));
      }
      else
      {
        $client_image=$testimonial->client_image;
      }
      $input['client_image']=$client_image;
      $testimonial->update($input);
  
        return redirect('admin/testimonials/')->with('success','Post updated successfully');
   }
  public function delete($id)
  {
    $testimonials=TestimonialModel::find($id);   
    $testimonials->delete();
    return redirect('admin/testimonials/')->with('success','Post Deleted successfully');
  }
}
