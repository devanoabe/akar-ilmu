<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/icon.jpeg') }}">
    <title>Troyout | Akar-Ilmu</title>
    <link rel="stylesheet" href="{{ asset('css/qna.css') }}">
</head>
<body>
    
@extends('layouts.app')

@section('content')

    @php
        $time = explode(':',$exam[0]['time']);
    @endphp
    <div style = "margin-left: 200px; margin-right: 200px; border-radius: 28px" class="card">
        <div class="row">
            <div class="col-3">
                <div class="image-prof">
                    <img src="{{ asset('images/sl.png') }}">
                </div>
            </div>
            <div class="col-9">
                <h6 style="padding-top: 20px; font-size: 23px">Tryout</h6>
                <h1 class="text-left" style = "font-size: 50px; font-weight: bolder">{{ $exam[0]['exam_name'] }}</h1>
                <h6><i class="fa fa-clock pr-2" aria-hidden="true"></i>Waktu : {{ $exam[0]['time'] }}</h6>
                <h6><i class="fa fa-asterisk pr-2" aria-hidden="true"></i>Keterangan : {{ $exam[0]['updated_at'] }}</h6>
                <h6><i class="fa fa-square pr-2" aria-hidden="true"></i>Jumlah : 
                    @foreach($jumlah_soal as $exam_id => $jumlah)
                        {{ $jumlah }} soal
                        <br>
                    @endforeach
                </h6>
                <h6><i class="fa fa-calendar pr-2" aria-hidden="true"></i>Update : {{ $exam[0]['date'] }}</h6>
            </div>
        </div>
    </div>
    <h4 style="padding-right: 200px; font-weight: bolder" class="text-right time pt-5 pb-5">{{ $exam[0]['time'] }}</h4>
    @php $qcount = 1; @endphp
    @if($success == true)
        @if(count($qna) > 0)
            <div style="margin-left: 200px; margin-right: 200px; border-radius: 28px" class="card">
                <form action="{{ route('examSubmit') }}" method="POST" class="mb-5 mt-5" id="exam_form" style = "padding-left: 50px; padding-right: 50px;">
                @csrf
                    <input type="hidden" name="exam_id" value="{{ $exam[0]['id'] }}">
                    @foreach($qna as $data)
                        <div >
                            <h5>{{ $qcount++ }}. {{ $data['question'][0]['soal'] }}</h5>
                            <input type="hidden" name="q[]" value="{{ $data['question'][0]['id'] }}">
                            <input type="hidden" name="ans_{{$qcount-1}}" id="ans_{{$qcount-1}}">
                            @php $acount = 1; @endphp
                            @foreach($data['question'][0]['answers'] as $answer)
                                <p>
                                    <input type="radio" name="radio_{{$qcount-1}}" data-id="{{$qcount-1}}" class="select_ans" value="{{ $answer['id'] }}" >
                                    {{ $answer['answer'] }}
                                </p>
                            @endforeach

                        </div>
                        <br>
                    @endforeach
                    <div style="text-align: right;;">
                        <input type="submit" class="btn" style="color: white; background-color: black">
                    </div>
                </form>
            </div>
            
            @else
                <h2 style="color:red;" class="text-center">Question & Answers not Available</h2>
            @endif 

        @else
        <h2 style="color:red;" class="text-center">{{ $msg }} </h2>
    @endif
    </div>
</body>
</html>

<script>
        $(document).ready(function() {
            var time = @json($time);
            var startTime = sessionStorage.getItem('startTime');

            if (!startTime) {
                startTime = Date.now();
                sessionStorage.setItem('startTime', startTime);
            }

            var elapsedTime = Math.floor((Date.now() - startTime) / 1000);
            var totalSeconds = time[0] * 3600 + time[1] * 60 - elapsedTime;

            if (totalSeconds <= 0) {
                clearInterval(timer);
                $('#exam_form').submit();
            } else {
                startTimer(totalSeconds);
            }
            });

            function startTimer(totalSeconds) {
            var hours = Math.floor(totalSeconds / 3600);
            var minutes = Math.floor((totalSeconds % 3600) / 60);
            var seconds = totalSeconds % 60;

            updateTimer(hours, minutes, seconds);

            var timer = setInterval(function() {
                if (hours == 0 && minutes == 0 && seconds == 0) {
                    clearInterval(timer);
                    $('#exam_form').submit();
                }

                if (seconds <= 0) {
                    minutes--;
                    seconds = 60;
                }
                if (minutes <= 0 && hours != 0) {
                    hours--;
                    minutes = 59;
                    seconds = 59;
                }

                updateTimer(hours, minutes, seconds);

                seconds--;
                }, 1000);
            }

            function updateTimer(hours, minutes, seconds) {
                var tempHours = hours.toString().padStart(2, '0');
                var tempMinutes = minutes.toString().padStart(2, '0');
                var tempSeconds = seconds.toString().padStart(2, '0');

                $('.time').text(tempHours + ':' + tempMinutes + ':' + tempSeconds + ' Left time');
            }

</script>

<script>
    $(document).ready(function(){
        $('.select_ans').click(function() {
            var no = $(this).attr('data-id');
            $('#ans_'+no).val($(this).val());
        });

    });

    function isValid(){
        // var result = false;

        var qlength = parseInt("{{$qcount}}")-1;
        $('.error_msg').remove();
        for(let i = 0; i <= qlength; i++){
            if($('#ans_'+i).val() == ""){
                result = false;
                $('#ans_'+i).parent().append('<span style="color: red;" class="error_msg">Silahkan Pilih Jawaban</span>');
                setTimeout(() => {
                    $('.error_msg').remove();
                }, 5000);
            }
        }
        

        return result;
    }
</script>
@endsection



