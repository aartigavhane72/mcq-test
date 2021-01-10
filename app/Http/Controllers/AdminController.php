<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Student;
use App\result;
use App\category;
use App\Addquestion;
use App\Aexam;
use App\examsubject;
use response;
use Illuminate\Support\Facades\input;
use App\Http\Requests;

use Validator;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students_count = DB::table('users')->orderBy('created_at', 'DESC')->where('admin_id',Auth::user()->id)
        //               ->limit(50)
                       ->get()->count();

        $exam_count = DB::table('exam')->orderBy('created_at', 'DESC')->where('admin_id',Auth::user()->id)
                       //->limit(50)
                          ->get()->count();              
      //  dump($students_count);
        return view('admin',compact('students_count', 'exam_count'));
    }


    

    public function Addquestion(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'question' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
        }
        else{
             
            $addquestion = new Addquestion;
          
            //$addquestion = new Addquestion;
                $addquestion->question = $req->question;
                $addquestion->owner_id = Auth()->user()->id;
            
                $addquestion->option_A = $req->option_A;
           
                $addquestion->option_B = $req->option_B;
           
                $addquestion->option_C = $req->option_C;
            
                $addquestion->option_D = $req->option_D;

        //    $addquestion->image = $url;
            $addquestion->examcode = $req->examcode;
            $addquestion->category = $req->category;
            $addquestion->type = $req->type;

            $addquestion->marks = $req->marks ?  $req->marks : '1';
            $addquestion->correct_option = $req->correct_option;
            $addquestion->level = $req->level;
            $addquestion->save();
            return response()->json($addquestion);
        }

    }
    //Randomize
    public function QuestionRandom(Request $req)
    {
        $exam = Aexam::find($req->examcode);
        if($req->random == 'true')
          $exam->random = 1;
        else $exam->random = 0;
        $exam->save();
    }
    //Update Question 
    public function updatequestion(Request $req)
    {

      
        $validator = Validator::make($req->all(), [
            'question' => 'required',
           'marks' => 'required',
          ]);

        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
        }
        else{
         //   return ($req);
            $addquestion = Addquestion::find($req->id_for_question_update);
           
             $addquestion->question = $req->question;
            
            $addquestion->option_A = $req->option_A;
               
            $addquestion->option_B = $req->option_B;
               
            $addquestion->option_C = $req->option_C;
                
            $addquestion->option_D = $req->option_D;
            
            $addquestion->examcode = $req->examcode;
        
            $addquestion->marks = $req->marks;
            $addquestion->correct_option = $req->correct_option;
            $addquestion->level = $req->level;
            
            $addquestion->save();

            return response()->json($addquestion);
        }

    }

    public function StudentResult(){
        $result = DB::table('exam')
        ->get();

        $category = DB::table('category')
        ->get();
        return view('AllStudent_Resultlist',compact('result', 'category'));
    }

    public function Get_Full_Detail_Result(Request $req){
        $question = DB::table('exam_question')
        ->where(['examcode'  => $req->examcode])//->sum('result.givenmarks');
        ->get();
        $result = DB::table('exam_question')
        ->leftJoin('result', 'result.ques_id', '=', 'exam_question.id')
        ->select('result.*')
        ->where(['exam_question.examcode' => $req->examcode , 'result.student_id' => $req->userid  ])
        ->get();

        return response()->json(array('result' => $result, 'question' => $question)); 
    }
    public function Get_Full_Detail_Result_stud($examcode,$userid){
        $question = DB::table('exam_question')
        ->where(['examcode'  => $examcode])//->sum('result.givenmarks');
        ->get();
        $result = DB::table('exam_question')
        ->leftJoin('result', 'result.ques_id', '=', 'exam_question.id')
        ->select('result.*')
        ->where(['exam_question.examcode' => $examcode , 'result.student_id' => $userid  ])
        ->get();
        return view('Studresultadmin',compact('result','question','userid'));

        //return response()->json(array('result' => $result, 'question' => $question)); 
    }

    public function Get_All_Result(Request $req){
        $result = DB::table('result')
        ->join('exam_question', 'result.ques_id', '=', 'exam_question.id')
        ->join('users', 'users.student_id', '=', 'result.student_id')
        ->select('result.student_id' , 'users.name' ,'result.givenmarks')
        ->where(['exam_question.examcode'  => $req->examcode])//->sum('result.givenmarks');
        ->get();
      $cat = DB::table('exam_subject')->where('examcode',$req->examcode)->get();
        return response()->json(array('result' => $result, 'cat' => $cat)); 
    }
    public function Update_Students_Result_List(Request $req) {

        $result = DB::table('exam')
        ->where([
            'exam.admin_id' => Auth::user()->id,
            'exam.category'   => $req->val
        ])
        ->get();
        return response()->json(array('exam' => $result));
    }
   
    public function addquest ($id, $title, $tname, $cat, $time){

        $question = DB::table('exam_question')->orderBy('created_at', 'ASC') //where('admin_id',Auth::user()->id && 'examcode',$id);
    //    ->limit(500)
        ->get();
        $subject =  DB::table('exam_subject')->orderBy('created_at', 'DESC')->where('examcode',$id) //where('admin_id',Auth::user()->id && 'examcode',$id);
    //    ->limit(500)
        ->get();
        $category = category::all();

        $exam_publish = DB::table('exam')->orderBy('created_at', 'DESC')->where(['examcode' =>$id])
        //->limit(50)
           ->get();  
    //    dump($exam_publish);
        return view('addquestion',compact('exam_publish','question','category','subject', 'id', 'title', 'tname', 'cat', 'time'));
     }
    public function showstudent()
    {
        $students = DB::table('users')->orderBy('created_at', 'DESC')
                    ->get();
        $category = category::all();
       return view('liststudent',compact('students','category'));
    }

    public function showExams()
    {
      //  $student = Student::all()->where('admin_id', Auth::user()->id);
      //  dump(Student::all());
        $exam = DB::table('exam')->orderBy('created_at', 'DESC')
       ->get();
       // console($student);
       $category = category::all();
       // console($student);
       return view('Exams',compact('exam','category'));
       // return view('liststudent',['students' => $students]);
    }

    public function DeleteQuestion(Request $req)
    {
 
        $Addquestion = Addquestion::find($req->id);
        $Addquestion->delete();
        return response()->json($Addquestion); 
        
     //   return view('adminchild.updatestudent');
    }

    public function Logout(){
        auth()->logout();
    
        session()->flash('message', 'Some goodbye message');
    
        return redirect('admin/login');
      }
}
