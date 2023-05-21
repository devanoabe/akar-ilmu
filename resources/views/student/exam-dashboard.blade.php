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
            <form action="{{ route('examSubmit') }}" method="POST" class="mb-5" onsubmit="return isValid()">
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
    $(document).ready(function(){
        $('.select_ans').click(function() {
            var no = $(this).attr('data-id');
            $('#ans_'+no).val($(this).val());
        });
        var time = @json($time);
       $('.time').text(time[0]+':'+time[1]+':00 Left time');
       
       var seconds = 60;
       var hours = time[0];
       var minutes = time[1];
       
       setInterval(() => {

            if(seconds <= 0){
                minutes--;
                seconds = 60;
            }
            if(minutes <= 0){
                hours--;
                minutes = 59;
                seconds = 60;
            }

            let tempHours = hours.toString().length > 1 ? hours:'0'+hours;
            let tempMinutes = minutes.toString().length > 1 ? minutes:'0'+minutes;
            let tempSeconds = seconds.toString().length > 1 ? seconds:'0'+seconds;

            $('.time').text(tempHours+':'+tempMinutes+':'+tempSeconds+'Left time');
            seconds--;

       }, 1000);
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



