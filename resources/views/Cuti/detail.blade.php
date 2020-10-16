@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Halaman Data Ditail</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{url('Cuti')}}" method="post">
                            @csrf


                    <div class="form-group">
                        <label for="request_date">Tanggal Requset : {{ $cuti->request_date }}</label>
                        <div class="col-sm-12">
                        </div>
                            <div class="form-group">
                                <br>
                                <label for="">Requster  : {{ $cuti->requester }} </label>  
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan  : {{$cuti->keterangan}}</label>
                            </div>
                            <div class="form-group">
                                <label>Rincian Cuti</label>
                                <table class="table table-bordered table-striped ">
                              <thead>
                                  <th>Dari Tanggal</th>
                                  <th>Sampai Tanggal</th>
                                  <th>Jenis Cuti</th>
                                 </th>
                                 </thead>
                             <tbody>
                                 <th>{{$cuti->dari_tanggal}}</th>
                                <th>{{$cuti->sampai_tanggal}}</th>
                                 <th>{{$cuti->jenis_cuti}}</th>
                             </tbody>
                         </table>

                            </div>



                            <div class="form-group">
                                <button class="btn btn-info btn-sm">Edit</button>
                                 <a class="btn btn-warning btn-sm"  href="{{ url('/Request') }}" >Ke Halaman List</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

