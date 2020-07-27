@extends('layouts.layout')
@section('title','Beranda')
@section('content')
<div class="row pt-2">
    <div class="col-md-12">
        <div class="card card-maroon">
            <div class="card-header">
                <h3 class="card-title">Laporan Keuangan</h3>
            </div>
        
        <div class="card-body ">
            @if ($isAdmin == "1")    
                <a href="/keuangan/create">
                    <button class="btn btn-primary mb-4"><i class="fa fa-plus"></i>
                        Tambah Data
                    </button>
                </a>
            @endif
            <div class="table-responsive">
            <table id="table-keuangan" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis</th>
                        <th>Nominal</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        @if ($isAdmin == "1")
                            <th>Edit</th>
                            <th>Delete</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->jenis }}</td>
                        <td>{{ $m->nominal }}</td>
                        <td>{{ $m->deskripsi }}</td>
                        <td>{{$m->created_at}}</td>
                        @if ($isAdmin == "1")
                        <td>
                            <form action="/keuangan/{{$m->id}}/edit" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-fw fa-edit" style="color:white"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="/keuangan/{{$m->id}}/" method="POST">
                                @method("DELETE")
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                    <i class="fa fa-fw fa-trash"></i>
                                </button>
                            </form>
                        </td>    
                        @endif
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#table-keuangan').DataTable();
        });
    </script>
@endsection