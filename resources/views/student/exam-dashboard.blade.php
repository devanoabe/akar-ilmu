{{-- <h1>aaa</h1> --}}

@extends('layouts.app')

@section('content')
    @php
        $time = explode(':',$exam[0]['time']);
    @endphp
    {{-- <p style="color:black">Welcome, {{ Auth::user()->name }}</p> --}}
    <p class="text-center">Tryout  :  {{ $exam[0]['exam_name'] }}</p>
    <h4 class="text-righ time">{{ $exam[0]['time'] }}</h4>
    @php $qcount = 1; @endphp
    @if($success == true)

        @if(count($qna) > 0)
            <form action="{{ route('examSubmit') }}" method="POST" class="mb-5" id="exam_form">
            @csrf
                <input type="hidden" name="exam_id" value="{{ $exam[0]['id'] }}">
                @foreach($qna as $data)
                    <div>
                        <h5>Q. {{ $qcount++ }}. {{ $data['question'][0]['soal'] }}</h5>
                        <input type="hidden" name="q[]" value="{{ $data['question'][0]['id'] }}">
                        <input type="hidden" name="ans_{{$qcount-1}}" id="ans_{{$qcount-1}}">
                        @php $acount = 1; @endphp
                        @foreach($data['question'][0]['answers'] as $answer)
                            <p><b>{{ $acount++ }}. </b>{{ $answer['answer'] }}
                                <input type="radio" name="radio_{{$qcount-1}}" data-id="{{$qcount-1}}" class="select_ans" value="{{ $answer['id'] }}">
                            </p>
                        @endforeach

                    </div>
                    <br>
                @endforeach
                <div>
                    <input type="submit" class="btn btn-info">
                </div>
            </form>

            @else
                <h2 style="color:red;" class="text-center">Question & Answers not Available</h2>
            @endif 

        @else
        <h2 style="color:red;" class="text-center">{{ $msg }} </h2>
    @endif

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



