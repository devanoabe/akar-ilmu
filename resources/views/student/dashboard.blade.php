@extends('layouts.app')

@section('content')
<h2>Exams</h2>
    <table class="table">
        <thead>
            <th>#</th>
            <th>Exam Name</th>
            <th>Mata Pelajaran</th>
            <th>Time</th>
            <th>Keterangan</th>
        </thead>

        <tbody>
            @if(count($exams) > 0)
                @php $count =1; @endphp
                @foreach($exams as $exam)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $exam->exam_name }}</td>
                        <td>{{ $exam->subjects[0]['namaMapel'] }}</td>
                        <td>{{ $exam->time }}</td>
                        <td>{{ $exam->keterangan }} Time</td>
                    </tr>
                @endforeach
            @else

                <tr>
                    <td colspan="8">No Exams Available</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection