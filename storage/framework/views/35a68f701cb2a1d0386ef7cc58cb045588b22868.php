<?php $__env->startSection('content'); ?>

<!-- Detail Result -->
<div id="Detail_modal" class="modal fade" role="dialog" style="overflow: scroll;">
<div class="modal-dialog-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Answer Sheet</h4>
</div>
<div class="modal-body" id="show_student_detail_result_info" >

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>


<!-- Pre-loader start -->
<div class="theme-loader">
<div class="ball-scale">
<div class='contain'>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
<div class="ring"><div class="frame"></div></div>
</div>
</div>
</div>
<!-- Pre-loader end -->


<div class="pcoded-wrapper">

<div class="pcoded-content">
<div class="pcoded-inner-content">

<!-- Main-body start -->
<div class="main-body">
<div class="page-wrapper">
<!-- Page-header start -->
<div class="page-header card" style=" margin-top: 0px;">
<div class="row align-items-end">
    <div class="col-lg-8">
        <div class="page-header-title">
            <i class="icofont icofont-file-code bg-c-blue"></i>
            <div class="d-inline">
                <h4>Result</h4>
            </div>
        </div>
    </div>
 

<!-- Page-header end -->

<!-- Page body start -->

<!-- Basic table card start -->
<div class="container" style="padding:0px;">

<div class="card-block table-border-style" id="exam_list_up">

    <!-- Create New Exam -->
    <!-- End Create New Exam -->
            <?php $no=1; ?>
            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-12">
                    <div class="card widget-card-1">
                        <div class="card-block">
                           
                            <span class="text-c-blue f-w-600">Exam Title</span>
                            <h4><?php echo e($value->examtitle); ?></h4>
                          
                                <table class="table">
                                <thead>
                                <tr>
                                <th>No. of Questions</th>
                                <th>Correct</th>
                                <th>Wrong</th>
                                <th></th>
                                </tr>
                                </thead>
                                <tbody id="result_active_process">
                                <tr>
                <?php    
                $getCorrectAns = App\Addquestion::rightAnscount($userid);
                $getWrongAns = App\Addquestion::wrongAnscount($userid);
                ?>
                                    <td style="text-align: center;"><?php echo e($question); ?></td>
                                    <td style="text-align: center;"><?php echo e($getCorrectAns); ?></td>
                                    <td style="text-align: center;"><?php echo e($getWrongAns); ?></td>
                                    <td>  <a href="<?php echo e(url('getfulldetailmyresult/1', $userid)); ?>" class="btn-primary btn-sm"><i class="icofont icofont-eye-alt"></i></a>
                                      </td>
                                </tr>
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>

<!-- Page body end -->
</div>
</div>
</div>
</div>
<!-- Main-body end -->

</div>
</div>
</div>         
<!------------------------- JS Script ---------------------------- -->
<script type="text/javascript">

$(document).ready(function(){
$(".create-model").click(function(){
$('#create').modal('show');
$('.form-horizontal').show();
$('.modal-title').text('Add Student');
});
});

$(document).ready(function(){
$(".addsubject").click(function(){
$('#addsubject').modal('show');
$('.form-horizontal').show();
$('.modal-title').text('Add Subject');
});

});

function Notfound($title , $Message) {

$('#not_found').modal('show');
$('.not_found_title').text($title);
$('.not_found_body').text("");
$('.not_found_body').append($Message);
} 

//add_subject_to_db  
$(document).ready(function(){
$("#add_subject_to_db").click(function(){  
$("#add_subject_to_db").addClass('hidden'); 
$("#add_subject_to_db_spin").removeClass('hidden'); 
$('#add_subject_msg').text("Processing ... ");
//          alert($('input[name=subject]').val());
//         alert($('input[name=examcode]').val());
//          alert($('input[name=admin_id]').val());
//          alert($('input[name=admin_email]').val());

$.ajax({
type : 'POST',
url : '/Addquestiontodb',
beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
data : {
'subject': $('input[name=subject]').val(),
'examcode': $('input[name=examcode]').val(),
'admin_id': $('input[name=admin_id]').val(),
'admin_email': $('input[name=admin_email]').val(),
},

success: function(data){

$("#add_subject_to_db").removeClass('hidden'); 
$("#add_subject_to_db_spin").addClass('hidden'); 
$('.subject_error').addClass('hidden');

if((data.errors)){

$('#add_subject_msg').text("Error Encounter !!! ");
if((data.errors.subject)) 
{ 
$('.subject_error').removeClass('hidden'); 
$('.subject_error').text(data.errors.subject);
}

else {   $('#add_subject_msg').text("Unknown Error !!! "); }

}else{
$('.dropdown-subject').append('<a class="dropdown-item" onclick="set_current_subject(\''+ data.subject +'\','+ data.id +')" href="#">'+data.subject+'</a>');
$('#add_subject_msg').text("Subject Successfully Added");
$('#subject').val('');
}
}
})
});
});
function DisplayQuestion($no , $id, $question, $A ,$B , $C , $D, $m , $nm , $co, $l , $image){

$('#show_selected_question-model').modal('show');
$('.modal-title').text('Question ');

$('#A').text($A);
$('#B').text($B);
$('#C').text($C);
$('#D').text($D);
$('#qno').text("Ques no. "+$no +" : ");
$('#q').text($question);
$('#M').text($m);
$('#NM').text($nm);
$('#CO').text($co);
$('#L').text($l);
}


function EditQuestion($no , $id, $question, $A ,$B , $C , $D, $m , $nm , $co, $l , $image){

$('#MathPreview').text("");
$('#MathBuffer').text("");

$('#show_img').addClass('hidden');

$('#option_A').val($A);
$('#option_B').val($B);
$('#option_C').val($C);
$('#option_D').val($D);
$('#edit_qno').val("Ques no. "+$no +" : ");
$('#MathInput').val($question);
$('#marks').val($m);
$('#correct_option').val($co);
$('#level').val($l);


//  $('#ques_image').attr('src','<?php echo e(asset('+$img+')); ?>');

Preview.Init();
$("#addquestion").addClass('hidden'); 
$('#create_question-model').modal('show');
$('.form-horizontal').show();
$('.modal-title').text('Add Question');
}

function viewdetil(name ,student_id,admin_id ,created_at ,validity) {
//          console.log(d.fee);
$('#show').modal('show');
$('.modal-title').text('Student Detail');
$('#view_name').text(name);
$('#view_student_id').text(student_id);
$('#view_institution_id').text(admin_id);
$('#view_created_at').text(created_at);
$('#view_validity').text(validity);
}

function Editdetail(id,name ,student_id){
//        console.log(d.fee);
$('#edit').modal('show');
$('.modal-title').text('Change Password');
$('#uid').val(id);
$('#uname').val(name);
$('#ustudent_id').val(student_id);
}

function Delete_user(id, name ,student_id){
// console.log(d.fee);
$('#delete').modal('show');
$('.modal-title').text('Are your sure want to delete');
$('#delete_id').text(id);
$('#did').val(id);
$('#delete_name').text(name);
$('#delete_student_id').text(student_id);
}   

function detailResult($examcode) {
$('#resultprocessing').modal('hide');
$('#Detail_modal').modal('show');
$('.modal-title').text('Answer Sheet');
$('#show_student_detail_result_info').text("Processing your request ...");
$('#show_student_detail_result_info').append('<div class="alert alert-warning" style="margin-top:40px">'+
         '<strong> <i class="fa fa-spinner fa-spin" ></i> Processing ...</strong>'+
        '</div>');
$.ajax({
type : 'POST',
url : 'getdetailresult',
beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
data :{
'examcode': $examcode
},

success: function(data){
$('#show_student_detail_result_info').text("");
var i = 0;

var encode = new Object();
console.log( data.result)
console.log(data.question);


for(var val in data.result){
encode[data.result[val].ques_id] = [data.result[val].selected_option ,data.result[val].givenmarks ];
}

for(var val in data.question){
i++;
console.log(data.question[val]);

var no = 0;

// if(cal_marks.hasOwnProperty(data.cat[n].subject)) {
    no = +no + +1;
    $('#show_student_detail_result_info').append(
        '<div class="card alert alert-primary" style="width: 100%;">'+
                                            '<div class="card-body">'+
                                                '<b class="card-title" id="question_info"> Ques no.'+no +" : " +data.question[val].question+'</b>'+
                                                '<table class="table"> <tbody id="response'+data.question[val].id+'"> <tr><td class="tableformat"> Option A</td><td>'+data.question[val].option_A+'</td></tr>'+
                                                    '<tr><td class="tableformat">Option B</td><td>'+data.question[val].option_B+'</td></tr>'+
                                                    '<tr><td class="tableformat">Option C</td><td>'+data.question[val].option_C+'</td></tr>'+
                                                    '<tr><td class="tableformat">Option D</td><td>'+data.question[val].option_D+'</td></tr>'+
                                                    '<tr><td class="tableformat">Correct Option : </td><td>'+data.question[val].correct_option+'</td></tr>'+
                                                  '</tbody></table>'+
                                            '</div>'+
                                        '</div>');
    if(encode[data.question[val].id]){ 
        if(encode[data.question[val].id][1] > 0) {
              $('#response'+data.question[val].id).append(
                                                            '<tr><td class="tableformat text-success">Your option : </td><td class="text-success">'+encode[data.question[val].id][0]+'</h6>'+
                                                            '<tr><td class="tableformat text-success">Marks Obtained : </td><td class="text-success">'+encode[data.question[val].id][1]+'</h6>'
                                                        ) 
        } else {
              $('#response'+data.question[val].id).append(
                                                            '<tr><td class="tableformat text-danger">Your option : </td><td class="text-danger">'+encode[data.question[val].id][0]+'</h6>'+
                                                            '<tr><td class="tableformat text-danger">Marks Obtained : </td><td class="text-danger">'+encode[data.question[val].id][1]+'</h6>'
                                                        ) 
        }
    }
    else {
        $('#response'+data.question[val].id).append('<b class="text-warning">Unattempted<b>')
    } 
                                                
   
// }

}

// alert(i); 

if(i == 0){
$('#show_student_detail_result_info').text("");
$('#show_student_detail_result_info').append('<div class="alert alert-info" style="margin-top:40px">'+
                      '<strong>No Record Found!</strong>'+
                '</div>');
}
MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
}
}) 
}     
// Show Result
function showResult($examcode,$title,$tname,$cat,$time){

$("#result_footer").text("");
$("#result_footer").append('<button type="button" class="btn btn-warning" onclick="detailResult('+$examcode+')">Detail</button>'+
'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');


$('#resultprocessing').modal('show');
$('.modal-title').text('Are your sure want to delete');

$('#result_active_process').text("Processing your request ...");
$('#result_active_process').append('<div class="alert alert-warning" style="margin-top:40px">'+
         '<strong> <i class="fa fa-spinner fa-spin" ></i> Processing ...</strong>'+
        '</div>');
$.ajax({
type : 'POST',
url : 'getsingleresult',
beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
data :{
'examcode': $examcode
},

success: function(data){
$('#result_active_process').text("");
var i = 0;
var cal_marks = new Object();
var tot_marks = new Object();
for (var k in data.result){
if (data.result.hasOwnProperty(k)) { 
i++;

if(tot_marks.hasOwnProperty(data.result[k].student_id)) {
tot_marks[data.result[k].student_id] = +tot_marks[data.result[k].student_id] + +data.result[k].givenmarks;

}
else{
tot_marks[data.result[k].student_id] = data.result[k].givenmarks;

} 
if(cal_marks.hasOwnProperty(data.result[k].student_id+data.result[k].subject)) {

cal_marks[data.result[k].student_id+data.result[k].subject] = +cal_marks[data.result[k].student_id+data.result[k].subject] + +data.result[k].givenmarks ;
//                                    console.log(data.result[k].student_id, cal_marks[data.result[k].student_id+data.result[k].subject]); 
}
else{
cal_marks[data.result[k].student_id+data.result[k].subject] =  data.result[k].givenmarks;

}                          
}
}

var sorted_total_marks = [];
for (var k in tot_marks) {
sorted_total_marks.push([k, tot_marks[k]]);
}

sorted_total_marks.sort(function(a, b) {
return b[1] - a[1];
}); 

var $rank = 0;
for(var val in sorted_total_marks){
$rank++;
if(sorted_total_marks[val][0] == '<?php echo e(Auth::user()->student_id); ?>'){
var no = 0;
for(var n in data.cat) {
if(!cal_marks.hasOwnProperty(sorted_total_marks[val][0]+data.cat[n].subject)) { 
    cal_marks[sorted_total_marks[val][0]+data.cat[n].subject] = 0;
}
    no = +no + +1;
   
    $('#result_active_process').append("<tr> <td>"+ no +"</td><td>"+ data.cat[n].subject+"</td><td>"+cal_marks[sorted_total_marks[val][0]+data.cat[n].subject]+"</td></tr>")
   
// }
} 
$("#student_rank").text("");
$("#student_rank").append($rank);
if(!sorted_total_marks.hasOwnProperty(val)) { 
sorted_total_marks[val][1] = 0;
}

$('#result_active_process').append("<tr> <th>"+ "**" +"</th><th>"+ "Total Marks"+"</th><th>"+sorted_total_marks[val][1]+"</th></tr>")
//    break;
}
}

if(i == 0){
$('#result_active_process').append('<div class="alert alert-info" style="margin-top:40px">'+
                      '<strong>No Record Found!</strong>'+
                '</div>');
}

if((data.errors)){

}else{
console.log("ABC");
}
}
})
}      
// Update Result_list      
function update_result_list($val) {

$('#filter_button').text($val);
$('#exam_list_up').text("Processing your request ...");
$('#exam_list_up').append('<div class="alert alert-warning" style="margin-top:40px">'+
         '<strong> <i class="fa fa-spinner fa-spin" ></i> Processing ...</strong>'+
        '</div>');
$.ajax({
type : 'POST',
url : '/updateresultlist',
beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
data :{
'val': $val
},

success: function(data){
$('#exam_list_up').text("");
var i = 0;
for (var k in data.exam){
if (data.exam.hasOwnProperty(k)) { i++;
console.log(data.exam[k].category);
$('#exam_list_up').append('<div class="col-md-6 col-xl-3">' +
                        '<div class="card widget-card-1">' +
                            '<div class="card-block-small">' +
                                '<i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>' +
                                '<span class="text-c-blue f-w-600">Exam Title</span>' +
                                '<h4>'+ data.exam[k].examtitle +'</h4>' +
                                '<div>' +
                                    '<span class="f-left m-t-10 text-muted">' +
                                        '<button onclick="showResult(\''+data.exam[k].examcode +'\',\''+data.exam[k].examtitle+'\',\''+data.exam[k].tname+'\',\''+ data.exam[k].category+'\',\''+data.exam[k].examtime + '\')"  class="show-modal btn btn-info btn-sm" >' +
                                            '<i class="icofont icofont-eye-alt"></i> View Result' +
                                        '</button>' +
                                    '</span>' +
                                '</div>'+
                            '</div>' +
                        '</div>' +
                    '</div>')                            
}
}
if(i == 0){
$('#exam_list_up').append('<div class="alert alert-info" style="margin-top:40px">'+
                      '<strong>No Record Found!</strong>'+
                '</div>');
}

if((data.errors)){

}else{
console.log("ABC");
}
}
})

}  
// Update Exam_list
function update_exam_list($val) {

//        $("#add").addClass('hidden'); 
//        $("#spin").removeClass('hidden'); 
$('#filter_button').text($val);
$('#exam_list_up').text("Processing your request ...");
$('#exam_list_up').append('<div class="alert alert-warning" style="margin-top:40px">'+
         '<strong> <i class="fa fa-spinner fa-spin" ></i> Processing ...</strong>'+
        '</div>');
$.ajax({
type : 'POST',
url : '/updateexamlist',
beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
data :{
'val': $val
},

success: function(data){

$('#exam_list_up').text("");
var i = 0;
for (var k in data.exam){
if (data.exam.hasOwnProperty(k)) { i++;
console.log(data.exam[k].category);
$('#exam_list_up').append('<div class="col-md-6 col-xl-3">' +
                        '<div class="card widget-card-1">' +
                            '<div class="card-block-small">' +
                                '<i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>' +
                                '<span class="text-c-blue f-w-600">Exam Title</span>' +
                                '<h4>'+ data.exam[k].examtitle +'</h4>' +
                                '<div>' +
                                    '<span class="f-left m-t-10 text-muted">' +
                                        '<a href="/exam/start/'+data.exam[k].examcode +'/'+data.exam[k].examtitle+'/'+data.exam[k].tname+'/'+ data.exam[k].category+'/'+data.exam[k].examtime + '"  class="show-modal btn btn-info btn-sm" >' +
                                            '<i class="icofont icofont-eye-alt"></i> Start Exam' +
                                        '</a>' +
                                    '</span>' +
                                '</div>'+
                            '</div>' +
                        '</div>' +
                    '</div>')                            
}
}
if(i == 0){
$('#exam_list_up').append('<div class="alert alert-info" style="margin-top:40px">'+
                      '<strong>No Data Found!</strong>'+
                '</div>');
}

for(var val in data.exam) {
//        console.log(val);
}
if((data.errors)){

}else{
console.log("ABC");
}
}
})

}


// Add Question
$(document).ready(function(){

$("#addquestion").click(function(){

$("#addquestion").addClass('hidden'); 
$("#add_question_spin").removeClass('hidden'); 
$('#add_question_msg').text("Processing ...");

var data = new FormData();

data.append('question', $('textarea[name=question]').val());
data.append('option_A', $('input[name=option_A]').val());
data.append('option_B', $('input[name=option_B]').val());
data.append('option_C', $('input[name=option_C]').val());
data.append('option_D', $('input[name=option_D]').val());
data.append('marks', $('input[name=marks]').val());
data.append('category', $('input[name=category]').val());
data.append('examcode', $('input[name=examcode]').val());
data.append('subject_code', $('input[name=current_subject_id]').val());
data.append('subject', $('input[name=current_subject_name]').val());
data.append('image', $('#image')[0].files[0]);
data.append('negative_marks', $('input[name=negative_marks]').val());
data.append('admin_email', $('input[name=admin_email]').val());
data.append('admin_id', $('input[name=admin_id]').val());
data.append('correct_option', $('select[name=correct_option]').val());
data.append('level', $('select[name=level]').val());

$.ajax({
type : 'POST',
url : '/addquestion',
data: data,
contentType: false,
processData: false,
beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},

success: function(data){
$("#addquestion").removeClass('hidden'); 
$("#add_question_spin").addClass('hidden'); 

$('.question_error').addClass('hidden');
$('.option_A_error').addClass('hidden');
$('.option_B_error').addClass('hidden');
$('.option_C_error').addClass('hidden');
$('.option_D_error').addClass('hidden');
$('.marks_error').addClass('hidden');
$('.negative_marks_error').addClass('hidden');

if((data.errors)){

if((data.errors.question)) 
{ 
$('.question_error').removeClass('hidden'); 
$('.question_error').text(data.errors.question);
}
else if((data.errors.option_A)) 
{ 
$('.option_A_error').removeClass('hidden'); 
$('.option_A_error').text(data.errors.option_A);
}

else if((data.errors.option_B)) 
{ 
$('.option_B_error').removeClass('hidden'); 
$('.option_B_error').text(data.errors.option_B);
}
else if((data.errors.option_C)) 
{ 
$('.option_C_error').removeClass('hidden'); 
$('.option_C_error').text(data.errors.option_C);
}
else if((data.errors.option_D)) 
{ 
$('.option_D_error').removeClass('hidden'); 
$('.option_D_error').text(data.errors.option_D);
}

else if((data.errors.marks)) 
{ 
$('.marks_error').removeClass('hidden'); 
$('.marks_error').text(data.errors.marks);
}
else if((data.errors.negative_marks)) 
{ 
$('.negative_marks_error').removeClass('hidden'); 
$('.negative_marks_error').text(data.errors.negative_marks);
}
else {    $('#add_question_msg').text("Error : "+data.errors);}

}else{
$('#add_question_msg').text("Question Successfully Added");
$('#MathInput').val('');
$('#option_A').val('');
$('#option_B').val('');
$('#option_C').val('');
$('#option_D').val('');
$('#marks').val('');
$('#negative_marks').val('');
$('#image').val('');
$('#correct_option').val('A');
console.log("ABC");
}
}
})
});
});

//Update Student Password
$(document).ready(function(){
$("#update").click(function(){  
$("#update").addClass('hidden'); 
$("#upspin").removeClass('hidden'); 

$.ajax({
type : 'POST',
url : 'ChangePassword',
beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
data :{
'id': $('input[name=uid]').val(),
'name': $('input[name=uname]').val(),
'student_id': $('input[name=ustudent_id]').val(),
'password': $('input[name=upassword]').val(),
'password_confirmation': $('input[name=upassword_confirmation]').val(),
},

success: function(data){

$("#update").removeClass('hidden'); 
$("#upspin").addClass('hidden'); 

$('.uname_error').addClass('hidden');
$('.ustudent_id_error').addClass('hidden');
$('.upass_error').addClass('hidden');

if((data.errors)){

if((data.errors.student_id)) 
{ 
$('.ustudent_id_error').removeClass('hidden'); 
$('.ustudent_id_error').text(data.errors.student_id);
}
else {  $('.ustudent_id_error').addClass('hidden'); }

if((data.errors.name)) 
{ 
$('.uname_error').removeClass('hidden'); 
$('.uname_error').text(data.errors.name);
}
else {  $('.uname_error').addClass('hidden'); }

if((data.errors.password)) 
{ 
$('.upass_error').removeClass('hidden'); 
$('.upass_error').text(data.errors.password);
}
else {  $('.upass_error').addClass('hidden'); }

}else{
$('#umsg').text("Student Successfully Added");
//    $('#uname').val('');
//    $('#ustudent_id').val('');
//    $('#upassword').val('');
//    $('#upassword_confirmation').val('');
console.log("ABC");
}
}
})
});
});

//Delete Student
$(document).ready(function(){
$("#delete").click(function(){

$("#delete").addClass('hidden'); 
$("#dspin").removeClass('hidden'); 
console.log($("#delete_id").val())
$.ajax({
type : 'POST',
url : 'RemoveStudent',
beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
data :{
'id': $('input[name=did]').val(),
},

success: function(data){


$("#delete").removeClass('hidden'); 
$("#dspin").addClass('hidden'); 
console.log( 'ABCD',$('.student'+$('.id').val()));
$('.student'+$('#did').val()).remove();

//    $('#dmsg').text("Student Record Successfully Deleted");
$('#delete').modal('hide');
}
})
});
});
</script>

<script type="text/javascript">
function create_new_exam(){
$('#add_new_exam').modal('show');
$('.modal-title').text('Create Exam');
}
</script>

<script type="text/javascript">
$(document).ready(function(){
$("#addexam").click(function(){

$("#addexam").addClass('hidden'); 
$("#aespin").removeClass('hidden'); 
$.ajax({
type : 'POST',
url : 'addexam',
beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
data :{
'tname': $('input[name=tname]').val(),
'examtitle': $('input[name=examtitle]').val(),
'admin_id': $('input[name=admin_id]').val(),
'admin_email': $('input[name=admin_email]').val(),
'category':  $('select[name=category]').val(),
'examtime':  $('input[name=examtime]').val(),
},

success: function(data){
console.log(data);
$('.tname_error').addClass('hidden');
$('.examtitle_error').addClass('hidden');
$('.examtime_error').addClass('hidden');

if((data.errors)){

$("#addexam").removeClass('hidden'); 
$("#aespin").addClass('hidden'); 

if((data.errors.tname)) 
{ 
$('.tname_error').removeClass('hidden'); 
$('.tname_error').text(data.errors.tname);
}

else if((data.errors.examtitle)) 
{ 
$('.examtitle_error').removeClass('hidden'); 
$('.examtitle_error').text(data.errors.examtitle);
}

else if((data.errors.examtime)) 
{ 
$('.examtime_error').removeClass('hidden'); 
$('.examtime_error').text(data.errors.examtime);
}


else {
$('#create_exam_error_msg').text("Unknown Error Encounter! Fill detail correctly");

}

}else{
$('#create_exam_error_msg').text("Exam Added, Redirecting...");
$('#aespin').text("Redirecting ....");
//  alert(data.examcode);
$('#name').val('');
$('#student_id').val('');
$('#password').val('');
$('#password_confirmation').val('');

window.location.href = "/addquestion/examcode/"+data.id + "/"+ data.examtitle+ "/"+ data.tname+ "/"+ data.category+ "/"+ data.examtime;
}
}
})
});
});
</script>

<script type="text/javascript">
$(document).ready(function() {

$('#chosenForm')
.find('[name="colors"]')
.chosen({
width: '100%',
inherit_select_classes: true
})
// Revalidate the color when it is changed
.change(function(e) {
$('#chosenForm').formValidation('revalidateField', 'colors');
})
.end()
.formValidation({
framework: 'bootstrap',
excluded: ':disabled',
icon: {
valid: 'glyphicon glyphicon-ok',
invalid: 'glyphicon glyphicon-remove',
validating: 'glyphicon glyphicon-refresh'
},
fields: {
colors: {
validators: {
callback: {
message: 'Please choose 2-4 color you like most',
callback: function(value, validator, $field) {
// Get the selected options
var options = validator.getFieldElements('colors').val();
return (options != null && options.length >= 2 && options.length <= 4);
}
}
}
}
}
});
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.student', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>