@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Request</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/Request') }}" method="post">
                            @csrf


                    <div class="form-group">
                        <label for="tanggal_request">Tanggal Requset</label>
                        <div class="col-sm-12">
                        <input type="date" class="form-control" id="tanggal_request" name="tanggal_request" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required="">
                        </div>

                            <div class="form-group">
                                <label for="">Requster</label>
                                <input name="requester" class="form-control {{ $errors->has('requester') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('requester') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input name="keterangan" class="form-control {{ $errors->has('keterangan') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('keterangan') }}</p>
                            </div>
                          
                            <div class="form-group">
                                <button class="btn btn-info btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
