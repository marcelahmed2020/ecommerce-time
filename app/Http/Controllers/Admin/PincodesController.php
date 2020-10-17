<?php
namespace App\Http\Controllers\Admin;
use App\Pincodes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PincodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pincodes = Pincodes::get();
        return view('admin.pincodes.index',compact('pincodes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pincodes.create');
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
            'city' => 'required|min:2',
            'address' => 'required|min:2|max:255',
            'pincodes' => 'required|min:2|max:255|unique:pincodes',
        ]);
        $Pincodes = auth()->user()->pincodes()->create($data);
        toastr()->success('Add Success New Pincode');
        return redirect()->route('pincodes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pincodes  $pinc
     * @return \Illuminate\Http\Response
     */
    public function show(Pincodes $pinc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pincodes  $pinc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pincodes = Pincodes::findOrFail($id);
        return view('admin.pincodes.edit',compact('pincodes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pincodes  $pinc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $pinc = Pincodes::findOrFail($id);

        $data =  $this->validate($request,[
            'city' => 'required|min:2',
            'address' => 'required|min:2|max:255',
            'pincodes' => 'required|min:2|max:255|unique:pincodes,pincodes,'.$id,
        ]);

        $pinc->update($data);
        toastr()->success('Update Success Pincode');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pincodes  $pinc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pinc = Pincodes::findOrFail($id);
        $pinc->delete();
        toastr()->success('Delete Success Pincode');
        return back();

    }

    public function enabled($id)
    {
        $tag = Pincodes::findOrFail($id);
        $tag->update(['status'=>1]);
//        ,'edit'=> auth()->user()->id
        toastr()->success('Enabled Pincode Sussessfully..');
        return back();
    }
    public function disabled($id)
    {
        $tag = Pincodes::findOrFail($id);
        $tag->update(['status'=>0]);
//        ,'edit'=> auth()->user()->id
        toastr()->success('Disabled Pincode Sussessfully..');
        return back();
    }
}
