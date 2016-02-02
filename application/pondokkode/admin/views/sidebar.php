<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a href="<?php echo base_url() ?>admin/dashboard" class="<?php print $active_dashboard ?>">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                    <a href="javascript:;" class="<?php print $active_resi ?>">
                        <i class=" fa fa-truck fa-flip-horizontal"></i>
                        <span>Resi Pengiriman</span>
                    </a>
                    <ul class="sub">
                      <li class="<?php print $active_input_resi ?>"><a href="<?php echo base_url() ?>admin/resi-pengiriman/tambah/"><i class="fa fa-pencil-square-o"></i> Input Resi</a></li>
                        <li class="<?php print $active_jne ?>"><a href="<?php echo base_url() ?>admin/resi-pengiriman/jne/"><i class=" fa fa-file-text-o"></i> Resi JNE</a></li>
                        <li class="<?php print $active_pos ?>"><a href="<?php echo base_url() ?>admin/resi-pengiriman/pos/"><i class="fa fa-file-text-o"></i> Resi POS</a></li>
                    </ul>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/resi-pengiriman/statistic/" class="<?php print $active_statistic ?>">
                    <i class="fa fa-bar-chart"></i>
                    <span>Statistic Pengiriman</span>
                </a>
            </li>
            <li>
                    <a href="javascript:;" class="<?php print $active_master ?>">
                        <i class=" fa fa-tasks"></i>
                        <span>Master</span>
                    </a>
                    <ul class="sub">
                        <li class="<?php print $active_user ?>"><a href="<?php echo base_url() ?>admin/master/user/"><i class=" fa fa-user"></i> User</a></li>
                        <li class="<?php print $active_log ?>"><a href="<?php echo base_url() ?>admin/master/log-session/"><i class="fa fa-align-justify"></i> Log Session</a></li>
                    </ul>
            </li>
            <li class="sub-menu">
                    <a href="javascript:;" class="<?php print $active_pengaturan ?>">
                        <i class="fa fa-cogs"></i>
                        <span>Pengaturan</span>
                    </a>
                    <ul class="sub">
                        <li class="<?php print $active_sistem ?>"><a href="<?php echo base_url() ?>admin/pengaturan/sistem/"><i class=" fa  fa-cog"></i> Sistem</a></li>
                    </ul>
            </li>
        </ul>
    </div>
<!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
         <div class="row">
                <div class="col-md-12">
                   <?php print $this->breadcrumb->output(); ?>
                </div>
         </div>
