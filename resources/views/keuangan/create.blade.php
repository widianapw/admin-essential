@extends('layouts.layout')

@section('title','Tambah Keuangan')
@section('content')
<div class="row pt-2">
    <div class="col-md-12">
        <div class="card card-orange">
            <div class="card-header">
                <h3 class="card-title">Keuangan</h3>
            </div>
            <div class="card-body">
                <form action="/keuangan" method="POST" class="form-group">
                    @csrf
                    <div class="form-body">
                        <div class="form-label">
                            <label for="nim">Jenis Keuangan</label>
                        </div>
                        <select name="jenis" class="form-control" required>
                            <option value="">Pilih Jenis Keuangan</option>
                            <option value="pendapatan">Pendapatan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                        
                        <br>
                        <div class="form-label">
                            <label for="nim">Nominal</label>
                        </div>
                        <input type="number" name="nominal" class="form-control" required>
                
                        <br>
                        <div class="form-label">
                            <label for="nim">Deskripsi</label>
                        </div>
                        <textarea name="deskripsi" class="form-control" required></textarea>
                
                        <br>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection