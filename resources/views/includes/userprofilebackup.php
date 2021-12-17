@include('layouts.Allcss')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('includes.Allheader')
@include('includes.sidebar')
 <div class="content-wrapper">
 <section class="content">
<div class="row">
        @if(Session::has('msg'))
        <div class="alert alert-success col-md-12">
         {{Session::get('msg')}}
  </div>
        @endif
        <section class="col-xl-8 col-lg-12 col-md-3 col-sm-6 col-8 connectedSortable">
        
      
          <div class="card">
                                <h3 class="card-header"><b>{{Auth::user()->name}}</b> Details <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm" style="float: right;" >Back</a></h3>
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
                                                        <th class="border-0">Number</th>
                                                        <th class="border-0">Designation</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($userdata as $data)
                                                    <tr>
                                                        <td>{{$data->id }}</td>
                                                        
                                                        <td>{{ $data->name }}</td>
                                                        
                                                        <td>{{ $data->email }} </td>
                                                        @if($data->Role_id==1)
                                                        <td>Admin User </td>
                                                        @else
                                                        <td>Sales User</td>
                                                        @endif
                                                        @if($data->is_Active==1)
                                                        <td>Active</td>
                                                        @else
                                                        <td style="color: red;">Inactive</td>
                                                        @endif
                                                        <td>{{ $data->Number }} </td>
                                                        <td>{{ $data->Designation }} </td>
                                                      
                                                    </tr>
                                                    @endforeach
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
             </section>
      </div>
 </section>
 </div>

 @include('layouts.Alljs')
        