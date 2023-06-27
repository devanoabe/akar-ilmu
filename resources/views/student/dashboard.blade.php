@extends('layouts.app3')
<head>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Alice&family=Nanum+Gothic&family=Roboto+Flex&display=swap');
    </style>
    <link rel="stylesheet" href="{{ asset('css/dbs.css') }}">
    <link rel="icon" href="{{ asset('images/icon.jpeg') }}">
</head>

@section('content')

<div class="row">
  <div class="col-9">
    <div class="main">
      <ul class="cards">
        @if(count($exams) > 0)
        @php $count =1; @endphp
            @foreach($exams->groupBy('subject_id') as $subjectId => $examsBySubject)
            @php
                $subjectName = App\Models\MataPelajaran::find($subjectId)->namaMapel;
            @endphp
            <h2 class="mt-5">Mata Pelajaran: {{ $subjectName }}</h2>
                @foreach($examsBySubject as $exam)
                <div style="width: 89%;" class="card-group">
                    <div style="border-radius: 28px; background-color: white; backdrop-filter: blur(25%); border-color: #ffffff3f;"
                     class="card p-4 border-bottom-0 border-left-0 mb-3">
                        <div class="row">
                            <div class="col-4">
                                <div class="card_image">
                                    <img src="{{ asset('images/cb.png') }}">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="d-flex flex-row-reverse">
                                    <i class="fa fa-clock time" aria-hidden="true">
                                        <span style="font-family: 'Roboto Flex', sans-serif;">{{ $exam->time }}</span>
                                    </i>
                                </div>
                                <h5 style="font-weight: bolder; font-size: 43px; line-height: 1"class="card-title pt-4">
                                    {{ $exam->exam_name }}
                                </h5>
                                <p style="font-size: 18px;" class="card-text">{{ $exam->keterangan }}</p>
                                <p style="font-size: 13px;" class="card-text">{{ $exam->date }}</p>
                                <div class="buttons-container d-flex flex-row-reverse">
                                    <button class="button-arounder">
                                        <a style="color: white" href="#" data-code="{{ $exam->entrance_id }}" class="copy">
                                            Kerjakan
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        @endforeach
        @else
            <tr>
                <td colspan="8">No Exams Available</td>
            </tr>
        @endif
      </ul>
    </div>
  </div>
  <div class="col-3">
    <div class="image-prof">
      <img src="{{ asset('images/faces/2.jpg') }}">
      <div class="d-flex justify-content-center  pt-2 mb-0">
        <h3>Hi, {{ Auth::user()->name }}!</h3>
      </div>
      <div style="margin-top: -12px" class="d-flex justify-content-center">
        <p>{{ Auth::user()->email }}</p>
      </div>
    </div> 
        <div class="container">
            <div class="row">
                <div style="background-color: #008374; color: white" class="card col-7 mr-3 k">
                    <i style="color: white" class="fa fa-cube" aria-hidden="true"></i>
                    Total Tryout 
                    <br>
                    <p>{{ $tryout }}</p>
                </div>
                <div style="background-color: #fef7ec; color: #fcb03b" class="card col-4 k">
                    <i style="color: #fcb03b" class="fa fa-check-square" aria-hidden="true"></i>
                    Selesai 
                    <br>
                    <p>{{ $userAttempts }}</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div style="background-color: #f85a40; color: white" class="card col-4 mr-3 k">
                    <i style="color: white" class="fa fa-book" aria-hidden="true"></i>
                    Lulus 
                    <br>
                    <p>{{ $passedAttempts }}</p>
                </div>
                <div style="background-color: #eaf9f1; color: #21b573" class="card col-7 k">
                    <i style="color: #21b573" class="fa fa-check-square" aria-hidden="true"></i>
                    Nilai Tertinggi 
                    <br>
                    <p>{{ $highestScore }}</p>
                </div>
            </div>
        </div>
  </div>
</div>



<script>
    $(document).ready(function(){
        $(' .copy').click(function(){
            $(this).parent().prepend('<span class="copied_text">Copied</span>');

            var code = $(this).attr('data-code');
            var url = "{{URL::to('/')}}/exam/"+code;

            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            document.execCommand("copy");
            $temp.remove();

            setTimeout(() =>{
                $(' .copied_text').remove();
                
            }, 1000);
        })
    });
</script>
@endsection