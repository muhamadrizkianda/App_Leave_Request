@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Request  Cuti</h3>
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
                        <label for="request_date">Tanggal Requset</label>
                        <div class="col-sm-12">
                        <input type="date" class="form-control" id="request_date" name="request_date" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required="">
                        </div>

                            <div class="form-group">
                                <label for="">Requster</label>
                                <input name="requester" class="form-control {{ $errors->has('requester') ? 'is-invalid':'' }}" value=" {{ Auth::user()->name }}" disabled>
                                <p class="text-danger">{{ $errors->first('requester') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input name="keterangan" class="form-control {{ $errors->has('keterangan') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('keterangan') }}</p>
                            </div>

                            <div class="form-group">
                                <label>Rincian Cuti</label>
                                <table class="table table-bordered table-striped ">
                              <thead>
                                 <th> No</th>
                                  <th>Dari Tanggal</th>
                                  <th>Sampai Tanggal</th>
                                  <th>Jenis Cuti</th>
                                  <th width="5%"><button type="button" onClick="addRow()" class="btn btn-primary">+</button></th>
                                 </thead>
                             <tbody>
                                 
                             </tbody>
                         </table>

                            </div>



                            <div class="form-group">
                                <button id="my_submit_button"  class="btn btn-info btn-sm">Simpan</button>
                                 <a class="btn btn-warning btn-sm"  href="{{ url('/Request') }}" >Batal</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('myjs')
    <script src="{{ asset('js/jsku.js') }}"></script>
@endpush
