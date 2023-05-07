<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class AdminController extends Controller
{
    public function index()
    {
        return view('layouts.app2');
    }

    public function qnaDashboard()
    {
        $questions = Question::with('answers')->get();
        return view('qna.index', compact('questions'));
    }

    //add QnA
    public function addQna(Request $request) {
        try{
                $questionId = Question::insertGetId([
                    'soal' => $request->question
                ]);
            
                foreach ($request -> answers as $answer) {
                    
                    $is_correct = 0;
                    if($request->is_correct == $answer){
                        $is_correct = 1;
                    }
            
                    Answer::insert([
                        'questions_id' => $questionId,
                        'answer' => $answer,
                        'is_correct' => $is_correct
                    ]);
                }
            
                return response() -> json(['success'=>true, 'msg'=>'Berhasil menambah!']);
            } catch(\Expection $e){
                return response() -> json(['success'=>false, 'msg'=>$e->getMessage()]);
            };
            
        return response() -> json($request->all());
    }

    public function getQnaDetails(Request $request){
        $qna = Question::where('id',$request->qid)->with('answers')->get();

        return response()->json(['data'=>$qna]);
    }

    public function deleteAns(Request $request){
        Answer::where('id', $request->id)->delete();
        return response()->json(['success'=>true,'msg'=>'Jawaban Berhasil di Hapus']);
    }
    
    public function updateQna(Request $request){
        try{

            Question::where('id', $request->question_id)->update([
                'soal' => $request->question
            ]);

            //jawaban lama update
            if (isset($request->answers)) {
                
                foreach($request->answers as $key => $value){

                    $is_correct = 0;
                    if($request -> is_correct == $value){
                        $is_correct = 1;
                    }

                    Answer::where('id', $key)->update([
                        'questions_id' => $request->question_id,
                        'answer' => $value,
                        'is_correct' => $is_correct
                    ]);

                }

            }

            //jawaban baru update
            if (isset($request->new_answers)) {
                
                foreach($request->new_answers as $answer){

                    $is_correct = 0;
                    if($request -> is_correct == $answer){
                        $is_correct = 1;
                    }

                    Answer::insert([
                        'questions_id' => $request->question_id,
                        'answer' => $answer,
                        'is_correct' => $is_correct
                    ]);

                }

            }

            return response()->json(['success'=>true,'msg'=>'Berhasil melakukan update']);

        }catch(\Expection $e){
            return response() -> json(['success'=>false, 'msg'=>$e->getMessage()]);
        };
    }
}

