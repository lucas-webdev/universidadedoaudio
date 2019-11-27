<?php
/**
* The template for displaying comments.
*
* This is the template that displays the area of the page that contains both the current comments
* and the comment form.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package viaggio
*/

/*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
<?php
// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
	<h2 class="comments-title">
		<?php
printf( // WPCS: XSS OK.
	esc_html( _nx( '1 Comentário', 'Comentários (%1$s)', get_comments_number(), 'comments title', 'viaggio' ) ),
	number_format_i18n( get_comments_number() ),
	'<span>' . get_the_title() . '</span>'
	);
	?>
</h2>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'viaggio' ); ?></h2>
		<div class="nav-links comment-nav">

			<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Comentários anteriores', 'viaggio' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Comentários recentes', 'viaggio' ) ); ?></div>

		</div><!-- .nav-links -->
	</nav><!-- #comment-nav-above -->
<?php endif; // Check for comment navigation. ?>

<div class="comment-list">
	<?php
	wp_list_comments('type=comment&callback=vaiggio_mytheme_comment');
	?>
</div><!-- .comment-list -->

<?php
endif; // Check for have_comments().


// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

<p class="no-comments"><?php esc_html_e( 'Comentários bloqueados.', 'viaggio' ); ?></p>
<?php
endif;
$fields =  array(

	'author' =>
	'<div class="comment-form-author col-md-6">
	<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	'" size="30" placeholder="Seu nome '.( $req ? '*' : '' ).'"/>
	</div>',

	'email' =>
	'<div class="comment-form-email col-md-6">
	<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	'" size="30" placeholder="Seu e-mail '.( $req ? '*' : '' ).'"/>
	</div>',

	'url' =>
	'<p class="comment-form-url">
	<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
	'" size="30" placeholder="Seu site" />
	</p>',
	);
	comment_form(array(
	'fields' => apply_filters('comment_form_default_fields' , $fields ),
	'label_submit'      => esc_html__( 'Enviar' , 'viaggio' ),
	'comment_field'	=> '<p><textarea id="comment" name="comment" cols="45" rows="5" aria-required="true" placeholder="Escreva seu comentário aqui"></textarea></p>',
	));
	?>

</div><!-- #comments -->
<?php
function vaiggio_mytheme_comment($comment, $args, $depth) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="depth-comment">
		<div class="comment-author vcard">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, 100 ); ?>
		</div>
		<div class="comment_content">
			<?php printf( wp_kses( '<cite class="fn">%s</cite>' , 'viaggio' ), get_comment_author_link() ); ?>
			<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php esc_html_e( 'Seu comentário está aguardando aprovação.' , 'viaggio' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
			/* translators: 1: date, 2: time */
			printf( esc_html__('%1$s at %2$s' , 'viaggio'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( '(Editar)' , 'viaggio' ), '  ', '' );
			?>
		</div>

		<?php comment_text(); ?>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>
</div>
<?php if ( 'div' != $args['style'] ) : ?>
</div>
<?php endif; ?>
<?php
}