<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Student;
use App\category;
use App\Addquestion;
use App\examsubject;
use App\result;
use App\ref_result;
use response;
use Illuminate\Support\Facades\input;
use App\Http\Requests;

use Validator;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $exam = DB::table('exam')->get();
        // if($created_dt->diffInDays($validity_dt, false) > 0 && Auth::user()->validity != null) {
        //     return view('home',compact('exam'));
        // }
        return view('home', compact('exam'));

        // else{
        //     return redirect('/order');
        // }
     
    }

    public function ResultList()
    {
        $userid = Auth::user()->student_id;
        $result = DB::table('ref_result')
        ->Join('exam', 'ref_result.examcode', '=', 'exam.examcode')
        ->select('ref_result.*', 'exam.*')
        ->where('ref_result.student_id', '=', Auth::user()->student_id)
        ->get();
        $question = DB::table('exam_question')
        ->count();
        return view('Resultlist',compact('result','question','userid'));
    }


    public function Updateresultlist(Request $req){
        $data = [
    //        'publish'  => 'Publish',
            'ref_result.student_id' => Auth::user()->student_id,
            'category'   => $req->val
        ];

        $result = DB::table('ref_result')
        ->Join('exam', 'ref_result.examcode', '=', 'exam.examcode')
        ->select('ref_result.*', 'exam.*')
        ->where($data)
        ->get();
        return response()->json(array('exam' => $result)); 
    }


    public function Get_Single_Result(Request $req){
        
        $result = DB::table('result')
        ->join('exam_question', 'result.ques_id', '=', 'exam_question.id')
        ->join('users', 'users.student_id', '=', 'result.student_id')
        ->select('result.student_id' , 'users.name' ,'result.givenmarks', 'exam_question.subject')
        ->where(['exam_question.examcode'  => $req->examcode])//->sum('result.givenmarks');
        ->get();

        $cat = DB::table('exam_subject')->where('examcode',$req->examcode)->get();

        return response()->json(array('result' => $result, 'cat' => $cat)); 
    }

    public function Get_Detail_Result(Request $req){
        
        $question = DB::table('exam_question')
        ->where(['examcode'  => $req->examcode])//->sum('result.givenmarks');
        ->get();

        $result = DB::table('exam_question')
        ->leftJoin('result', 'result.ques_id', '=', 'exam_question.id')
        ->select('result.*')
        ->where(['exam_question.examcode' => $req->examcode , 'result.student_id' => Auth::user()->student_id ])
        ->get();
       
        return response()->json(array('result' => $result, 'question' => $question)); 
    }

    public function Updateexamlist(Request $req){
        $data = [
            'publish'  => 'Publish',
            'admin_id' => Auth::user()->admin_id,
            'category'   => $req->val
        ];

        $exam = DB::table('exam')->where($data)->get();
    //    dump($exam);
    //    return response()->json($exam); 
        return response()->json(array('exam' => $exam)); 
     //   dump($req);
    }

    public function Adduserresponse(Request $req) {
    
        $data = [
             'id'  => $req->ques_id,
            'student_id' => Auth::user()->student_id
        ];
$qus = Addquestion::where('id', $req->ques_id)->first();

if($qus->correct_option == $req->selected_option)
{
    $right_wrong = 1;
}
else{
    $right_wrong = 2;
}
    
        $result = result::updateOrCreate(
            ['ques_id' => $req->ques_id, 'student_id' => Auth::user()->student_id],
            ['selected_option' => $req->selected_option, 'givenmarks' => 1, 'right_wrong' => $right_wrong]
        );


       
        return response()->json($result);
    }

    public function AttemptNewExam(Request $req){
      //  $ref_result = new ref_result;

        $ref_result = ref_result::updateOrCreate(
            ['student_id' => Auth::user()->student_id, 'examcode' => $req->examcode]
        );
    //    $ref_result->student_id = Auth::user()->student_id;
    //    $ref_result->examcode = $req->examcode;
    //    $ref_result->save();
        return response()->json($ref_result);
    }
    public function startexam($id, $title, $tname, $cat, $time) {
        $data = [
            'examcode'   => $id
        ];
        $data1 = [
            'examcode'   => $id
        ];

       // $subject = DB::table('exam_subject')->where($data)->get();
        $question = DB::table('exam_question')->where($data1)->get();

// $path = "https://opentdb.com/api.php?amount=10";

// $ch = curl_init();
// curl_setopt($ch,CURLOPT_URL, $path);
// curl_setopt($ch,CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_HEADER, 0);  
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
// $ques = curl_exec($ch);
// curl_close($ch);

// $json = json_decode($ques);
// dump($json->results);
// $question = $json->results;
    //    $question = response()->json(array('question' => $exam)); 
        return view('Startexam',compact('question','time','id'));
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
        return view('Studresult',compact('result','question','userid'));

        //return response()->json(array('result' => $result, 'question' => $question)); 
    }


    public function Logout(){
        $admin_id = Auth::user()->admin_id;

        auth()->logout();
    
        session()->flash('message', 'goodbye');
    
        // if($admin_id) 
        // return redirect('/StudentLogin/'.$admin_id);
         return redirect('/');
    }
}
