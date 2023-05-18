<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>
<style>
	.single-post .postcontent {
		margin:35px auto;
	}
	.container.header_contain {
		margin:unset;
	}
	.single-casino_list .footer {
		position:relative;
	}
	.btm_footer{
		padding-bottom:119px;
	}
	#sticky-div {
		position: absolute;
	}
	.header_title {
		width: 90%;
	}
	#comments {
		margin-top:60px;
	}
	.comment-form-comment>label{
		display:none;
	}
	.btm_footer {
    padding-bottom: 0px;
}
</style>

<div class="container header_contain" style="background:url('<?php echo esc_url( get_field( 'post_img', $post_id ) ); ?>');">
	<div class="space-overlay absolute"></div>
	<header class="entry-header container">
		<div class="header_banner">
	<? php /*		<div class="ratings">
				<div class="star-icon-bx">
					<div class="star-icon-bg"></div>
					<div class="star-icon">
						<i class="fas fa-star" aria-hidden="true"></i>
					</div>
				</div>
				<div><strong>4.5</strong>/5	</div>			
			</div> */?>
			<div class="header_thumb">
				<?php echo get_the_post_thumbnail( $post_id );?>
			</div>
		<? php /*	<div class="ratings mbl">
				<div class="star-icon-bx">
					<div class="star-icon-bg"></div>
					<div class="star-icon">
						<i class="fas fa-star" aria-hidden="true"></i>
					</div>
				</div>
				<div><strong>4.5</strong>/5	</div>			
			</div> */ ?>
			<div class="header_info">
				<div class="header_title">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
				<div class="accepted-info">
					<i class="fas fa-check-circle" aria-hidden="true"></i> 
					Users from Malaysia are accepted
				</div>
				<div class="header_desc">
					<?php
					$content = get_the_content(); // Retrieve the full content of the post
					$tags_to_remove = array('[vc_row]', '[vc_column]', '[vc_column_text]');
					$cleaned_content = str_replace($tags_to_remove, '', $content); // Remove the specified tags from the content
					$trimmed_content = wp_trim_words($cleaned_content, 15, '...'); // Trim the content to 30 words and append '...' at the end
					echo $trimmed_content;
					?>
				</div>
			<? php /*	<div><a href="#"><div class="btn_link">VISIT</div></a></div>
				<div class="newplayers">New players only</div> */ ?>
			</div>
		</div>
	</header>
</div>
<div class="container postcontent">
	<div class="post_breadcrumbs">
		<p class="breadcrumbs-substitle"><span><a href="<?php echo get_site_url(); ?>">Home</a></span><span class="arrow"> » </span><span><?php the_title(); ?></span></p>
	</div>	
	<div class="row">	
		<div class="col-md-9">

			<div class="row">
				<section class="content-area col-12">
					<?php
					while ( have_posts() ) : the_post();

					$enable_vc = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
					if(!$enable_vc ) {
					?>

					<!-- .entry-header -->
					<?php } 
					the_content(); ?>

			<?php /*		<div class="container btm_content">
						<div class="btm_title">
							<h2>Texas bet Details</h2>
						</div>
						<div class="btm_body">
							<div class="bet_details">
								<?php echo do_shortcode('[betdetails]'); ?>
							</div>
							<div class="btm_rating">
								<?php echo do_shortcode('[bottom_rating]'); ?>
							</div>
							<div class="bet_bonuses">
								<?php echo do_shortcode('[bet_bonuses]'); ?>
							</div>
						</div>
					</div>



					
			$featured_post = get_field('featured_post');
			if( $featured_post ): ?>
			<h3><?php echo esc_html( $featured_post->post_title ); ?></h3>
			<?php endif;  ?>

					<?php	// If comments are open or there is at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					} ?>

					<?php 	<?php $next_post = get_next_post(); $prev_post = get_previous_post(); ?>
			<div class="my-3 d-inline-block w-100 clearfix">
				<div class="float-start">
					<a href="<?php echo get_permalink( $prev_post->ID ); ?>">
						<span><?php esc_html_e( 'Prev Article', 'zs-themes' ); ?></span>
						<br><small><?php echo get_the_title( $prev_post->ID); ?></small>	
					</a>
				</div>
				<div class="float-end">
					<a href="<?php echo get_permalink( $next_post->ID ); ?>">
						<span><?php esc_html_e( 'Next Article', 'zs-themes' ); ?></span><br><small><?php echo get_the_title( $next_post->ID); ?></small>	
					</a>
				</div>
			</div>
*/ ?>
					<?php
					endwhile; // End of the loop.
					?>
				</section>
			</div>
		</div>
		<div class="container col-md-3 singlepost position-relative game_sidebar">
			<div id="sticky-div" class="side_sticky single_post">
				<div class="side_sticky_inner">
					<div class="side-title">
						<h3>Recent Posts</h3>
					</div>
					<?php
					// Query arguments
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 6, // to display all posts
					);

					// The query
					$the_query = new WP_Query( $args );

					// The Loop
					if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="article_box">
						<div class="article_item">
							<div class="article_top">
								<div class="article_img">
									<?php if ( has_post_thumbnail() ) { ?>
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
									<?php } ?>
								</div>
								<div class="article_title">
									<h2 class="article_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php /*	<div class="star-rating">
										<div class="star star-full" aria-hidden="true"></div>
										<div class="star star-full" aria-hidden="true"></div>
										<div class="star star-full" aria-hidden="true"></div>
										<div class="star star-half" aria-hidden="true"></div>
										<div class="star star-empty" aria-hidden="true"></div>
									</div> */?>
									<div class="article_content">
										<?php
										$content = get_the_content(); // Retrieve the full content of the post
										$tags_to_remove = array('[vc_row]', '[vc_column]', '[vc_column_text]');
										$cleaned_content = str_replace($tags_to_remove, '', $content); // Remove the specified tags from the content
										$trimmed_content = wp_trim_words($cleaned_content, 15, '...'); // Trim the content to 30 words and append '...' at the end
										echo $trimmed_content;
										?>

									</div>
									
								</div>
							</div>
						</div>
					</div>
					<?php endwhile;
					wp_reset_postdata(); // Reset the query
					else :
					echo 'No posts found';
					endif;
					?>


				</div>
			</div>
		</div>
	</div>
</div>


<script>
	jQuery(document).scroll(function() {
		var scrollTop = jQuery(document).scrollTop();
		var body_height = jQuery('body').height();
		var footer_height = jQuery('.footer').height();
		var window_height = window.innerHeight;
		var footer_top = body_height - (footer_height + window_height);
		var recent_casino_width = jQuery('.game_sidebar').width();
		if (scrollTop > 500 && scrollTop < footer_top) { /* Change this value to the height at which you want the div to become sticky */
			jQuery('#sticky-div').css({
				position: 'fixed',
				top: 100,
				width: recent_casino_width,
			});
		} else if( scrollTop > footer_top) {
			jQuery('#sticky-div').css({
				position: 'absolute',
				bottom: 0,
				top: 'unset',
			});
		} else {
			jQuery('#sticky-div').css({
// 				position: 'relative',
// 				top: 100
 				position: 'absolute',
				top: 100
			});
		}
	});
</script>

<?php
get_footer();
?> 

<?php /*
<div class="bottom_sticky_banner">
	<div class="container">
		<div class="row">
		<div class="col left-column">
			<div class="bsb_img">
				<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/05/logo-11-300x300-1.png">
			</div>
			<div class="bsb_info">
				<h4>Texas Bet</h4>
				<div class="star-rating">
					<div class="star star-full"></div>
					<div class="star star-full"></div>
					<div class="star star-full"></div>
					<div class="star star-full"></div>
					<div class="star star-half"></div>
					<div class="rating">4.5/5</div>
				</div>
			</div>
		</div>
		<div class="col right-column">
			<a href="#">
				<div class="btn_vst">
					VISIT
				</div>
			</a>
		</div>
		</div>
	</div>
</div>

<script>
	window.addEventListener('scroll', function() {
		const banner = document.querySelector('.bottom_sticky_banner');
		const bannerHeight = banner.offsetHeight;
		const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
		const scrollBottom = scrollTop + window.innerHeight;
		const documentHeight = document.documentElement.scrollHeight;

		if (scrollTop > bannerHeight /*&& scrollBottom < documentHeight***) {
			banner.classList.add('show');
		} else {
			banner.classList.remove('show');
		}
	});

</script> */?>