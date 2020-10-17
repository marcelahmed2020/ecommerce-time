<?php
namespace App\Http\Controllers\Admin;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::where('enabled',1)->get();
        if (isset(request()->id)){
            $tags = Tag::where('id',request()->id)->get();
        }

        return view('admin.tag.index',compact('tags'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.tag.create');
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
            'name' => 'required|string|min:2|max:255|unique:tags',
            'short_desc' => 'required|string|min:2',
        ]);
        $tag = auth()->user()->tag()->create($data);
        toastr()->success('Add Tag Sussessfully..');
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        abort(404);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tag.edit',compact(['tag']));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $data =  $this->validate($request,[
            'name' => 'required|string|min:2|max:255||unique:tags,name,'.$id,
            'short_desc' => 'required|string|min:2|max:255',
        ]);
        $data['edit'] = auth()->user()->id;
        $tag->update($data);
        toastr()->success('Update Tag Sussessfully..');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update(['enabled'=>0,'status'=>0,'delete'=> auth()->user()->id]);
        toastr()->success('Delete Tag Sussessfully..');
        return back();
    }
    public function restore($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update(['enabled'=>1,'status'=>1,'edit'=> auth()->user()->id]);
        toastr()->success('Resore Tag Sussessfully..');
        return back();
    }
    public function force_del($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        toastr()->success('Delete Tag Sussessfully..');
        return back();
    }
    public function enabled($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update(['status'=>1,'edit'=> auth()->user()->id]);
        toastr()->success('Resore Tag Sussessfully..');
        return back();
    }
    public function disabled($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update(['status'=>0,'edit'=> auth()->user()->id]);
        toastr()->success('Resore Tag Sussessfully..');
        return back();
    }

//
}
