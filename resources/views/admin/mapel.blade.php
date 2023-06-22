@extends('layouts.app2')

<head>
    <style>
        .table-borderless > tbody > tr > td,
        .table-borderless > tbody > tr > th,
        .table-borderless > tfoot > tr > td,
        .table-borderless > tfoot > tr > th,
        .table-borderless > thead > tr > td,
        .table-borderless > thead > tr > th {
            padding: 20px;
            color: black;
            border-bottom: 1px solid #ebedef;
        }
    </style>
</head>
@section('content')
<div class="row pt-5">
    <div style="border-radius: 28px" class="card col-8 p-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mt-2">
                    <h2 style="font-weight: bolder">Mata Pelajaran</h2>
                </div>
            </div>
        </div>

        <form action="{{ route('cariMapel') }}" method="POST">
            @csrf
            <div class="d-flex flex-row justify-content-end mb-2">
                <a style="background-color: black; border: none" class="btn btn-success" href="{{ route('mapel.create') }}"> 
                    <i class="fa fa-plus pr-2" aria-hidden="true"></i>Input
                </a>
            </div>
        </form>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-borderless">
            <tr>
                <th>Id</th>
                <th>Nama Pelajaran</th>
                <th style="text-align: right">Action</th>
            </tr>
            @foreach ($mapel as $m)

            <tr>
                <td>{{ $m->id }}</td>
                <td>{{ $m->namaMapel }}</td>
                <td style="text-align: right">
                    <form action="{{ route('mapel.destroy',$m->id) }}" method="POST">
                        <a class="btn" href="{{ route('mapel.edit',$m->id) }}">
                            <i class="fa fa-align-justify" aria-hidden="true"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>
    </div>

    <div class="col-4 pl-4">
        <div style="border-radius: 28px" class="card p-4">
            <h5 style="font-weight: bolder">Cari Mata Pelajaran</h5>
            <form action="{{ route('cariMapel') }}" method="POST">
            @csrf
                <div class="d-flex flex-row">
                    <input style="background-color: #f8f9fa;" type="text" value="{{ (request()->cari) ? request()->cari : '' }}" name="cari" class="form-control">
                    <button style="background-color: black; border: none" type="submit" class="btn btn-primary ml-4">Cari</button>
                </div>
            </form>
            <hr>
            <div class="row pl-3">
                <div class="icon pr-3">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>   
            </div>
            <p>* Jumlah Mata Pelajaran yang tersimpan</p>
        </div>
    </div>

</div>

 
@endsection