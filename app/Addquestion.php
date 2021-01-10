<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addquestion extends Model
{
    //
    protected $table = 'exam_question';

    protected $guarded = [];


    public static function getAns($id,$student_id)
    {
      $result = 
        result::where('ques_id', $id)->where('student_id', $student_id)->first();

		return $result;
    }
    public static function getCorrectAns($id,$student_id)
    {
         $result1 = 
        result::where('ques_id', $id)->where('student_id', $student_id)->where('right_wrong', 1)->count();
		return $result1;
    }
    public static function getWrongAns($id,$student_id)
    {
         $result2 = 
        result::where('ques_id', $id)->where('student_id', $student_id)->where('right_wrong', 2)->count();
		return $result2;
    }
    public static function rightAnscount($student_id)
    {
         $result3 = 
        result::where('student_id', $student_id)->where('right_wrong', 1)->count();
		return $result3;
    }
    public static function wrongAnscount($student_id)
    {
         $result4 = 
        result::where('student_id', $student_id)->where('right_wrong', 2)->count();
		return $result4;
    }
    public static function attempted($id,$student_id)
    {
         $result5 = 
        result::where('ques_id', $id)->where('student_id', $student_id)->first();
        if($result5)
        {
             $result5 = true;
        }else{
                         $result5 = false;

        }
        return $result5;

    }
}
