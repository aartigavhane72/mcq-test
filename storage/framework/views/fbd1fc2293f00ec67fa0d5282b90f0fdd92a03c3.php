<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- CSRF Token -->
        <meta id="token" name="token" content="<?php echo e(csrf_token()); ?>">   
       
	      <title>Conduct you Exam with Us</title>

    <!-- Bootstrap core CSS -->
    <link href="landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- Custom fonts for this template -->
    <link href="landing/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="landing/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="landing/css/creative.min.css" rel="stylesheet">
 
  </head>

  <body id="page-top">
  <input type="hidden" id="base_url" value="<?php echo url('/'); ?>">

    <!--Student Login  - ---------------------------- -->
    <div class="modal fade" id="studentlogin" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
            <h4><span class="glyphicon glyphicon-lock"></span>Student Login</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
    
          <form role="form">
            <div class="form-group hidden">
              <span class="alert-danger " id="error_msg"></span>
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Student Id</label>
              <input type="text" class="form-control" id="loginstudent_id" name="loginstudent_id" placeholder="Enter student Id">
              <span class="help-block hidden" id="error_student_id">
              </span>     
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Enter password">
              <span class="help-block hidden" id="error_student_pass">
              </span>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> style="margin-right:15px" >Remember me</label>
            </div>
            </form>
            <button id="std-login" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
        
        </div>
        <div class="modal-footer text-center">
           <p>Not a member? <a href="#" id="signup">Sign Up</a></p>

            </div>
      </div>
      
    </div>
  </div> 
    <!-- EndLogin And Registration - ---------------------------- -->
         <!--  form Create Post -->
      <div id="create" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <h4><span class="glyphicon glyphicon-lock"></span>Sign Up</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
        
              <form role="form">
                  <div class="form-group hidden">
                    <span class="alert-danger " id="rerror_msg"></span>
                  </div>
                  <div class="form-group">
                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Student Name : </label>
                    <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Enter student name">
                    <span class="help-block hidden" id="error_name_id">
                    </span>     
                  </div>
                  <div class="form-group">
                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Student Id : </label>
                    <input type="text" class="form-control" id="stid" name="stid" placeholder="Create New student Id">
                    <span class="help-block hidden" id="error_rstudent_id">
                    </span>     
                  </div>
                  <div class="form-group">
                    <label for="usrname"><span class="glyphicon glyphicon-user"></span>  Contact No : </label>
                    <input type="tel" class="form-control" id="contact" name="contact" placeholder="Create New student Id">
                    <span class="help-block hidden" id="error_contact_id">
                    </span>     
                  </div>
                  <div class="form-group">
                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password :</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Create New password">
                    <span class="help-block hidden" id="error_pass">
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Confirm Password : </label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter password">
                    <span class="help-block hidden" id="error_pass">
                    </span>
                  </div>
                  <div class="checkbox">
                    <label><span  style="margin-right:15px" ></span>Terms and Condition</label>
                  </div>
              </form>
                <button id="std-signup" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Sign Up</button>
            
            </div>
            <div class="modal-footer text-center">
              
               
            </div>
          </div>
          
        </div>
      </div>
    <!-- End signup -->
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		  <?php if(Route::has('login')): ?>
                    <?php if(auth()->guard()->check()): ?>
					<li class="nav-item">
						<a  class="nav-link js-scroll-trigger"href="<?php echo e(url('home')); ?>">Home</a>
         		   </li>
                        
                    <?php else: ?>
					<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#studentlogin">Student</a>
					</li>
          <?php endif; ?>
            <?php endif; ?>
           
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
        </div>
      </div>
    </header>

    <!-- Bootstrap core JavaScript -->
    <script src="landing/vendor/jquery/jquery.min.js"></script>
    <script src="landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="landing/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="landing/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="landing/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="landing/js/creative.min.js"></script>

  <script>
    // Add Question
    $(document).ready(function(){
             
            $("#signup").click(function(){
                $('#create').modal('show');
                $('.form-horizontal').show();
                $('.modal-title').text('Contact');
            });   
            $("#std-login").click(function(){
              
                $("#std-login").addClass('hidden'); 
                $('#std-login').text(""); 
                $('#std-login').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Processing ...');

                var data = new FormData();
              var base_url = $("#base_url").val();
                var urls = base_url + '/ajaxstudentlogin';
              
                data.append('student_id', $('input[name=loginstudent_id]').val());
                data.append('password', $('input[name=loginpassword]').val());
                data.append('remember', $('input[name=remember]').val());
                $("#error_msg").text(''); 
                $("#error_msg").addClass('hidden'); 
               $.ajax({
                   type : 'POST',
                   url : urls,
                   data: data,
                   contentType: false,
                   processData: false,
                   beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                
                   success: function(data) {
                       
                        
                        $('#std-login').text(""); 
                        $('#std-login').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Connecting ...');
                        console.log(data);
                        if(data.errors){
                       //     alert("err");
                            $("#error_msg").removeClass('hidden'); 
                            $('#error_msg').text("credentials are not correct");
                            $('#std-login').text(""); 
                            $('#std-login').append('Login');
                        } else{
                            $('#std-login').text(""); 
                            $('#std-login').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Redirecting ...');
                            window.location.replace("home");
                            $('#add_question_msg').text("Question Successfully Added");
                            console.log("ABC");
                        }
                   }
               }).fail(function (jqXHR, textStatus, error) {
                        
                        $('#errorModal').modal('show');
                 });
            });

              $("#std-signup").click(function(){     
                $('#std-signup').text(""); 
                $('#std-signup').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Processing ...');
                var base_url = $("#base_url").val();
                var urls = base_url + '/ajaxstudentsignup';
                var data = new FormData();
                var i = 0;
                
                data.append('name', $('input[name=student_name]').val());
                data.append('student_id', $('input[name=stid]').val());
                data.append('contact', $('input[name=contact]').val());
                data.append('password', $('input[name=password]').val());
                data.append('password_confirmation', $('input[name=password_confirmation]').val());

                $("#error_msg").text(''); 
                $("#error_msg").addClass('hidden'); 
               $.ajax({
                   type : 'POST',
                   url : urls,
                   data: data,
                   contentType: false,
                   processData: false,
                   beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                
                   success: function(data) {
                       
                        $('#std-signup').text(""); 
                        $('#std-signup').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Connecting ...');
                  //      console.log(data);
                        if(data.errors){
                       //     alert("err");
                            $("#rerror_msg").removeClass('hidden'); 
                            if(data.errors.name)
                                $('#rerror_msg').text(data.errors.name);
                            else if (data.errors.student_id)
                                $('#rerror_msg').text(data.errors.student_id);
                            else if (data.errors.contact)
                                $('#rerror_msg').text(data.errors.contact);
                            else if(data.errors.password)
                                $('#rerror_msg').text(data.errors.password);
                            else if(data.errors.password_confirmation)
                                $('#rerror_msg').text(data.errors.password_confirmation);
                            else 
                                $('#rerror_msg').text("Unknown Error! pls fill proper detail");

                             $('#std-signup').text(""); 
                             $('#std-signup').append('Sign Up');
                        } else if(data.msg){
                       //     alert("err");
                            $('#create').modal('hide');
                            $("#error_msg").removeClass('hidden'); 
                            $('#error_msg').text("NOW ! You Can Login !");
                            
                        } else{
                            $('#std-signup').text(""); 
                            $('#std-signup').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Redirecting ...');
                            window.location.replace("/home");
                      //      console.log("ABC");
                        }
                   }
               }).fail(function (jqXHR, textStatus, error) {
                        $('#std-signup').text(""); 
                        $('#std-signup').append('Sign Up');
                           
                        $('#errorModal').modal('show');
                 });
            });
        });
  </script>
  </body>

</html>
