<?php
/**
 * Block Name: Image section
 *
 * This is the template that displays the image
 */

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'section-post-type-list';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>




<?php $show_posts_automaticaly = get_field('show_posts_automaticaly') ?>
<?php $show_all_post = get_field('show_all_post') ?>
<?php $row_width = get_field('row_width') ?>
<div class="<?php echo $row_width ?> post-list-section-row  column ">
	<?php if ($show_posts_automaticaly || $show_all_post){ ?>
		<?php $count_of_posts = get_field('count_of_posts_to_show_automatically') ?>
		<?php if ($show_all_post): ?>
			<?php $count_of_posts = -1  ?>
		<?php endif ?>



		<?php $arg = array(
			'post_type'	    => 'post', 
			'order'		    => 'DESC',
				// 'orderby'	    => 'menu_order',
			'posts_per_page'    => $count_of_posts
		);
		$the_query = new WP_Query( $arg ); ?>
		<?php if ( $the_query->have_posts() ) : ?>
			<div id="post-type-post" class="post-list post-type-list ajax-reload" data-block-id="<?php echo $blockID ?>" >
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class=" post-type-list-item wow animate__animated animate__fadeInUp">
						<?php $post_color = get_field('post_color', get_the_ID()) ?>
						<?php $img = get_attached_img_url( get_the_ID(), 'max_767' ) ?>
						<?php if($img): ?>
							<a class="list-item-link " href="<?php the_permalink() ?>">
								<span class="list-item-image" <?php  bg($img) ?>></span>
							</a>
						<?php endif; ?>
						<h3 class="post-title" ><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						<span class="post-excerpt" ><?php echo get_the_excerpt(); ?></span>
						<a class="custom-button read-more" href="<?php the_permalink() ?>">
							<?php the_field('read_more','options') ?>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; wp_reset_query(); ?>
	<?php } else { ?>
		<?php $posts = get_field('post_list'); ?>
		<?php if( $posts ): ?>
			<div id="post-type-post" class="post-list post-type-list ajax-reload">
				<?php foreach( $posts as $p ): ?>
					<div class="post-type-list-item wow animate__animated animate__fadeInUp">
						<?php $post_color = get_field('post_color', $p->ID) ?>
						<?php $img = get_attached_img_url( $p->ID, get_the_ID(), 'max_767' ) ?>
						<?php if($img): ?>
							<a class="list-item-link " href="<?php echo get_permalink( $p->ID ); ?>">
								<span class="list-item-image" <?php bg($img) ?>></span>
							</a>
						<?php endif ?>
						<h3 class="post-title"><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></h3>
						<span class="post-excerpt" ><?php echo get_the_excerpt($p->ID); ?></span>
						<a class="custom-button read-more" href="<?php echo get_permalink( $p->ID ) ?>">
							<?php the_field('read_more','options') ?>
						</a>
					</div>
					<?php $i++ ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	<?php } ?>
</div>

<?php do_action( 'block_end', __DIR__); ?>
