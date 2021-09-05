<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title line-title pt-2">
			<?php
				$comments_number = get_comments_number();
				echo $comments_number . ' 条留言';
			?>
		</h2>

		<ol class="comment-list mb-4">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 42,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'lmsim' ); ?></p>
	<?php endif; ?>

	<?php
		$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$fields =  array(
			  'author' => '<div class="form-group mb-2"><input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' placeholder="Name' . ( $req ? '*' : '' ) .'" /></div>',
			  'email' => '<div class="form-group mb-2"><input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' placeholder="Email' . ( $req ? '*' : '' ) . '" /></div>',
			  'url' => '<div class="form-group mb-2"><input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="Website" /></div>',
			);
			comment_form(array(
				'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
				'title_reply_after'  => '</h2>',
				'comment_field' =>  '<div class="form-group mb-2"><textarea id="comment" name="comment" class="form-control" rows="5" aria-required="true"></textarea></div>',
				'class_submit' => 'btn btn-danger',
				'fields' => apply_filters( 'comment_form_default_fields', $fields ),
				'submit_field' => '<div class="form-group text-end">%1$s %2$s</div>'
			));
	?>

</div>
