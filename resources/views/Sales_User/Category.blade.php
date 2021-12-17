
@include('layouts.Allcss')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('includes.Allheader')
  <!-- Left side column. contains the logo and sidebar -->
 @include('includes.sidebar')
 <div class="content-wrapper" style="min-height: 1126px;">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
   

      <div class="row">
   
        <!-- /.col -->
        <div class="col-sm-6 col-8 col-lg-12">
        <a href="#" class="btn btn-success"  data-toggle="modal" data-target="#AddCategory" title="Add Category" ><i class="fa fa-list-alt margin-r-5" aria-hidden="true"></i>Add Category</a>
    
       
        <div class="card">
                                <h3 class="card-header">Category List <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm" style="float: right;" title="Back" ><i class="fa fa-chevron-circle-left fa-lg"></i></a></h3>
                                <hr>    
                                <div class="card-body">
                                         <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Sr.No.</th>
                                                        <th class="border-0">Category Name</th>
                                                        <th class="border-0">Category Description</th>
                                                        <th class="border-0">Edit</th>
                                                        <th class="border-0">Delete</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               @foreach ($Category as $list)
                                                    <tr>
                                                        <td>{{ $n++ }}</td>
                                                        
                                                        <td>{{ $list->Category_Name }}</td>
                                                        
                                                        <td>{{ $list->Category_description }} </td>
                                                       
                                                     

                                                        <td><a href="javascript:void(0)"  onclick="EditeCategory({{$list->id}})" class="btn btn-info" title="Edit Category"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i></a> </td>
                                                     
                                                        <td><a href="javascript:void(0)" class="btn btn-danger" onclick="deleteCategory({{$list->id}})" title="Delete Category"> <i class="fa fa-trash fa-lg" aria-hidden="true"></i></a> </td>
                         
                                                    </tr>
                                                    @endforeach
                                                    
                                                    
                                                </tbody>
                                         
                                            </table>
                                        </div>
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



<!-- Add Category Modal -->
<!-- Modal start-->
<div class="modal fade" id="AddCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Add Category</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- Modal Body start-->
       <form id="Addcategoryform" >
                                 @csrf

                                <div class="form-group row">
                                        <label for="Category_name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="Category_name" type="text" class="form-control @error('Category_name') is-invalid @enderror" name="Category_name" value="{{old('Category_name')}}"  autocomplete="Category_name"  autofocus>
                                        <span class="text-danger error-text Category_name_error"></span>
                                    </div>
                                </div>
                        
                            <div class="form-group row">
                                        <label for="Category_Description" class="col-md-4 col-form-label text-md-right">{{ __('Category Description') }}</label>
                                    <div class="col-md-6">
                                            <input id="Category_Description" type="text" class="form-control @error('Category_Description') is-invalid @enderror" name="Category_Description" value="{{old('Category_Description')}}"  autocomplete="Category_Description">

                                            <span class="text-danger error-text Category_Description_error"></span>
                                    </div>
                            </div>
                              <div class="form-group row mb-0">
                                        <div class="col-md-12 text-center offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Add Category') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
        
        <!-- Modal Body End-->
      </div>
      
    </div>
  </div>
</div>

<!-- Add Category Modal  end-->

<!-- Start edit Category modal -->
<!-- Modal -->
<div class="modal fade" id="EditCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><b>Edit Category</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="EditCategoryForm">
                            @csrf
                            <input type="hidden" name="id" id="id">
                     <div class="form-group row">
                                 <label for="EditCategory_name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>
                                <div class="col-md-6">
                                  <input id="EditCategory_name" type="text" class="form-control @error('EditCategory_name') is-invalid @enderror" name="EditCategory_name"  autocomplete="EditCategory_name"  autofocus>
                                  <span class="text-danger error-text EditCategory_name_error"></span>
                                </div>
                             </div>
                        
                         <div class="form-group row">
                             <label for="EditCategory_Description" class="col-md-4 col-form-label text-md-right">{{ __('Category Description') }}</label>
                            <div class="col-md-6">
                              <input id="EditCategory_Description" type="text" class="form-control @error('EditCategory_Description') is-invalid @enderror" name="EditCategory_Description"  autocomplete="EditCategory_Description">
                              <span class="text-danger error-text EditCategory_Description_error"></span>
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

<!-- Modal start-->
 @include('layouts.Alljs')

       <script>

              $(document).ready(function (){
              $('#Addcategoryform').on('submit', function(e){
              e.preventDefault();

              $.ajax({
              type:"POST",
              url:"{{route('Addcategory')}}",
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
              $('#Addcategoryform')[0].reset();
              alert(data.msg);
              location.reload();
              }
              }
             });
          });
      });
      </script>
<!-- Edite Category script -->
<script>
                    function EditeCategory(id){
                      $.get('/category/EditCategory/'+id,function(getcategory){
                      $('#id').val(getcategory.id);
                      $('#EditCategory_name').val(getcategory.Category_Name);
                      $('#EditCategory_Description').val(getcategory.	Category_description);
                      $('#EditCategoryModal').modal('toggle');
                    


                      });

                      $(document).ready(function (){
                      
                      $('#EditCategoryForm').on('submit', function(e){
                      e.preventDefault();

                      $.ajax({
                      type:"POST",
                      url:'/category/UpdateCategory/'+id,
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
                  $('#EditCategoryForm')[0].reset();
                  alert(data.msg);
                  location.reload();
              }
          }
        });
        });
    });
    };
 </script>
 <!-- Delete Category script -->
 <script>

                        function deleteCategory($id){


                        if(confirm("Do you Really want to delete This Category ? That will deleted all the Related products Also!!"))
                        {
                        
                                      
                            $.ajax({

                              url:'/category/DeleteCategory/'+$id,
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

<!-- Delete category end -->
</div>
</body>