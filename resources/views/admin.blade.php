@extends('layouts.app')

@section('content')
<!-- Pre-loader start -->
<div class="theme-loader">
<div class="ball-scale">
<div class='contain'>
<div class="ring">
    <div class="frame"></div>
</div>
<div class="ring">
    <div class="frame"></div>
</div>
<div class="ring">

    <div class="frame"></div>
</div>
<div class="ring">
    <div class="frame"></div>
</div>
<div class="ring">
    <div class="frame"></div>
</div>
<div class="ring">
    <div class="frame"></div>
</div>
<div class="ring">
    <div class="frame"></div>
</div>
<div class="ring">
    <div class="frame"></div>
</div>
<div class="ring">
    <div class="frame"></div>
</div>
<div class="ring">
    <div class="frame"></div>
</div>
</div>
</div>
</div>
<!-- End Pre-loader start -->   
<div class="pcoded-main-container">
<div class="pcoded-wrapper">

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                            <!-- card1 start -->
                            <div class="col-md-6 col-xl-3">
                                <div class="card widget-card-1">
                                    <div class="card-block-small">
                                        <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                        <span class="text-c-blue f-w-600">No. of Exam</span>
                                        <h4>{{ $exam_count }}</h4>
                                        <div>
                                            <span class="f-left m-t-10 text-muted">
                                                <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Add New Exam
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card1 end -->
                       


 
                            </div>
                        </div>
                    </div>

                    <div id="styleSelector">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
