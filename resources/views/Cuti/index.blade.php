@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Manajemen Data Requset Cuti</h3>
                                 <form action="{{ url()->current() }}">
                         <div class="col-md-11">
                          <input type="text" name="keyword" class="form-control" placeholder="Search ...">
                         </div>
                        <div class="col-md-1">
                          <button type="submit" class="btn btn-primary">
                   Search
                    </button>
                     </div>
                      </form>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ url('/Cuti/new') }}" class="btn btn-primary btn-sm float-right">Input Data Cuti</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {!! session('success') !!}
                            </div>
                        @endif
                        <div class="table-responsive">
                        <table id="example" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                     <th>Tanggal Requset</th>
                                     <th> Requseter</th>
                                    <th> Keterangan</th>
                                    <th>Dari Tanggal</th>
                                     <th>Sampai Tanggal</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cuti as $cuti)
                                <tr>  <td>
                                        <form action="{{ url('/Cuti/'.$cuti->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                                            <a href="{{ url('/Cuti/'.$cuti->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        </form>

                                    </td>
                                    <td>{{ $cuti->request_date }}</td> 
                                    <td>{{ $cuti->requester }}</td>
                                    <td>{{ $cuti->keterangan }}</td>
                                   <td>{{ $cuti->dari_tanggal }}</td>
                                    <td>{{ $cuti->sampai_tanggal }}</td>
                                </tr>

                                <tr>

                                </tr>
                            
                                @endforeach
                            </tbody>
                                {{{-- {{$cuti->links()}} --}}}
                        </table>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

