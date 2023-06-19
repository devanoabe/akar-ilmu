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

<div style="border-radius: 28px" class="card p-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2 style="font-weight: bolder">Nilai</h2>
            </div>
        </div>
    </div>

    <table class="table table-borderless">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Tryout</th>
                <th>Nilai/Soal</th>
                <th>Nilai Total</th>
                <th>KKM</th>
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
                        <td>{{ $exam->pass_marks }}</td>
                        <td>
                            <button style="background-color: black; color: white" class="btn editMarks" data-id="{{ $exam->id }}" data-pass-marks="{{ $exam->pass_marks }}" data-marks="{{ $exam->marks }}" data-totalq="{{ count($exam->getQnaExam) }}" data-toggle="modal" data-target="#editMarksModal">Edit</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Exams not added!</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="modal fade" id="editMarksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nilai</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editMarks">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-4">
                                <label>Nilai/Soal</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="hidden" name="exam_id" id="exam_id">
                                <input type="text" 
                                    onkeypress="return event.charCode >=48 && event.charCode<=57 || event.charCode == 46"
                                name="marks" placeholder="Enter Marks/Q" id="marks" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-4">
                                <label>Total Nilai</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" disabled placeholder="Total Marks" id="tmarks">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-4">
                                <label>KKM</label>
                            </div>
                            <div class="col-sm-6">
                            <input type="text" 
                                    onkeypress="return event.charCode >=48 && event.charCode<=57 || event.charCode == 46"
                                name="pass_marks" placeholder="Enter Passing Marks" id="pass_marks" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Nilai</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>


    <script>
        $(document).ready(function(){
            var totalQna = 0;
            $('.editMarks').click(function(){

                var exam_id = $(this).attr('data-id');
                var marks = $(this).attr('data-marks');
                var totalq = $(this).attr('data-totalq');

                $('#marks').val(marks);
                $('#exam_id').val(exam_id);
                $('#tmarks').val((marks*totalq).toFixed(1));

                totalQna = totalq;

                $('#pass_marks').val($(this).attr('data-pass-marks'));

            });

            $('#marks').keyup(function(){

                $('#tmarks').val( ($(this).val()*totalQna).toFixed(1) );

            });

            $('#pass_marks').keyup(function(){

                $('.pass-error').remove();
                var tmarks = $('#tmarks').val();
                var pmarks = $(this).val();

                if(parseFloat(pmarks) >= parseFloat(tmarks)){
                    $(this).parent().append('<p style="color:red;" class="pass-error">Passing Marks will be less than total marks!</p>');
                    setTimeout(() => {
                        $('.pass-error').remove();
                    }, 2000);
                }
            });

            $('#editMarks').submit(function(event){
                event.preventDefault();
                
                $('.pass-error').remove();
                var tmarks = $('#tmarks').val();
                var pmarks = $('#pass_marks').val();

                if(parseFloat(pmarks) >= parseFloat(tmarks)){
                    $('#pass_marks').parent().append('<p style="color:red;" class="pass-error">Passing Marks will be less than total marks!</p>');
                    setTimeout(() => {
                        $('.pass-error').remove();
                    }, 2000);

                    return false;
                }

                var formData = $(this).serialize();

                $.ajax({
                    url:"{{ route('updateMarks') }}",
                    type:"POST",
                    data:formData,
                    success:function(data){
                        if(data.success == true){
                            location.reload();
                        }
                        else{
                            alert(data.msg);
                        }
                    }
                });

            });

        });
    </script>

@endsection
