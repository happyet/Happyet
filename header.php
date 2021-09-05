<!DOCTYPE html>
<html dir="ltr" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name = "viewport" content ="initial-scale=1.0,user-scalable=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col-md-10">
			<div class="wrapper">
				<header id="header">
					<nav class="navbar navbar-expand-lg navbar-light">
					  	<div class="container-fluid">
					      	<div class="navbar-brand">
					      		<h1 class="fs-3"><a href="<?php echo esc_url( home_url() ); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
					      		<p class="fs-6 mb-0"><?php bloginfo('description'); ?></p>
							</div>
							<button class="navbar-toggler ms-auto me-3" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
								<i class="iconfont icon-menu"></i>
    						</button>

					    	<div class="collapse navbar-collapse" id="main-menu">
								<?php 
									if(has_nav_menu('topbar')){
										wp_nav_menu( array(
											'menu'              => '',
											'theme_location'    => 'topbar',
											'depth'             => 0,
											'container'         => '',
											'container_class'   => '',
											'fallback_cb'     	=> false,
											'menu_class'        => 'nav navbar-nav ms-lg-auto',
											'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
											'walker'            => new lmsim_Bootstrap_Menu()
										)  );
									}
								?>
					    	</div>

							<button class="navbar-toggler d-block search-btn" type="button"  data-bs-toggle="offcanvas" data-bs-target="#header-search" aria-controls="header-search">
								<i class="iconfont icon-search"></i>
    						</button>

					  	</div>
					</nav>
					<div class="offcanvas offcanvas-top" tabindex="-1" id="header-search" aria-labelledby="offcanvasTopLabel">
					<div class="row justify-content-md-center">
						<div class="col-md-6">
						<div class="offcanvas-header">
							<h5 class="mt-4">搜一搜</h5>
							<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>
						<div class="offcanvas-body">
							<form method="get" id="searchform" class="form-inline ms-lg-auto mb-3" action="<?php echo esc_url( home_url() ); ?>/">
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="Search Blog"/>
										<button type="submit" class="submit input-group-text"><i class="iconfont icon-search"></i></button>
								</div>
								</div>
							</form>
							<?php wp_tag_cloud('order=DESC&orderby=count&smallest=14&largest=14&unit=px&number=10');?>
						</div>
					</div>
								</div></div>
				</header>
				<main class="main">
					<div class="container-fluid">
						<div class="row gx-5">