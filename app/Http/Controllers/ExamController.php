<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\QnaExam;
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
    }}
            
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

    

