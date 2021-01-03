<?php
/**
 * Block Name: Space block
 *
 * This is the template that displays the spacee block.
 */

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'space-section';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>





<?php $space_height_desktop = get_field('space_height_desktop') ?>
<?php $space_height_mobile = get_field('space_height_mobile') ?>
<?php $space_background_desktop = get_field('space_background_desktop') ?>
<?php $space_background_mobile = get_field('space_background_mobile') ?>

<div class="space-block space-block-<?php echo $blockID ?> for-large hide-for-small" style="background-color:<?php echo $space_background_desktop ?>; height: <?php echo $space_height_desktop ?>px;" ></div>
<div class="space-block show-for-small" style="background-color:<?php echo $space_background_mobile ?>; height: <?php echo $space_height_mobile ?>px;" ></div>

<style>
	@media only screen and (min-width: 1200px) {
		.space-block-<?php echo $blockID ?>.for-large{
			height: <?php echo $space_height_desktop/16 ?>em !important;
		}
	}
</style>

<?php do_action( 'block_end', __DIR__); ?>
