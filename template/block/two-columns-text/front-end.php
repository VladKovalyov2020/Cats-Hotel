<?php
/**
 * Block Name: Service list
 *
 * This is the template that displays service list
 */

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'two-columns-text-section';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php 
	$left_column_width = get_field('left_column_width');
	$left_content_type = get_field('left_content_type');
	$left_column_content = get_field('left_column_content');
	$left_column_button = get_field('left_column_button');
	$left_column_form = get_field('left_column_form');

	$right_column_width = get_field('right_column_width');
	$right_content_type = get_field('right_content_type');
	$right_column_content = get_field('right_column_content');
	$right_column_button = get_field('right_column_button');
	$right_column_form = get_field('right_column_form');
?>
<div class="two-columns-text-section__row row">
	<div class="column two-columns-text-section__left-column col-lg-<?php echo $left_column_width ?>">
		<?php if($left_content_type == 'text'): ?>
			<?php if($left_column_content) : ?>
				<div class="two-columns-text-section-content wow animate__animated animate__fadeInUp">
					<?php echo $left_column_content; ?>
				</div>
			<?php endif; ?>
			<?php if($left_column_button): ?>
				<?php $left_button_color = get_field('left_button_color'); ?>
				<a class="button wow animate__animated animate__fadeInUp <?php echo $left_button_color; ?>" href="<?php echo $left_column_button['url'] ?>" <?php echo $left_column_button['target'] == '_blank' ? 'target="_blank"' : '' ?>>
					<?php echo $left_column_button['title']; ?>
				</a>
			<?php endif; ?>
		<?php else: ?>
			<div class="contact-form contact-form-white wow animate__animated animate__fadeInUp ">
				<?php if($left_column_form_title = get_field('left_column_form_title')): ?>
					<?php $left_title_for_small = get_field('show_left_form_title_only_for_small'); ?>
					<h2 <?php echo $left_title_for_small ? 'class="show-for-small"' : ''; ?>><?php echo $left_column_form_title; ?></h2>
				<?php endif; ?>	
				<?php echo do_shortcode($left_column_form); ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="column two-columns-text-section__right-column col-lg-<?php echo $right_column_width ?>">
		<?php if($right_content_type == 'text'): ?>
			<?php if($right_column_content) : ?>
				<div class="two-columns-text-section-content wow animate__animated animate__fadeInUp ">
					<?php echo $right_column_content; ?>
				</div>
			<?php endif; ?>
			<?php if($right_column_button): ?>
				<?php $right_button_color = get_field('right_button_color'); ?>
				<a class="button wow animate__animated animate__fadeInUp  <?php echo $right_button_color; ?>" href="<?php echo $right_column_button['url'] ?>" <?php echo $right_column_button['target'] == '_blank' ? 'target="_blank"' : '' ?>>
					<?php echo $right_column_button['title']; ?>
				</a>
			<?php endif; ?>
		<?php else: ?>
			<div class="contact-form contact-form-white wow animate__animated animate__fadeInUp ">
				<?php if($right_column_form_title = get_field('right_column_form_title')): ?>
					<?php $right_title_for_small = get_field('show_right_form_title_only_for_small'); ?>
					<h2 <?php echo $right_title_for_small ? 'class="show-for-small"' : ''; ?>><?php echo $right_column_form_title; ?></h2>
				<?php endif; ?>	
				<?php echo do_shortcode($right_column_form); ?>
			</div>
		<?php endif; ?>
	</div>
</div>	


<?php do_action( 'block_end', __DIR__); ?>
