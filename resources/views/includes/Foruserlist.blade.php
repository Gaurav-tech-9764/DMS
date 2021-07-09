

@include('layouts.Allcss')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('includes.Allheader')
  <!-- Left side column. contains the logo and sidebar -->
 @include('includes.sidebar')
 <div class="content-wrapper">
 <section class="content">
<div class="row">

      
        <section class="col-xl-8 col-lg-12 col-md-3 col-sm-6 col-8 connectedSortable">
        @if(Auth::user()->Role_id == 1||Auth::user()->Role_id == 3)
        <a href="#" class="btn btn-success"  data-toggle="modal" data-target="#AddUserModal" style="float: fix;" title="Add Users" ><i class="fa fa-user-plus margin-r-5" aria-hidden="true"></i>Add Users</a>
         @endif
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
                                <h3 class="card-header">Users List <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm" style="float: right;" title="Back" ><i class="fa fa-chevron-circle-left fa-lg"></i></a></h3>
                                <hr>    
                                <div class="card-body p-4">
                                         <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">ID</th>
                                                        <th class="border-0">Name</th>
                                                        <th class="border-0">Email</th>
                                                        <th class="border-0">Role</th>
                                                        <th class="border-0">Status</th>
                                                        @if(Auth::user()->Role_id == 1||Auth::user()->Role_id == 3)
                                                        <th class="border-0">Edit</th>
                                                        <th class="border-0">Delete</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($List as $user)
                                                    <tr>
                                                        <td>{{ $user->id }}</td>
                                                        
                                                        <td>{{ $user->name }}</td>
                                                        
                                                        <td>{{ $user->email }} </td>
                                                        @if($user->Role_id==1)
                                                        <td>Admin User </td>
                                                        @else
                                                        <td>Sales User</td>
                                                        @endif
                                                        @if($user->is_Active==1)
                                                        <td>Active</td>
                                                        @else
                                                        <td style="color: red;">Inactive</td>
                                                        @endif
                                                        @if(Auth::user()->Role_id == 1||Auth::user()->Role_id == 3)
                                                        <!-- <td><a href="{{url('userlist/edit/'.$user->id)}}" class="btn btn-success" >Edit</a> </td> -->

                                                        <td><a href="javascript:void(0)" onclick="Edituser({{$user->id}})" class="btn btn-info" title="Edit user"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i></a> </td>
                                                        <!-- <td><a href="{{url('userlist/delete/'.$user->id)}}" onclick="deleteUser()" class="btn btn-danger" > Delete</a> </td> -->
                                                        <td><a href="javascript:void(0)" class="btn btn-danger" onclick="deleteUser({{$user->id}})" title="User InActive"> <i class="fa fa-trash fa-lg" aria-hidden="true"></i></a> </td>
                                                      @endif
                                                    </tr>
                                                    @endforeach
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{$List->links()}} 
             </section>
      </div>
  </section>
 </div>
 </div>
<!-- Add user using Ajax -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><b>Add User</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  
      <div class="modal-body">
      <form id="AddUser" >
                                 @csrf

                                <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}"  autocomplete="name"  autofocus>
                                        <span class="text-danger error-text name_error"></span>
                                    </div>
                                </div>
                        
                            <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}"  autocomplete="email">

                                            <span class="text-danger error-text email_error"></span>
                                    </div>
                            </div>
                            <div class="form-group row">
                                     <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                <div class="col-md-6">
                                    <select name="role"class="form-control @error('role') is-invalid @enderror" value="{{old('role')}}"id="role">
                                    <option value="" disabled selected>Select your Role</option>
                                    @foreach($role as $key => $Role)
                                    <option value="{{$Role->id}}">{{$Role->Roles}}</option>
                                @endforeach
                                    </select>
                             
                                    <span class="text-danger error-text role_error"></span>
                                </div>
                            </div>
                          <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                    <span class="text-danger error-text password_error"></span>
                                </div>
                         </div>
                        
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                        </div>
                                    </div>
                      
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12 text-center offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Add User') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
           </div>
    
    </div>
  </div>
</div>
<!-- End Add user modal -->


<!-- Start edit user modal -->
<!-- Modal -->
<div class="modal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><b>Edit User</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="EditUserForm">
                            @csrf
                            <input type="hidden" name="id" id="id">
                     <div class="form-group row">
                                 <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                  <input id="Editname" type="text" class="form-control @error('name') is-invalid @enderror" name="Editname" value="{{ old('name',$user->name) }}"  autocomplete="name"  autofocus>
                                  <span class="text-danger error-text Editname_error"></span>
                                </div>
                             </div>
                        
                         <div class="form-group row">
                             <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                              <input id="Editemail" type="email" class="form-control @error('email') is-invalid @enderror" name="Editemail" value="{{ old('email',$user->email) }}"  autocomplete="email">
                              <span class="text-danger error-text Editemail_error"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                         <div class="col-md-6">
                            <select name="Editrole"class="form-control @error('role') is-invalid @enderror"  id="Editrole">
                            @if($user->Role_id==1)
                            <option value="1"selected> User Admin</option>
                            @else
                            <option value="2" selected>Sales User</option>
                            @endif
                            @foreach($role as $key => $Role)
                            <option value="{{$Role->id}}">{{$Role->Roles}}</option>
                           @endforeach
                            </select>
                            <span class="text-danger error-text Editrole_error"></span>
                            </div>
                            
                        </div>
                    @if(Auth::user()->Role_id == 1||Auth::user()->Role_id == 3)
                           
                        <div class="form-group row">
                            <label for="Status" class="col-md-4 col-form-label text-md-right">{{ __('User Status') }}</label>

                            <div class="col-md-6">
                         <select name="EditStatus"class="form-control @error('role') is-invalid @enderror"  id="EditStatus">
                            @if($user->is_Active=1)
                            <option value="1"selected> Active</option>
                            @else
                            <option value="0" selected>Inactive</option>
                            @endif
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        
                        </select>
                        <span class="text-danger error-text EditStatus_error"></span>
                          
                            </div>
                            
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="Number" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="EditNumber" type="text" class="form-control @error('Number') is-invalid @enderror" value="{{ old('Number',$user->Number) }}" name="EditNumber" >
                                <span class="text-danger error-text EditNumber_error"></span>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="Designation" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>

                            <div class="col-md-6">
                                <input id="EditDesignation" type="text" class="form-control @error('Designation') is-invalid @enderror"  value="{{ old('Designation',$user->Designation) }}" name="EditDesignation"  >

                                <span class="text-danger error-text EditDesignation_error"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="Editpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="Editpassword"  autocomplete="new-password">
                                <span class="text-danger error-text Editpassword_error"></span>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="Editpassword-confirm" type="password" class="form-control" name="Editpassword_confirmation"  autocomplete="new-password">
                            </div>
                        </div>
                      
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
           </div>
    
    </div>
  </div>
</div>



<!-- end edit user modal -->
             <!-- js -->
            <!-- ============================================================== -->
            @include('layouts.Alljs')
            <!-- ============================================================== -->
            <!-- js -->


                        <!-- Add user using Ajax -->
                        <script>

                        $(document).ready(function (){
                        $('#AddUser').on('submit', function(e){
                        e.preventDefault();

                        $.ajax({
                        type:"POST",
                        url:"{{route('createUser')}}",
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
                    $('#AddUser')[0].reset();
                    alert(data.msg);
                    location.reload();
                }
            }



                        });

                        });

                        });
                        </script>
<script>    $('#closemodal').click(function() {
    $('#AddUserModal').modal('hide');
});</script>

                        <script>

                        function deleteUser($id){


                        if(confirm("Do you Really want to delete User?"))
                        {
                        
                        $.ajax({

                          url:'/userlist/delete/'+$id,
                          type:'GET',
                          data:{

                            _token:$("input[name=_token]").val()
                          },
                          success:function(response){
                            alert(response.success);
                            location.reload();
                          }

                        })
                        }
                        }
                        </script>
                        <script>
                          const timeout = document.getElementById("alertmsg")
                          setTimeout(hideElement, 5000) //milliseconds until timeout//
                          function hideElement() {
                            timeout.style.display = 'none';
                          }
                        </script>

                        <!-- script for edit user-->
            <script>
                    function Edituser(id){

                      $.get('/userlist/EditUser/'+id,function(getuser){

                      $('#id').val(getuser.id);
                      $('#Editname').val(getuser.name);
                      $('#Editemail').val(getuser.email);
                      $('#Editrole').val(getuser.Role_id);
                      $('#EditStatus').val(getuser.is_Active);
                      $('#EditNumber').val(getuser.Number);
                      $('#EditDesignation').val(getuser.Designation);
                      $('#EditUserModal').modal('toggle');
                    


                      });

                      $(document).ready(function (){
                      
                      $('#EditUserForm').on('submit', function(e){
                      e.preventDefault();

                      $.ajax({
                      type:"POST",
                      url:'/userlist/Update/'+id,
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
                  $('#EditUserForm')[0].reset();
                  alert(data.msg);
                  location.reload();
              }
          }
        });
        });
    });
    };
 </script>

                        <!-- script for edit user end-->

</body>
</html>