@extends('layouts.app3')
<head>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Alice&family=Nanum+Gothic&family=Roboto+Flex&display=swap');
    </style>
    <link rel="stylesheet" href="{{ asset('css/rsl.css') }}">
</head>

@section('content')
<div class="row">
    <div style="border-radius: 28px" class="card col-12 p-4">
            <h3 class="d-flex flex-row-reverse judul">
            <i style="color: orange" class="fa fa-circle" aria-hidden="true"></i>
            <i style="color: green" class="fa fa-circle ml-2" aria-hidden="true"></i>
            Result
            </h3>
            <hr style="border-color: #858180;"  class="sidebar-divider my-3">
        <div class="row">
            <div class="col-3">
                <div class="image-prof">
                    <img src="{{ asset('images/faces/2.jpg') }}">
                </div> 
            </div>
            <div class="col-9 kanan">
                <h4>Hi, {{ Auth::user()->name }}!</h4>
                <h6><i class="fa fa-envelope mr-3" aria-hidden="true"></i>{{ Auth::user()->email }}</h6>
                <h6><i class="fa fa-phone mr-3" aria-hidden="true"></i>{{ Auth::user()->telepon }}</h6>
                <h6><i class="fa fa-user mr-3" aria-hidden="true"></i>{{ Auth::user()->username }}</h6>
                <div class="row pt-3">
                    <div class="col-3 icon">
                        <i style="background-color: #008374; color: white" class="fa fa-cube" aria-hidden="true"></i>
                        <span>
                            {{ $tryout }}
                        </span>
                        <br>
                        <h3>
                            Total Tryout
                        </h3>
                    </div>
                    <div class="col-3 icon">
                        <i style="background-color: #fef7ec; color: #fcb03b" class="fa fa-check-square" aria-hidden="true"></i>
                        <span>
                            {{ $userAttempts }}
                        </span>
                        <br>
                        <h3>
                            Total Selesai
                        </h3>
                    </div>
                    <div class="col-3 icon">
                        <i style="background-color: #f85a40; color: white" class="fa fa-book" aria-hidden="true"></i>
                        <span>
                            {{ $passedAttempts }}
                        </span>
                        <br>
                        <h3>
                            Total Lulus 
                        </h3>
                    </div>
                    <div class="col-3 icon">
                        <i style="background-color: #eaf9f1; color: #21b573" class="fa fa-check-square" aria-hidden="true"></i>
                        <span>
                            {{ $highestScore }}
                        </span>
                        <br>
                        <h3>
                            Nilai Tertinggi
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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