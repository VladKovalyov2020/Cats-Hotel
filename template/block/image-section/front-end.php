<?php
/**
 * Block Name: Image section
 *
 * This is the template that displays the image
 */

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'image-section';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>
<?php $image = get_field('image') ?>
<?php $image_for_small = get_field('image_for_small') ?>
<?php $row_width = get_field('row_width') ?>

	<div class="image-section-row column wow animate__animated animate__fadeInUp <?php echo $row_width ?> ">
		<?php if($image): ?>
			<picture >
				<?php if ($image_for_small) { ?>
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
	</div>


<?php do_action( 'block_end', __DIR__); ?>
