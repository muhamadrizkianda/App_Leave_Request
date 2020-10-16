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
                                <a href="{{ url('/Request/new') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
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
                                    <th colspan="1">Action</th>
                                    <th>Tanggal Requset</th>
                                     <th> Requseter</th>
                                    <th> Keterangan</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($request as $request)
                                <tr>  <td>
                                        <form action="{{ url('/Request/'.$request->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                                            <a href="{{ url('/Request/'.$request->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Hapus</button>

                                            <a href="{{ url('/Request/'.$request->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        </form>

                                    </td>
                                    <td>{{ $request->tanggal_request }}</td> 
                                    <td>{{ $request->requester }}</td>
                                    <td>{{ $request->keterangan }}</td>
                                   
                            
                                </tr>

                                <tr>

                                </tr>
                            
                                @endforeach
                            </tbody>

                        </table>
                             {{-- {{$request->links()}} --}}
                        <br>
                          <a href="{{ url('/Cuti')}}" class="btn btn-info btn-sm"> Create</a>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('myjs')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endpush

