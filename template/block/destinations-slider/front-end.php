<?php
/**
 * Block Name: Destination slider
 *
 * This is the template that displays the slider
 */
$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'destinations-slider-section';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>
	<?php $show_posts_automatically = get_field('show_destinations_automatically'); ?>
	<?php if ($show_posts_automatically): ?>
		<?php $count_of_posts = get_field('count_of_destinations_to_show_automatically'); ?>
		<?php $arg = array(
			'post_type'	    => 'destinations', 
			'order'		    => 'DESC',
			'posts_per_page'    => $count_of_posts
		);
		$the_query = new WP_Query( $arg ); ?>
		<?php if ( $the_query->have_posts() ) : ?>
			<div class="row larger_row column wow animate__animated animate__fadeInUp">
				<div class="destination-slider">
					<div class="destination-slider-arrows-container">
						<a href="#" class="destination-slider-arrows destination-slider-arrows--prev"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30"><g><path d="M14.008 1.017a1.398 1.398 0 0 1 2.03 0c.55.563.55 1.5 0 2.062L5.741 13.643h23.744c.792 0 1.442.646 1.442 1.458 0 .813-.65 1.48-1.442 1.48H5.74l10.297 10.543c.55.583.55 1.522 0 2.083a1.398 1.398 0 0 1-2.03 0L1.272 16.143a1.497 1.497 0 0 1 0-2.062z"/></g></svg></a>
						<a href="#" class="destination-slider-arrows destination-slider-arrows--next"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30"><g><g transform="rotate(-180 15.5 15)"><path d="M14.008 1.017a1.398 1.398 0 0 1 2.03 0c.55.563.55 1.5 0 2.062L5.741 13.643h23.744c.792 0 1.442.646 1.442 1.458 0 .813-.65 1.48-1.442 1.48H5.74l10.297 10.543c.55.583.55 1.522 0 2.083a1.398 1.398 0 0 1-2.03 0L1.272 16.143a1.497 1.497 0 0 1 0-2.062z"/></g></g></svg></a>
					</div>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<a href="<?php the_permalink(); ?>" class="destination-slide cover-bg">
							<?php $post_id = get_the_ID(); ?>
							<?php if($image = get_field('slider_image', $post_id)): ?>
								<picture>
									<?php if ($image_for_small = get_field('slider_image_mobile', $post_id)) { ?>
										<source media='(max-width: 400px)'
											srcset='<?php echo $image_for_small['sizes']['max_400'] ?>'/>
										<source media='(max-width: 767px)'
											srcset='<?php echo $image_for_small['sizes']['max_767'] ?>'/>
									<?php } else { ?>
										<source media='(max-width: 400px)'
											srcset='<?php echo $image['sizes']['max_400'] ?>'/>
										<source media='(max-width: 767px)'
											srcset='<?php echo $image['sizes']['max_767'] ?>'/>
									<?php } ?>
									<source media='(max-width: 1024px)'
										srcset='<?php echo $image['sizes']['max_1024'] ?>'/>
									<img src='<?php echo $image['sizes']['full_hd'] ?>'/>
								</picture>
							<?php endif; ?>
							<div class="destination-slide__title-container">
								<h3 class="destination-slide-title"><?php the_title(); ?></h3>
							</div>
						</a>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; wp_reset_query(); ?>
	<?php else: ?>
		<?php $posts = get_field('destinations_list'); ?>
		<?php if( $posts ): ?>
			<div class="row larger_row column">
				<div class="destination-slider">
					<div class="destination-slider-arrows-container">
						<a href="#" class="destination-slider-arrows destination-slider-arrows--prev"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30"><g><path d="M14.008 1.017a1.398 1.398 0 0 1 2.03 0c.55.563.55 1.5 0 2.062L5.741 13.643h23.744c.792 0 1.442.646 1.442 1.458 0 .813-.65 1.48-1.442 1.48H5.74l10.297 10.543c.55.583.55 1.522 0 2.083a1.398 1.398 0 0 1-2.03 0L1.272 16.143a1.497 1.497 0 0 1 0-2.062z"/></g></svg></a>
						<a href="#" class="destination-slider-arrows destination-slider-arrows--next"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30"><g><g transform="rotate(-180 15.5 15)"><path d="M14.008 1.017a1.398 1.398 0 0 1 2.03 0c.55.563.55 1.5 0 2.062L5.741 13.643h23.744c.792 0 1.442.646 1.442 1.458 0 .813-.65 1.48-1.442 1.48H5.74l10.297 10.543c.55.583.55 1.522 0 2.083a1.398 1.398 0 0 1-2.03 0L1.272 16.143a1.497 1.497 0 0 1 0-2.062z"/></g></g></svg></a>
					</div>
					<?php foreach( $posts as $p ): ?>
						<?php $post_id = $p->ID; ?>
						<a href="<?php the_permalink($post_id) ?>" class="destination-slide cover-bg">
							<?php if($image = get_field('slider_image', $post_id)): ?>
								<picture>
									<?php if ($image_for_small = get_field('slider_image_mobile', $post_id)) { ?>
										<source media='(max-width: 400px)'
											srcset='<?php echo $image_for_small['sizes']['max_400'] ?>'/>
										<source media='(max-width: 767px)'
											srcset='<?php echo $image_for_small['sizes']['max_767'] ?>'/>
									<?php } else { ?>
										<source media='(max-width: 400px)'
											srcset='<?php echo $image['sizes']['max_400'] ?>'/>
										<source media='(max-width: 767px)'
											srcset='<?php echo $image['sizes']['max_767'] ?>'/>
									<?php } ?>
									<source media='(max-width: 1024px)'
										srcset='<?php echo $image['sizes']['max_1024'] ?>'/>
									<img src='<?php echo $image['sizes']['full_hd'] ?>'/>
								</picture>
							<?php endif; ?>
							<div class="destination-slide__title-container">
								<h3 class="destination-slide-title"><?php echo get_the_title($post_id); ?></h3>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>

<?php do_action( 'block_end', __DIR__); ?>
