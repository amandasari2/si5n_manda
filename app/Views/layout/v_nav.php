<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
  <ul class="nav navbar-nav">
    <li class=""><a href="<?= base_url('home') ?>">Home</a></li>
    <li><a href="<?= base_url('kategori') ?>">Kategori</a></li>
    <li><a href="<?= base_url('departemen') ?>">Departemen</a></li>
    <li><a href="<?= base_url('user') ?>">User</a></li>
    <li><a href="<?= base_url('arsip') ?>">Arsip</a></li>
  </ul>
</div>
<!-- /.navbar-collapse -->
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
    <!-- Messages: style can be found in dropdown.less-->
    <li class="dropdown messages-menu">
      <!-- Menu toggle button -->
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-envelope-o"></i>
        <span class="label label-success">4</span>
      </a>
      <ul class="dropdown-menu">
        <li class="header">You have 4 messages</li>
        <li>
          <!-- inner menu: contains the messages -->
          <ul class="menu">
            <li><!-- start message -->
              <a href="#">
                <div class="pull-left">
                  <!-- User Image -->
                  <img src="<?= base_url() ?>/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <!-- Message title and timestamp -->
                <h4>
                  Support Team
                  <small><i class="fa fa-clock-o"></i> 5 mins</small>
                </h4>
                <!-- The message -->
                <p>Why not buy a new awesome theme?</p>
              </a>
            </li>
            <!-- end message -->
          </ul>
          <!-- /.menu -->
        </li>
        <li class="footer"><a href="#">See All Messages</a></li>
      </ul>
    </li>
    <!-- /.messages-menu -->

    <!-- Notifications Menu -->
    <li class="dropdown notifications-menu">
      <!-- Menu toggle button -->
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning">10</span>
      </a>
      <ul class="dropdown-menu">
        <li class="header">You have 10 notifications</li>
        <li>
          <!-- Inner Menu: contains the notifications -->
          <ul class="menu">
            <li><!-- start notification -->
              <a href="#">
                <i class="fa fa-users text-aqua"></i> 5 new members joined today
              </a>
            </li>
            <!-- end notification -->
          </ul>
        </li>
        <li class="footer"><a href="#">View all</a></li>
      </ul>
    </li>
    <!-- Tasks Menu -->
    <li class="dropdown tasks-menu">
      <!-- Menu Toggle Button -->
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-flag-o"></i>
        <span class="label label-danger">9</span>
      </a>
      <ul class="dropdown-menu">
        <li class="header">You have 9 tasks</li>
        <li>
          <!-- Inner menu: contains the tasks -->
          <ul class="menu">
            <li><!-- Task item -->
              <a href="#">
                <!-- Task title and progress text -->
                <h3>
                  Design some buttons
                  <small class="pull-right">20%</small>
                </h3>
                <!-- The progress bar -->
                <div class="progress xs">
                  <!-- Change the css width attribute to simulate progress -->
                  <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                    <span class="sr-only">20% Complete</span>
                  </div>
                </div>
              </a>
            </li>
            <!-- end task item -->
          </ul>
        </li>
        <li class="footer">
          <a href="#">View all tasks</a>
        </li>
      </ul>
    </li>
    <!-- User Account Menu -->
    <li class="dropdown user user-menu">
      <!-- Menu Toggle Button -->
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        <span class="hidden-xs"><?= session()->get('nama_user') ?></span>
      </a>
      <ul class="dropdown-menu">
        <!-- The user image in the menu -->
        <li class="user-header">
          <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">

          <p>
            <?= session()->get('nama_user') ?> - <?php if (session()->get('level') == 1) {
                                                    echo 'Admin';
                                                  } else {
                                                    echo 'User';
                                                  } ?>
            <small><?= date('d M Y') ?></small>
          </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
          <div class="row">
            <div class="col-xs-4 text-center">
              <a href="#">Followers</a>
            </div>
            <div class="col-xs-4 text-center">
              <a href="#">Sales</a>
            </div>
            <div class="col-xs-4 text-center">
              <a href="#">Friends</a>
            </div>
          </div>
          <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
          <div class="pull-left">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
          </div>
          <div class="pull-right">
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
          </div>
        </li>
      </ul>
    </li>
  </ul>
</div>
<!-- /.navbar-custom-menu -->
</div>
<!-- /.container-fluid -->
</nav>
</header>
<!-- Full Width Column -->
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $judul ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Arsip</a></li>
        <li class="active"><?= $judul ?></li>
      </ol>
    </section>

    <section class="content">