 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

     <div class="d-flex align-items-center justify-content-between">
         <a href="index.html" class="logo d-flex align-items-center">
             <img src="assets/img/logo.png" alt="">
             <span class="d-none d-lg-block">AHASS MOTOR</span>
         </a>
         <i class="bi bi-list toggle-sidebar-btn"></i>
     </div><!-- End Logo -->

     <div class="search-bar">
         <form class="search-form d-flex align-items-center" method="POST" action="#">
             <input type="text" name="query" placeholder="Search" title="Enter search keyword">
             <button type="submit" title="Search"><i class="bi bi-search"></i></button>
         </form>
     </div><!-- End Search Bar -->

     <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">

             <li class="nav-item d-block d-lg-none">
                 <a class="nav-link nav-icon search-bar-toggle " href="#">
                     <i class="bi bi-search"></i>
                 </a>
             </li><!-- End Search Icon-->

             <li class="nav-item dropdown pe-3">
                 <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                     <img src="assets/img/messages-1.jpg" alt="Profile" class="rounded-circle">
                     <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                 </a><!-- End Profile Iamge Icon -->

                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="index.php">
                             <i class="bi bi-box-arrow-right"></i>
                             <span>Sign Out</span>
                         </a>
                     </li>

                 </ul><!-- End Profile Dropdown Items -->
             </li><!-- End Profile Nav -->

         </ul>
     </nav><!-- End Icons Navigation -->

 </header><!-- End Header -->

 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link collapsed" href="media.php?page=home">
                 <i class="bi bi-grid"></i>
                 <span>Beranda</span>
             </a>
         </li>


         }

         ?>
         <li class="nav-item">
             <a class="nav-link collapsed" href="media.php?page=kasir">
                 <i class="bi bi-menu-button-wide"></i>
                 <span>Data Kasir</span>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-journal-text"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="media.php?page=produk">
                         <i class="bi bi-layout-text-window-reverse"></i><span>Data Produk</span>
                     </a>
                 </li>
                 <li>
                     <a href="media.php?page=customer">
                         <i class="bi bi-layout-text-window-reverse"></i><span>Data Customer</span>
                     </a>
                 </li>
                 <li>
                     <a href="media.php?page=supplier">
                         <i class="bi bi-layout-text-window-reverse"></i><span>Data Supplier</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End Components Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-journal-text"></i><span>Data Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="media.php?page=pembelian">
                         <i class="bi bi-circle"></i><span>Data Pembelian</span>
                     </a>
                 </li>
                 <li>
                     <a href="media.php?page=penjualan">
                         <i class="bi bi-circle"></i><span>Data Penjualan</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End Forms Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-layout-text-window-reverse"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="media.php?page=laporan-pembelian">
                         <i class="bi bi-circle"></i><span>Laporan Pembelian</span>
                     </a>
                 </li>
                 <li>
                     <a href="media.php?page=laporan-penjualan">
                         <i class="bi bi-circle"></i><span>Laporan Penjualan</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End Tables Nav -->
     </ul>

 </aside><!-- End Sidebar-->

 </header><!-- End Header -->