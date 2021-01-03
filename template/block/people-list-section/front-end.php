<?php
/**
 * Block Name: Image section
 *
 * This is the template that displays the image
 */
$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'people-list-section';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php if( have_rows('groups_of_people','options') ): ?>
	<?php while ( have_rows('groups_of_people','options') ) : the_row();?>
	<div class="row column" id="people">
		<div class="people-list__heading">
			<?php if($group_title = get_sub_field('group_title', 'options')): ?>
				<h3 class="wow animate__animated animate__fadeInUp" ><?php echo $group_title; ?></h3>
			<?php endif; ?>
			<?php if($group_email = get_sub_field('group_email')): ?>
				<span class="wow animate__animated animate__fadeInUp" >
					<svg xmlns="http://www.w3.org/2000/svg" width="29" height="22" viewBox="0 0 29 22">
						<g><g>
							<path fill="#187daf" d="M27.534.256L17.349 10.444h-.001l-2.91 2.798L1.457.255C1.789.096 2.157 0 2.548 0h23.894c.392 0 .76.097 1.092.256zM29 2.548v16.984c0 .392-.096.759-.255 1.091l-9.588-9.583 9.588-9.583c.159.332.255.7.255 1.091zM9.844 11.04L.255 20.623A2.517 2.517 0 0 1 0 19.532V2.548c0-.392.096-.759.255-1.091zm17.69 10.794c-.333.16-.7.256-1.092.256H2.548c-.392 0-.76-.097-1.092-.256l9.585-9.588 2.797 2.798a.846.846 0 0 0 1.2 0l2.91-2.798z"/>
						</g></g>
					</svg>
					<a href="mailto:<?php echo $group_email; ?>"><?php echo $group_email; ?></a>
				</span>
			<?php endif; ?>
		</div>
		<?php if( have_rows('people_list','options') ): ?>
			<ul class="people-list" >
				<?php while ( have_rows('people_list','options') ) : the_row();?>
					<li class="people-list-item wow animate__animated animate__fadeInUp" >
						<span class="people-list-item__inner-container">
							<?php $photo = get_sub_field('photo','options') ?>
							<span class="people-list-photo" <?php echo $photo ? bg($photo,'max_400') : bg(IMAGE_PLACEHOLDER) ?> ></span>
							<?php if($name = get_sub_field('name','options')): ?>
								<span class="people-list-name"><?php echo $name ?></span>
							<?php endif; ?>
							<?php if($position = get_sub_field('position','options')): ?>
								<span class="people-list-position"><?php echo $position ?></span>
							<?php endif; ?>
							<?php if($email = get_sub_field('email','options')): ?>
								<span class="people-list-email"><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></span>
							<?php endif; ?>
						</span>
					</li>
				<?php endwhile;?>
				<!-- <span class="people-list-item empty" ></span> -->
			</ul>
		<?php endif; ?>
	</div>
	<?php endwhile;?>
<?php endif; ?>

<?php do_action( 'block_end', __DIR__); ?>
