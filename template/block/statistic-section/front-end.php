<?php
/**
 * Block Name: Service list
 *
 * This is the template that displays service list
 */

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'statistic-section';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php $blockquote = get_field('blockquote'); ?>
<?php $author = get_field('author'); ?>

<?php if($blockquote || $author): ?>
<div class="row column wow animate__animated animate__fadeInUp">
	<blockquote class="statistic-section__blockquote">
		<svg xmlns="http://www.w3.org/2000/svg" width="68" height="57" viewBox="0 0 68 57"><g><g><path fill="#187daf" d="M52.209 53.139c-15.103 10.759 1.19-2.314 4.831-22.585a16.565 16.565 0 0 1-5.241.858c-8.94 0-16.188-7.031-16.188-15.706C35.611 7.032 42.858 0 51.798 0c8.94 0 16.188 7.032 16.188 15.706l-.001.022c.018.457.97 25.48-15.776 37.41zM0 15.706C0 7.032 7.247 0 16.187 0c8.94 0 16.187 7.032 16.187 15.706v.021c.018.458.97 25.48-15.776 37.412-15.103 10.759 1.189-2.314 4.832-22.585a16.573 16.573 0 0 1-5.243.858C7.247 31.412 0 24.381 0 15.706z"/></g></g></svg>
		<?php echo $blockquote; ?>
		<cite><?php echo $author; ?></cite>
	</blockquote>
</div>
<?php $image = get_field('cover_image') ?>
<?php $image_for_small = get_field('cover_image_mobile') ?>

<div class="large_row column statistic-section__row wow animate__animated animate__fadeInUp">
	<div class="cover-bg statistic-section__content">
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
		<?php $video = get_field('video'); ?>
		<div class="statistic-section__inner-row row">
			<div class="statistic-section__text-column column">
				<?php if($title = get_field('title')): ?>
					<h2><?php echo $title; ?></h2>
				<?php endif; ?>
				<?php if($text = get_field('text')): ?>
					<p><?php echo $text; ?></p>
				<?php endif; ?>
			</div>
			<?php if($video && $video['type'] == 'video' ): ?>
				<div class="statistic-section__play-button-column column">
					<a class="statistic-section-play-button" href="#">
						<svg xmlns="http://www.w3.org/2000/svg" width="126px" height="80px" viewBox="0 0 126 80">
							<g>
								<g><path class="layer" d="M0 40C0 17.909 17.909 0 40 0h46c22.091 0 40 17.909 40 40s-17.909 40-40 40H40C17.909 80 0 62.091 0 40z"/></g>
								<g><path fill="#fff" d="M69.576 39.003a1.76 1.76 0 0 1 0 2.994l-11.891 7.345A1.76 1.76 0 0 1 55 47.844V33.156a1.76 1.76 0 0 1 2.685-1.498z"/></g>
							</g>
						</svg>
					</a>
				</div>
			<?php endif; ?>
			<?php if(have_rows('statistic_data')): ?>
				<div class="statistic-section__statistic-data-column column">
					<?php while( have_rows('statistic_data') ) : the_row(); ?>
						<div class="statistic-section-statistic-data__item">
							<?php if($label = get_sub_field('label')): ?>
								<span class="statistic-label"><?php echo $label; ?></span>
							<?php endif; ?>
							<?php if($value = get_sub_field('value')): ?>
								<span class="statistic-value"><?php echo $value; ?></span>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
		
		<?php if($video && $video['type'] == 'video' ): ?>
			<div class="statistic-section__video-container">
				<video class="statistic-section-video" muted id="myVideo">
					<source src="<?php echo $video['url'] ?>" type="<?php echo $video['mime_type'] ?>">
				</video>
				<span class="statistic-section-pause-button">||</span>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>

<?php do_action( 'block_end', __DIR__); ?>
