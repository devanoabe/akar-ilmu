@extends('layouts.app2')

@section('content')

    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Tryout
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
                    <form method="post" action="{{ route('tryout.update', $tryout->id) }}" id="myForm">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="namaTryout">Nama Tryout</label>
                            <input type="text" name="namaTryout" class="form-control" id="namaTryout" value="{{ $tryout->namaTryout }}" ariadescribedby="namaTryout" >
                        </div>
                        <div class="form-group">
                            <label for="detailTryout">Detail Tryout</label>
                            <input type="text" name="detailTryout" class="form-control" id="detailTryout" value="{{ $tryout->detailTryout }}" ariadescribedby="detailTryout" >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection