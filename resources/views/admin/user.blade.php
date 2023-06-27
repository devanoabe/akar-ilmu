@extends('layouts.app2')
<head>
    <link rel="stylesheet" href="{{asset('css/user.css')}}">
</head>
@section('content')
    <!-- Content Header (Page header) -->
    <div class="row">
    <!-- Main content -->
        <div style="padding-top: 24px;" class="col-3">
            <h1 style="color:black; font-weight: bolder; text-align:">User</h1>
            <p style="font-size: 13px;  width: 80%"> 
                Dalam daftar ini memberikan informasi tentang pengguna, seperti nama, alamat email, dan peran pengguna.
            </p>
        </div> 
        <div class="col-9">
            <section style="padding-top: 24px" class="content">
                <div  style="border-radius: 28px" class="card">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role<i class="fa fa-arrow-down fa-xs" aria-hidden="true"></i></th>
                                <th>Username</th>
                                <th>Tanggal</th>
                                <th>Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $s)
                                <tr>
                                    <td class="col-4">
                                        <div class="row">
                                            <div class="col-2">
                                                <img style="width: 45px; height: auto" class="img-profile rounded-circle"
                                                src="{{asset('images/faces/2.jpg')}}">
                                            </div>
                                            <div style="padding-left: 30px" class="col-10">        
                                                <h5 style="color: black; font-weight: bolder">{{ $s -> name}}</h5>
                                                {{ $s -> email}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-3">
                                        <div style="vertical-align: middle;" class="text-center pt-3">
                                            @if($s->role == 1)
                                                <h6 style="background-color: black; color: white; padding: 10px; border-radius: 30px; width: 80%">
                                                <i style="font-size: 7px; color: white; vertical-align: middle;" class="fa fa-circle pr-2" aria-hidden="true"></i>
                                                Admin</h6>
                                            @elseif($s->role == 0)
                                                <h6 style="background-color: white; color: black; padding: 10px; border-radius: 30px; width: 80%; border: 2px solid black; font-weight: bolder">
                                                <i style="font-size: 7px; color: black; vertical-align: middle;" class="fa fa-circle pr-2" aria-hidden="true"></i>
                                                User</h6>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="col-2">
                                        <h6 class="pt-4">
                                            {{ $s -> username}}
                                        </h6>

                                    </td>
                                    <td class="col-2">
                                        <h6 style="color:black" class="pt-3">
                                            {{ $s -> created_at->format('Y-m-d')}}
                                        </h6>
                                        <p style="font-size: 13px;">Created at</p>
                                    </td>
                                    <td class="col-1">
                                        <h6 style="color:black; font-weight: bolder" class="pt-3">
                                            {{ $s -> telepon}}
                                        </h6>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
@endsection