<style type="text/css">
.chosen-choices {
    border: 1px solid #ccc;
    border-radius: 4px;
    min-height: 34px;
    padding: 6px 12px;
}
.chosenContainer .form-control-feedback {
    /* Adjust feedback icon position */
    right: -15px;
}
.chosenContainer .form-control {
    height: inherit; 
    padding: 0px;
}
</style>
@extends('layouts.app')

@section('content')

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
                                                        <h4>Students List</h4>
                                                      
                                                    </div>
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
                                                            <th width="150px">No.</th>
                                                            <th>Name</th>
                                                            <th>User Id</th>
                                                            <th class="text-success">Created At</th>
                                                            <th class="text-center" width="150px">
                                                                <a href="#" class="create-model btn btn-success btn-sm">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                </a>
                                                            </th>
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
                                                            <td class="text-success">{{ $value->created_at }} </td>
                                                            <td>
                                                            
                                                                <a onclick="viewdetil( '{{ $value->name }}','{{ $value->student_id }}', '{{Auth::user()->id}}','{{ $value->created_at }}','{{ $value->validity }}' )" href="#" class="show-modal btn btn-info btn-sm" data-id="{{ $value->id }}" data-name="{{ $value->name }}" data-student_id ="{{ $value->student_id }}">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                                </a>
                                                         
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
                                    
                                    <!-- Page body end -->
                                    </div>
                                    </div>
                                 </div>
                             </div>
                             <!-- Main-body end -->
                                   
                        </div>
                    </div>
                </div>
               
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
                        
@endsection

