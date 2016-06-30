<!DOCTYPE html>
<html dir="ltr" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name = "viewport" content ="initial-scale=1.0,user-scalable=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="wrapper">
				<div id="header">
					<nav class="navbar nav-default">
					  <div class="container-fluid">
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <div class="navbar-brand">
					      	<h1><a href="<?php echo esc_url( home_url() ); ?>/"><?php bloginfo('name'); ?></a></h1>
					      	<div class="description"><?php bloginfo('description'); ?></div>
					      </div>
					    </div>

					    <div class="collapse navbar-collapse" id="main-menu">
					       <?php 
                                if(has_nav_menu('topbar')){
                                    wp_nav_menu( array(
                                        'menu'              => '',
                                        'theme_location'    => 'topbar',
                                        'depth'             => 0,
                                        'container'         => '',
                                        'container_class'   => '',
                                        'menu_class'        => 'nav navbar-nav navbar-right',
                                        'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                                        'walker'            => new lmsim_Bootstrap_Menu()
                                     )  );
				                }
				            ?>
					    </div>
					  </div>
					</nav>
				</div>
				<div class="main clearfix">