@extends('layouts.app2')



@section('content')

<div class="row">
    <div style="border-radius: 28px" class="card col-8 p-4">
        <h2 style="font-weight: bolder"class="mb-4">Soal</h2>
        <div class="d-flex flex-row justify-content-end mb-2">
            <button style="background-color: black; border: none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addQnaModal">
                Tambah Soal & Jawaban
            </button>
        </div>

        <table class="table table-borderless">
            <thead style="font-weight: bolder; color: black">
                <th>Id</th>
                <th style="width: 480px">Soal</th>
                <th>Jawaban</th>
                <th style="text-align: right">Action</th>
            </thead>
            <tbody>
                @if(count($questions)>0)
                    @foreach($questions as $q)
                    <tr>
                        <td>{{$q->id}}</td>
                        <td>{{$q->soal}}</td>
                        <td>
                            <a href="" class="ansButton" data-id="{{$q->id}}" data-toggle="modal" data-target="#showAnsModal">See Answer</a>
                        </td>
                        <td style="text-align: right">
                            <button class="btn editButton" data-id="{{$q->id}}" data-toggle="modal" data-target="#editQnaModal">
                                <i class="fa fa-align-justify" aria-hidden="true"></i>
                            </button>
                            <button class="btn deleteButton" data-id="{{$q->id}}" data-toggle="modal" data-target="#deleteQnaModal">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
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

    <div class="col-4 pl-4">
        <div style="border-radius: 28px" class="card p-4">
            <h5 style="font-weight: bolder">Cari Soal</h5>
            <form action="{{ route('cariSoal') }}" method="POST">
            @csrf
                <div class="d-flex flex-row">
                    <input style="background-color: #f8f9fa;" type="text" value="{{ (request()->cari) ? request()->cari : '' }}" name="cari" class="form-control">
                    <button style="background-color: black; border: none" type="submit" class="btn btn-primary ml-4">Cari</button>
                </div>
            </form>
            <hr>
            <div class="row pl-3">
                <div class="icon pr-3">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
            </div>
            <p>* Jumlah soal yang tersimpan</p>
        </div>
    </div>
</div>

 
<div class="modal fade" id="addQnaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Soal</h5>

                <button style="background-color: black; border: none" id="addAnswer" class="ml-5 btn btn-info">Tambah Pilihan</button>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addQna">
                @csrf
                <div class="modal-body addModalAnswers p-4">
                    <div class="row">
                        <div class="col">   
                            <h6>Masukan Soal : </h6>
                            <input type="text" class="w-100" name="question" placeholder="Tambah Soal" required>
                        </div>
                    </div>
                    <div class="row mt-4 mb-3">
                        <div class="col">
                            <h6>Masukan Penjelasan : </h6>
                            <textarea name="explaination" class="w-100" placeholder="Tambah Penjelasan(Optional)"></textarea>
                        </div>
                    </div>
                    <h6>Masukan Jawaban (Klik Tambah):</h6>
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

<div class="modal fade" id="showAnsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Jawaban</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Jawaban</th>
                            <th>Benar</th>
                        </thead>
                        <tbody class="showAnswers">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <span class="error" style="color:red;"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editQnaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update QnA</h5>

                <button style="background-color: black; border: none" id="addEditAnswer" class="ml-5 btn btn-info">Tambah Pilihan</button>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editQna">
                @csrf
                <div class="modal-body editModalAnswers  p-4">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="question_id" id="question_id">
                            <h6>Soal : </h6>
                            <input type="text" class="w-100" name="question" id="question" placeholder="Enter Question" required>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <h6>Penjelasan : </h6>
                           <textarea name="explaination" id="explaination" class="w-100" placeholder="Enter your explaination(Optional)"></textarea>
                        </div>
                    </div>
                    <h6>Jawaban : </h6>
                </div>
                <div class="modal-footer">
                    <span class="editError" style="color:red;"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update QnA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteQnaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Qna</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteQna">
                @csrf
                <div class="modal-body">
                            <input type="hidden" name="id" id="delete_qna_id">
                            <p>are your sure you want to Delete exQna?</p>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
    //form submission
    $("#addQna").submit(function(e){
        e.preventDefault();

        if($(".answers").length < 2){
            $(".error").text("Minimum 2 Jawaban");
            setTimeout(function(){
                $(".error").text("");
            },2000);
        } else {
            // do something else if there are at least 2 answers
            var checkIsCorrect = false;

            for(let i = 0; i < $(".is_correct").length; i++ ){
                if( $(".is_correct:eq("+i+")").prop('checked') == true )
                {
                    checkIsCorrect = true;
                    $(".is_correct:eq("+i+")").val( $(".is_correct:eq("+i+")").next().find('input').val() );
                }
            }
            if (checkIsCorrect) {
                
                var formData = $(this).serialize();

                $.ajax({
                    url:"{{ route('addQna') }}",
                    type:"POST",
                    data:formData,
                    success:function(data){
                        console.log(data); 
                        if(data.success == true){
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });

            } else {
                $(".error").text("Please select anyone correct answer");
                setTimeout(function(){
                    $(".error").text("");
                },2000);
            }
        }
    });
    //add answer
    $("#addAnswer").click(function(){

        if($(".answers").length >= 6){
            $(".error").text("Maximum 6 Jawaban");
            setTimeout(function(){
                $(".error").text("");
            },2000);
        } else {
            var html ='<div class="row mt-2 answers"><input type="radio" name="is_correct" class="is_correct"><div class="col"><input type="text" class="w-100" name="answers[]" placeholder="Enter Answer" required></div><button class="btn btn-danger removeButton">Remove</button></div>';

            $(".addModalAnswers").append(html);
        }
    });
    $(document).on("click",".removeButton", function(){
        $(this).parent().remove();
    });

    //show answer
    $(".ansButton").click(function(){
        var questions = @json($questions);
        var qid = $(this).attr('data-id');
        var html = '';

        for(let i=0; i<questions.length;i++){
            if(questions[i]['id'] == qid){
                var answersLength = questions[i]['answers'].length;
                for(let j =0; j < answersLength; j++){
                    let is_correct = questions[i]['answers'][j]['is_correct'];
                    let color = is_correct == 1 ? 'green' : 'red';
                    let is_correct_text = is_correct == 1 ? 'Yes' : 'No';
                    html += '<tr style="color: '+color+';"><td>'+(j+1)+'</td><td>'+questions[i]['answers'][j]['answer']+'</td><td>'+is_correct_text+'</td></tr>';
                }
                break;
            }
        }

        $('.showAnswers').html(html);
    });

    //edit q&a answer
    $("#addEditAnswer").click(function(){
            if($(".editAnswers").length >= 6){
            $(".editError").text("Maximum 6 Jawaban");
            setTimeout(function(){
                $(".editError").text("");
            },2000);
            } else {
            var html ='<div class="row mt-3 editAnswers"><input type="radio" name="is_correct" class="edit_is_correct"><div class="col"><input type="text" class="w-100" name="new_answers[]" placeholder="Enter Answer" required></div><button class="btn btn-danger removeButton">Remove</button></div>';

            $(".editModalAnswers").append(html);
            }
        });
        $(document).on("click",".removeButton", function(){
            $(this).parent().remove();
        });

        $(".editButton").click(function(){
            var qid = $(this).attr('data-id');

            $.ajax({
                url:"{{ route('getQnaDetails') }}",
                type:"GET",
                data:{qid:qid},
                success:function(data){
                    //console.log(data);
                    var qna = data.data[0];
                    $("#question_id").val(qna['id']);
                    $("#question").val(qna['soal']);
                    $("#explaination").val(qna['explaination']);
                    $(".editAnswers").remove();

                    var html = '';

                    for(let i = 0; i < qna['answers'].length; i++){

                        var checked = '';
                        if(qna['answers'][i]['is_correct'] == 1){
                            checked = 'checked';
                        }

                        html += '<div class="row mt-3 editAnswers"><input type="radio" name="is_correct" class="edit_is_correct"'+checked+'><div class="col"><input type="text" class="w-100" name="answers['+qna['answers'][i]['id']+']" placeholder="Enter Answer" value="'+qna['answers'][i]['answer']+'" required></div><button class="btn btn-danger removeButton removeAnswer" data-id="'+qna['answers'][i]['id']+'">Remove</button></div>';

                    }
                    $(".editModalAnswers").append(html);
                }
            });
        });

        //update Qna submission
        $("#editQna").submit(function(e){
        e.preventDefault();

        if($(".editAnswers").length < 2){
            $(".editError").text("Minimum 2 Jawaban");
            setTimeout(function(){
                $(".editError").text("");
            },2000);
        } else {
            // do something else if there are at least 2 answers
            var checkIsCorrect = false;

            for(let i = 0; i < $(".edit_is_correct").length; i++ ){
                if( $(".edit_is_correct:eq("+i+")").prop('checked') == true )
                {
                    checkIsCorrect = true;
                    $(".edit_is_correct:eq("+i+")").val( $(".edit_is_correct:eq("+i+")").next().find('input').val() );
                }
            }
            if (checkIsCorrect) {
                
                var formData = $(this).serialize();
                
                $.ajax({
                    url:"{{ route('updateQna') }}",
                    type:"POST",
                    data:formData,
                    success:function(data){
                        if(data.success == true){
                            location.reload();
                        }else{
                            alert(data.msg)
                        }
                    }
                });

            } else {
                $(".editError").text("Please select anyone correct answer");
                setTimeout(function(){
                    $(".editError").text("");
                },2000);
            }
        }
    });

    //remove answer
    $(document).on('click', '.removeAnswer', function(){
        var ansId = $(this).attr('data-id');
        $.ajax({
            url:"{{ route('deleteAns') }}",
            type:"GET",
            data:{ id:ansId },
            success:function(data){
                if(data.success == true){
                    console.log(data.msg);
                }else{
                    alert(data.msg)
                }
            }
        });
    });

    //delete Q&a
    $(".deleteButton").click(function(){
        var id = $(this).attr('data-id');
        $('#delete_qna_id').val(id);
    });

    $('#deleteQna').submit(function(e){
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url:"{{ route('deleteQna') }}",
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
    }
    )
    

});

        
</script>

@endsection
