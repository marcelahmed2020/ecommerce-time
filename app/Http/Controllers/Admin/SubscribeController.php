<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscribe;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribes = Subscribe::where('enabled',1)->latest()->get();
        return view('admin.subscribes.index',compact('subscribes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribe $subscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscribe $subscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscribe $subscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $subscribe = Subscribe::findOrFail($id);
        $subscribe->update(['enabled'=>0]);
        toastr()->success('Delete Subscribe Sussessfully..');
        return back();
    }
    public function enable($id)
    {
         $subscribe = Subscribe::findOrFail($id);
        $subscribe->update(['status'=>1]);
        toastr()->success('Enable Subscribe Sussessfully..');
        return back();
    }
    public function disable($id)
    {
         $subscribe = Subscribe::findOrFail($id);
        $subscribe->update(['status'=>0]);
        toastr()->success('Disable Subscribe Sussessfully..');
        return back();
    }
    public function getDownloadList()
    {
        $subscribes = Subscribe::where('enabled',1)->latest()->get();
        $subscribes = json_decode(json_encode($subscribes),true);
//        return Excel::create('subscribes'.rand(),function ($excel) use ($subscribes){
//            $excel->sheet('SheetList',function ($sheet) use ($subscribes){
//                $sheet->fromArray($subscribes);
//            });
//        })->download('xlsx');
        return Excel::download($subscribes, 'users.xlsx');
// 
    }


}
