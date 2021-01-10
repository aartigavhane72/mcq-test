<?php $__env->startSection('content'); ?>
<style type="text/css">
td .Attempted{
        color: green !important;
    }
    .unAttempted{
        color: red !important;
    }
</style>
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
<div class="row align-items-end" id="show_student_detail_result_info">
<div class="col-lg-4">
<div class="page-header-breadcrumb">

</div>
</div>

<!-- Page-header end -->

<!-- Page body start -->

<!-- Basic table card start -->
<div class="container" style="padding:0px;">

<div class="card-block table-border-style" id="exam_list_up">
    <?php $sr = 1;  ?>
                <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                $ans = App\Addquestion::getAns($q->id, $userid);
                $getCorrectAns = App\Addquestion::rightAnscount($userid);
                $getWrongAns = App\Addquestion::wrongAnscount($userid);
                $attempted = App\Addquestion::attempted($q->id, $userid);
                ?>
                <div class="card-body">
                    <b class="card-title" id="question_info"> Ques no. <?php echo e($sr); ?> - <?php echo e($q->question); ?></b>
                    <table class="table"> <tbody id="responsedata.question[val].id+'"> <tr><td class="tableformat"> Option A</td><td><?php echo e($q->option_A); ?>+</td></tr>
                        <tr><td class="tableformat">Option B</td><td><?php echo e($q->option_B); ?>+</td></tr>
                        <tr><td class="tableformat">Option C</td><td><?php echo e($q->option_C); ?>+</td></tr>
                        <tr><td class="tableformat">Option D</td><td><?php echo e($q->option_D); ?>+</td></tr>
                        <tr><td class="tableformat">Correct Option : </td>
                            <td><?php echo e($q->correct_option); ?>+</td></tr>
                    <tr><td class="tableformat">Your Option : </td>
                            <td><?php echo e($ans->selected_option); ?>+</td></tr>
                            <tr><td class="tableformat <?php echo e($attempted == 'true' ? 'Attempted' : 'unAttempted'); ?>"> <?php echo e($attempted == "true" ? 'Attempted' : "Unattempted"); ?> </td>
                           </tr>
                            
                      </tbody></table>
                </div>
                <?php  $sr++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div style="text-align: right;">
                 Total Questions=  <?php echo count($question); ?> <br>
                Correct Ans =  <?php echo e($getCorrectAns); ?> <br>
                Wrong Ans =  <?php echo e($getWrongAns); ?> 
               

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.student', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>