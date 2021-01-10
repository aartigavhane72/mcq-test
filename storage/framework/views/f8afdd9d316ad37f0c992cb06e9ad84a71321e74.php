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
<div class="modal-body" id="show_detail_result_info" >

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>

<!-- Single Student Result  -- -------------------------------------- -->
<div id="resultprocessing" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">        
<!-- Modal Header -->
<div class="modal-header">
<h4 class="result_modal-title">Result</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body alert alert-primary">
<div class="row"  style="margin:0px;">


<div class="col-sm-12" >
<table class="table">
    <thead id="result_table_header">
    <tr>
        <th>No.</th>
        <th>Marks</th>
    </tr>
    </thead>
    <tbody id="result_active_process">
    
    </tbody>
</table>
</div>
<div class="col-sm-12 hidden" id="result_active_process2">
    <span class="card-text "> <i class="fa fa-spinner fa-spin" ></i> Pls Wait Processing Your Response.... </span>
</div>
</div>
</div>

<!-- Modal footer --> 
<div class="modal-footer" id="result_footer">

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
                                <h4>Select A Result</h4>
                                <span>All Available Exam Result for You</span>
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
                                <div class="col-md-6 col-xl-3">
                                    <div class="card widget-card-1">
                                        <div class="card-block-small">
                                            <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                            <span class="text-c-blue f-w-600">Exam Title</span>
                                            <h4><?php echo e($value->examtitle); ?></h4>
                                            <div>
                                                <span class="f-left m-t-12 d-flex text-muted">
                                                    <button onclick="showResult('<?php echo e($value->examcode); ?>','<?php echo e($value->examtitle); ?>','<?php echo e($value->tname); ?>','<?php echo e($value->category); ?>','<?php echo e($value->examtime); ?>')" class="show-modal btn btn-info btn-sm" >
                                                        <i class="icofont icofont-eye-alt"></i> View Result
                                                    </button>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>