<?php

namespace App\Http\Controllers;

use App\Models\PressRelease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;

class PressReleaseController extends Controller
{
    public function index()
    {
        return view('admin.press-releases.index');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = PressRelease::select(['id','heading','url'])->latest('id');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('url', function ($row) {
                        if (isset($row->url)) {
                            $contents = URL::to('press-release/') . '/' . $row->url;
                            $url = '<a  href="' . $contents . '">' . $contents . '</a>';
                        } else {
                            $url = '';
                        }

                        return $url;
                    })
              ->addColumn('action', function($row){

                  $editbtn='<a  href="'.url('admin/admin-press-releases/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                  $deletebtn='<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal'.$row->id.'"><i class="fa fa-trash"></i></a>';

                $btn = $editbtn.'|'.$deletebtn.'
        <div class="modal fade" id="DeleteModal'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="'.url('admin/admin-press-releases/delete/').'/'.$row->id.'" method="post">
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
                    ->rawColumns(['url','action'])
                    ->make(true);
        }
    }

    public function add()
    {
        return view('admin.press-releases.create');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'heading'=>'required',
            'url'=>'required|unique:press_releases'
        ]);

        if ($request->file('image'))
        {
          $image=ImageUpload('press-releases',$request->file('image'));
        }
        else
        {
          $image="";
        }
        $input = $request->all();
        $input['image']=$image;
        PressRelease::create($input);
        return redirect('/admin/admin-press-releases')->with('success','Press Releases created successfully.');

    }
   public function edit($id)
   {
    $blog=PressRelease::find($id);
      if($blog =='')
      {
        return redirect('admin/admin-press-releases/')
        ->with('error',"Press Releases is Not Avaiable");
      }
      else
      {
        $data['blog']=$blog;
       return view('admin.press-releases.edit',$data);
      }
   }

   public function update($id,Request $request)
   {
    $request->validate([
        'heading'=>'required',
            'url'=>'required'
    ]);



      $input = $request->all();
      $blog=PressRelease::find($id);


        if ($request->file('image'))
        {
        $image=ImageUpload('press-releases',$request->file('image'));
        }
        else
        {
        $image=$blog->image;
        }
      $input['image']=$image;
      $blog->update($input);

        return redirect('admin/admin-press-releases/')->with('success','Press Releases updated successfully');
   }
  public function delete($id)
  {
    $blog=PressRelease::find($id);
    $blog->delete();
    return redirect('admin/admin-press-releases/')->with('success','Press Releases  Deleted successfully');
  }
}
