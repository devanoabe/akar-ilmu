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

<div style="border-radius: 28px;" class="card p-4">
    <div class="row">
        <h2 style="font-weight: bolder" class="mb-4 pl-3">Tryout</h2>
        <button style="width: 10%; background-color: black; border: none" type="button" class="btn btn-primary ml-auto mb-3 mr-3" data-toggle="modal" data-target="#addExamModal">
            <i class="fa fa-plus pr-2" aria-hidden="true"></i>Tambah
        </button>
    </div>

    <table class="table table-borderless">
        <thead>
            <th>Id</th>
            <th width=230px>Nama Tryout</th>
            <th>Keterangan</th>
            <th>Time</th>
            <th>Tambah</th>
            <th>Lihat</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if(count($exams)>0)
                @foreach($exams as $exam)
                <tr>
                    <td>{{$exam->id}}</td>
                    <td>
                        <p style="font-weight: bolder" class="mb-0">{{$exam->exam_name}}</p>
                        <span style="color: #908796">Mapel : </span>{{$exam->subjects[0]['namaMapel']}}
                    </td>
                    <td style="color: #908796; font-size: 12px">{{$exam->keterangan}}</td>
                    <td>
                        <span style="color: #908796;"><i class="fa fa-cloud pr-2" aria-hidden="true"></span></i>{{$exam->time}}
                        <br>
                        {{$exam->date}}
                    </td>
                    <td>
                        <a href="#" class="addQuestion" data-id="{{ $exam->id }}" data-toggle="modal" data-target="#addQnaModal">Add Question</a>
                    </td>
                    <td>
                        <a href="#" class="seeQuestions" data-id="{{ $exam->id }}" data-toggle="modal" data-target="#seeQnaModal">See Question</a>
                    </td>
                    <td>
                        <button class="btn editButton" data-id="{{$exam->id}}" data-toggle="modal" data-target="#editExamModal">
                            <i class="fa fa-align-justify" aria-hidden="true"></i>
                        </button>
                        <button class="btn deleteButton" data-id="{{$exam->id}}" data-toggle="modal" data-target="#deleteExamModal">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        <a href="#" id="seeQuestion" data-code="{{ $exam->entrance_id }}" class="copy" data-toggle="modal" data-target="#seeQModal">
                            <i class="fa fa-copy"></i>
                        </a>
                    </td>
                </tr>
                @endforeach 
            @else
            <tr>
                <td colspan="3">Question & Answer belum ada</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

<div class="pagination">
    {{ $exams->links() }}
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


<div class="modal fade" id="addExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-weight: bolder" class="modal-title" id="exampleModalLongTitle">Tambah Tryout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addExam">
                @csrf
                <div class="modal-body p-5">
                        <h6>Nama Tryout : </h6>
                        <input class="mb-3 w-100" type="text" name="exam_name" required>
                        <br>
                        <h6>Mata Pelajaran : </h6>
                        <select name="subject_id" required class="w-100 mb-3 p-2">
                            <option class="p-2" value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->namaMapel }}</option>
                                @endforeach
                        </select>
                        <h6>Tanggal Pelaksanaan : </h6>
                        <input class="w-100 mb-3" type="date" name="date" required min="@php echo date('Y-m-d'); @endphp">
                        <h6>Keterangan : </h6>
                        <input class="w-100 mb-3" type="text" name="keterangan" required>
                        <h6>Waktu Pelaksanaan : </h6>
                        <input class="w-100 mb-3" type="time" name="time" required min="00:00" step="60">
                </div>
                <div class="modal-footer">
                    <span class="error" style="color:red;"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add QnA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-weight: bolder" class="modal-title" id="exampleModalLongTitle">Edit Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editExam">
                @csrf
                <div class="modal-body p-5">
                    <input type="hidden" name="exam_id" id="exam_id">
                        <h6>Nama Tryout : </h6>
                        <input type="text" name="exam_name" id="exam_name" placeholder="Masukan Nama Tryout" class="w-100" required>
                        <br>
                        <h6 class="mt-3">Mata Pelajaran : </h6>
                        <select name="subject_id" id="subject_id" required class="w-100 mb-3 p-2">
                            <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->namaMapel }}</option>
                                @endforeach
                        </select>
                        <h6>Tanggal Pelaksanaan : </h6>
                        <input class="w-100 mb-3" type="date" name="date" id="date" required min="@php echo date('Y-m-d'); @endphp">
                        <h6>Keterangan : </h6>
                        <input class="w-100 mb-3" type="text" name="keterangan" id="keterangan" placeholder="Keterangan" required>
                        <h6>Waktu Pelaksanaan : </h6>
                        <input class="w-100 mb-3" type="time" name="time" id="time" required>
                </div>
                <div class="modal-footer">
                    <span class="error" style="color:red;"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit QnA</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Exam</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteExam">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="exam_id" id="deleteExamId">
                    <p>Yakin ingin menghapus</p>
                </div>
                <div class="modal-footer">
                    <span class="error" style="color:red;"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addQnaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add QnA</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addQna">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="exam_id" id="addExamId">
                    <input type="search" name="search" id="search" onkeyup="searchTable()" class="w-100" placeholder="Search Here">
                    <br><br>
                    <table class="table" id="questionsTable">
                        <thead>
                            <th>Select</th>
                            <th>Question</th>
                        </thead>
                        <tbody class="addBody">

                        </tbody>
                    </table>
                    <!-- <select name="questuions" multiple multiselect-search="true" multiselect-select-all="true" onchange="console.log(this.selectedOptions)">
                        <option value="">Select Questions</option>
                        <option value="Soal1">Soal1</option>
                        <option value="Soal2">Soal2</option>
                        <option value="Soal3">Soal3</option>
                        <option value="Soal4">Soal4</option>
                    </select> -->
                </div>
                <div class="modal-footer">
                    <span class="error" style="color:red;"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add QnA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="seeQModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Questions</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Question</th>
                            <th>Action</th>
                        </thead>
                        <tbody class="seeQuestionTable">
                        </tbody>
                    </table>
                    <!-- <select name="questuions" multiple multiselect-search="true" multiselect-select-all="true" onchange="console.log(this.selectedOptions)">
                        <option value="">Select Questions</option>
                        <option value="Soal1">Soal1</option>
                        <option value="Soal2">Soal2</option>
                        <option value="Soal3">Soal3</option>
                        <option value="Soal4">Soal4</option>
                    </select> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
    </div>
</div>

<div class="modal fade" id="seeQnaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Questions</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Question</th>
                            <th>Action</th>
                        </thead>
                        <tbody class="seeQuestionTable">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
    </div>
</div>

<script>
$(document).ready(function(){

        //form submission
        $("#addExam").submit(function(e){
            e.preventDefault();
                    
            var formData = $(this).serialize();

            $.ajax({
                url: "{{ route('addExam') }}",
                type: "POST",
                data: formData,
                success: function(data){
                    if(data.success == true){
                        location.reload();
                    } else {
                        alert(data.msg);
                    }
                }
            });

        });

        //edit
        $(".editButton").click(function(){
            var id = $(this).attr('data-id');
            $("#exam_id").val(id);

            var url = '{{ route("getExamDetails", "id") }}';
            url = url.replace('id', id);

            $.ajax({
                url: url,
                type: "GET",
                success: function(data){
                    if (data.success == true) {
                        var exam = data.data;
                        $("#exam_name").val(exam[0].exam_name);
                        $("#subject_id").val(exam[0].subject_id);
                        $("#keterangan").val(exam[0].keterangan);
                        $("#date").val(exam[0].date);
                        $("#time").val(exam[0].time);
                    } else {
                        alert(data.msg);
                    }
                }
            });
        });

        $("#editExam").submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('updateExam') }}",
            type: "POST",
            data: formData,
            success: function(data) {
                if (data.success == true) {
                    location.reload();
                } else {
                    alert(data.msg);
                }
            }
        });
    });

    $(".deleteButton").click(function(){
        var id = $(this).attr('data-id');
        $('#deleteExamId').val(id);
    });

    $("#deleteExam").submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('deleteExam') }}",
            type: "POST",
            data: formData,
            success: function(data) {
                if (data.success == true) {
                    location.reload();
                } else {
                    alert(data.msg);
                }
            }
        });
    });

    //add question
    $('.addQuestion').click(function(){

        var id = $(this).attr('data-id');
        $('#addExamId').val(id);

        $.ajax({
            url:"{{ route('getQuestions') }}",
            type:"GET",
            data:{exam_id:id},
            success: function(data) {
                if (data.success == true) {
                    var questions = data.data;
                    var html = '';

                    if (questions.length > 0) {
                        for (let i = 0; i < questions.length; i++) {
                            html += '<tr><td><input type="checkbox" value="' + questions[i]['id'] + '" name="questions_ids[]"></td> <td>' + questions[i]['questions'] + '</td> </tr>';
                        }
                    } else {
                        html += '<tr><td colspan="2">Soal Tidak Tersedia</td></tr>';
                    }

                    $('.addBody').html(html);
                } else {
                    alert(data.msg);
                }
            }
        });

    });

    $("#addQna").submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('addQuestions') }}",
            type: "POST",
            data: formData,
            success: function(data) {
                if (data.success == true) {
                    location.reload();
                } else {
                    alert(data.msg);
                }
            }
        });
    });

    //see questions
    $('.seeQuestions').click(function(){
        var id = $(this).attr('data-id');

        $.ajax({
            url: "{{ route('getExamQuestions') }}",
            type: "GET",
            data: {exam_id: id},
            success: function(data){
                var html = '';
                var questions = data.data;
                
                if (questions.length > 0){
                    for (let i = 0; i < questions.length; i++){
                        html += `
                        <tr>
                            <td>` + (i + 1) + `</td>
                            <td>` + questions[i]['question'][0]['soal'] + `</td>
                            <td>
                                <button class="btn btn-danger deleteQuestion" data-id="` + questions[i]['id'] + `">Delete</button>
                            </td>
                        </tr>
                        `;
                    }
                }
                else {
                    html += `
                    <tr>
                        <td colspan="1">Questions not available!</td>
                    </tr>
                    `;
                }
                
                $('.seeQuestionTable').html(html);
                
                // Show the modal
                $('#seeQModal').modal('show');
            }
        });
    });


    //delete question
    $(document).on('click', '.deleteQuestion', function() {
    var id = $(this).attr('data-id');
    var obj = $(this);
    $.ajax({
        url: "{{ route('deleteExamQuestions') }}",
        type: "GET",
        data: { id: id },
        success: function(data) {
            if (data.success == true) {
                obj.parent().parent().remove();
            } else {
                alert(data.msg);
            }
        }
    });
});

});

function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('search');
    filter = input.value.toUpperCase();
    table = document.getElementById('questionsTable');
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>

@endsection