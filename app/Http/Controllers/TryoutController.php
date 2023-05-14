<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tryout;
use App\Models\MataPelajaran;
use App\Models\User;
use App\Models\Exam;
use Illuminate\Http\Response;

class TryoutController extends Controller
{

    public function examDashboard()
    {       
        $subjects = MataPelajaran::all();// Mengambil semua isi tabel
        return view('tryout.dashboard',['subjects'=>$subjects]);
    }

    //add Exam
    public function addExam(Request $request) {
        try{    
                    Exam::insert([
                        'exam_name' => $request->$exam_name,
                        'subject_id' => $request->$subject_id,
                        'keterangan' => $request->$keterangan,
                        'time' => $request->$time,
                    ]);
            
                return response() -> json(['success'=>true, 'msg'=>'Berhasil menambah!']);
            } catch(\Expection $e){
                return response() -> json(['success'=>false, 'msg'=>$e->getMessage()]);
            };
            
    }

    public function updateExam(Request $request)
    {
        try{

            $exam = Exam::find($request->exam_id);
            $exam->exam_name = $request->exam_name;
            $exam->subject_id = $request->subject_id;
            $exam->keterangan = $request->keterangan;
            $exam->time = $request->time;
            $exam->save();
            return response() -> json(['success'=>true, 'msg'=>'Berhasil update!']);

        }catch(\Expection $e){
            return response() -> json(['success'=>false, 'msg'=>$e->getMessage()]);
        };
    }
}
