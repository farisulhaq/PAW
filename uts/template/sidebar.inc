<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/logo.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">TATIB</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="./index.php" class="nav-link <?php (end((explode('/', $_SERVER['SCRIPT_NAME']))) == 'index.php') ? print 'active' : print '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./guru.php" class="nav-link <?php (end((explode('/', $_SERVER['SCRIPT_NAME']))) == 'guru.php') ? print 'active' : print '' ?>">
                        <i class="nav-icon bi bi-person-fill"></i>
                        <p>Guru</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./insert.php" class="nav-link <?php (end((explode('/', $_SERVER['SCRIPT_NAME']))) == 'insert.php') ? print 'active' : print '' ?>">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Siswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./insert.php" class="nav-link <?php (end((explode('/', $_SERVER['SCRIPT_NAME']))) == 'insert.php') ? print 'active' : print '' ?>">
                        <i class="nav-icon bi bi-person-workspace"></i>
                        <p>Wali Kelas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./insert.php" class="nav-link <?php (end((explode('/', $_SERVER['SCRIPT_NAME']))) == 'insert.php') ? print 'active' : print '' ?>">
                        <i class="nav-icon bi bi-bookmark-star-fill"></i>
                        <p>Kasus</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./insert.php" class="nav-link <?php (end((explode('/', $_SERVER['SCRIPT_NAME']))) == 'insert.php') ? print 'active' : print '' ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Pelanggaran</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>