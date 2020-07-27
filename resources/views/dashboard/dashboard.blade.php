@extends('layouts.layout')

@section('content')
<div class="row pt-2">
    <div class="col-md-12">
        {{-- <h1>Sisa Uang = {{$sisa_uang}}</h1>
        <br> --}}
        <div class="card card-green">
            <div class="card-header">
                <h3 class="card-title">Pendapatan perbulan</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-pemasukan" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Bulan</th>
                                <th>Jenis</th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendapatan as $m)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$m->bulan}}</td>
                                <td>{{ $m->jenis }}</td>
                                <td>{{ $m->nominal }}</td>
                                <td>{{$m->deskripsi}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <b>   Total Pendapatan {{$pd[0]->pendapatan}}</b>
            </div>
        </div>

        <div class="card card-red">
            <div class="card-header">
                <h3 class="card-title">Pengeluaran perbulan</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-pengeluaran" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Bulan</th>
                                <th>Jenis</th>
                                <th>Nominal</th>
                                <th>Keterangan</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengeluaran as $m)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$m->bulan}}</td>
                                <td>{{ $m->jenis }}</td>
                                <td>{{ $m->nominal }}</td>
                                <td>{{ $m->deskripsi }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <b>   Total Pengeluaran {{$pn[0]->pengeluaran}}</b>
            </div>
        </div>

    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#table-pemasukan').DataTable();
        });
        $(document).ready(function() {
            $('#table-pengeluaran').DataTable();
        });
    </script>
@endsection