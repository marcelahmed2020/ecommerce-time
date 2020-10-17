<?php

namespace App\Http\Controllers\Admin;
use App\Charges;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $charges = charges::where('enabled',1)->get();

        if (isset(request()->id)){
            $charges = charges::where(['id'=>request()->id,'enabled'=>1])->get();
        }
        return view('admin.charges.index',compact('charges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.charges.create');
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
            'Country' => 'required|string|min:2|max:255',
            'City' => 'required|string|min:2|max:255',
            'charges' => 'required|min:2|max:255',
        ]);
        $charges = auth()->user()->charges()->create($data);
        toastr()->success('Add charge Sussessfully..');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Charges  $charges
     * @return \Illuminate\Http\Response
     */
    public function show(Charges $charges)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Charges  $charges
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $charges = Charges::findOrFail($id);
        return view('admin.charges.edit',compact('charges'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Charges  $charges
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $charges = Charges::findOrFail($id);
        $data =  $this->validate($request,[
            'Country' => 'required|string|min:2|max:255',
            'City' => 'required|string|min:2|max:255',
            'charges' => 'required|min:2|max:255',
        ]);
        $charges->update($data);
        toastr()->success('Update Charge Sussessfully..');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Charges  $charges
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $charges = Charges::findOrFail($id);
        $charges->delete();
        toastr()->success('Deleted Charge Sussessfully..');
        return back();
    }
}
