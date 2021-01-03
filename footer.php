<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer" id="footer" >
	<div class="row footer__main-row">
		<div class="column column-left">
			<?php if ($footer_logo = get_field('footer_logo','options')) { ?>
				<div class="footer-logo">
					<a href="<?php bloginfo('url') ?>"><img src="<?php echo $footer_logo['sizes']['max_400'] ?>" alt=""></a>
				</div>
			<?php } else { ?>
				<div class="footer-logo">
					<?php show_custom_logo(); ?>
				</div>
			<?php } ?>
			<?php if($footer_text = get_field('footer_text','options')): ?>
				<p class="footer-text" ><?php echo $footer_text ?></p>
			<?php endif; ?>
			<?php if($bisnode_logo = get_field('bisnode_logo','options')): ?>		
				<div class="footer-bisnode-logo footer-bisnode-logo--desktop">
					<img src="<?php echo $bisnode_logo['sizes']['medium'] ?>" alt="">	
				</div>
			<?php endif; ?>
			<?php if( have_rows('social_links','options') ): ?>
				<ul class="footer-social-icons social-icons social-icons--desktop" >
					<?php while ( have_rows('social_links','options') ) : the_row();?>
						<?php $icon = get_sub_field('icon','options') ?>
						<?php $link = get_sub_field('link','options') ?>
						<?php if ($link): ?>
							<li><a href="<?php echo $link['url'] ?>" <?php echo $link['target'] ? 'target="'.$link['target'].'"' :'' ?> rel="nofollow"><?php echo loadImgOrSvg($icon) ?></a></li>
						<?php endif ?>
					<?php endwhile;?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="column column-right">
			<div class="row footer__nav-contact-row">
				<div class="column">
					<?php if($footer_title_1 = get_field('footer_title_1','options')): ?>
						<span class="footer-title" ><?php echo $footer_title_1 ?></span>
					<?php endif; ?>
					<?php if($phone = get_field('phone','options')): ?>
						<p class="footer-phone footer-contact"><a href="tel:<?php echo preparePhone($phone) ?>"><?php echo $phone ?></a></p>
					<?php endif; ?>
					<?php if($phone_2 = get_field('phone_2','options')): ?>
						<p class="footer-phone footer-contact"><a href="tel:<?php echo preparePhone($phone_2) ?>"><?php echo $phone_2 ?></a></p>
					<?php endif; ?>
					<?php if($email = get_field('email','options')): ?>
						<p class="footer-email footer-contact" ><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
					<?php endif; ?>
				</div>
				<div class="column">
					<?php if($footer_title_2 = get_field('footer_title_2','options')): ?>
						<span class="footer-title" ><?php echo $footer_title_2 ?></span>
					<?php endif; ?>
					<?php if (has_nav_menu('footer-menu')) { ?>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'footer-menu','depth'=>1));?>
					<?php } ?>
				</div>
				<div class="column column-long">
					<?php if($footer_title_3 = get_field('footer_title_3','options')): ?>
						<span class="footer-title" ><?php echo $footer_title_3 ?></span>
					<?php endif; ?>
					<?php if (has_nav_menu('footer-menu-2')) { ?>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-2', 'menu_class' => 'footer-menu-2','depth'=>1));?>
					<?php } ?>
				</div>
				<div class="column column--mobile">
					<?php if($address = get_field('address','options')): ?>
						<span class="footer-address footer-info" ><?php echo $address ?></span>
					<?php endif; ?>
					<?php if( have_rows('social_links','options') ): ?>
						<ul class="footer-social-icons social-icons" >
							<?php while ( have_rows('social_links','options') ) : the_row();?>
								<?php $icon = get_sub_field('icon','options') ?>
								<?php $link = get_sub_field('link','options') ?>
								<?php if ($link): ?>
									<li><a href="<?php echo $link['url'] ?>" <?php echo $link['target'] ? 'target="'.$link['target'].'"' :'' ?> rel="nofollow"><?php echo loadImgOrSvg($icon) ?></a></li>
								<?php endif ?>
							<?php endwhile;?>
						</ul>
					<?php endif; ?>
					<div class="footer-bisnode-logo">
						<img src="<?php echo $bisnode_logo['sizes']['max_400'] ?>" alt="">	
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="column footer__info-column">
					<?php if($nip = get_field('nip','options')): ?>
						<span class="footer-nip footer-info" ><?php echo $nip ?></span>
					<?php endif; ?>
					<?php if($address = get_field('address','options')): ?>
						<span class="footer-address footer-info footer-address--desktop" ><?php echo $address ?></span>
					<?php endif; ?>
					<?php if($created_by = get_field('created_by', 'options')): ?>
						<span class="footer-createdby footer-info footer-createdby"><?php echo $created_by ?></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>