<?php
/**
 * Block Name: Image section
 *
 * This is the template that displays the image
 */

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'all-tours-list-section';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php $show_tours_automatically = get_field('show_tours_automatically') ?>
<?php $show_all_tours = get_field('show_all_tours') ?>
<div class="tour-list-section-row column ">

	<div class="tours-filter wow animate__animated animate__fadeInUp">
		<?php if($all_tours_label = get_field('all_tours_label','options')): ?>
			<h1 class="all-tours-label"><?php echo $all_tours_label ?></h1>
		<?php endif; ?>
		<?php if($filters_label = get_field('filters_label','options')): ?>
			<a href="#" class="filters-label filters-label-cta show-for-small" ><?php echo $filters_label ?></a>
		<?php endif; ?>
		<div class="tours-filter-column">
			<?php if($filters_label = get_field('filters_label','options')): ?>
				<span class="filters-label hide-for-small"><?php echo $filters_label ?></span>
			<?php endif; ?>
			<div class="tours-filter-blocks">
				<div class="choose-season-block filters-block">
					<?php if($choose_season = get_field('choose_season','options')): ?>
						<span class="choose-season"><?php echo $choose_season ?></span>
					<?php endif; ?>
					<?php if($winter = get_field('winter','options')): ?>
						<a href="" data-season="winter" class="winter season-link filter-links"><?php echo $winter ?></a>
					<?php endif; ?>
					<?php if($summer = get_field('summer','options')): ?>
						<a href="" data-season="summer" class="summer season-link filter-links "><?php echo $summer ?></a>
					<?php endif; ?>
					<?php if($all = get_field('all','options')): ?>
						<a href="" data-season="all" class="all season-link filter-links"><?php echo $all ?></a>
					<?php endif; ?>
				</div>
				<div class="choose-type-block filters-block">
					<?php if($choose_type = get_field('choose_type','options')): ?>
						<span class="choose-type"><?php echo $choose_type ?></span>
					<?php endif; ?>
					<?php if($fit = get_field('fit','options')): ?>
						<a href="" data-type="fit" class="fit type-link filter-links"><?php echo $fit ?></a>
					<?php endif; ?>
					<?php if($group = get_field('group','options')): ?>
						<a href="" data-type="group" class="group type-link filter-links"><?php echo $group ?></a>
					<?php endif; ?>
				</div>
				<?php $choose_country = get_field('choose_country','options') ?>
				<span class="choose-country show-for-small"><?php echo $choose_country ?></span>
				<select name="country" id="country" class="taxonomy-page-select" >
					<option value="default" selected hidden><?php echo $choose_country ?></option>
					<?php 
					$args = array(
						'taxonomy'               => 'country',
						'orderby'                => 'name',
						'order'                  => 'DESC',
						'hide_empty'             => false,
						'number'                => 0,
					);?>
					<?php $the_query = new WP_Term_Query($args); ?>
					<?php foreach($the_query->get_terms() as $term){ ?>

						<option value="<?php echo $term->term_id ?>"><?php echo $term->name ?></option>
					<?php } ?>
				</select>
				<?php //endif; ?>
			</div>
		</div>
	</div>

	<?php if ($show_tours_automatically || $show_all_tours){ ?>
		<?php $count_of_posts = get_field('count_of_tours_to_show_automatically') ?>
		<?php if ($show_all_tours): ?>
			<?php $count_of_posts = -1  ?>
		<?php endif ?>



		<?php $arg = array(
			'post_type'	    => 'tours', 
			'order'		    => 'DESC',
				// 'orderby'	    => 'menu_order',
			'posts_per_page'    => $count_of_posts
		);
		$the_query = new WP_Query( $arg ); ?>
		<?php if ( $the_query->have_posts() ) : ?>
			<div id="post-type-post" class="tours-post-list ajax-reload" data-block-id="<?php echo $blockID ?>" >
				<?php get_template_part( 'template-parts/inline-svg/ajax', 'preloader' ); ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class=" post-type-list-item wow animate__animated animate__fadeInUp">
						<!-- <?php $country = get_field('country', get_the_ID()) ?>
						<?php $type = get_field('type', get_the_ID()) ?>
						<?php $season = get_field('season', get_the_ID()) ?>
						<?php //var_dump($country) ?>
						<?php $term = get_term( $country ) ?>
						<?php echo $season ?><br>
						<?php echo $type ?><br>
						<?php echo $term->name ?> -->
						<?php $img = get_attached_img_url( get_the_ID(), 'max_767' ) ?>
						<?php if($img): ?>
							<a class="list-item-link " href="<?php the_permalink() ?>">
								<span class="list-item-image" <?php  bg($img) ?>></span>
							</a>
						<?php endif; ?>
						<h3 class="post-title" ><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						<?php if($duration = get_field('duration', get_the_ID())): ?>
							<span class="duration"><?php echo $duration ?></span>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
				<div class="post-type-list-item empty"></div>
			</div>
		<?php endif; wp_reset_query(); ?>
	<?php } else { ?>
		<?php $posts = get_field('tours_list'); ?>
		<?php if( $posts ): ?>
			<div id="post-type-tours" class="tours-post-list ajax-reload">
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
						<?php if($duration = get_field('duration', $p->ID)): ?>
							<span class="duration"><?php echo $duration ?></span>
						<?php endif; ?>
					</div>
					<?php $i++ ?>
				<?php endforeach; ?>
				<div class="post-type-list-item empty"></div>
			</div>
		<?php endif; ?>

	<?php } ?>
	<?php if($button = get_field('button')): ?>
		<div class="text-center tours-list-button wow animate__animated animate__fadeInUp"><a href="<?php echo $button['url'] ?>" <?php echo $button['target'] ? 'target="'.$button['target'].'"' :'' ?> class="custom-button"><?php echo $button['title'] ?></a></div>
	<?php endif; ?>
</div>

<?php do_action( 'block_end', __DIR__); ?>
