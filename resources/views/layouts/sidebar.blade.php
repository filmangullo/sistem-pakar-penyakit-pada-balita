
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-orange elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-bold">Identifikasi Penyakit Paru</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item ">
            <a href="{{url('/')}}" class="nav-link ">
              <i class="fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          @if(Auth::check())
          <li class="nav-item ">
            <a href="{{url('/penyakit')}}" class="nav-link">
              <i class="fas fa-bug"></i>
              <p>
                Penyakit
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('/gejala')}}" class="nav-link">
              <i class="fas fa-thermometer-full"></i>
              <p>
                Gejala
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('/pengetahuan')}}" class="nav-link">
              <i class="fas fa-notes-medical"></i>
              <p>
                Pengetahuan
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item ">
            <a href="{{url('/diagnosa')}}" class="nav-link">
              <i class="fas fa-stethoscope"></i>
              <p>
                Diagnosa
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('/riwayat_diagnosa')}}" class="nav-link">
              <i class="fas fa-history"></i>
              <p>
                Riwayat Diagnosa
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('/about')}}" class="nav-link">
              <i class="fas fa-address-card"></i>
              <p>
                Tentang
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>