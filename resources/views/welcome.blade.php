@include('layouts.welcomecss')
@include('layouts.Allcss')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">DMS</a>

  <div class="collapse navbar-collapse"style="text-align: right;" >
    <div class="navbar-nav" style="float: right;" >
    @if (Route::has('login'))
        @auth
        <a href="{{ url('dashboard') }}"><button type="button" class="btn btn-outline-success btn-lg">Home</button></a>
    @else
    <a href="{{ route('login') }}"> <button type="button" class="btn btn-outline-success btn-lg">Login</button></a>
     
    @endauth
    @endif
    </div>
  </div>
</nav>
