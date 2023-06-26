@extends('layouts.app3')
<head>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Alice&family=Nanum+Gothic&family=Roboto+Flex&display=swap');
    </style>
    <link rel="stylesheet" href="{{ asset('css/rsl.scss') }}">
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

@if(count($attempts) > 0)
  @php $count =1; @endphp
  <div class="row d-flex pt-3">
    @foreach($attempts as $attempt)
      <div class="col-3 pb-5">
        <div class="box">
          <div class="box-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path>
            </svg>
          </div>
          <div class="box-label">{{ $attempt->exam->exam_name }}</div>
          <div class="box-title">Hasil Percobaan Tryout Akar Ilmu {{ $count++ }}</div>
          <div class="box-image">
            <div class="d-flex justify-content-between ">
                <div>
                    <h4 class="mb-0 pl-2">Nilai</h4>
                </div>
                <div class="text-end pr-2 mb-0">
                    @if($attempt->status == 0)
                        <h4>-</h4>
                    @else
                    <h4>{{ $attempt->marks }}</h4>
                    @endif
                </div>
            </div>
            <div style="margin-top: -8px" class="d-flex justify-content-between align-items-end">
                <div>
                    <h4 class="pl-2">Status</h4>
                </div>
                <div class="text-end pr-2">
                    <h4>
                            @if($attempt->status == 0)
                                -
                            @else
                                @if($attempt->marks >= $attempt->exam->pass_marks)
                                    <span style="color: green">Lulus</span>
                                @else
                                    <span style="color: red; font-size: 20px">Tidak Lulus</span>
                                @endif
                            @endif
                    </h4>
                </div>
            </div>
            <img src="{{ asset('images/review.gif') }}" alt="">
          </div>
          <div class="studio-button">
            <div class="studio-button-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
              </svg>
            </div>
            <div class="studio-button-label">
                @if($attempt->status == 0)
                    <span style="color: white">Pending</span>
                @else
                    <a style="color: white" href="#" data-id="{{ $attempt->id }}" class="reviewExam" data-toggle="modal" data-target="#reviewQnaModal">Review</a>
                @endif
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@else
  <tr>
    <td colspan="8">Anda belum mengerjakan</td>
  </tr>
@endif

    <!-- Modal -->
    <div class="modal" id="reviewQnaModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <i style="color: orange" class="fa fa-circle" aria-hidden="true"></i>
                    <i style="color: green" class="fa fa-circle ml-1 mr-2" aria-hidden="true"></i>
                    <h3 style="font-weight: bolder" class="modal-title" id="exampleModalLabel">Review Tryout</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body review-qna p-5">
                        Loading...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>

    <div class="modal" id="explainationModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pembahasan</h5>
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
    var countCorrect = 0;
    var countIncorrect = 0;
    var countNotAttempted = 0;

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
                        countIncorrect++;

                        if(data[i]['answers']['is_correct'] == 1){
                            is_correct = '<span style="color:green;" class="fa fa-check"></span>'; 
                            countCorrect++;
                            countIncorrect--;
                        }

                        let answer = data[i]['answers']['answer'];

                        if(answer == null || answer == ''){
                            answer = '<span style="color:gray;">Tidak dijawab</span>';
                            countNotAttempted++;
                            countIncorrect--;
                        }

                        html += `
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>(`+(i+1)+`). `+data[i]['question']['soal']+`</h6>
                                <p style="font-weight: bolder";>Jawaban : `+answer+`  `+is_correct+`</p>`;

                        if(data[i]['question']['explaination'] != null){
                            html +=`<p><a href="#" data-explaination="`+data[i]['question']['explaination']+`" class="explaination" data-toggle="modal" data-target="#explainationModal">Pembahasan</a></p>`;
                        }

                        html +=`
                                    </div>
                                </div>
                        `;
                    }

                    html += `
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-right">
                                <h5>Jawaban Benar : `+countCorrect+`</h5>
                                <h5>Jawaban Salah : `+countIncorrect+`</h5>
                            </div>
                        </div>
                    </div>

                    <style>
                        .text-right {
                            text-align: right;
                        }
                        .text-right h5 {
                            display: inline-block;
                            margin-left: 20px;
                            font-weight: bolder;
                        }
                    </style>
                    `;

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