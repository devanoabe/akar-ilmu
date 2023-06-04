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
                        <td><a href="#" data-code="{{ $exam->entrance_id }}" class="copy"><i class="fa fa-copy"></i></a></td>
                    </tr>
                @endforeach
            @else

                <tr>
                    <td colspan="8">No Exams Available</td>
                </tr>
            @endif
        </tbody>
    </table>

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