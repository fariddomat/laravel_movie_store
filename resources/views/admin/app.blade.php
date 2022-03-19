@include('admin.layouts._header')
@include('admin.layouts._sidebar')
      <!-- Navbar -->
@include('admin.layouts._navbar')
<div class="content">
    <div class="container-fluid">
@yield('content')
    </div>
</div>
@include('admin.layouts._footer')
