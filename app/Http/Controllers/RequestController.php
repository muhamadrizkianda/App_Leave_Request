<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\_Request;
class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $request = _Request::orderBy('created_at','DESC')->paginate(10);
        return view('request.index',compact('request'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('request.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
          'tanggal_request' =>'required|string',
          'requester'=> 'required',
          'keterangan'=> 'required'

        ]);

        try{
          $required =_Request::create([
            'tanggal_request' => $request->tanggal_request,
            'requester'=>$request->requester,
            'keterangan'=>$request->keterangan
          
          ]);
          return redirect('/Request')->with(['success'=>'Data Telah Di simpan']);
        }catch (\Exeption $e){
          return redirect()->back()->with(['error'=> $e->getMessage()]);
        }   

         }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $request = _Request::find($id);
        return view('Request.edit',compact('request')); 

           
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'tanggal_request' =>'required|string',
          'requester'=> 'required',
          'keterangan'=> 'required'

 ]);

 try {
     $required = _Request::find($id);
     $required->update([
         'tanggal_request' => $request->tanggal_request,
            'requester'=>$request->requester,
            'keterangan'=>$request->keterangan
     ]);
     return redirect('/Request')->with(['success' => 'Data telah diperbaharui']);
 } catch (\Exception $e) {
     return redirect()->back()->with(['error' => $e->getMessage()]);
 }    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    $request = _Request::find($id);
     $request->delete();
     return redirect()->back()->with(['success' => '<strong>' . $request->requester . '</strong> Telah dihapus']);   
      }

      public function paginate(Request $request)
    {

    $requests = _Request::when($request->keyword, function ($query) use ($request) {
        $query->where('requester', 'like', "%{$request->keyword}%")
            ->orWhere('tanggal_request', 'like', "%{$request->keyword}%");
    })->paginate(20);

    return view('Request.paginate', compact('requests'));
}
}
