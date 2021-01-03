<?php
/**
 * Block Name: Image section
 *
 * This is the template that displays the image
 */

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'heading-section';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>
<?php $heading_type = get_field('heading_type') ?>
<?php $row_width = get_field('row_width') ?>
<?php $heading_text = get_field('heading_text') ?>

	<div class="heading-section-row column <?php echo $row_width ?> ">
		<?php if($heading_text = get_field('heading_text')): ?>
			<<?php echo $heading_type ?> class="wow animate__animated animate__fadeInUp"><?php echo $heading_text ?></<?php echo $heading_type ?>>
		<?php endif; ?>
	</div>


<?php do_action( 'block_end', __DIR__); ?>
