<?php
/**
 * Block Name: Image section
 *
 * This is the template that displays the image
 */

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'top-section';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php 
	$section_height = get_field('section_height');
	$title = get_field('title');
	$text = get_field('text');
	$content_alignment = get_field('content_alignment');
	if($content_alignment == 'center' && $title && !$text) {
		$class = 'center-only-title';
	}
?>

<div class="cover-bg top-section__container top-section__container--<?php echo $section_height; ?><?php echo $class ? ' top-section__container--'.$class : '' ?>">
	<?php $image = get_field('image') ?>
	<?php $mobile_image = get_field('mobile_image') ?>
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
		<div class="row cover-bg-content top-section__row alignment-<?php echo $content_alignment ?>">
			<div class="column top-section__content-column">
				<div class="top-section-content top-section-content--common">
					<?php if($title): ?>
						<?php $title_size = get_field('title_size') ?>
						<h1 class="wow animate__animated animate__fadeInUp top-section-title title-size-<?php echo $title_size ?><?php echo $text ? '' : ' only-title'; ?>" ><?php echo $title ?></h1>
					<?php endif; ?>
					<?php if($text): ?>
						<?php $text_size = get_field('text_size') ?>
						<p class="wow animate__animated animate__fadeInUp  top-section-text <?php echo $text_size ?>"><?php echo $text ?></p>
					<?php endif; ?>
					<?php if($link = get_field('learn_more')): ?>
						<a class="learm-more wow animate__animated animate__fadeInUp " href="<?php echo $link['url'] ?>" <?php echo $link['target'] ? 'target="'.$link['target'].'"' :'' ?> rel="nofollow"><?php echo $link['title'] ?><svg xmlns="http://www.w3.org/2000/svg" width="9" height="14" viewBox="0 0 9 14"><g><g><path d="M0 11.076l4.602-4.04L0 2.97v-.16L2.301.723 9 6.823v.4l-6.699 6.1L0 11.236z"/></g></g></svg></a>
					<?php endif; ?>
					<?php if(have_rows('buttons')): ?>
						<div class="top-section-content__buttons-container">
							<?php while(have_rows('buttons')): the_row();
								$link = get_sub_field('link');
								$link_type = get_sub_field('link_type')
							?>
								<a href="<?php echo $link['url'] ?>" <?php echo $link['target'] == '_blank' ? 'target="_blank"' : '' ?> class="button wow animate__animated animate__fadeInUp  <?php echo $link_type; ?>">
									<?php echo $link['title']; ?>
								</a>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php $contact_form_shortcode = get_field('contact_form_shortcode'); ?>
			<?php if($content_alignment == 'left' && $contact_form_shortcode): ?>
				<div class="column top-section__form-column">
					<div class="contact-form contact-form-black wow animate__animated animate__fadeInUp ">
						<?php echo do_shortcode($contact_form_shortcode); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	
</div>

<?php do_action( 'block_end', __DIR__); ?>
