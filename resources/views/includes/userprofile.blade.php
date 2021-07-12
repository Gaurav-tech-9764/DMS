
@include('layouts.Allcss')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('includes.Allheader')
  <!-- Left side column. contains the logo and sidebar -->
 @include('includes.sidebar')
 <div class="content-wrapper" style="min-height: 1126px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
          <div class="box-body box-profile">
          @if(Auth::user()->picture==0)
          <img class="profile-user-img img-responsive img-circle" src="{{asset('./dist/img/avat.png')}}" alt="User profile picture">

                @else
              <img class="profile-user-img img-responsive img-circle" src="../uploads/profilepicture/{{Auth::user()->picture}}" alt="User profile picture">
           @endif
              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              <p class="text-muted text-center">Available</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email Id</b> <a class="pull-right">{{Auth::user()->email}} </a>
                </li>
                <li class="list-group-item">
                  <b>Designation</b> <a class="pull-right">{{Auth::user()->designation}} </a>
                </li>
               
              </ul>
              <a  href="javascript:void(0)" onclick="uploadeimage({{Auth::user()->id}})"class="btn btn-primary btn-block"><b>Change Profile Image</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#About" data-toggle="tab">About Me</a></li>
              </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="About">
                <!-- Post -->
                <div class="box-body">
                <strong><i class="fa fa-user margin-r-5"></i>Name</strong>

              <p class="text-muted">
              {{Auth::user()->name}}
              </p>

              <hr>
              <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>

                  <p class="text-muted">
                  {{Auth::user()->email}}
                  </p>

                  <hr>
              <strong><i class="fa fa-mobile-phone margin-r-5"></i>Number</strong>

              <p class="text-muted">
              {{Auth::user()->number}}
              </p>

              <hr>

              <strong><i class="fa fa-user-circle-o  margin-r-5"></i>Role</strong>

              <p class="text-muted">   @if(Auth::user()->role_id==1 )
               
                                                        Admin User 
                                                        @else
                                                        @if(Auth::user()->role_id==3)
                                                        Super Admin
                                                      @else
                                                        Sales User
                                                        @endif
                                                        @endif
              </p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i>Status</strong>

              <p>
              @if(Auth::user()->is_Active==1)
              <span class="label label-success">Active</span>
              @else
              <span class="label label-danger">Inactive</span>
              @endif
              </p>
          </div>
              </div>
             

              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>





<!-- Modal start-->
<div class="modal fade" id="UploadimageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Upload Profile Picture</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- Modal Body start-->
       <form id="Uploadimageform">
                            @csrf
                            <input type="hidden" name="id" id="id">

                    
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Select Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" >
                                <span class="text-danger error-text image_error"></span>
                            </div>
                        </div>
                      
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload') }}
                                </button>
                            </div>
                        </div>
                    </form>
        
        <!-- Modal Body End-->
      </div>
      
    </div>
  </div>
</div>

<!-- Modal start-->
 @include('layouts.Alljs')

 <script>
                    function uploadeimage(id){

                  

                      $(document).ready(function (){
                        $('#UploadimageModal').modal('toggle');
                    
                      
                      $('#Uploadimageform').on('submit', function(e){
                      e.preventDefault();

                      $.ajax({
                      type:"POST",
                      url:'/userlist/uploadimage/'+id,
                      data:new FormData(this),
                       processData:false,
                      dataType:'json',
                      contentType:false,
                        beforeSend:function(){
              $(document).find('span.error-text').text('');
          },
             success:function(data){
              if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                      $('span.'+prefix+'_error').text(val[0]);
                  });
              }else{
                  $('#Uploadimageform')[0].reset();
                  alert(data.msg);
                  location.reload();
              }
          }



                      });

                      });

                      });
 };
</script>

</div>
</body>