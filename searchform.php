<form method="get" id="searchform" class="form-inline" action="<?php echo esc_url( home_url() ); ?>/">
	<div class="form-group">
		<div class="input-group">
			<input class="form-control" type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="Search Blog"/>
	    <div class="input-group-addon"><button type="submit" class="submit"><span class="glyphicon glyphicon-search"></span></button></div>
	   </div>
	</div>
</form>
