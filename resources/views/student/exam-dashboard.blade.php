{{-- <h1>aaa</h1> --}}

@extends('layouts.app')

@section('content')
{{-- <p style="color:black">Welcome, {{ Auth::user()->name }}</p> --}}
<p class="text-center">Tryout  :  {{ $exam[0]['exam_name'] }}</p>
@if($success == true)

@if(count($qna) > 0)
    @php $qcount = 1; @endphp
@foreach($qna as $data)
<h5>Q. {{ $qcount++ }}. {{ $data['question'][0]['question'] }}</h5>

@php $acount = 1; @endphp
@foreach($data['question'][0]['answers'] as $answer)
<p><b>{{ $acount++ }}. </b>{{ $answer['answer'] }}</p>
@endforeach
<br>
@endforeach
@else
<h2 style="color:red;" class="text-center">Question & Answers not Available</h2>
@endif 
@else
<h2 style="color:red;" class="text-center">{{ $msg }} </h2>
@endif



@endsection

{{-- <p style="color:black">Welcome, {{ Auth::user()->name }}</p>
    <p class="text-center">{{ $exam[0]['exam_name'] }}</p>
    @if($success == true)
    @else
    <h3 style="color:red;" class="text-center">{{ $msg }} </h3>
    @endif --}}
