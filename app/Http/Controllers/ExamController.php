<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\QnaExam;
use App\Models\ExamAttempt;
use App\Models\ExamAnswer;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ExamController extends Controller
{
    //
    public function loadExamDashboard($id){
        
        $qnaExam = Exam::where('entrance_id',$id)->with('getQnaExam')->get();

        if(count($qnaExam) > 0){

            if($qnaExam[0]['exam_name']){
            
                if(count($qnaExam[0]['getQnaExam']) > 0 ){
                    

                    $qna = QnaExam::where('exam_id', $qnaExam[0]['id'])->with('question', 'answers')->get();
                    return view('student.exam-dashboard',['success'=>true, 'exam'=>$qnaExam, 'qna'=>$qna]);


                }else{ 

                return view('student.exam-dashboard',['success'=>false, 'msg'=>'This exam is not available for now!', 'exam'=>$qnaExam]);


                }

            }
        }
    }

    public function examSubmit(Request $request)
    {
        $attempt_id = ExamAttempt::insertGetId([
            'exam_id' => $request->exam_id,
            'user_id' => Auth::user()->id
        ]);

        $qcount = count($request->q);
        if($qcount > 0){
            for($i = 0; $i < $qcount; $i++){
                ExamAnswer::insert([
                    'attempt_id' => $attempt_id,
                    'question_id' => $request->q[$i],
                    'answer_id' => request()->input('ans_'.($i+1)),
                ]);
            }

        }
        return view('thank-you');
    }

    public function resultDashboard(){
        $attempts = ExamAttempt::where('user_id', Auth()->user()->id)->with('exam')->orderBy('updated_at')->get();
        return view('student.result', compact('attempts'));
    }

    public function reviewQna(Request $request){
        try{
        $attemptData = ExamAnswer::where('attempt_id',$request->attempt_id)->with(['question','answers'])->get();
        
        return response()->json(['success'=>true,'msg'=>'Q&A Data','data'=>$attemptData]);

        }catch (\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }
    

}

            
        // }else{
        //     // dd('aa');
        //     return view('');
        // }
    

    // $qnaExam = Exam::where('entrance_id',$id)->with('getQnaExam')->get();
    // if(count($qnaExam) > 0){

    //     if($qnaExam[0]['time'] == time('Y-m-d')){
    //         return 'working';
    //     }

    //     else if($qnaExam[0]['date'] > date('Y-m-d')){
    //         return view('student.exam-dashboard',['success'=>false,'msg'=>'This exam will be start on '.$qnaExam[0]['date'],'exam'=>$qnaExam]);
    //     }
    //     else{
    //         return view('student.exam-dashboard',['success'=>false,'msg'=>'This exam will be on '.$qnaExam[0]['date'],'exam'=>$qnaExam]);

    //     }
    // }

    

