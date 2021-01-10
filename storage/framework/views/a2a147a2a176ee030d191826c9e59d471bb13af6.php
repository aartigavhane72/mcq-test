<?php $__env->startSection('content'); ?>

<style>
.modal-ku {
width: 750px;
margin: auto;
}
</style>

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

<!-- Exam Over -- -------------------------------------- -->
<div class="container-fluid bg-secondary hidden" style="height:100vh" id="examover">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header">
    <h4 class="modal-title">Exam Over</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <!-- Modal body -->
    <div class="modal-body alert alert-primary">
        <div class="row" style="margin:0px;">
            <div class="col-sm-12" >
                Don't Press Back Button
            </div>
            <div class="col-sm-12" >
                Don't Refresh 
            </div>
            <div class="col-sm-12 hidden" id="active_process">
                <span class="card-text "> <i class="fa fa-spinner fa-spin" ></i> Pls Wait Processing Your Response.... </span>
            </div>
        </div>
    </div>
    
    <!-- Modal footer --> 
    <div class="modal-footer" id="examover_footer">
        <button type="button" onclick="home()" class="btn btn-warning">Home</button>
        <button type="button" onclick="result()" class="btn btn-warning">Result</button>
    </div> 
    
</div>
</div>
</div>

<!-- Instruction -- -->
<!--- Error -- - -->
<div id="errorModal" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Error</h4>
</div>
<div class="modal-body">
    <p>We can’t connect to the server</p>
    <p>Try again later. </p>
    <p>Check your network connection.</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>
<!-- The Modal -->
<div class="container-fluid bg-secondary" id="instruction" >
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Instructions</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body alert alert-primary">
    <div class="row" style="margin:0px;">
           
            <div class="col-sm-12">
                <span class="card-text ">No. of Question : </span><span class="text-right nopadding" id="total_number_of_question"></span>
            </div>
           
            <div class="col-sm-12">
                <span class="card-text ">Re-Attempt Allowed : </span><span class="text-right nopadding">Yes</span>
            </div>
            
            <h4 class="modal-title">Notes</h4>
            
            <div class="col-sm-12">
                Don't press back Button
            </div>
            <div class="col-sm-12">
                Result Declaration After Exam
            </div>
            <div class="col-sm-12">
                Marks and Neg. Marks Show during Exam
            </div>
            <div class="col-sm-12">
                Click "Start" button below to start Exam
            </div>
           
    </div>
</div>

<!-- Modal footer --> 
<div class="modal-footer">
<div id="examloader" class="hidden">
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
<div class="alert alert-success hidden" id="pls_wait_preparing_exam_room">Pls wait ... Preparing Exam Room</div>
<button type="button" onclick="startExam()" id="startexambutton" class="btn btn-secondary">Start Exam</button>
</div> 

</div>
</div>
</div>

        <!-- Pre-loader end -->
        <div class="pcoded-content hidden" id="show_exam">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body">
                            <div class="row question_rearrange">
                                
                                <!-- Questions -->
                                <?php $no=1; $tmarks = 0;?>
                                <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <script>
                                        set_question['<?php echo e($no); ?>'] = ['<?php echo e($value->id); ?>','<?php echo e($value->subject); ?>'];
                                        colors['<?php echo e($no); ?>'] = "";
                                      //  alert(set_question['<?php echo e($value->subject); ?>'+''+'<?php echo e($no); ?>']);
                                      
                                    </script>
                                    <?php if($no === 1): ?>
                                    <div id="ques_block<?php echo e($value->id); ?>" class="col-sm-8 hideme "> 
                                    <script>
                                        var c_s_set = '<?php echo e($value->subject); ?>';
                                    </script>
                                    <?php else: ?>
                                    <div id="ques_block<?php echo e($value->id); ?>" class="col-sm-8 hideme hidden"> 
                                    
                                    <?php endif; ?>
                                        <div class="card">
                                            <div class="alert alert-light text-justify col-sm-12">
                                            <input type="hidden" class="current_qusetion_no" id="" value='<?php echo e($no); ?>'>
                                          
                                            <h4 class="modal-title"><b>Ques no. <span class="setqno"><?php echo e($no++); ?></span> : </b> <?php echo $value->question; ?></h4>
                                          
                                            </div>
                                            <div class="card-block ">
                                                <!-- radio button -->
                                                <form action="#" >
                                                    <p class="col-sm-12">
                                                        <input type="radio" id="optionA<?php echo e($value->id); ?>" name="option<?php echo e($value->id); ?>" value="A">
                                                        <label for="optionA<?php echo e($value->id); ?>"><?php echo $value->option_A; ?></label>
                                                        
                                                    </p>
                                                    <p class="col-sm-12">
                                                        <input type="radio" id="optionB<?php echo e($value->id); ?>" name="option<?php echo e($value->id); ?>" value="B">
                                                        <label for="optionB<?php echo e($value->id); ?>" ><?php echo $value->option_B; ?></label>
                                                       
                                                    </p>
                                                    <p class="col-sm-12">
                                                        <input type="radio" id="optionC<?php echo e($value->id); ?>" name="option<?php echo e($value->id); ?>" value="C">
                                                        <label for="optionC<?php echo e($value->id); ?>"><?php echo $value->option_C; ?></label>
                                                       
                                                    </p>
                                                    <p class="col-sm-12">
                                                        <input type="radio" id="optionD<?php echo e($value->id); ?>" name="option<?php echo e($value->id); ?>" value="D">
                                                        <label for="optionD<?php echo e($value->id); ?>"><?php echo $value->option_D; ?></label>
                                                       
                                                    </p>
                                                </form>
                                                <input type="hidden" id="correctoption<?php echo e($value->id); ?>" value="<?php echo e($value->correct_option); ?>">
                                                <input type="hidden" id="marks<?php echo e($value->id); ?>" value="<?php echo e($value->marks); ?>">
                                                <input type="hidden" id="negmarks<?php echo e($value->id); ?>" value="<?php echo e(1); ?>">
                                                <!-- End Radio Button -->
                                                <?php $tmarks = $tmarks + $value->marks; ?>
                                            </div>
                                            <div class="row">
                                                    <div class="col-xs-12 text-center" style="margin-bottom:20px;">
                                                        <?php if($no > 2): ?>
                                                        <button type="button" onclick="Previous('<?php echo e($no-1); ?>',<?php echo e($question); ?>)" class="btn btn-outline-warning select-button">Previous</button>
                                                        <?php endif; ?>
                                                 <button type="button" onclick="Save('<?php echo e($no-1); ?>', <?php echo e($question); ?>)" class="btn btn-outline-success select-button">Save & Next</button>
                                                        <button type="button" onclick="Reminder('<?php echo e($no-1); ?>',<?php echo e($question); ?>)" class="btn btn-outline-info select-button">Reminder</button>
                                                       <?php if($no <= sizeof($question)): ?>
                                                        <button type="button"  onclick="Skip('<?php echo e($no-1); ?>',<?php echo e($question); ?>)" class="btn btn-outline-danger select-button">Skip</button>
                                                        <?php endif; ?>
                                                        <button type="button" onclick="finish()" class="Finshexam btn btn-outline-primary select-button hidden">Finish</button>
                                                       
                                                    </div>
                                                    
                                            </div>
                                            
                                        </div>
                                    
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <script> 
                                   document.getElementById("total_number_of_question").innerHTML = '<?php echo e($no-1); ?>';
                                </script>

                                <div class="col-sm-4">
                                     
                                        <div class=" card twitter-card">
                                          
                                            <div class="card-block text-left rearrange_q">
                                             <!-- Change Questions Button-->
                                                <?php $q_no=1; ?>
                                                <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <!-- <button id="<?php echo e($value->subject); ?><?php echo e($value->id); ?>" onclick="show_selected_question('<?php echo e($value->subject); ?>','<?php echo e($value->id); ?>', <?php echo e($q_no); ?>)" class="btn btn-warning btn-icon circle-btn"><?php echo e($q_no); ?></button>
                                                    -->
                                                    <button id="btn<?php echo e($value->id); ?>" class="cl btn btn-warning btn-icon circle-btn"><?php echo e($q_no++); ?></button>
                                                    
                                                    <script type="text/javascript">
                                                   //  alert("qq");
                                                     $( document ).ready(function() {
                                                            $('#btn<?php echo e($value->id); ?>').on('vclick click mousedown touchstart', function (e) {
                                                          //      alert("qq");
                                                              show_selected_question('<?php echo e($value->subject); ?>','<?php echo e($value->id); ?>', '<?php echo e($q_no -1); ?>');
                                                            });
                                                        });
                                                       
                                                    </script>  
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               
                                            </div>
                                        </div>
                                    </div>
                               
                                    
                                </div>
                            </div>
                        </div>

                        <div id="styleSelector">

                        </div>
                          <input type="hidden" id="base_url" value="<?php echo url('/'); ?>">

                    </div>
                </div>
            </div>
        </div>          
<!-- ------------------------------------------------ Script ----------------- -->                                                
<script type="text/javascript">
function startTimer(duration, display) {
var timer = duration, minutes, seconds;
setInterval(function () {
minutes = parseInt(timer / 60, 10)
seconds = parseInt(timer % 60, 10);

minutes = minutes < 10 ? "0" + minutes : minutes;
seconds = seconds < 10 ? "0" + seconds : seconds;

display.textContent = minutes + " : " + seconds;

if (--timer < 0) {
timer = duration;
}
}, 1000);
}

function startExam(){

$("#startexambutton").addClass('hidden'); 
$("#examloader").removeClass('hidden');
$("#pls_wait_preparing_exam_room").removeClass('hidden');
var base_url = $("#base_url").val();
var urls = base_url + '/refresult';
              
var data = new FormData();
    data.append('examcode', '<?php echo e($id); ?>');
    
   $.ajax({
       type : 'POST',
       url : urls,
       beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
    
       data: data,
       contentType: false,
       processData: false,
       success: function(data){

            $("#instruction").addClass('hidden'); 
            $("#show_exam").removeClass('hidden');
            
            var fiveMinutes = 60 * '<?php echo e($time); ?>',
            display = document.querySelector('#timmer');
            startTimer(fiveMinutes, display);
       }
   })

}

// Show Selected Question 
function show_selected_question($sub, $id, $q_no){
//  alert($sub+ $id+ $q_no)
$('.hideme').addClass('hidden');
$('#ques_block'+''+$id).removeClass('hidden');
//   alert('#ques_block'+''+$id);
if(<?php echo e($no-1); ?> == $q_no) {
    $('.Finshexam').removeClass('hidden');
}
$('.setqno').text($q_no);
$('.current_qusetion_no').val($q_no);
$('#current_selected_subject').val($sub);
$("#display_selected_subject").text($sub);
}
// Save Answer 
function Save($abs_qno, $arr){
var $current_subject =   set_question[$abs_qno][1];
var $current_question_id = set_question[$abs_qno][0];
var $current_ques_no = $abs_qno;

colors[$current_subject+''+$current_question_id] = "#5cb85c";
//    alert($current_subject+''+$current_question_id);
var present = document.getElementById('btn'+$current_question_id);

if(present)
document.getElementById('btn'+$current_question_id).style.background = "#5cb85c";

if($('input[name=option'+$current_question_id+']:checked').val() == $('#correctoption'+$current_question_id).val())
{
    AddUserResponse($current_question_id , $('input[name=option'+$current_question_id+']:checked').val() , $('#marks'+$current_question_id).val());
} else{
    AddUserResponse($current_question_id , $('input[name=option'+$current_question_id+']:checked').val() , $('#negmarks'+$current_question_id).val());

}
//myArr.indexOf(ID)
if(!set_question.hasOwnProperty(+$abs_qno + +1)){
    return;
}

var $next_ques_no = +$abs_qno + +1;
var $next_subject =   set_question[$next_ques_no][1];
var $next_question_id = set_question[$next_ques_no][0];

if(<?php echo e($no-1); ?> == $next_ques_no) {
    $('.Finshexam').removeClass('hidden');
}

if($current_subject != $next_subject)
{
    change_selected_question($next_subject , $arr)          
}  

$('.hideme').addClass('hidden');
//Next Subject & id
$('#ques_block'+''+$next_question_id).removeClass('hidden');

$('.setqno').text($next_ques_no);
$('.current_qusetion_no').val($next_ques_no);
$('#current_selected_subject').val($next_subject);            
$("#display_selected_subject").text($next_subject);

}
// Skip Question 
function Skip($abs_qno, $arr){

var $current_subject =   set_question[$abs_qno][1];
var $current_question_id = set_question[$abs_qno][0];
var $current_ques_no = $abs_qno;

colors[$current_subject+''+$current_question_id] = "#fb6560";
//    alert($current_subject+''+$current_question_id);
var present = document.getElementById('btn'+$current_question_id);

if(present)
document.getElementById('btn'+$current_question_id).style.background = "#fb6560";

if(!set_question.hasOwnProperty(+$abs_qno + +1)){
    return;
}
var $next_ques_no = +$abs_qno + +1;
var $next_subject =   set_question[$next_ques_no][1];
var $next_question_id = set_question[$next_ques_no][0];

if(<?php echo e($no-1); ?> == $next_ques_no) {
    $('.Finshexam').removeClass('hidden');
}

if($current_subject != $next_subject)
{
    change_selected_question($next_subject , $arr)          
}  

$('.hideme').addClass('hidden');
//Next Subject & id
$('#ques_block'+''+$next_question_id).removeClass('hidden');

$('.setqno').text($next_ques_no);
$('.current_qusetion_no').val($next_ques_no);
$('#current_selected_subject').val($next_subject);            
$("#display_selected_subject").text($next_subject);
}
// Reminder Question 
function Reminder($abs_qno, $arr){

var $current_subject =   set_question[$abs_qno][1];
var $current_question_id = set_question[$abs_qno][0];
var $current_ques_no = $abs_qno;


colors[$current_subject+''+$current_question_id] = "#5bc0de";
//    alert($current_subject+''+$current_question_id);
var present = document.getElementById('btn'+$current_question_id);

if(present)
    document.getElementById('btn'+$current_question_id).style.background = "#5bc0de";

if(!set_question.hasOwnProperty(+$abs_qno + +1)){
    return;
}
var $next_ques_no = +$abs_qno + +1;
var $next_subject =   set_question[$next_ques_no][1];
var $next_question_id = set_question[$next_ques_no][0];


if(<?php echo e($no-1); ?> == $next_ques_no) {
    $('.Finshexam').removeClass('hidden');
}
if($current_subject != $next_subject)
{
    change_selected_question($next_subject , $arr)          
}  

$('.hideme').addClass('hidden');
//Next Subject & id
$('#ques_block'+''+$next_question_id).removeClass('hidden');

$('.setqno').text($next_ques_no);
$('.current_qusetion_no').val($next_ques_no);
$('#current_selected_subject').val($next_subject);            
$("#display_selected_subject").text($next_subject);
}
// Previous Question 
function Previous($abs_qno, $arr){

var $current_subject =   set_question[$abs_qno][1];
var $current_question_id = set_question[$abs_qno][0];
var $current_ques_no = $abs_qno;

//     colors[$current_subject+''+$current_question_id] = "#5bc0de";
//   document.getElementById($current_subject+''+$current_question_id).style.background = "#5bc0de";

if(!set_question.hasOwnProperty(+$abs_qno - +1)){
    return;
}
var $next_ques_no = +$abs_qno - +1;
var $next_subject =   set_question[$next_ques_no][1];
var $next_question_id = set_question[$next_ques_no][0];

if($current_subject != $next_subject)
{
    change_selected_question($next_subject , $arr)          
}  

$('.hideme').addClass('hidden');
//Next Subject & id
$('#ques_block'+''+$next_question_id).removeClass('hidden');

$('.setqno').text($next_ques_no);
$('.current_qusetion_no').val($next_ques_no);
$('#current_selected_subject').val($next_subject);            
$("#display_selected_subject").text($next_subject);
}
// Change Subject 
function change_selected_question($sub , $arr){
var $q = 1;
$('#current_selected_subject').val($sub);
$("#display_selected_subject").text($sub);
$('.rearrange_q').text('');
for (var k in $arr){
    if($sub == $arr[k].subject)
    {
        $('.rearrange_q').append('<button id="btn'+$arr[k].id+'" class="btn btn-warning btn-icon circle-btn" >'+ $q +'</button>')
        document.getElementById('btn'+$arr[k].id).style.background =
                                colors[$sub+''+$arr[k].id];
        var s = "$('#btn" + $arr[k].id+"').on('click', function (e) { "+
                "show_selected_question('"+$arr[k].subject +"','"+ $arr[k].id +"','" +$q+"');"+
            "});";
      
        $('.rearrange_q').append("<script type='text\/javascript'>" + s                     
            + "<\/script>");                                                  
    //    set_question[$sub+''+$q] = $arr[k].id;
    }$q++;  
}
}
// Add AddUserResponse
function AddUserResponse(ques_id,selected_option ,givenmarks){
  var base_url = $("#base_url").val();
var adduserreponseurl = base_url + '/adduserreponse';

//    $("#add").addClass('hidden'); 
//    $("#spin").removeClass('hidden'); 
    var data = new FormData();
//    ques_id = 111;
//    selected_option = "A";
//    givenmarks = 1;
    data.append('ques_id', ques_id);
    data.append('selected_option', selected_option);
    data.append('givenmarks', givenmarks);
    data.append('examcode','<?php echo e($id); ?>' )
    active_process = +active_process + +1;   
    $("#active_process").removeClass('hidden'); 
   $.ajax({
       type : 'POST',
       url : adduserreponseurl,
       beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
    
       data: data,
       contentType: false,
       processData: false,
       success: function(data){
            active_process = +active_process - +1;

            if(active_process == 0){
                $("#active_process").addClass('hidden');
            }
   //     $("#add").removeClass('hidden'); 
   //     $("#spin").addClass('hidden'); 
            
       }
   }).fail(function (jqXHR, textStatus, error) {
    // Handle error here
    //alert(jqXHR); alert(textStatus); 
             active_process = +active_process - +1;

            if(active_process == 0){
                $("#active_process").addClass('hidden');
            }
            
            $('#errorModal').modal('show');
           // $('.modal-title').text('Error !!!');
   
});
}

function finish(){
$("#examover").removeClass('hidden'); 
$("#show_exam").addClass('hidden');
}

function  home() {
$("#examover_footer").text("");
$("#examover_footer").append('<i class="fa fa-spinner fa-spin" ></i> '+" "+" Pls Wait... ");
window.location.href = "home";
}                

function result() {
var base_urls = $("#base_url").val();

$("#examover_footer").text("");
$("#examover_footer").append('<i class="fa fa-spinner fa-spin" ></i> '+" "+" Pls Wait... ");
   window.location.href = base_urls + '/result';
} 
</script>

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


//add_subject_to_db  
$(document).ready(function(){
$("#add_subject_to_db").click(function(){  
$("#add_subject_to_db").addClass('hidden'); 
$("#add_subject_to_db_spin").removeClass('hidden'); 
$('#add_subject_msg').text("Processing ... ");

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.empty', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>