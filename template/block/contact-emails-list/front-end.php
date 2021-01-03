<?php
/**
 * Block Name: Service list
 *
 * This is the template that displays service list
 */

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'emails-list-section';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php if( have_rows('contacts') ): ?>
	<div class="emails-list-section__row row">
		<?php while( have_rows('contacts') ): the_row(); 
			$contact_type = get_sub_field('contact_type');
			$email = get_sub_field('email');
		?>
			<div class="emails-list-section__column column">
				<span class="email-type"><?php echo $contact_type ?></span>
				<span class="email">
					<svg xmlns="http://www.w3.org/2000/svg" width="29" height="22" viewBox="0 0 29 22">
						<g><g>
							<path fill="#187daf" d="M27.534.256L17.349 10.444h-.001l-2.91 2.798L1.457.255C1.789.096 2.157 0 2.548 0h23.894c.392 0 .76.097 1.092.256zM29 2.548v16.984c0 .392-.096.759-.255 1.091l-9.588-9.583 9.588-9.583c.159.332.255.7.255 1.091zM9.844 11.04L.255 20.623A2.517 2.517 0 0 1 0 19.532V2.548c0-.392.096-.759.255-1.091zm17.69 10.794c-.333.16-.7.256-1.092.256H2.548c-.392 0-.76-.097-1.092-.256l9.585-9.588 2.797 2.798a.846.846 0 0 0 1.2 0l2.91-2.798z"/>
						</g></g>
					</svg>
					<a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
				</span>
			</div>
		<?php endwhile; ?>
	</div>	
<?php endif; ?>

<?php do_action( 'block_end', __DIR__); ?>
