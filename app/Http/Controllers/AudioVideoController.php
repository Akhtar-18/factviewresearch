<?php

namespace App\Http\Controllers;

use App\Models\AudioAndVideo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\URL;

class AudioVideoController extends Controller
{
    public function index()
    {
        return view('admin.audio-video.index');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = AudioAndVideo::select(['id','audio','video'])->latest('id');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('audio', function($row){
                        $btns = '
                        <audio controls>
                            <source src="'.URL::to("audio/").'/'.$row->audio.'">
                        </audio>';
                        return $btns;
                    })
                    ->addIndexColumn()
                    ->addColumn('video', function($row){
                        $btns =
                        '<video width="320" height="240" controls>
                                <source src="'.URL::to("video/").'/'.$row->video.'">
                        </video>';
                        return $btns;
                    })
              ->addColumn('action', function($row){

                  $editbtn='<a  href="'.url('admin/audio-video/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                  $deletebtn='<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal'.$row->id.'"><i class="fa fa-trash"></i></a>';

                $btn = $editbtn.'|'.$deletebtn.'
                    <div class="modal fade" id="DeleteModal'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <form action="'.url('admin/audio-video/delete/').'/'.$row->id.'" method="post">
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
                    ->rawColumns(['audio','video','action'])
                    ->make(true);
        }
    }

    public function add()
    {
        return view('admin.audio-video.create');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'audio' => 'required',
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
        ]);
        if ($image = $request->file('audio')) {
            $destinationPath = public_path('/').'audio';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['audio'] = "$postImage";
        }
        if ($image = $request->file('video')) {
            $destinationPath = public_path('/').'video';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['video'] = "$postImage";
        }
        $input = $request->all();
        AudioAndVideo::create($input);
        return redirect('/admin/audio-video')->with('success','Audio & Video created successfully.');

    }
   public function edit($id)
   {
    $Audio=AudioAndVideo::find($id);
      if($Audio =='')
      {
        return redirect('admin/audio-video/')
        ->with('error',"Audio is Not Avaiable");
      }
      else
      {
        $data['audio']=$Audio;
       return view('admin.audio-video.edit',$data);
      }
   }

   public function update($id,Request $request)
   {
        $request->validate([
            'audio' => 'required',
            'video' => 'required'
        ]);
      $input = $request->all();
      $category=AudioAndVideo::find($id);
      if ($image = $request->file('audio')) {
        $destinationPath = public_path('/').'audio';
        $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $postImage);
        $input['audio'] = "$postImage";
    }
    else
    {
        $input['audio'] = $category->audio;
    }
    if ($image = $request->file('video')) {
        $destinationPath = public_path('/').'video';
        $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $postImage);
        $input['video'] = "$postImage";
    }
    else
    {
        $input['video'] = $category->video;
    }
      $category->update($input);

        return redirect('admin/audio-video/')->with('success','Audio & Video updated successfully');
   }
  public function delete($id)
  {
    $audio=AudioAndVideo::find($id);
    $audio->delete();
    return redirect('admin/audio-video/')->with('success','Audio & Video Deleted successfully');
  }
}
