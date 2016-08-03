<div class="col-lg-12">
	<section id="comments" class="content-wrap" itemscope itemtype="http://schema.org/Comment">
		<?php if ( post_password_required() ) : ?>
			<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view all comments.', 'morfeu' ); ?></p>
	</section><!-- #comments -->
			<?php
			return;
		endif;

		if ( have_comments() ) : ?>
			<h4 id="comments-title" class="page-header">
				<?php
				comments_number( __( '0 Comments', 'morfeu' ), __( '1 Comment', 'morfeu' ), __( '% Comments', 'morfeu' ) );
				echo ' ' . __( 'to', 'morfeu' ) . ' <span>&quot;' . get_the_title() . '&quot;</span>';
				?>
			</h4>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav id="comment-nav-above">
					<ul class="pager">
						<li class="previous"><?php previous_comments_link( __( '&larr; Old Comments', 'morfeu' ) ); ?></li>
						<li class="next"><?php next_comments_link( __( 'New Comments &rarr;', 'morfeu' ) ); ?></li>
					</ul>
				</nav>
			<?php endif; ?>
			<ul class="media-list">
				<?php wp_list_comments( array( 'callback' => 'odin_comments_loop' ) ); ?>
			</ul>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav id="comment-nav-above">
					<ul class="pager">
						<li class="previous"><?php previous_comments_link( __( '&larr; Old Comments', 'morfeu' ) ); ?></li>
						<li class="next"><?php next_comments_link( __( 'New Comments &rarr;', 'morfeu' ) ); ?></li>
					</ul>
				</nav>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="nocomments"><?php _e( 'Comments closed.', 'morfeu' ); ?></p>
		<?php endif; ?>

		<?php
			$commenter 		= wp_get_current_commenter();
			$req 			= get_option( 'require_name_email' );
			$aria_req 		= ( $req ? " aria-required='true'" : '' );
			$html_req 		= ( $req ? " required='required'" : '' );
			$html5 			= current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : null;
			$comment_field 	= '<div class="comment-form-comment form-group"><label class="control-label" for="comment">' . __( 'Comment', 'morfeu' ) . ' <span class="required text-danger">*</span></label> ' .
							 '<textarea id="comment" name="comment" class="form-control" cols="45" rows="8" aria-required="true" required="required"></textarea></div>';
			$fields 		=  array(
				'author' => '<div class="comment-form-author form-group">' . '<label for="author">' . __( 'Name', 'morfeu' ) . ( $req ? ' <span class="required text-danger">*</span>' : '' ) . '</label> ' .
				            '<input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></div>',
				'email'  => '<div class="comment-form-email form-group"><label for="email">' . __( 'Email', 'morfeu' ) . ( $req ? ' <span class="required text-danger">*</span>' : '' ) . '</label> ' .
				            '<input id="email" name="email" class="form-control" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></div>'
			);
			comment_form( array(
				'comment_notes_after' 	=> '',
				'comment_field' 		=> $comment_field,
				'fields' 				=> apply_filters( 'comment_form_default_fields', $fields ),
				'class_submit' 			=> 'submit btn btn-primary'
			));
		?>
	</section><!-- #comments -->
</div>
