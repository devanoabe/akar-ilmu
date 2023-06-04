@extends('layouts.app')

@section('content')
<h2>Results</h2>
    <table class="table">
        <thead>
            <th>#</th>
            <th>Exam</th>
            <th>Result</th>
            <th>Status</th>
        </thead>

        <tbody>
            @if(count($attempts) > 0)
                @php $count =1; @endphp
                @foreach($attempts as $attempt)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $attempt->exam->exam_name }}</td>
                        <td>
                            @if($attempt->status == 0)
                                not declared
                            @else
                                @if($attempt->marks >= $attempt->exam->pass_marks)
                                    <span style="color: green">Passed</span>
                                @else
                                    <span style="color: red">Failed</span>
                                @endif
                            @endif
                        </td>
                        <td>
                            @if($attempt->status == 0)
                                <span style="color: green">Pending</span>
                            @else
                               <a href="#" data-id="{{ $attempt->id }}">Review QNA</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else

                <tr>
                    <td colspan="8">Anda belum mengerjakan</td>
                </tr>
            @endif
        </tbody>
    </table>
</script>
@endsection