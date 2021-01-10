<?php $__env->startSection('content'); ?>

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
                    <h4>Exam List</h4>
                    <span>All Available Exam for you</span>
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
                <?php $__currentLoopData = $exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                <span class="text-c-blue f-w-600">Exam Title</span>
                                <h4><?php echo e($value->examtitle); ?></h4>
                                <div>

                                    <span class="f-left m-t-10 text-muted">
                                        <a href="<?php echo e(url('exam/start/'.$value->examcode.'/'.$value->examtitle.'/'.$value->tname.'/'.$value->category.'/'.$value->examtime)); ?>" class="show-modal btn btn-info btn-sm" >
                                            <i class="icofont icofont-eye-alt"></i> Start Exam
                                        </a>
                                    </span>
                                </div>
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
<!-- ------------------JS Script ------------------------ -->
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

$(document).ready(function(){
$(".show_add_question-model").click(function(){

if($('#current_subject_id').val() == ''){
//   alert("Pls. Add / Select Subject");
$('#alert_msg').modal('show');
$('.form-horizontal').show();
$('.modal-title').text('Warring');
$('#alert_msg_show').text('Pls Add / Select Subject');

return ;
}

$('#MathPreview').text("");
$('#MathBuffer').text("");
$("#addquestion").removeClass('hidden'); 

$('#option_A').val('');
$('#option_B').val('');
$('#option_C').val('');
$('#option_D').val('');
$('#MathInput').val('');
$('#marks').val('');
$('#negative_marks').val('0');
$('#correct_option').val('A');
$('#level').val('none');

Preview.Init();
PreviewA.InitA();
PreviewB.InitB();
PreviewC.InitC();
PreviewD.InitD();
$('#create_question-model').modal('show');
$('.form-horizontal').show();
$('.modal-title').text('Add Question');
});            
});

function set_current_subject($sub , $id) {
$('#current_subject_id').val($id);
$('#current_subject_name').val($sub);
$('#subject_button').text($sub);
}
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
$('#option_A').val($A);
$('#option_B').val($B);
$('#option_C').val($C);
$('#option_D').val($D);
$('#edit_qno').val("Ques no. "+$no +" : ");
$('#MathInput').val($question);
$('#marks').val($m);
$('#negative_marks').val($nm);
$('#correct_option').val($co);
$('#level').val($l);

$img = "images/" + $image;
if($image)
{
$('#show_img').text('');
$('#show_img').removeClass('hidden');
//    $('#show_img').append("<img id=\"ques_image\" src=\"<?php echo e(asset('assets/images/avatar-4.jpg')); ?>\" >");
$('#show_img').append("<img class=\"img-responsive center-block\" src=\"<?php echo e(asset('images/')); ?>" + '/'+$image +"\">");

}
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
url : '/getsingleresult',
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
tot_marks[data.result[k].student_id] = tot_marks[data.result[k].student_id] + data.result[k].givenmarks;

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
                                                '<i class="icofont icofont-eye-alt"></i> Start Exam' +
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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.student', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>