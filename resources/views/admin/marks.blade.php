@extends('layouts.app2')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>Marks</h2>
        </div>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Exam Name</th>
            <th>Marks/Q</th>
            <th>Total Marks</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @if(count($exams) > 0)
        @php $x = 1; @endphp
            @foreach($exams as $exam)
                <tr>
                    <td>{{ $x++ }}</td>
                    <td>{{ $exam->exam_name }}</td>
                    <td>{{ $exam->marks }}</td>
                    <td>{{ count($exam->getQnaExam) * $exam->marks }}</td>
                    <td>Edit Button</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">Exams not added!</td>
            </tr>
        @endif
    </tbody>
</table>

@endsection
