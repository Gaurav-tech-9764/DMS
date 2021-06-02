
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
        <a href="#" class="btn btn-success"  data-toggle="modal" data-target="#Addproduts" style="float: fix;" title="Add Product" ><i class="fa fa-product-hunt margin-r-5" aria-hidden="true"></i>Add Product</a>
        <div class="card">
                                <h3 class="card-header">Products List <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm" style="float: right;" title="Back" ><i class="fa fa-chevron-circle-left fa-lg"></i></a></h3>
                                <hr>    
                                <div class="card-body">
                                         <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light" style="text-align: justify;">
                                                    <tr class="border-0">
                                                        <th class="border-0">ID</th>
                                                        <th class="border-0">Product Name</th>
                                                        <th class="border-0">Product Description</th>
                                                         <th class="border-0">Category</th>
                                                        <th class="border-0">Product Price</th>
                                                        <th class="border-0">Product Image</th>
                                                        <th class="border-0">Edit</th>
                                                        <th class="border-0">Delete</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($products as $list)
                                                    <tr>
                                                        <td>{{ $list->id }}</td>
                                                        <td>{{ $list->Product_Name }}</td>
                                                        <td>{{ $list->Product_description }} </td>
                                                        <td>{{ $list->Category_Name }} </td>
                                                        <td>{{ $list->product_price }} </td>
                                                        <td><img src="../uploads/Productimage/{{ $list->product_image }}" width="100" height="100" class="user-image" title="{{ $list->product_image }}" alt="User Image"> </td>
                                                        <td><a href="javascript:void(0)"  onclick="EditProduct({{$list->id}})" class="btn btn-info" title="Edit Product"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i></a> </td>
                                                        <td><a href="javascript:void(0)"  onclick="deleteProduct({{$list->id}})" class="btn btn-danger" title="Delete Product"> <i class="fa fa-trash fa-lg" aria-hidden="true"></i></a> </td>
                         
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



<!-- Add product Modal -->
<!-- Modal start-->
<div class="modal fade" id="Addproduts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Add Product</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- Modal Body start-->
       <form id="Addproductform" >
                                 @csrf

                                <div class="form-group row">
                                        <label for="Product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="Product_name" type="text" class="form-control @error('Product_name') is-invalid @enderror" name="Product_name" value="{{old('Product_name')}}"  autocomplete="Product_name"  autofocus>
                                        <span class="text-danger error-text Product_name_error"></span>
                                    </div>
                                </div>
                        
                            <div class="form-group row">
                                        <label for="Product_Description" class="col-md-4 col-form-label text-md-right">{{ __('Product Description') }}</label>
                                    <div class="col-md-6">
                                            <input id="Product_Description" type="text" class="form-control @error('Product_Description') is-invalid @enderror" name="Product_Description" value="{{old('Product_Description')}}"  autocomplete="Product_Description">

                                            <span class="text-danger error-text Product_Description_error"></span>
                                    </div>
                            </div>
                            <div class="form-group row">
                                     <label for="Product_category" class="col-md-4 col-form-label text-md-right">{{ __('Product Category') }}</label>
                                <div class="col-md-6">
                                    <select name="Product_category" class="form-control @error('Product_category') is-invalid @enderror" value="{{old('Product_category')}}" id="Product_category">
                                    <option value="" disabled selected>Select your Product Category</option>
                                    @foreach($Category as $key => $list)
                                    <option value="{{$list->id}}">{{$list->Category_Name}}</option>
                                @endforeach
                            
                                    </select>
                                <span class="text-danger error-text Product_category_error"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                        <label for="Product_Price" class="col-md-4 col-form-label text-md-right">{{ __('Product Price') }}</label>
                                    <div class="col-md-6">
                                            <input id="Product_Price" type="text" class="form-control @error('Product_Price') is-invalid @enderror" name="Product_Price" value="{{old('Product_Price')}}"  autocomplete="Product_Price">

                                            <span class="text-danger error-text Product_Price_error"></span>
                                    </div>
                            </div>
                                
                        <div class="form-group row">
                            <label for="product_image" class="col-md-4 col-form-label text-md-right">{{ __('Add Product Image') }}</label>

                            <div class="col-md-6">
                                <input id="product_image" type="file" class="form-control" name="product_image" >
                                <span class="text-danger error-text product_image_error"></span>
                            </div>
                        </div>
                              <div class="form-group row mb-0">
                                        <div class="col-md-12 text-center offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Add Product') }}
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

<!-- Start edit Product modal -->
<!-- Modal -->
<div class="modal fade" id="EditproductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><b>Edit Produst</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="Editproductform" >
                                 @csrf
                                 <input type="hidden" name="id" id="id">
                                <div class="form-group row">
                                        <label for="EditProduct_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="EditProduct_name" type="text" class="form-control @error('EditProduct_name') is-invalid @enderror" name="EditProduct_name" value="{{old('EditProduct_name')}}"  autocomplete="EditProduct_name"  autofocus>
                                        <span class="text-danger error-text EditProduct_name_error"></span>
                                    </div>
                                </div>
                        
                            <div class="form-group row">
                                        <label for="EditProduct_Description" class="col-md-4 col-form-label text-md-right">{{ __('Product Description') }}</label>
                                    <div class="col-md-6">
                                            <input id="EditProduct_Description" type="text" class="form-control @error('EditProduct_Description') is-invalid @enderror" name="EditProduct_Description" value="{{old('EditProduct_Description')}}"  autocomplete="EditProduct_Description">

                                            <span class="text-danger error-text EditProduct_Description_error"></span>
                                    </div>
                            </div>
                            <div class="form-group row">
                                     <label for="EditProduct_category" class="col-md-4 col-form-label text-md-right">{{ __('Product Category') }}</label>
                                <div class="col-md-6">
                                    <select name="EditProduct_category" class="form-control @error('EditProduct_category') is-invalid @enderror" value="{{old('EditProduct_category')}}" id="EditProduct_category">
                                    <option value="" disabled selected>Select your Product Category</option>
                                    @foreach($Category as $key => $list)
                                    <option value="{{$list->id}}">{{$list->Category_Name}}</option>
                                @endforeach
                            
                                    </select>
                                <span class="text-danger error-text EditProduct_category_error"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                        <label for="EditProduct_Price" class="col-md-4 col-form-label text-md-right">{{ __('Product Price') }}</label>
                                    <div class="col-md-6">
                                            <input id="EditProduct_Price" type="text" class="form-control @error('EditProduct_Price') is-invalid @enderror" name="EditProduct_Price" value="{{old('EditProduct_Price')}}"  autocomplete="EditProduct_Price">

                                            <span class="text-danger error-text EditProduct_Price_error"></span>
                                    </div>
                            </div>
                                
                        <div class="form-group row">
                            <label for="Editproduct_image" class="col-md-4 col-form-label text-md-right">{{ __('Add Product Image') }}</label>

                            <div class="col-md-6">
                                <input id="Editproduct_image" type="file" class="form-control" name="Editproduct_image" >
                                <span class="text-danger error-text Editproduct_image_error"></span>
                            </div>
                        </div>
                              <div class="form-group row mb-0">
                                        <div class="col-md-12 text-center offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update Product') }}
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
<!-- Add product script -->
       <script>

              $(document).ready(function (){
              $('#Addproductform').on('submit', function(e){
              e.preventDefault();

              $.ajax({
              type:"POST",
              url:"{{route('Addproducts')}}",
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
              $('#Addproductform')[0].reset();
              alert(data.msg);
              location.reload();
              }
              }
             });
          });
      });
      </script>

      <!-- //Add product script -->
<!-- Edite Category script -->
<script>
                    function EditProduct(id){
                      $.get('/products/Editproducts/'+id,function(getproducts){
                      $('#id').val(getproducts.id);
                      $('#EditProduct_name').val(getproducts.Product_Name);
                      $('#EditProduct_Description').val(getproducts.Product_description);
                      $('#EditProduct_category').val(getproducts.id);
                      $('#EditProduct_Price').val(getproducts.product_price);
         
                      $('#EditproductModal').modal('toggle');
                    


                      });

                      $(document).ready(function (){
                      
                      $('#Editproductform').on('submit', function(e){
                      e.preventDefault();

                      $.ajax({
                      type:"POST",
                      url:'/products/Updateproducts/'+id,
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
                  $('#Editproductform')[0].reset();
                  alert(data.msg);
                  location.reload();
              }
          }
        });
        });
    });
    };
 </script>
 <!-- Delete product script -->


                <script>

                        function deleteProduct($id){


                        if(confirm("Do you Really want to delete Product?"))
                        {

                        $.ajax({

                          url:'/products/Deleteproducts/'+$id,
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

</div>
</body>