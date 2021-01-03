<?php
/**
 * Block Name: Image section
 *
 * This is the template that displays the image
 */

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'top-slider-section ';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>



<?php if( have_rows('slider') ): ?>
	<div class="slider-for slider-for-container">
		<div class="slider-for-container-arrows hide-for-small">
			<a href="" class="slick-prev-arr top-slider-section-arrows"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="19" viewBox="0 0 13 19"><g><g transform="rotate(-180 6.5 9.5)"><path fill="#fff" d="M0 15.48l6.32-6.04L0 3.36v-.24L3.16 0l9.2 9.12v.6l-9.2 9.12L0 15.72z"/></g></g></svg></a>
			<a href="" class="slick-next-arr top-slider-section-arrows"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="19" viewBox="0 0 13 19"><g><g ><path fill="#fff" d="M0 15.48l6.32-6.04L0 3.36v-.24L3.16 0l9.2 9.12v.6l-9.2 9.12L0 15.72z"/></g></g></svg></a>
		</div>
		<?php $i = 0; while ( have_rows('slider') ) : the_row();?>
			<?php if( $i === 0 ) { ?>
				<h1 class="visually-hidden"><?php echo get_sub_field('title'); ?></h1>
			<?php } ?>
			<div class="slider-item cover-bg">
				<?php $image = get_sub_field('image') ?>
				<?php $mobile_image = get_sub_field('image_for_mobile') ?>
				<?php if($image): ?>
					<picture >
						<?php if ($mobile_image) { ?>
							<source media='(max-width: 400px)'
							srcset='<?php echo $mobile_image['sizes']['max_400'] ?>'/>
							<source media='(max-width: 767px)'
							srcset='<?php echo $mobile_image['sizes']['max_767'] ?>'/>
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

					<div class="row column slider-item-content cover-bg-content">
						<?php if($title = get_sub_field('title')): ?>
							<span class="top-section-title wow animate__animated animate__fadeInUp " ><?php echo $title ?></span>
						<?php endif; ?>
						<div class="top-section-content">
							<?php if($sub_title = get_sub_field('sub_title')): ?>
								<span class="top-section-sub-title wow animate__animated animate__fadeInUp " ><?php echo $sub_title ?></span>
							<?php endif; ?>
							<?php if($text = get_sub_field('text')): ?>
								<div class="top-section-text wow animate__animated animate__fadeInUp "><?php echo $text ?></div>
							<?php endif; ?>
							<?php if($link = get_sub_field('link')): ?>
								<a class="custom-button gray wow animate__animated animate__fadeInUp " href="<?php echo $link['url'] ?>" <?php echo $link['target'] ? 'target="'.$link['target'].'"' :'' ?> rel="nofollow"><?php echo $link['title'] ?></a>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		<?php $i++; endwhile;?>
	</div>
	<div class="slider-nav-container">
		<div class="slider-nav">
			<div class="slider-nav-container-arrows show-for-small">
				<a href="" class="nav-slick-prev-arr top-slider-section-arrows"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="19" viewBox="0 0 13 19"><g><g transform="rotate(-180 6.5 9.5)"><path fill="#fff" d="M0 15.48l6.32-6.04L0 3.36v-.24L3.16 0l9.2 9.12v.6l-9.2 9.12L0 15.72z"/></g></g></svg></a>
				<a href="" class="nav-slick-next-arr top-slider-section-arrows"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="19" viewBox="0 0 13 19"><g><g ><path fill="#fff" d="M0 15.48l6.32-6.04L0 3.36v-.24L3.16 0l9.2 9.12v.6l-9.2 9.12L0 15.72z"/></g></g></svg></a>
			</div>
			<?php while ( have_rows('slider') ) : the_row();?>
				<?php if($image = get_sub_field('image')): ?>
					<div class="slider-nav-item" <?php bg($image, 'max_250') ?>></div>	
				<?php endif; ?>
			<?php endwhile;?>
		</div>
	</div>
<?php endif; ?>


<?php do_action( 'block_end', __DIR__); ?>
