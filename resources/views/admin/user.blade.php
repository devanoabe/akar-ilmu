@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="color: white;">Data Semua User</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $s)
                        <tr>
                            <td>{{ $s -> id}}</td>
                            <td>{{ $s -> name}}</td>
                            <td>{{ $s -> username}}</td>
                            <td>{{ $s -> email}}</td>
                            <td>{{ $s -> telepon}}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
                --
            </div> -->
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection