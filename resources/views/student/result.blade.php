@extends('layouts.app3')

@section('content')
<h2>Results</h2>
    <table class="table">
        <thead>
            <th>#</th>
            <th>Exam</th>
            <th>Result</th>
            <th>Nilai</th>
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
                                    <span style="color: green">Lulus</span>
                                @else
                                    <span style="color: red"><p>Tidak Lulus</p></span>
                                @endif
                            @endif
                        </td>
                        <td>
                            <span>{{ $attempt->marks }}</span>
                        </td>
                        <td>
                            @if($attempt->status == 0)
                                <span style="color: green">Pending</span>
                            @else
                               <a href="#" data-id="{{ $attempt->id }}" class="reviewExam" data-toggle="modal" data-target="#reviewQnaModal">Review QNA</a>
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

    <!-- Modal -->
    <div class="modal fade" id="reviewQnaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Review Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body review-qna">
                        Loading...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="explainationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Explaination</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <p id="explaination"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){

            $('.reviewExam').click(function(){

                var id = $(this).attr('data-id');

                $.ajax({
                    url:"{{ route('resultStudentQna') }}",
                    type:"GET",
                    data:{attempt_id:id},
                    success:function(data){
                    console.log(data);
                        var html = '';

                        if(data.success == true){

                            var data = data.data;
                            if(data.length > 0){

                                for(let i = 0; i < data.length; i++){
                                    
                                    let is_correct = '<span style="color:red;" class="fa fa-times"></span>';

                                    if(data[i]['answers']['is_correct'] == 1){
                                        is_correct = '<span style="color:green;" class="fa fa-check"></span>'; 
                                    }

                                    let answer = data[i]['answers']['answer'];

                                    html += `
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h6>Q(`+(i+1)+`). `+data[i]['question']['soal']+`</h6>
                                            <p>Ans: - `+answer+`  `+is_correct+`</p>`;

                                    if(data[i]['question']['explaination'] != null){
                                        html +=`<p><a href="#" data-explaination="`+data[i]['question']['explaination']+`" class="explaination" data-toggle="modal" data-target="#explainationModal">Explaination</a></p>`;
                                    }

                                    html +=`
                                                </div>
                                            </div>
                                    `;
                                }

                            }else{
                                html += `<h6>You didn't attempt any Question!</h6>`;
                            }

                        }else{
                            html += `<p>Having some issue on server side</p>`;
                        }

                        $('.review-qna').html(html);
                    }
                });
            });

            $(document).on('click','.explaination',function(){
                var explaination = $(this).attr('data-explaination');
                $('#explaination').text(explaination);
            });
        });
        </script>
@endsection