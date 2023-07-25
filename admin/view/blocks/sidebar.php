<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="<?=ADMIN_ASSETS?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">WebForte</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$loggedUserImage?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$_SESSION['user']['login']?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Kitoblar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin?controller=news_category" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kitob categoriyalari</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin?controller=book" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kitoblar</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin?controller=menu" class="nav-link">
                        <i class="nav-icon fas fa-hamburger"></i>
                        <p>
                            Menyular
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin?controller=quote" class="nav-link">
                        <i class="nav-icon fas fa-feather"></i>
                        <p>
                            Quotelar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin?controller=social_links" class="nav-link">
                        <i class="nav-icon fas fa-share-alt"></i>&nbsp
                        <p>
                            Ijtimoiy Tarmoqlar
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin?controller=user" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>&nbsp
                        <p>
                            Foydalanuvchilar
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>