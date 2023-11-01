 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{route('layouts.dashboard')}}" class="brand-link">
         <img src="{{ asset('frontend') }}/dist/img/blud.png" alt="AdminLTE Logo" class="brand-image elevation-10" style="opacity: .8">
         <span class="brand-text font-weight-light">BLUD RS Konawe</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('frontend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Admin</a>
             </div>
         </div>
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="{{ route ('kegiatan.index')}}" class="nav-link @yield('menuKegiatan')">
                         <i class="nav-icon far fa-calendar-alt"></i>
                         <p>
                             Kegiatan
                             <span class="badge badge-info right">0</span>
                         </p>
                     </a>
                 </li>
                 <li class="nav-item @yield('menuOpen')">
                     <a href="#" class="nav-link @yield('menuBuka')">
                         <i class="nav-icon fas fa-copy"></i>
                         <p>
                             Master Data
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{route ('unitkerja.index')}}" class="nav-link @yield('menuUnit')">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Unit Kerja</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route ('jabatan.index')}}" class="nav-link @yield('menuJabatan')">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Jabatan</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route ('skp.index')}}" class="nav-link @yield('menuSkp')">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>SKP</p>
                             </a>
                         </li>
                     </ul>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>