@extends('layouts.app2')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>Student Exam</h2>
        </div>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name Siswa</th>
            <th>Exam</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($attempts) > 0)
            @php $x = 1; @endphp
            @foreach($attempts as $attempt)
                <tr>
                    <td>{{ $x++ }}</td>
                    <td>{{ $attempt->user->name }}</td>
                    <td>{{ $attempt->exam->exam_name }}</td>
                    <td>
                        @if($attempt->status == 0)
                            <span style="color:red">Pending</span>
                        @else
                            <span style="color:green">Approved</span>
                        @endif
                    </td>
                    <td>
                        @if($attempt->status == 0)
                            <a href="#">Review & Approved</a>
                        @else
                            Completed
                        @endif
                    </td>
                </tr>
            @endforeach

        @else
            <tr>
                <td colspan="5">Student not Attempt Exams!</td>
            </tr>
        @endif
    </tbody>
</table>


@endsection