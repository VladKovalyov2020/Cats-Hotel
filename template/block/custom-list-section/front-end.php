<?php
/**
 * Block Name: Image section
 *
 * This is the template that displays the image
 */

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'custom-list-section ';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>


<?php if( have_rows('list') ): ?>
	<?php $list_type = get_field('list_type') ?>
	<?php $two_columns_list = get_field('two_columns_list') ?>
	<div class="row column">
		<ul class="custom-list <?php echo $list_type ? : '' ?> <?php echo $two_columns_list ? 'two-columns' : '' ?>" >
			<?php while ( have_rows('list') ) : the_row();?>
				<li class="wow animate__animated animate__fadeInUp" ><?php the_sub_field('list_item'); ?></li>
			<?php endwhile;?>
		</ul>
	</div>
<?php endif; ?>


<?php do_action( 'block_end', __DIR__); ?>
