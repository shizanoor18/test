<?php
$curr_url = $this->uri->segment(2);
$secon_curr_url = $this->uri->segment(3);
$active="active";
$outlet_id = DEFAULT_OUTLET;
if (defined('DEFAULT_CHILD_OUTLET'))   $outlet_id = DEFAULT_CHILD_OUTLET;
?>
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    <!-- BEGIN: Left Aside -->
    <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
        <i class="la la-close"></i>
    </button>
    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
        <!-- BEGIN: Aside Menu -->
        <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                <?php 
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'dashboard');
                else  
                    $permission = true;
                if ($permission){
                ?>
                <li class="m-menu__item <?php if($curr_url == 'dashboard'){echo 'm-menu__item--active';} ?>" aria-haspopup="true">
                    <a href="<?= ADMIN_BASE_URL ?>dashboard" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-line-graph"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                    Dashboard
                                </span>
                                <!-- <span class="m-menu__link-badge">
                                    <span class="m-badge m-badge--danger">
                                        2
                                    </span>
                                </span> -->
                            </span>
                        </span>
                    </a>
                </li>
                <?php } ?>
                <li class="m-menu__section ">
                    <h4 class="m-menu__section-text">
                        Components
                    </h4>
                    <i class="m-menu__section-icon flaticon-more-v3"></i>
                </li>
                <?php 
               
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'users');
                else  
                    $permission = true;
                if ($permission) {
                ?>
                <li class="m-menu__item <?php if($curr_url == 'users'){echo 'm-menu__item--active';} ?>" aria-haspopup="true">
                    <a href="<?= ADMIN_BASE_URL ?>users" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-user-add"></i>	
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                    Users
                                </span>
                            </span>
                        </span>
                    </a>
                </li>
                <?php }
                 if ($user_data['role'] != 'portal admin')
                    $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'webpages');
                else  
                    $permission = true;
                if ($permission) {
                ?>
                <li class="m-menu__item <?php if($curr_url == 'general_setting'){echo 'm-menu__item--active';} ?>" aria-haspopup="true">
                    <a href="<?= ADMIN_BASE_URL ?>general_setting" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-settings-1"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                    General Setting
                                </span>
                            </span>
                        </span>
                    </a>
                </li>
                <?php }

                if ($user_data['role'] != 'portal admin')
                    $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'webpages');
                else  
                    $permission = true;
                if ($permission) {
                ?>
                <li class="m-menu__item <?php if($curr_url == 'webpages'){echo 'm-menu__item--active';} ?>" aria-haspopup="true">
                    <a href="<?= ADMIN_BASE_URL ?>webpages" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-web"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                    Web pages
                                </span>
                            </span>
                        </span>
                    </a>
                </li>
                <?php }

                    if ($user_data['role'] != 'portal admin')
                    $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'services');
                    else  
                    $permission = true;
                    if ($permission) {
                    ?>
                    <li class="m-menu__item <?php if($curr_url == 'services'){echo 'm-menu__item--active';} ?>" aria-haspopup="true">
                    <a href="<?= ADMIN_BASE_URL ?>services" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-web"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                    Services
                                </span>
                            </span>
                        </span>
                    </a>
                    </li>
                    <?php }


                if ($user_data['role'] != 'portal admin')
                    $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'webpages');
                else  
                    $permission = true;
                if ($permission) {
                ?>
                <li class="m-menu__item <?php if($curr_url == 'test'){echo 'm-menu__item--active';} ?>" aria-haspopup="true">
                    <a href="<?= ADMIN_BASE_URL ?>test" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-web"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                    Test
                                </span>
                            </span>
                        </span>
                    </a>
                </li>
                <?php }
                                        
                    if ($user_data['role'] != 'portal admin')
                    $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'features');
                    else  
                    $permission = true;
                    if ($permission) {
                    ?>
                    <li class="m-menu__item <?php if($curr_url == 'features'){echo 'm-menu__item--active';} ?>" aria-haspopup="true">
                    <a href="<?= ADMIN_BASE_URL ?>features" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-web"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                    Features
                                </span>
                            </span>
                        </span>
                    </a>
                    </li>
                    <?php }

                                                            
                    if ($user_data['role'] != 'portal admin')
                    $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'user_data');
                    else  
                    $permission = true;
                    if ($permission) {
                    ?>
                    <li class="m-menu__item <?php if($curr_url == 'user_data'){echo 'm-menu__item--active';} ?>" aria-haspopup="true">
                    <a href="<?= ADMIN_BASE_URL ?>user_data" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-web"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                    User Data
                                </span>
                            </span>
                        </span>
                    </a>
                    </li>
                    <?php }
                	?>		
            </ul>
        </div>
    </div>