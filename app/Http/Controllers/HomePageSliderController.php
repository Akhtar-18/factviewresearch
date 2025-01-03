<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomePageSliderRequest;
use App\Models\HomeSliderModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HomePageSliderController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:slider-list|slider-create|slider-edit|slider-delete', ['only' => ['index','show']]);
         $this->middleware('permission:slider-create', ['only' => ['create','store']]);
         $this->middleware('permission:slider-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:slider-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('admin.home.sliders');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = HomeSliderModel::select('*')->orderBy('id','desc');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('slider_images', function($row){
                      $btns = '<img src="'.$row->slider_image.'" width="100">';
                      return $btns;
               })
               ->addColumn('content', function($row){
                $contents = strip_tags($row->content);
                return $contents;
              })


              ->addColumn('action', function($row){
                if(auth()->user()->can('slider-edit'))
                {
                  $editbtn='<a  href="'.url('admin/slider/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                }
                else
                {
                  $editbtn='';
                }
                if(auth()->user()->can('slider-delete'))
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
        <form action="'.url('admin/slider/delete/').'/'.$row->id.'" method="post">
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
                    ->rawColumns(['content','slider_images','action'])
                    ->make(true);
        }
    }

    public function add()
    {
        return view('admin.home.addslider');
    }

    public function submit(HomePageSliderRequest $request)
    {
        $request->validated();
        $input = $request->all();
        $input['slider_image']= $request->slider_image;
        // if ($image = $request->file('slider_image')) {
        //     $destinationPath = public_path('/').'images/';
        //     $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $postImage);
        //     $input['slider_image'] = "$postImage";
        // }

        HomeSliderModel::create($input);
        return redirect('/admin/slider')->with('success','Slider created successfully.');


    }
   public function edit($id)
   {
    $slider=HomeSliderModel::find($id);
      if($slider =='')
      {
        return redirect('admin/slider/')
        ->with('error',"Slider is Not Avaiable");
      }
      else
      {
        $data['sliders']=$slider;
       return view('admin.home.editslider',$data);
      }
   }

   public function update($id,Request $request)
   {
      $input = $request->all();
      $slider=HomeSliderModel::find($id);

        // if ($image = $request->file('slider_image'))
        // {
        //     $destinationPath = public_path('/').'images/';
        //     $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $postImage);
        //     $input['slider_image'] = "$postImage";
        // }
        // else
        // {
        //     unset($input['slider_image']);
        // }
        $input['slider_image']= $request->slider_image;

        $slider->update($input);

        return redirect('admin/slider/')->with('success','Slider updated successfully');
   }
  public function delete($id)
  {
    $slider=HomeSliderModel::find($id);
    $destinationPath = public_path('/').'images/';
    $destinationPathimage=$destinationPath.$slider->slider_image;
    unlink($destinationPathimage);
    $slider->delete();
    return redirect('admin/slider/')->with('success','Slider Deleted successfully');
  }
}
