<?php

namespace App\Http\Controllers;

use App\Models\BlogCategorie;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BlogCategoryController extends Controller
{
    public function index()
    {
        return view('admin.blogcategory.index');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = BlogCategorie::select(['id','category_name'])->latest('id');
            return DataTables::of($data)
                    ->addIndexColumn()
              ->addColumn('action', function($row){

                  $editbtn='<a  href="'.url('admin/blog-category/edit/'.$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                  $deletebtn='<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal'.$row->id.'"><i class="fa fa-trash"></i></a>';

                $btn = $editbtn.'|'.$deletebtn.'
        <div class="modal fade" id="DeleteModal'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="'.url('admin/blog-category/delete/').'/'.$row->id.'" method="post">
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
        return view('admin.blogcategory.create');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:blog_categories',
        ]);
        $input = $request->all();
        BlogCategorie::create($input);
        return redirect('/admin/blog-category')->with('success','Blog Category created successfully.');

    }
   public function edit($id)
   {
    $reportcategory=BlogCategorie::find($id);
      if($reportcategory =='')
      {
        return redirect('admin/blog-category/')
        ->with('error',"Category is Not Avaiable");
      }
      else
      {
        $data['category']=$reportcategory;
       return view('admin.blogcategory.edit',$data);
      }
   }

   public function update($id,Request $request)
   {
    $request->validate([
        'category_name' => 'required',
    ]);
      $input = $request->all();
      $category=BlogCategorie::find($id);
      $category->update($input);

        return redirect('admin/blog-category/')->with('success','Blog Category updated successfully');
   }
  public function delete($id)
  {
    $category=BlogCategorie::find($id);
    $category->delete();
    return redirect('admin/blog-category/')->with('success','Blog Category Deleted successfully');
  }
}
