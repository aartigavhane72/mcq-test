
@extends('layouts.app')

@section('content')

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
                            <div class="d-inline">
                                <h4>Student List</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        
                    </div>
                
            <!-- Page-header end -->

            <!-- Page body start -->
            
            <!-- Basic table card start -->
            <div class="container" style="margin: 10px;">
                
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table id="example" class="display" style="width:100%;">
                            <thead>
                                <tr>
                                    <th width="150px">No.</th>
                                    <th>Name</th>
                                    <th>User Id</th>
                                    <th>Contact No.</th>
                                    <th class="text-success">Created At</th>
                                  <th></th>
                                </tr>
                                {{ csrf_field() }}
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                            @foreach ($students as $value)
                                <tr class="student{{$value->id}}">
                                    <td>{{ $no++}} </td>
                                    <td>{{ $value->name }} </td>
                                    <td>{{ $value->student_id }} </td>
                                    <td>{{ $value->contact}} </td>
                                    <td class="text-success">{{ $value->created_at }} </td>
                                    <td>
                                        <a href="{{url('getfulldetailstudresult/1', $value->student_id)}}" class="btn-primary btn-sm"><i class="icofont icofont-eye-alt"></i></a>
                                      
                                        <a onclick="Delete_user( '{{ $value->id }}','{{ $value->name }}','{{ $value->student_id }}' )" href="#" class="detete-modal btn btn-danger btn-sm" data-id="{{ $value->id }}" data-name="{{ $value->name }}" data-student_id ="{{ $value->student_id }}">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
            <!-- Page body end -->
            </div>
            </div>
         </div>
     </div>
     <!-- Main-body end -->
           
</div>
</div>
</div>                    
    <!--  Show Post -->
        <div id="show" class="modal fade" role="dialog">
              <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                            <h5 id="msg" class="text-success"></h5>
                        </div>
                        <div class="modal-body" style="margin: 0px auto;">
                            <p class="text-primary">Name : <span id = "view_name"></span> </p>
                            <p class="text-primary">Student Id :<span id = "view_student_id"></span>  </p>
                            <p class="text-primary">Institution Id :<span id = "view_institution_id"></span>  </p>
                            <p class="text-primary">Created At :<span id = "view_created_at"></span>  </p>
                            <p class="text-danger">Expired At : <span id = "view_validity"></span></p>
                        </div>
                        <div class="modal-footer">
                         
                            <button class="btn btn-warning hidden" type="button" id="spin">
                            <i class="fa fa-spinner fa-spin" ></i> pls Wait...
                            </button>
                            <button class="btn btn-warning" type="button" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remobe"></span>Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
     <!--  End Show Post -->  


            <!--  Delete Post -->
            <div id="delete_modal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                            <h5 id="msg" class="text-success"></h5>
                        </div>
                        <div class="modal-body" style="margin: 0px auto;">
                            <p class="text-primary">ID : <span id = "delete_id"></span> </p>
                            <input type="hidden" id ="did" name="did">
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

@endsection
