@extends('layouts.app2')

<head>
    <style>
        .table-borderless > tbody > tr > td,
        .table-borderless > tbody > tr > th,
        .table-borderless > tfoot > tr > td,
        .table-borderless > tfoot > tr > th,
        .table-borderless > thead > tr > td,
        .table-borderless > thead > tr > th {
            padding: 20px;
            color: black;
            border-bottom: 1px solid #ebedef;
        }

        tbody{
            font-size: 14px;
        }
    </style>
</head>

@section('content')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>Student Exam</h2>
        </div>
    </div>
</div>

<table class="table table-borderless">
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
                            <a href="#" class="reviewExam" data-id="{{ $attempt->id }}" data-toggle="modal" data-target="#reviewExamModal">Review & Approved</a>
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
<div style="padding-left: 50px; padding-top: 20px">
    {{ $attempts->links() }}
</div>

<!-- Modal -->
<div class="modal fade" id="reviewExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Review Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="reviewForm">
        @csrf
        <input type="hidden" name="attempt_id" id="attempt_id">
      <div class="modal-body review-exam">
        Loading...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary approved-btn">Approved</button>
      </div>
      </form>
    </div>
  </div>
</div>



<script>
    $(document).ready(function() {
        $('.reviewExam').click(function() {
            var id = $(this).attr('data-id');
            $('#attempt_id').val(id);

            $.ajax({
                url: "{{ route('reviewQna') }}",
                type: "GET",
                data: {attempt_id: id},
                success: function(data) {
                    var html = '';
                    if (data.success == true) {
                        var data = data.data;
                        if (data.length > 0) {
                        
                            for (let i = 0; i < data.length; i++) {
                                
                                if (data[i]['answers']['is_correct'] == 1) {
                                    isCorrect = '<span style="color: green" class="fa fa-check"></span>';
                                }else{
                                    isCorrect = '<span style="color: red" class="fa fa-times"></span>';
                                }

                                let answer = data[i]['answers']['answer'];

                                html += `
                                    <div style="padding-top: 15px" class="row">
                                        <h6>Q(` + (i + 1) + `). ` + data[i]['question']['soal'] + `</h6>
                                    </div>
                                    <div style="padding-top: 15px">
                                        <p>Answer: - ` + answer + ` ` + isCorrect + `</p>
                                    </div>
                                            
                                    
                                `;
                            }
                        } else {
                            html += `<h6>Student has not attempted</h6>
                                    <p>If you approve this Exam, the student will fail!</p>`;
                        }
                    } else {
                        html += `<p>Having some server issue!</p>`;
                    }

                    $('.review-exam').html(html);
                }
            });
        });

        //approved exam
        $('#reviewForm').submit(function(event){
            event.preventDefault();

            $('.approved-btn').html('Please wait <i class="fa fa-spinner fa-spin"></i>');

            var formData = $(this).serialize();

            $.ajax({
                url:"{{ route('approvedQna') }}",
                type:"POST",
                data:formData,
                success:function(data){
                   if(data.success == true){
                    location.reload();
                   }else{
                    alert(data.msg);
                   }
                }

            });
        });
        
    });
</script>

@endsection