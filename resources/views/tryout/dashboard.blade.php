@extends('layouts.app2')
@section('content')
<h2 class="mb-4">Tryout</h2>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExamModal">
    Add Tryout
</button>

<table class="table">
    <thead>
        <th>#</th>
        <th>Exam Name</th>
        <th>Subject</th>
        <th>Keterangan</th>
        <th>Time</th>
        <th>Add Questions</th>
        <th>Show Questions</th>
        <th>Edit</th>
        <th>Hapus</th>
        <th>Copy Link</th>
    </thead>
    <tbody>
        @if(count($exams)>0)
            @foreach($exams as $exam)
            <tr>
                <td>{{$exam->id}}</td>
                <td>{{$exam->exam_name}}</td>
                <td>{{$exam->subjects[0]['namaMapel']}}</td>
                <td>{{$exam->keterangan}}</td>
                <td>{{$exam->time}}</td>
                <td>
                    <a href="#" class="addQuestion" data-id="{{ $exam->id }}" data-toggle="modal" data-target="#addQnaModal">Add Question</a>
                </td>
                <td>
                    <a href="#" class="seeQuestions" data-id="{{ $exam->id }}" data-toggle="modal" data-target="#seeQnaModal">See Question</a>
                </td>
                <td>
                    <button class="btn btn-info editButton" data-id="{{$exam->id}}" data-toggle="modal" data-target="#editExamModal">Edit</button>
                </td>
                <td>
                    <button class="btn btn-danger deleteButton" data-id="{{$exam->id}}" data-toggle="modal" data-target="#deleteExamModal">Delete</button>
                </td>
                <td><a href="#" data-code="{{ $exam->keterangan }}" class="copy"><i class="fa fa-copy"></i></a></td>
            </tr>
            @endforeach 
        @else
        <tr>
            <td colspan="3">Question & Answer belum ada</td>
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


<div class="modal fade" id="addExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addExam">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input class="mb-3" type="text" name="exam_name" placeholder="Masukan Nama Tryout" required>
                        <br>
                        <select name="subject_id" required class="w-100 mb-3">
                            <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->namaMapel }}</option>
                                @endforeach
                        </select>
                        <input class="w-100 mb-3" type="text" name="keterangan" placeholder="Keterangan" required>
                        <input class="w-100 mb-3" type="time" name="time" required>
                    </div>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Exam</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editExam">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="exam_id" id="exam_id">
                        <input type="text" name="exam_name" id="exam_name" placeholder="Masukan Nama Tryout" required>
                        <br>
                        <select name="subject_id" id="subject_id" required class="w-100 mb-3">
                            <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->namaMapel }}</option>
                                @endforeach
                        </select>
                        <input class="w-100 mb-3" type="text" name="keterangan" id="keterangan" placeholder="Keterangan" required>
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
            url:"{{ route('getExamQuestions') }}",
            type:"GET",
            data:{exam_id:id},
            success:function(data){
                
                var html = '';
                var questions = data.data;
                if(questions.length > 0){
                    
                    for(let i = 0; i < questions.length; i++){
                        console.log(questions[i]['question'][0]);
                        html +=`
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
                else{
                    html +=`
                    <tr>
                        <td colspan="1">Questions not available!</td>
                    </tr>
                    `;
                }
                $('.seeQuestionTable').html(html);
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