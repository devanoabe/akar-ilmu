@extends('layouts.app2')

<head>
    <link rel="stylesheet" href="{{asset('css/ds.css')}}">
</head>

@section('content')
    <!-- Main content -->
        <!-- Default box -->
        <div class="row">
            <div class="ag-format-container">
                <div class="ag-courses_box">
                    <div class="ag-courses_item">
                    <a href="{{ route('admin.user') }}" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>
                        <div class="ag-courses-item_title">
                            User
                        </div>

                        <div class="ag-courses-item_date-box">
                        Jumlah:
                        <span class="ag-courses-item_date">
                            {{$user}}
                        </span>
                        </div>
                    </a>
                    </div>

                    <div class="ag-courses_item">
                    <a href="{{ route('admin.exam') }}" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>
                        <div class="ag-courses-item_title">
                            Tryout
                        </div>

                        <div class="ag-courses-item_date-box">
                        Jumlah:
                        <span class="ag-courses-item_date">
                            {{$tryout}}
                        </span>
                        </div>
                    </a>
                    </div>

                    <div class="ag-courses_item">
                    <a href="{{ route('admin.qna') }}" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>

                        <div class="ag-courses-item_title">
                           Soal
                        </div>

                        <div class="ag-courses-item_date-box">
                        Jumlah:
                        <span class="ag-courses-item_date">
                            {{$soal}}
                        </span>
                        </div>
                    </a>
                    </div>

                    <div class="ag-courses_item">
                    <a href="{{ route('mapel.index') }}" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>

                        <div class="ag-courses-item_title">
                            Mata Pelajaran
                        </div>

                        <div class="ag-courses-item_date-box">
                        Jumlah:
                        <span class="ag-courses-item_date">
                            {{$mapel}}
                        </span>
                        </div>
                    </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <a style="border-radius: 28px" href="{{ route('admin.review') }}" class="card">
                    <img src="{{asset('images/wr.jpg')}}" alt="" class="card__img">
                    <span class="card__footer">
                        <span>Approved Review Soal</span>
                        <span>{{$review}} Approved</span>
                    </span>
                    <span class="card__action">
                        <svg viewBox="0 0 448 512" title="play">
                        <path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z" />
                        </svg>
                    </span>
                </a>
            </div>

            <div class="col-6">
                <div style="border-radius: 28px; box-shadow: 0 30px 30px -25px rgba(#4133B7, .25);" class="card">
                    <article style="background-color: var(--c-white); padding: 1.5rem;" class="information">
                        <span class="tag">Nilai</span>
                        <h2 class="title">Fitur Nilai tryout </h2>
                        <p class="info">
                            Fitur nilai yang menampilkan hasil akhir tryout dapat membantu peserta untuk memantau kemajuan pembelajaran sehingga dapat mengetahui dan mengevaluasi bagian mana yang kurang maksimal.
                            <br>
                            Informasi yang dimiliki fitur ini, juga berguna bagi instansi pendidikan karena dapat memberikan umpan balik yang lebih terarah untuk meningkatkan sarana belajar yang lebih efisien dan tepat guna bagi peserta.
Dengan demikian, fitur nilai sangat berguna dan bermanfaat bagi kedua belah pihak.
                        </p>
                        <button class="button">
                            <a style="color: black" href="{{ route('admin.marks') }}">Learn more</a>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="none">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M16.01 11H4v2h12.01v3L20 12l-3.99-4v3z" fill="currentColor" />
                            </svg>
                        </button>
                    </article>
                </div>
            </div>
        </div>
    <!-- /.content -->
@endsection