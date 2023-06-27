@extends('layouts.app2')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Mata Pelajaran
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('mapel.store') }}" id="myForm">
                        @csrf
                        <div class="form-group">
                            <label for="namaMapel">Nama Mapel</label>
                            <input style="background-color: #f7f7f7" type="text" name="namaMapel" class="form-control" id="namaMapel" aria-describedby="id" >
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
