@extends('layouts.app2')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>Tryout</h2>
        </div>
    </div>
</div>

<form class="row mb-3 mt-5" action="{{ route('cariTryout') }}" method="POST">
    @csrf
    <div class="col-md-6">
        <div class="d-flex flex-row">
            <input type="text" value="{{ (request()->cari) ? request()->cari : '' }}" name="cari" class="form-control" placeholder="cari mata tryout">
            <button type="submit" class="btn btn-primary ml-4">Cari</button>
        </div>
    </div>
    <div class="col-md-6 d-flex flex-row justify-content-end">
        <a class="btn btn-success" href="{{ route('tryout.create') }}"> Input Mata Pelajaran</a>
    </div>
</form>

 @if ($message = Session::get('success'))
 <div class="alert alert-success">
    <p>{{ $message }}</p>
 </div>
 @endif

 <table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Tryout</th>
        <th>Detail</th>
        <th>Pembuat</th>
        <th>Add Questions</th>
        <th>Mata Pelajaran</th>
    </tr>
    @foreach ($tryout as $t)

    <tr>
        <td>{{ $t->id }}</td>
        <td>{{ $t->namaTryout }}</td>
        <td>{{ $t->detailTryout }}</td>
        <td>{{ $t->user_id }}</td>
        <td>
            <a href="#" class="addQuestions" data-id="{{ $t->id }}" data-toggle="modal" data-target="#addQnaModal">Add Question</a>
        </td>
        <td>{{ $t->mata_pelajaran_id }}</td>
        <td>
            <form action="{{ route('tryout.destroy',$t->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('tryout.show',$t->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('tryout.edit',$t->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
 @endforeach
 </table>

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
                    <input type="search" name="search" class="w-100" placeholder="Search here">
                    <br><br>
                    <table>
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

<script>
    $(document).ready(function(){
    //add question
    $('.addQuestion').click(function(){

        var id = $(this).attr('data-id');

    });

});

        
</script>
 
@endsection