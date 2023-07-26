<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CaseStudyController extends Controller
{
    public function index()
    {
        return view('admin.case-studies.index');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = CaseStudy::select(['id','heading','url'])->latest('id');
            return DataTables::of($data)
                    ->addIndexColumn()
              ->addColumn('action', function($row){

                  $editbtn='<a  href="'.url('admin/admin-case-studies/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                  $deletebtn='<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal'.$row->id.'"><i class="fa fa-trash"></i></a>';

                $btn = $editbtn.'|'.$deletebtn.'
                                <div class="modal fade" id="DeleteModal'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <form action="'.url('admin/admin-case-studies/delete/').'/'.$row->id.'" method="post">
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
        return view('admin.case-studies.create');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'heading'=>'required',
            'url'=>'required|unique:press_releases'
        ]);

        if ($request->file('image'))
        {
          $image=ImageUpload('case-studies',$request->file('image'));
        }
        else
        {
          $image="";
        }
        $input = $request->all();
        $input['image']=$image;
        CaseStudy::create($input);
        return redirect('/admin/admin-case-studies')->with('success','Case Studies created successfully.');

    }
   public function edit($id)
   {
      $case_studies=CaseStudy::find($id);
      if($case_studies =='')
      {
        return redirect('admin/admin-case-studies/')
        ->with('error',"Case Studies is Not Avaiable");
      }
      else
      {
        $data['case_studies']=$case_studies;
       return view('admin.case-studies.edit',$data);
      }
   }

   public function update($id,Request $request)
   {
        $request->validate([
            'heading'=>'required',
                'url'=>'required'
        ]);
      $input = $request->all();
      $blog=CaseStudy::find($id);
        if ($request->file('image'))
        {
            $image=ImageUpload('case-studies',$request->file('image'));
        }
        else
        {
            $image=$blog->image;
        }
        $input['image']=$image;
        $blog->update($input);

        return redirect('admin/admin-case-studies/')->with('success','Case Studies updated successfully');
   }
  public function delete($id)
  {
    $blog=CaseStudy::find($id);
    $blog->delete();
    return redirect('admin/admin-case-studies/')->with('success','Case Studies  Deleted successfully');
  }
}
