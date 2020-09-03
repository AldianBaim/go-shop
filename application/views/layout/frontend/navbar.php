<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="<?php echo base_url('home') ?>" class="navbar-brand">
            <i class="fas fa-store-alt"></i>
            <span class="brand-text font-weight-light">GoShop</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item <?php echo ($this->uri->segment(2) == null) ? 'active' : '' ?>">
                    <a href="<?php echo base_url('home') ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('home/contact') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'contact') ? 'active' : '' ?>">Contact</a>
                </li>
                <li class="nav-item dropdown <?php echo ($this->uri->segment(2) == 'category') ? 'active' : '' ?>">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Category</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <?php foreach ($categories as $category) : ?>
                            <li><a href="<?php echo base_url('home/category/' . $category->id) ?>" class="dropdown-item"><?php echo $category->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-0 ml-md-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="<?php echo base_url('home/cart_detail') ?>">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="badge badge-danger navbar-badge">
                        <?php echo $this->cart->total_items(); ?>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="<?php echo base_url('assets/template/') ?>dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <!-- Sidebar user (optional) -->
                <div class="user-panel d-flex">
                    <div class="info">
                        <a href="#" class="d-block text-dark"><?php echo $this->session->fullname; ?></a>
                    </div>
                    <div class="image">
                        <img src="<?php echo base_url('assets/template/') ?>dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->