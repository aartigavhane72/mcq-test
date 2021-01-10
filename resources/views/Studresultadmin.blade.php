@extends('layouts.app')

@section('content')
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
    <?php $sr = 1; ?>
                @foreach($question as $q)
                <?php 
                $ans = App\Addquestion::getAns($q->id, $userid);
                $getCorrectAns = App\Addquestion::getCorrectAns($q->id, $userid);
                $getWrongAns = App\Addquestion::getWrongAns($q->id, $userid);
                $attempted = App\Addquestion::attempted($q->id, $userid);
                ?>
                <div class="card-body">
                    <b class="card-title" id="question_info"> Ques no. {{$sr}} - {{$q->question}}</b>
                    <table class="table"> <tbody id="responsedata.question[val].id+'"> <tr><td class="tableformat"> Option A</td><td>{{$q->option_A}}+</td></tr>
                        <tr><td class="tableformat">Option B</td><td>{{$q->option_B}}+</td></tr>
                        <tr><td class="tableformat">Option C</td><td>{{$q->option_C}}+</td></tr>
                        <tr><td class="tableformat">Option D</td><td>{{$q->option_D}}+</td></tr>
                        <tr><td class="tableformat">Correct Option : </td>
                            <td>{{$q->correct_option}}+</td></tr>
                    <tr><td class="tableformat">Your Option : </td>
                            <td>{{$ans->selected_option}}+</td></tr>
                            <tr><td class="tableformat {{$attempted == 'true' ? 'Attempted' : 'unAttempted'}}"> {{$attempted == "true" ? 'Attempted' : "Unattempted"}} </td>
                           </tr>
                            
                      </tbody></table>
                </div>
                <?php  $sr++; ?>
                @endforeach
                <div style="text-align: right;">
                 Total Questions=  <?php echo count($question); ?> <br>
                Correct Ans =  {{$getCorrectAns}} <br>
                Wrong Ans =  {{$getWrongAns}} 
               

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
@endsection