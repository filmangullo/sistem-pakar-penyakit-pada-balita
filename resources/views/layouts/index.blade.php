@include('layouts.head')
<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    @include('layouts.header')
    @include('layouts.sidebar')
  
    {{-- Content --}}
    @yield('content')
    {{-- End Content --}}
  
    @include('layouts.footer')
  </div>
  
@include('layouts.js')
  