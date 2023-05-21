{{-- <h1>aaa</h1> --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h2>Terimakasih telah menyelesaikan Ujian {{ Auth::user()->name }}</h2>
            <a href="/dashboard" class="btn btn-info">Kembali</a>
        </div>
    </div>
@endsection



