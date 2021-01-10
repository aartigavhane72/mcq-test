<?php $__env->startSection('content'); ?>

<style>
.toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
.toggle.ios .toggle-handle { border-radius: 20px; }
</style>
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

<!-- Pre-loader end -->
<div class="pcoded-wrapper">

    <div class="pcoded-content">
        <div class="pcoded-inner-content">

            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header card">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <i class="icofont icofont-file-code bg-c-blue"></i>
                                   
                                </div>
                            </div>
                        
                    <!-- Page-header end -->

                    <!-- Page body start -->
                    
                    <!-- Basic table card start -->
                    <div class="container">
                        
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th width="50px">No.</th>
                                            <th>Question</th>
                                            <th>Category</th>
                                            <th class="text-success">Created At</th>
                                            <th class="text-center" width="150px">
                                                <a href="#" class="show_add_question-model btn btn-success btn-sm">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </a>
                                            </th>
                                            
                                        </tr>
                                        <?php echo e(csrf_field()); ?>

                                    </thead>
                                    <tbody>
                                    <?php $no=1; ?>
                                    <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="student<?php echo e($value->id); ?>">
                                            <td><?php echo e($no++); ?> </td>
                                            <td style="max-width:200px; text-overflow: ellipsis; overflow: hidden;"><?php echo ($value->question); ?> </td>
                                            <td class="text-success"><?php echo e($value->category); ?> </td>
                                            <td class="text-success"><?php echo e($value->created_at); ?> </td>
                                            <td>
                                                <?php $newque = str_replace("'", "\'",$value->question); $newque = str_replace('"', '\"',$newque); ?>
                                                <?php $option_A = str_replace("'", "\'",$value->option_A); $option_A = str_replace('"', '\"',$option_A); ?>
                                                <?php $option_B = str_replace("'", "\'",$value->option_B); $option_B = str_replace('"', '\"',$option_B); ?>
                                                <?php $option_C = str_replace("'", "\'",$value->option_C); $option_C = str_replace('"', '\"',$option_C); ?>
                                                <?php $option_D = str_replace("'", "\'",$value->option_D); $option_D = str_replace('"', '\"',$option_D); ?>

                                                <a href="#" onclick="DisplayQuestion('<?php echo e($no-1); ?>' , '<?php echo e($value->id); ?>' , '<?php echo e($newque); ?>' , '<?php echo e(($option_A)); ?>' , '<?php echo e($option_B); ?>' , '<?php echo e($option_C); ?>' , '<?php echo e($option_D); ?>' , '<?php echo e($value->marks); ?>' , '<?php echo e($value->correct_option); ?>' , '<?php echo e($value->level); ?>')"
                                                 class="show-modal btn btn-info btn-sm" >
                                                <i class="icofont icofont-eye-alt"></i>
                                                </a>
                                           
                                                <a href="#" onclick="Delete_question('<?php echo e($value->id); ?>')" class="detete-modal btn btn-danger btn-sm">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
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

                                  
            <!--  form Add Question -->
            <div id="create_question-model" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                    <h5 id="add_question_msg" class="text-success"></h5>
                                    
                                </div>
                                <div class="modal-body"> 
                                    <form class="form-horizontal" role="form" enctype="multipart/form-data" id="modal_form_id"  method="POST">
                                        <div class="form-group row add">
                                            <label class="control-label col-sm-4 text-left" for="question" id="edit_qno">Ques No. <?php echo e($no); ?> :</label>
                                            
                                            <div class="col-sm-12">
                                                <textarea name="question" cols="30" rows="5" id="MathInput" class="form-control" placeholder="Enter Question..." required></textarea>
                                                <p class="question_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                            <span id="show_img" class="control-label col-sm-12 hidden"></span>
                                            </div>
                                        </div>
                                      
                                            <div class="form-group">
                                                <label class="control-label col-sm-3" for="option_A">Option_A :</label>
                                                <div class="col-sm-6 mr-0 pr-0">
                                                    <input type="text" class="form-control" id="option_A" name="option_A" placeholder="Enter option A">
                                                    <p class="option_A_error text-center alert alert-danger hidden"></p>
                                                   
                                                </div>
                                               
                                            </div>
                                          
                                        
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="option_B">Option_B :</label>
                                            <div class="col-sm-6 mr-0 pr-0">
                                                <input type="text" class="form-control" id="option_B" name="option_B" placeholder="Enter option B">
                                                <p class="option_B_error text-center alert alert-danger hidden"></p>
                                                
                                            </div>
                                        </div>
                                        

                                        <div class="form-group">
                                        
                                            <label class="control-label col-sm-3" for="option_C">Option_C :</label>
                                            <div class="col-sm-6 mr-0 pr-0">
                                                <input type="text" class="form-control" id = "option_C" name = "option_C" placeholder="Enter option C">
                                                
                                                <p class="option_C_error text-center alert alert-danger hidden"></p>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="option_D">Option_D :</label>
                                            <div class="col-sm-6 mr-0 pr-0">
                                                <input type="text" class="form-control" id="option_D" name="option_D" placeholder="Enter option D">
                                                <p class="option_D_error text-center alert alert-danger hidden"></p>
                                            </div>
                                            
                                        </div>
                                       
                                        <div class="form-group" style="display: none;">
                                            <label class="control-label col-sm-3" for="marks">Marks :</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="marks" name="marks" placeholder="Ex : 0.5 " required value="1">
                                                <p class="marks_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>  

                                        <div class="form-group" style="display: none;">
                                            <label class="control-label col-sm-3" for="negative_marks">Neg. Marks :</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="negative_marks" name="negative_marks" placeholder="Ex : -0.5" value="0" required>
                                                <p class="negative_marks_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="correct_option">Correct Option :</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="correct_option" id="correct_option" style="height: unset;" required>
                                                    <option value = "A">A</option>
                                                    <option value = "B">B</option>
                                                    <option value = "C">C</option>
                                                    <option value = "D">D </option>
                                                </select>
                                            </div>
                                        </div>    
                                         <div class="form-group">
                                            <label class="control-label col-sm-3" for="category">Category:</label>
                                            <div class="col-sm-8">
                                                  <select class="form-control" name="category" id="category" style="height: unset;" required>
                                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value = "<?php echo e($cat->category); ?>"><?php echo e($cat->category); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 
                                                </select>
                                            </div>
                                        </div>
                                           
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="level">Difficulty Level :</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="level" id="level" style="height: unset;" required>
                                                    <option value = "none">None</option>
                                                    <option value = "easy">Easy</option>
                                                    <option value = "medium">Medium</option>
                                                    <option value = "hard">Hard </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="type">Type :</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="type" id="type" style="height: unset;" required>
                                                    <option value = "multiple">Multiple</option>
                                                    <option value = "boolean">Boolean</option>
                                                    <option value = "medium">Medium</option>
                                                    <option value = "hard">Hard </option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" disabled class="form-control" id="id_for_question_update" name="id_for_question_update" value="" placeholder="id_for_question_update" required>
                                        <input type="hidden" disabled class="form-control" id="examcode" name="examcode" value=" <?php echo e($id); ?>" placeholder="examcode" required>
                                        <input type="hidden" disabled class="form-control" id="category1" name="category1" value=" <?php echo e($cat); ?>" placeholder="category1" required>
                                       
                                        <input type="hidden" disabled class="form-control" id="admin_id" name="admin_id" value=" <?php echo e(Auth::user()->id); ?>" placeholder="institution Id" required>
                                       
                                        <input type="hidden" disabled  class="form-control" id="admin_email" name="admin_email" value=" <?php echo e(Auth::user()->email); ?>" placeholder="Institution Email" required>
                                        
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-warning" type="submit" id="addquestion">
                                        <span class="glyphicon glyphicon-plus"></span>Add Question
                                    </button>
                                    <button class="btn btn-warning hidden" type="submit" id="updatequestion">
                                        <span class="glyphicon glyphicon-plus"></span>Update Question
                                    </button>
                                    <button class="btn btn-warning hidden" type="button" id="add_question_spin">
                                    <i class="fa fa-spinner fa-spin" ></i> pls Wait...
                                    </button>
                                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-remobe"></span>Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            <!--  End form  Question Post -->                              
         
            <!--  form Show Question -->
            <div id="show_selected_question-model" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"></h4>
                          <h5 id="add_question_msg" class="text-success"></h5>
                      </div>
                      <div class="modal-body"> 
                          <form class="form-horizontal" role="form" enctype="multipart/form-data" id="modal_form_id"  method="POST">
                              <div class="form-group row add">
                              <label class="col-sm-3 text-right" id="qno"></label>
                                  <div class="col-sm-9 ">
                                        <span class="control-label text-left" id="q"></span>
                                        <span id="dqi"></span>
                                  </div>
                              </div>

                              <div class="form-group">
                                    <span class="col-sm-1 text-right"></span>
                                    <label class="control-label col-sm-11 text-left" id="dimg"></label>
                              </div>

                              <div class="form-group">
                                    <label class="col-sm-4 text-right"> Option&nbsp&nbspA&nbsp&nbsp:&nbsp&nbsp</label>
                                   <div class="col-sm-8">
                                        <span class="control-label text-left" id="A"></span>
                                        <span id="dai"></span>
                                  </div>
                                  
                              </div>

                              <div class="form-group">
                                   <label class="col-sm-4 text-right"> Option&nbsp&nbspB&nbsp&nbsp:&nbsp&nbsp</label>
                                   <div class="col-sm-8">
                                        <span class="control-label text-left" id="B"></span>
                                        <span id="dbi"></span>
                                   </div>
                              </div>

                              <div class="form-group">
                                    <label class="col-sm-4 text-right"> Option&nbsp&nbspC&nbsp&nbsp:&nbsp&nbsp</label>
                                    <div class="col-sm-8">
                                            <span class="control-label text-left" id="C"></span>
                                            <span id="dci"></span>
                                    </div>
                              </div>

                              <div class="form-group">
                                    <label class="col-sm-4 text-right"> Option&nbsp&nbspD&nbsp&nbsp:&nbsp&nbsp</label>
                                    <div class="col-sm-8">
                                            <span class="control-label text-left" id="D"></span>
                                            <span id="ddi"></span>
                                    </div>
                              </div>
                              
                              <div class="form-group">
                              <label class="col-sm-4 text-right">Marks&nbsp&nbsp:&nbsp&nbsp</label>
                                   <div class="col-sm-8">
                                        <span class="control-label text-left" id="M"></span>
                                  </div>
                              </div>  

                              <div class="form-group">
                              <label class="col-sm-4 text-right"> Correct&nbsp&nbspOption&nbsp&nbsp:&nbsp&nbsp</label>
                                   <div class="col-sm-8">
                                        <span class="control-label text-left" id="CO"></span>
                                  </div>
                              </div>    
                                 
                              <div class="form-group">
                                    <label class="col-sm-4 text-right"> Ques.&nbsp&nbspLevel&nbsp&nbsp:&nbsp&nbsp</label>
                                    <div class="col-sm-8">
                                            <span class="control-label text-left" id="L"></span>
                                    </div>
                              </div>
                               
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-warning" type="button" data-dismiss="modal">
                              <span class="glyphicon glyphicon-remobe"></span>Close
                          </button>
                      </div>
                  </div>
              </div>
          </div>
  <!--  End form Show Question Post -->                           


                    <!--  Delete Post -->
                    <div id="delete" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                    <h5 id="msg" class="text-success"></h5>
                                </div>
                                <div class="modal-body" style="margin: 0px auto;">
                                    <p class="text-primary">ID : <span id = "delete_id"></span> </p>
                                    <input type="text" id ="did" name="did">
                                    <p class="text-primary">Name : <span id = "delete_name"></span> </p>
                                    <p class="text-primary">Student Id :<span id = "delete_student_id"></span>  </p>
                                    <div class="modal-footer">
                                    
                                    <button class="btn btn-danger" type="submit" id="delete">
                                       <i class="glyphicon glyphicon-trash"></i> Delete
                                    </button>
                                    <button class="btn btn-danger hidden" type="button" id="dpspin">
                                       <i class="fa fa-spinner fa-spin" ></i> pls Wait...
                                    </button>
                                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-remobe"></span>Close
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             <!--  End Delete Post -->  
        <!--  form Edit Post -->
            <div id="edit" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                    <h5 id="umsg" class="text-success"></h5>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group row add">
                                            <label class="control-label col-sm-4" for="name">Student Name :</label>
                                            <div class="col-sm-8">
                                                <input type="text" disabled class="form-control" id="uname" name="uname" placeholder="Enter Student Full Name" required>
                                                <p class="name_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>
                                        <input type="hidden" disabled class="form-control" id="uid" name="uid" placeholder="Field Id" required>
                                               
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="student_id">Student Id :</label>
                                            <div class="col-sm-8">
                                                <input type="text" disabled class="form-control" id="ustudent_id" name="ustudent_id" placeholder="Enter Student Id" required>
                                                <p class="student_id_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="password" class="control-label col-sm-4">Create new Password</label>
                                                <div class="col-sm-8">
                                                    <input id="upassword" type="password" class="form-control" name="upassword" required>
                                                    <p class="upass_error text-center alert alert-danger hidden"></p>
                                                </div>
                                            
                                        </div>
                                        

                                        <div class="form-group">
                                            <label for="password_confirmation" class="control-label col-sm-4">Confirm Password</label>

                                            <div class="col-sm-8">
                                                <input id="upassword_confirmation" type="password" class="form-control" name="upassword_confirmation" required>
                                                <p class="uerror text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>
                                       
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-warning" type="submit" id="update">
                                        <span class="glyphicon glyphicon-plus"></span>Update
                                    </button>
                                    <button class="btn btn-warning hidden" type="button" id="upspin">
                                    <i class="fa fa-spinner fa-spin" ></i> pls Wait...
                                    </button>
                                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-remobe"></span>Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            <!--  End form edit Post -->  


              <!--  Alert Post -->
              <div id="alert_msg" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title text-warning"></h4>
                                    <button type="button" class="close pull-right " data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body" style="margin: 0px auto;">
                                  
                                   <form class="form-horizontal" role="form">
                                        <div class="form-group row add">
                                            <label class="control-label text-danger col-sm-12" id="alert_msg_show" for="alert"> </label>
                                          
                                        </div>
                                        
                                    </form>
                                    <div class="modal-footer">
                                        <button class="btn btn-warning" type="button" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remobe"></span>Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             <!--  End Delete Post -->    

             <!-- Modal -->
            <div id="del_q_Modal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header" style="display: block;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body alert-danger">
                    <h4 id="del_warning">Warning</h4>
                      <input id="del_q_id" name="del_q_id" hidden>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="triger_delete_question" class="btn btn-warning">Delete</button>
                        <button type="button" id="triger_delete_spinner"  class="btn btn-warning hidden"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></button>
                        <button class="btn btn-warning" id="close_del_model" data-dismiss="modal">Close</button>
                    </div>
                    </div>

                </div>
            </div>

             <!-- Randomizer -->
             <div id="rand_Modal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header" style="display: block;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body alert-danger">
                    <h5 id="ran_warning">Randomizer Will Shuffle Question Randomly For Student</h5>
                    <input id="random_put_status" hidden name="random_put_status">
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="call_rand()" id="triger_Randomize_off" class="btn btn-warning">Off</button>
                        <button type="button" onclick="call_rand()" id="triger_Randomize_on" class="btn btn-success">On</button>
                        <button type="button" id="triger_Randomize_spinner"  class="btn btn-warning hidden"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></button>
                        <button class="btn btn-warning" id="close_Randomize_model" data-dismiss="modal">Close</button>
                    </div>
                    </div>

                </div>
            </div>
<script>

function Delete_question(id){
// console.log(d.fee);
$("#triger_delete_question").removeClass('hidden'); 
$('#del_q_id').val('');
$('#del_q_Modal').modal('show');
$('.modal-title').text('Warning');
$('#del_warning').text('Are you sure you want to delete this question?');
$('#del_q_id').val(id);
}


//Add Randomizer

function call_rand() {

$("#triger_Randomize_on").addClass('hidden'); 
$("#triger_Randomize_off").addClass('hidden'); 
$("#triger_Randomize_spinner").removeClass('hidden'); 

$.ajax({
   type : 'POST',
   url : '/QuestionRandom',
   beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
   data :{
    'examcode':'<?php echo e($id); ?>',
    'random': $('input[name=random_put_status]').val(),
    },
   success: function(data){
          $("#triger_Randomize_spinner").addClass('hidden'); 
        if( $('#random_put_status').val() == 'true') {
            $("#ran_warning").text('Randomizer Successfully turned ON');  
            
            $("#tfalse").addClass('hidden'); 
            $("#ttrue").removeClass('hidden');
        }else{
            $("#ran_warning").text('Randomizer Successfully turned OFF');
            $("#ttrue").addClass('hidden'); 
            $("#tfalse").removeClass('hidden'); 
        }
   }
})
}


//Delete Question
$(document).ready(function(){
$("#triger_delete_question").click(function(){

$("#triger_delete_question").addClass('hidden'); 
$("#triger_delete_spinner").removeClass('hidden'); 
console.log($("#del_q_id").val())
$.ajax({
   type : 'POST',
   url : '/RemoveQuestion',
   beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
   data :{
    'id': $('input[name=del_q_id]').val(),
    },

   success: function(data){
        $("#close_del_model").removeClass('hidden'); 
        $("#triger_delete_spinner").addClass('hidden'); 
        console.log('ABCD',$('.student'+$('.id').val()));
        $('.student'+$('#del_q_id').val()).remove();      
        $('#del_warning').text('Question Successfully Deleted');              
    //    $('#dmsg').text("Student Record Successfully Deleted");
        $('#triger_delete_question').modal('hide');
   }
})
});
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>