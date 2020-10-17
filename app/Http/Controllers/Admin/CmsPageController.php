<?php

namespace App\Http\Controllers\Admin;

use App\CmsPage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class CmsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $CmsPage = CmsPage::get();
      return view('admin.cms.index',compact('CmsPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.cms.create');
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
        'title' => 'required|string|min:2',
        'meta_title' => 'required|string|min:2|max:255',
        'link' => 'required|string|min:2|max:255|unique:cms_pages',
        'description' => 'required|string|min:2',
        'meta_description' => 'required|string|min:2',
        'image'    =>   'required|mimes:png,gif,jpeg,pdf,doc,docx,rtf,xls,xlsx,csv|max:20000'
       ]);
       $image = '';
       if ($request->hasFile('image')) {
           $image_tmp =  $request->file('image');
           if ($image_tmp->isValid()) {
               $extension =  $image_tmp->getClientOriginalExtension();
               $filename = rand(111,99999).'.'.$extension;
               $news_path = "backend/about_images/".$filename;
               Image::make($image_tmp)->save($news_path);
               $image           =  $filename;
           }
       }
      $data['image'] = $image;
      $user = auth()->user()->cms()->create($data);
      toastr()->success('Add Success New Cms Page');
      return redirect()->route('cms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function show(CmsPage $cmsPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cms = CmsPage::findOrFail($id);
      return view('admin.cms.edit',compact('cms'));
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $cms = CmsPage::findOrFail($id);

      $data =  $this->validate($request,[
        'title' => 'required|string|min:2',
        'meta_title' => 'required|string|min:2|max:255',
        // 'link' => 'required|string|min:2|max:255|unique:cms_pages'.$id,
        // =>'required|max:255|unique:users,email,'.$id,
        'link' => 'required|string|min:2|max:255||unique:cms_pages,link,'.$id,

        'description' => 'required|string|min:2',
        'meta_description' => 'required|string|min:2',
        'image'    =>   'required|mimes:png,gif,jpeg,pdf,doc,docx,rtf,xls,xlsx,csv|max:20000'

       ]);
       $image = '';
       if ($request->hasFile('image')) {
           $image_tmp =  $request->file('image');
           if ($image_tmp->isValid()) {
               $extension =  $image_tmp->getClientOriginalExtension();
               $filename = rand(111,99999).'.'.$extension;
               $news_path = "backend/about_images/".$filename;
               Image::make($image_tmp)->save($news_path);
               $image           =  $filename;
           }
       }
      $data['image'] = $image;
      $data['edit'] = auth()->id();
      $cms->update($data);
      toastr()->success('Update Success Cms Page');
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CmsPage $cmsPage)
    {
        $cmsPage->delete();

    }
}
