<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request_details;
class DetailCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuti = Request_details::orderBy('created_at','DESC')->paginate(10);
        return view('cuti.index',compact('cuti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('cuti.add');
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
          'request_date' =>'required|string',
          'id_user'=> 'required',
          'keterangan'=> 'required',
          'dari_tanggal'=> 'required',
          'sampai_tanggal'=> 'required',
          'jenis_cuti'=> 'required',

        ]);

        try{
               $cuti = Auth::user()->name;
          $cuti = Request_details::create([
            'request_date' => $cuti->request_date,
            'requester'=>$cuti->requester,
            'keterangan'=>$cuti->keterangan,
             'dari_tanggal' => $cuti->dari_tanggal,
            'sampai_tanggal'=>$cuti->sampai_tanggal,
            'jenis_cuti'=>$cuti->jenis_cuti,
          
          ]);
          return redirect('/Cuti')->with(['success'=>'Data Telah Di simpan']);
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
           
        $cuti = Request_details::find($id);
        return view('Cuti.detail',compact('cuti'));     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
