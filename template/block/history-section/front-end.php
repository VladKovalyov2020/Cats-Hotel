<?php
/**
 * Block Name: Service list
 *
 * This is the template that displays service list
 */

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'history-section';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<div class="history-section-description wow animate__animated animate__fadeInUp" id="history">
	<div class="row">
		<?php if($section_title = get_field('section_title')): ?>
			<div class="column history-section__column-title">
				<?php $first_word_featured = get_field('first_word_featured'); ?>
				<h2 class="history-section-title<?php echo $first_word_featured ? ' first-word-featured' : '' ?>"><?php echo $section_title; ?></h2>
			</div>
		<?php endif; ?>
		<?php if($section_content = get_field('section_content')): ?>
			<div class="column history-section__column-text">
				<div class="history-section-text">
					<?php echo $section_content; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php if( have_rows('desktop_history_checkpoints') ): $i = 1; ?>
    <div class="history-section-chart desktop-chart wow animate__animated animate__fadeInUp">
		<div class="row column chart-row">
			<canvas id="canvas"></canvas>
			<?php while( have_rows('desktop_history_checkpoints') ): the_row(); 
				$year = get_sub_field('year');
				$history_description = get_sub_field('history_description');
				$image = get_sub_field('image');
				$content_position = get_sub_field('content_position');
				$distance_for_history_from_top = get_sub_field('distance_for_history_from_top');
				$distance_from_content_to_marker = get_sub_field('distance_from_content_to_marker');
			?>
				<div class="history-item" style="padding-top: <?php echo $distance_for_history_from_top; ?>px;">
					<?php if($content_position == 'under'): ?>
						<div class="marker marker-desktop" id="marker-<?php echo $i ?>"></div>
						<div class="history-item__content" style="padding-top: <?php echo $distance_from_content_to_marker ?>px;">
							<?php if($image): ?>
								<span class="history-image">
									<img src="<?php echo $image['sizes']['thumbnail'] ?>" alt="<?php _e('History icon', 'hs') ?>">
								</span>	
							<?php endif; ?>
							<?php if($year): ?>
								<span class="history-date"><?php echo $year; ?></span>
							<?php endif; ?>
							<?php if($history_description): ?>
								<span class="history-description"><?php echo $history_description; ?></span>
							<?php endif; ?>
						</div>
					<?php else: ?>
						<div class="history-item__content" style="padding-bottom: <?php echo $distance_from_content_to_marker ?>px;">
							<?php if($image): ?>
								<?php if($show_image_near_marker = get_sub_field('show_image_near_marker')) {
									$image_side = get_sub_field('image_side');
								} ?>
								<span class="history-image<?php echo $show_image_near_marker ? ' history-image--near history-image--'.$image_side : '' ?>">
									<img src="<?php echo $image['sizes']['thumbnail'] ?>" alt="<?php _e('History icon', 'hs') ?>">
								</span>	
							<?php endif; ?>
							<?php if($year): ?>
								<span class="history-date"><?php echo $year; ?></span>
							<?php endif; ?>
							<?php if($history_description): ?>
								<span class="history-description"><?php echo $history_description; ?></span>
							<?php endif; ?>
						</div>
						<div class="marker marker-desktop" id="marker-<?php echo $i ?>"></div>
					<?php endif; ?>
				</div>
				<?php $i++; ?>
			<?php endwhile; ?>
		</div>
    </div>
<?php endif; ?>
<?php if( have_rows('mobile_history_checkpoints') ): ?>
	<div class="history-section-chart mobile-chart">
		<div class="row column chart-row">
			<?php while( have_rows('mobile_history_checkpoints') ): the_row(); 
				$year = get_sub_field('year');
				$history_description = get_sub_field('history_description');
				$image = get_sub_field('image');
			?>
				<div class="history-item">
					<span class="history-image">
						<img src="<?php echo $image['sizes']['thumbnail'] ?>" alt="<?php _e('History icon', 'hs') ?>">
					</span>	
					<div class="marker"></div>
					<div class="history-item__content">
						<?php if($year): ?>
							<span class="history-date"><?php echo $year; ?></span>
						<?php endif; ?>
						<?php if($history_description): ?>
							<span class="history-description"><?php echo $history_description; ?></span>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
    </div>
<?php endif; ?>


<?php do_action( 'block_end', __DIR__); ?>
