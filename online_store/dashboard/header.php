<div class="header" id="header">
    <div>
        <button class="btn btn-primary sidebarToggle d-none" id="sidebarToggle"> <i class="fas fa-bars"></i> </button>
    </div>
    <!-- Sidebar-->
    <div class="sidebar" id="sidebar">
        <div class="title">
            <b> <i class="fas fa-user-tie"></i> <?php echo $_SESSION['name'] . ' - ' . $_SESSION['ssn']; ?> </b>
        </div>
        <hr style="border-bottom: 1px solid white;">
        <div class="list-group">
            <a class="p-3" href="<?php url('dashboard/') ?>"><i class="fas fa-home"></i> Home</a>
            <a class="p-3" href="<?php url('dashboard/categories.php') ?>"><i class="fas fa-bars"></i> Categories </a>
            <a class="p-3" href="<?php url('dashboard/products.php') ?>"><i class="fas fa-truck-loading mt-3"></i> Products</a>
            <a class="p-3" href="<?php url('dashboard/requests.php') ?>"><i class="fas fa-border-all mt-3"></i> Requests</a>
            <a class="p-3" href="<?php url('dashboard/customers.php') ?>"><i class="fas fa-users mt-3"></i> Customers</a>
            <a class="p-3" href="<?php url('dashboard/cities.php') ?>"><i class="fas fa-map-marked"></i> Cities</a>
            <?php
                if ( $_SESSION['role'] == 'admin' )
                    echo '<a class="p-3" href="' . getUrl('dashboard/employees.php') .'"><i class="fas fa-user-tie mt-3"></i> Employees </a>'
            ?>
            <a class="p-3" href="<?php url('php/functions/employees/logout.php'); ?>"><i class="fas fa-sign-out-alt mt-3"></i> Logout</a>
        </div>
    </div>
</div>

