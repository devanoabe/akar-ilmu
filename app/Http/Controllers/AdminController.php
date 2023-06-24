<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\MataPelajaran;
use App\Models\QnaExam;
use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\ExamAnswer;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $user = DB::table('users')->where('role', 0)->count();
        $tryout = DB::table('exams')->count();
        $soal = DB::table('questions')->count();
        $mapel = DB::table('matapelajarans')->count();
        $review = DB::table('exams_attempt')->where('status', 1)->count();
        return view('admin.dashboard', compact('user', 'tryout', 'soal', 'mapel', 'review'));
    }

    public function examDashboard()
    {   
        $subjects = MataPelajaran::all();
        $exams = Exam::with('subjects')->paginate(5);
        return view('tryout.dashboard', ['subjects' => $subjects, 'exams' => $exams]);
    }

    //add Exam
    public function addExam(Request $request) {
        try {
            $unique_id = uniqid('exid');
            Exam::insert([
                'exam_name' => $request->exam_name,
                'subject_id' => $request->subject_id,
                'keterangan' => $request->keterangan,
                'date' => $request->date,
                'time' => $request->time,
                'entrance_id' => $unique_id
            ]);
    
            return response()->json(['success' => true, 'msg' => 'Berhasil menambah!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function getExamDetails($id){
        try {

            $exam = Exam::where('id',$id)->get();
            return response()->json(['success' => true, 'data' => $exam]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        };
 
    }

    public function updateExam(Request $request){
        try {

            $exam = Exam::find($request->exam_id);
            $exam->exam_name = $request->exam_name;
            $exam->subject_id = $request->subject_id;
            $exam->keterangan = $request->keterangan;
            $exam->date = $request->date;
            $exam->time = $request->time;
            $exam->save();
            return response()->json(['success' => true, 'msg' => 'Exam Berhasil di update']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        };
    }

    public function deleteExam(Request $request){
        try{

            Exam::where('id', $request->exam_id)->delete();
            return response()->json(['success' => true, 'msg' => 'Exam Berhasil di hapus']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        };
    }

    public function cariSoal(Request $request)
    {
        $cari = $request->cari;
        $questions = Question::where('soal', 'like', '%'.$cari.'%')->paginate(5);
        return view('qna.index', compact('questions'));
    } 

    public function qnaDashboard()
    {
        $soal = DB::table('questions')->count();
        $questions = Question::with('answers')->get();
        return view('qna.index', compact('questions', 'soal'));
    }

    //add QnA
    public function addQna(Request $request) {
        try{

                $explaination = null;
                if (isset($request->explaination)) {
                    $explaination = $request->explaination;
                }

                $questionId = Question::insertGetId([
                    'soal' => $request->question,
                    'explaination' => $explaination
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

            $explaination = null;
            if (isset($request->explaination)) {
                    $explaination = $request->explaination;
            }

            Question::where('id', $request->question_id)->update([
                'soal' => $request->question,
                'explaination' => $explaination
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

    public function deleteQna(Request $request)
    {
        Question::where('id',$request->id)->delete();
        Answer::where('questions_id	',$request->id)->delete();

        return response()->json(['success'=>true,'msg'=>'Q&A deleted successfully!']);
    }

    public function getQuestions(Request $request)
    {
        try {
            $questions = Question::all();
            
            if (count($questions) > 0) {
                $data = [];
                $counter = 0;

                foreach ($questions as $question) {
                    $qnaExam = QnaExam::where(['exam_id' => $request->exam_id, 'question_id' => $question->id])->get();
                    if (count($qnaExam) == 0) {
                        $data[$counter]['id'] = $question->id;
                        $data[$counter]['questions'] = $question->soal;
                        $counter++;
                    }
                }
                return response()->json(['success' => true, 'msg' => 'Questions data!', 'data' => $data]);
            } else {
                return response()->json(['success' => false, 'msg' => 'Soal Tidak ditemukan']);
            }
        } catch(\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function addQuestions(Request $request){
        try{

            if(isset($request->questions_ids)){
                foreach($request->questions_ids as $qid){
                    QnaExam::insert([
                        'exam_id' => $request->exam_id,
                        'question_id' => $qid
                        
                    ]);
                }
            }
            return response()->json(['success'=>true,'msg'=>'Soal Berhasil ditambah']);
        } catch(\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
    public function getExamQuestions(Request $request)
    {
        try {
            
            $data = QnaExam::where('exam_id',$request->exam_id)->with('question')->get();
            return response()->json(['success'=>true,'msg'=>'Questions Details!','data'=>$data]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function deleteExamQuestions(Request $request)
    {
        try {
            
            QnaExam::where('id',$request->id)->delete();
            return response()->json(['success'=>true,'msg'=>'Questions deleted!']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function loadMarks()
    {
        $exams = Exam::with('getQnaExam')->paginate(5);
        return view('admin.marks', compact('exams'));
    }

    public function updateMarks(Request $request)
    {
        try {
            
            Exam::where('id',$request->exam_id)->update([
                'marks' => $request->marks,
                'pass_marks'=> $request->pass_marks
            ]);
            return response()->json(['success' => true, 'msg' =>'Marks Updated!']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function reviewExam(){
        $attempts = ExamAttempt::with(['user','exam'])->orderBy('id')->paginate(6);
        return view('admin.review', compact('attempts'));
    }

    public function reviewQna(Request $request)
    {
        try {

        $attemptData = ExamAnswer::where('attempt_id',$request->attempt_id)->with(['question','answers'])->get();
        return response()->json(['success'=>true,'data'=>$attemptData]);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'data'=>$e->getMessage()]);
        }
    }

    public function approvedQna(Request $request){
        try{

            $attemptId = $request->attempt_id;

            $examData = ExamAttempt::where('id', $attemptId)->with(['user','exam'])->get();
            $marks = $examData[0]['exam']['marks'];

            $attemptData = ExamAnswer::where('attempt_id',$attemptId)->with('answers')->get();

            $totalMarks = 0;
            if(count($attemptData) > 0){

                foreach($attemptData as $attempt){
                    if($attempt->answers->is_correct == 1){
                        $totalMarks += $marks;

                    }
                }
            }

            ExamAttempt::where('id',$attemptId)->update([
                'status' => 1,
                'marks' => $totalMarks
            ]);

            return response()->json(['success'=>true,'msg'=>'Approved Succesfully!']);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }
}