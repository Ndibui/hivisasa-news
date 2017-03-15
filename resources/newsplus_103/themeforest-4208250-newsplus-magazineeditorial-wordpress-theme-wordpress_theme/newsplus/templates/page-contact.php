<?php
/**
 * Template Name: Page - Contact
 *
 * Description: A page template for displaying contact form.
 */

global $pls_email, $pls_success_msg, $pls_google_map;
if ( isset( $_POST['submit'] ) ):

	// Validate Name Field
	if ( trim( $_POST['username'] ) === '' ) {
		$name_err = __( 'Enter Your Name', 'newsplus' );
		$errorflag = true;
	}
	else {
		$name = trim( $_POST['username'] );
	}

	// Validate E-mail Address
	if ( trim( $_POST['email'] ) === '' ) {
		$email_err = __( 'An email is required', 'newsplus' );
		$errorflag = true;
	} elseif ( ! preg_match( "/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$/i", trim( $_POST['email'] ) ) ) {
		$email_err = __( 'Enter a valid email', 'newsplus' );
		$errorflag = true;
	} else {
		$email = trim( $_POST['email'] );
	}

	// If URL is left blank. Allow form sending
	if ( trim( $_POST['url'] ) == '' ) {
		$url = __( 'No URL provided', 'newsplus' );
	}
	elseif ( trim( $_POST['url'] ) != '' ) {
		if ( ! preg_match( "/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i", trim($_POST['url'] ) ) ) {
			$url_err = __( 'Please enter a valid URL', 'newsplus' );
			$errorflag = true;
		}
		else
			$url = trim($_POST['url']);
	}

	// Validate Message
	if ( trim( $_POST['comment'] ) === '' ) {
		$comment_err = __( 'A comment is required', 'newsplus' );
		$errorflag = true;
	} else {
		if ( function_exists( 'stripslashes' ) ) {
			$comments = stripslashes( trim( $_POST['comment'] ) );
		} else {
			$comments = trim( $_POST['comment'] );
		}
	}

	// If there were no errors, send the mail.
	if ( ! isset( $errorflag ) ) {
		$to			= ( $pls_email != '' ) ? $pls_email : get_option( 'admin_email' );
		$subject	= sprintf( __( 'Message sent from your website by: %1$s', 'newsplus' ), $name );
		$body		= sprintf( __( 'Name: %1$s <br />Email: %2$s <br />URL: %3$s <br />Comments: %4$s', 'newsplus' ), $name, $email, $url, $comments );
		$headers	= sprintf( __( 'From: My WebSite <%1$s><br />Reply-To: %2$s', 'newsplus' ), $to, $email );

		if ( mail( $to, $subject, $body, $headers ) )
			$sent = true;

		else	// the mail was not sent
			$sent = false;
	}
endif; // isset form
get_header(); ?>
<div id="primary" class="site-content">
    <div id="content" role="main">
		<?php show_breadcrumbs();
        if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				the_content();
				if ( '' != $pls_google_map ) {
				$column_class = 'column half last'; ?>
				<div class="column half">
				<?php echo stripslashes( $pls_google_map ); ?>
				</div><!-- .half -->
				<?php } // Google Map
				else
					$column_class = 'full'; ?>
				<div class="<?php echo $column_class; ?>">
					<?php if ( isset( $sent ) ) { ?>
                    <div id="mail-success-no-js" class="box box2">
                    <?php echo stripslashes( $pls_success_msg ); ?>
                    </div><!-- .mail-success-no-js-->
                    <?php } ?>
                    <form <?php if ( isset( $sent ) ) { ?>style="display:none"<?php }?> action="<?php the_permalink();?>" method="post" id="contactform" class="commentform">
                        <p><label for="name"><?php _e( 'Name<span class="required">*</span>', 'newsplus' ); ?></label><input type="text" class="<?php if ( isset( $name_err ) && $name_err != '' ) { ?>error<?php } ?>" id="name" name="username" value="<?php if ( isset( $_POST['username'] ) ) echo $_POST['username']; ?>" /></p>
                        <p><label for="email"><?php _e( 'Email<span class="required">*</span>', 'newsplus' ); ?></label><input type="text" id="email" name="email" class="<?php if ( isset( $email_err ) && $email_err != '' ) { ?>error<?php } ?>" value="<?php if ( isset( $_POST['email'] ) ) echo $_POST['email']; ?>" /></p>
                        <p><label for="url"><?php _e( 'URL', 'newsplus' ); ?></label><input type="text" id="url" name="url" class="<?php if ( isset( $url_err ) && $url_err != '' ) { ?>error<?php } ?>" value="<?php if ( isset( $_POST['url'] ) ) echo $_POST['url']; ?>" /></p>
                        <p><label for="comment"><?php _e( 'Message<span class="required">*</span>', 'newsplus' ); ?></label><textarea name="comment" rows="10" cols="8" class="<?php if ( isset( $comment_err ) && $comment_err != '' ) { ?>error<?php } ?>" id="comment" ><?php if ( isset( $_POST['comment'] ) ) { if ( function_exists( 'stripslashes' ) ) { echo stripslashes( $_POST['comment'] ); } else { echo $_POST['comment']; } } ?></textarea></p>
                        <p class="submit"><input name="submit" type="submit" class="submit" tabindex="5" value="<?php _e( 'Send Message', 'newsplus' ); ?>" /></p>
                        </form>
                    <div id="mail_success" class="box box2">
                    <?php echo stripslashes( $pls_success_msg ); ?>
                    </div>
				</div><!-- .<?php echo $column_class; ?> -->
			<?php endwhile;
        else : ?>
            <article id="post-0" class="post no-results not-found">
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'Nothing Found', 'newsplus' ); ?></h1>
                </header>
                <div class="entry-content">
                    <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'newsplus' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .entry-content -->
            </article><!-- #post-0 -->
        <?php endif; ?>
    </div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>