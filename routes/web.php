<?php


//use Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('test',function(){
    echo 'GET';
});

Route::put('test',function(){
    echo 'GET';
});

Route::delete('test',function(){
    echo 'GET';
});

    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('service/price', function () {
        return view('our_service_price');
    });
    Route::get('StudentLogin/{id}', 'Auth\StudentRegController@showLoginForm');

    Auth::routes();
    
    //Student
    Route::post('studentlogout', 'HomeController@Logout');
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('result', 'HomeController@ResultList');
    Route::post('getdetailresult', 'HomeController@Get_Detail_Result');
    Route::post('getsingleresult', 'HomeController@Get_Single_Result');
    Route::post('updateexamlist', 'HomeController@Updateexamlist');
    Route::post('updateresultlist', 'HomeController@Updateresultlist');
    Route::post('adduserreponse', 'HomeController@Adduserresponse');
    Route::post('refresult', 'HomeController@AttemptNewExam');
    Route::get('exam/start/{id}/{title}/{tname}/{cat}/{time}', 'HomeController@startexam');
    Route::get('getfulldetailmyresult/{userid}/{examcode}', 'HomeController@Get_Full_Detail_Result_stud');

    Route::post('ajaxstudentsignup', 'Auth\StudentRegController@Student_SignUp');
    Route::post('ajaxstudentlogin', 'Auth\LoginController@StudentLogin');
    //Admin
    Route::get('Exams', 'AdminController@showExams')->name('MyExams');
    Route::get('addstudent', 'AdminController@Addstudent')->name('addstudent');
    Route::get('liststudent', 'AdminController@showstudent')->name('studentlist');
    Route::post('addquestion', 'AdminController@Addquestion');
    Route::post('updatequestion', 'AdminController@updatequestion');
    Route::post('QuestionRandom', 'AdminController@QuestionRandom');
    Route::post('liststudent', 'AdminController@Addstudent');
    Route::get('StudentResult', 'AdminController@StudentResult');
    Route::post('update_studentresultlist', 'AdminController@Update_Students_Result_List');
    Route::post('getallresult', 'AdminController@Get_All_Result');
    Route::post('getfulldetailresult', 'AdminController@Get_Full_Detail_Result');
    Route::get('getfulldetailstudresult/{userid}/{examcode}', 'AdminController@Get_Full_Detail_Result_stud');

    Route::post('addexam', 'Addexam@Add_Exam');
    Route::post('RemoveStudent', 'StudentDelete@Delete');
    Route::post('RemoveQuestion','AdminController@DeleteQuestion');
    Route::get('addquestion/examcode/{id}/{title}/{tname}/{cat}/{time}', 'AdminController@addquest');
    Route::prefix('admin')->group(function(){
        Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::post('adminregister', 'Auth\AdminLoginController@register');
        Route::get('', 'AdminController@index')->name('admin.dashboard');
    });
    
Route::post('logout', 'AdminController@Logout');
 
Route::post('/date',function(Request $req){
   
});