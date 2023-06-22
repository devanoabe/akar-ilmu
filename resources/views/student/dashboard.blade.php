@extends('layouts.app3')

<head>
    <link rel="stylesheet" href="{{ asset('css/dbs.css') }}">
</head>

@section('content')

<div class="row">
    <div class="col-12">
        <h3>Tryouts</h3>
    </div>
</div>


<div class="main">
  <ul class="cards">
    @if(count($exams) > 0)
    @php $count =1; @endphp
    @foreach($exams as $exam)
    <li class="cards_item">
      <div class="card">
        <div class="card_image">
            <img src="{{ asset('images/coba.png') }}">
        </div>
        <div class="card_content">
          <h2 class="card_title">{{ $exam->exam_name }}</h2>
          <div class="card_text">
            <p>{{ $exam->subjects[0]['namaMapel'] }}</p>
            <p>{{ $exam->time }}</p>
            <p>{{ $exam->keterangan }}</p>
            <p><a href="#" data-code="{{ $exam->entrance_id }}" class="copy"><i class="fa fa-copy"></i></a></p>
          </div>
        </div>
      </div>
    </li>
    @endforeach
    @else
        <tr>
            <td colspan="8">No Exams Available</td>
        </tr>
    @endif
  </ul>
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