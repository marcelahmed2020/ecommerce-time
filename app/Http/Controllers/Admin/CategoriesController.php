<?php
namespace App\Http\Controllers\Admin;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $categories = Category::where('enabled',1)->get();
        if (isset(request()->id)){
              $categories = Category::where('id',request()->id)->get();
          }

          return view('admin.categories.index',compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where(['enabled'=>1,'parent'=>0])->get();
        return view('admin.categories.create',compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $this->validate($request,[
            'title' => 'required|string|min:2|max:255|unique:categories',
            'short_desc' => 'required|string|min:2',
        ]);
        $data['parent'] = $request->parent;
        $cat = auth()->user()->category()->create($data);
//        $cat = Category::create($data);
        toastr()->success('Add Category Sussessfully..');
          return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
         abort(404);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cag = Category::findOrFail($id);
        $categories = Category::where(['enabled'=>1,'parent'=>0])->get();
        return view('admin.categories.edit',compact(['categories','cag']));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Category::findOrFail($id);
        $data =  $this->validate($request,[
            'title' => 'required|string|min:2|max:255|unique:categories,title,'.$id,
            'short_desc' => 'required|string|min:2|max:255',
        ]);
        $data['parent'] = $request->parent;
        $cat->update($data);
        toastr()->success('Update Category Sussessfully..');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::findOrFail($id);
        $cat->update(['enabled'=>0]);
        toastr()->success('Delete Category Sussessfully..');
        return back();
    }
    public function restore($id)
    {
        $cat = Category::findOrFail($id);
        $cat->update(['enabled'=>1]);
        toastr()->success('Resore Category Sussessfully..');
        return back();
    }
    public function force_del($id)
    {
        $cat = Category::findOrFail($id);
        $cat->delete();
        toastr()->success('Delete Category Sussessfully..');
        return back();
    }
//
}
