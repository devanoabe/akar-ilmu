@extends('layouts.app2')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Tryout
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Nama Tryout: </b>{{$tryout->namaTryout}}</li>
                        <li class="list-group-item"><b>Detail Tryout: </b>{{$tryout->detailTryout}}</li>
                        <li class="list-group-item"><b>Id User: </b>{{$tryout->user_id}}</li>
                        <li class="list-group-item"><b>Id Mata Pelajaran: </b>{{$tryout->mata_pelajaran_id}}</li>
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('tryout.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection
