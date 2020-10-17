<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Currency $currency
        $currencies = Currency::get();
        return  view('admin.currencies.index',compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //name code symbol exchange_rate
        $data = $this->validate($request,[
            'name'    => 'required|min:2|max:255|unique:currencies',
            'code' => 'required|min:2|max:255|unique:currencies',
            'symbol'    => 'required|min:2|max:255',
            'exchange_rate'    => 'required|max:255'
        ]);
//        dd(auth()->user());
        auth()->user()->currencies()->create(['name'=>$request->name,'code'=>$request->code,'symbol'=>$request->symbol,'exchange_rate'=>$request->exchange_rate]);
        toastr()->success('Add Success New Currency');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return  view('admin.currencies.edit',compact('currency'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $cat = Currency::findOrFail($id);
        $data =  $this->validate($request,[
            'name' => 'required|min:2|max:255|unique:currencies,name,'.$id,
            'code' => 'required|min:2|max:255|unique:currencies,code,'.$id,
            'symbol'    => 'required|min:2|max:255',
            'exchange_rate'    => 'required|max:255'
        ]);
        $data['edit']     = auth()->id();
        $cat->update($data);
        toastr()->success('Update Currency Sussessfully..');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        toastr()->success('Deleted Currency Sussessfully..');
        return back();
    }
}
