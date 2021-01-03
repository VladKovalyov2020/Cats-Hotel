<?php
/**
 * Block Name: Service list
 *
 * This is the template that displays service list
 */

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'tour-info';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>
<?php 
	$tour_object = get_queried_object();
	$tour_id = $tour_object->ID;
?>

<div class="row tour-info__row">
	<div class="column tour-info__content-column">
		<div class="tour-info__categories wow animate__animated animate__fadeInUp">
			<?php if($duration = get_field('duration', $tour_id)): ?>
				<div class="tour-info__category-item  ">
					<?php $duration_2 = get_field('duration','options') ?>
					<span class="tour-info-category-label"><?php echo $duration_2 ? $duration_2 : 'Duration:' ?></span>
					<span class="tour-info-duration tour-info-category"><?php echo $duration; ?></span>
				</div>
			<?php endif; ?>
			<?php if($season = get_field('season', $tour_id)): ?>
				<div class="tour-info__category-item  ">
					<?php switch($season) {
						case 'winter':
							echo '<svg xmlns="http://www.w3.org/2000/svg" width="29" height="32" viewBox="0 0 29 32"><g><g><path fill="#187daf" d="M18.028 18.2l-1.807 1.06-1.776 1.028-1.84-1.06-1.807-1.06v-4.207l3.615-2.119 1.808 1.06.031.031 1.776 1.028zm9.817-.624l-5.796 1.995-2.338-1.34v-4.27l2.338-1.34 5.796 1.995c.405.156.873-.094.997-.499.156-.405-.093-.872-.498-.997l-4.488-1.527 4.207-2.43a.805.805 0 0 0 .28-1.092.805.805 0 0 0-1.09-.28l-4.207 2.43.904-4.643c.093-.436-.187-.841-.624-.935-.436-.093-.841.187-.935.624l-1.184 6.014-2.337 1.34-1.777-1.028-.03-.031-1.808-1.06v-2.68l4.612-4.02c.343-.28.374-.78.062-1.122-.28-.343-.779-.374-1.122-.062l-3.552 3.116V.81a.805.805 0 0 0-.81-.81.805.805 0 0 0-.81.81v4.862l-3.553-3.085c-.343-.28-.842-.25-1.122.062-.28.343-.25.841.062 1.122l4.612 4.02v2.68l-3.615 2.12-2.337-1.34-1.184-6.015c-.094-.437-.499-.717-.935-.624-.436.094-.717.499-.623.935l.903 4.644L1.636 7.76a.805.805 0 0 0-1.09.28.805.805 0 0 0 .28 1.091l4.207 2.43L.546 13.09c-.406.156-.655.592-.5.997.157.405.593.654.998.499l5.797-1.995 2.337 1.34v4.27h.031l-2.337 1.34-5.797-1.995c-.405-.156-.872.094-.997.499-.156.405.094.872.499.997l4.487 1.527-4.207 2.43a.805.805 0 0 0-.28 1.092.805.805 0 0 0 1.09.28l4.208-2.43-.904 4.643c-.094.436.187.841.623.935.436.093.841-.187.935-.624l1.184-6.014 2.337-1.34 1.84 1.06 1.807 1.059v2.68l-4.613 4.02c-.342.28-.374.78-.062 1.122.28.343.78.374 1.122.062l3.553-3.116v4.924c0 .436.342.81.81.81.436 0 .81-.343.81-.81v-4.862l3.553 3.117c.343.28.841.249 1.122-.063.28-.343.249-.841-.063-1.122l-4.674-4.05v-2.681l1.807-1.06 1.808-1.06 2.337 1.34 1.184 6.015c.094.437.499.717.935.624.437-.094.717-.499.624-.935l-.904-4.644 4.207 2.431a.805.805 0 0 0 1.09-.28.805.805 0 0 0-.28-1.091l-4.207-2.43 4.488-1.528c.405-.156.654-.592.498-.997-.156-.405-.592-.654-.997-.499z"/></g></g></svg>';
							break;
						case 'summer':
							echo '<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><g><g><path fill="#0b7cb1" d="M30.992 15.424h1.776v1.92h-1.776zm-3.984 0h2.048v1.92h-2.048zM0 15.424h1.776v1.92H0zm3.712 0H5.76v1.92H3.712zm11.712 15.568h1.92v1.776h-1.92zm5.44-24.288l2.048-3.547 1.663.96-2.048 3.547zM8.192 28.652l2.048-3.547 1.663.96-2.048 3.547zM25.104 10.24l3.547-2.048.96 1.662-3.547 2.048zM3.156 22.912l3.547-2.048.96 1.663-3.547 2.048zm21.948-.384l.96-1.663 3.547 2.048-.96 1.663zM3.156 9.856l.96-1.663 3.547 2.048-.96 1.663zm17.708 16.208l1.663-.96 2.048 3.547-1.663.96zm-5.44.944h1.92v2.048h-1.92zm0-27.008h1.92v1.776h-1.92zM8.192 4.116l1.663-.96 2.048 3.547-1.663.96zm7.232-.404h1.92V5.76h-1.92zm.96 3.808c4.993 0 9.056 4.063 9.056 9.056 0 4.993-4.063 9.056-9.056 9.056-4.993 0-9.056-4.063-9.056-9.056 0-4.993 4.063-9.056 9.056-9.056zm0 1.92c-3.935 0-7.136 3.201-7.136 7.136s3.201 7.136 7.136 7.136 7.136-3.201 7.136-7.136-3.201-7.136-7.136-7.136z"/></g></g></svg>';
							break;
						case 'all':
							echo '<svg xmlns="http://www.w3.org/2000/svg" width="31" height="28" viewBox="0 0 31 28"><g><g><path fill="#187daf" d="M30.72 5.1v19.92c0 1.489-1.211 2.7-2.7 2.7H2.7a2.703 2.703 0 0 1-2.7-2.7V5.1c0-1.489 1.211-2.7 2.7-2.7h2.16V.9a.9.9 0 0 1 1.8 0v1.5h7.8V.9a.9.9 0 0 1 1.8 0v1.5h7.8V.9a.9.9 0 0 1 1.8 0v1.5h2.16c1.489 0 2.7 1.211 2.7 2.7zM1.8 8.64h27.12V5.1c0-.496-.404-.9-.9-.9h-2.16v1.5a.9.9 0 0 1-1.8 0V4.2h-7.8v1.5a.9.9 0 0 1-1.8 0V4.2h-7.8v1.5a.9.9 0 0 1-1.8 0V4.2H2.7c-.496 0-.9.404-.9.9zm27.12 16.38V10.44H1.8v14.58c0 .496.404.9.9.9h25.32c.496 0 .9-.404.9-.9zm-4.02-3a.9.9 0 0 1-.9.9h-1.92a.9.9 0 0 1 0-1.8H24a.9.9 0 0 1 .9.9zm0-3.84a.9.9 0 0 1-.9.9h-1.92a.9.9 0 0 1 0-1.8H24a.9.9 0 0 1 .9.9zm0-3.84a.9.9 0 0 1-.9.9h-1.92a.9.9 0 0 1 0-1.8H24a.9.9 0 0 1 .9.9zm-7.68 7.68a.9.9 0 0 1-.9.9H14.4a.9.9 0 0 1 0-1.8h1.92a.9.9 0 0 1 .9.9zm0-3.84a.9.9 0 0 1-.9.9H14.4a.9.9 0 0 1 0-1.8h1.92a.9.9 0 0 1 .9.9zm0-3.84a.9.9 0 0 1-.9.9H14.4a.9.9 0 0 1 0-1.8h1.92a.9.9 0 0 1 .9.9zm-7.68 7.68a.9.9 0 0 1-.9.9H6.72a.9.9 0 0 1 0-1.8h1.92a.9.9 0 0 1 .9.9zm0-3.84a.9.9 0 0 1-.9.9H6.72a.9.9 0 0 1 0-1.8h1.92a.9.9 0 0 1 .9.9zm0-3.84a.9.9 0 0 1-.9.9H6.72a.9.9 0 0 1 0-1.8h1.92a.9.9 0 0 1 .9.9z"/></g></g></svg>';
							break;
					} ?>
					<span class="tour-info-season tour-info-category tour-infor-season--<?php echo $season; ?>"><?php echo $season; ?></span>
				</div>
			<?php endif; ?>
			<?php if($type = get_field('type', $tour_id)): ?>
				<div class="tour-info__category-item">
					<?php switch($type) {
						case 'fit':
							echo '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="33" viewBox="0 0 21 33"><g><g><path fill="#0b7cb1" d="M18.174 27.126v.016a.645.645 0 0 1-1.29 0v-.016a.645.645 0 0 1 1.29 0zm1.963 3.332c.425.573.547 1.214.353 1.852a.645.645 0 0 1-.618.458h-5.686a.645.645 0 0 1-.645-.647l.007-2.425.002-4.22-.248-.138a.649.649 0 0 1-.156-.065l-1.106-.636-.908 1.884c-.202.42-.493.844-1.245 1.105l-5.026 1.737c.03 1.019-.737 2.17-1.987 2.873a.645.645 0 0 1-.921-.339L.04 26.724a.646.646 0 0 1 .382-.829l2.226-.821.009-.003.01-.004 3.47-1.162.119-.621.248-1.291.503-2.612-.605-3.063-.365.125.01 2.289a2.132 2.132 0 0 1-2.118 2.142h-.01a2.135 2.135 0 0 1-2.138-2.127V14.86a2.138 2.138 0 0 1 1.438-1.96l3.787-1.298.883-1.276c-.69-.492-1.236-1.2-1.62-2.112a.634.634 0 0 1-.02-.049c0-.004-.002-.007-.003-.01v-.003c-1.6-4.895.897-6.598 2.529-7.178.582-.207 1.163-.224 1.662-.224.1 0 .2 0 .303.002l.315.001c.868 0 1.822-.053 3.087-.686a.645.645 0 0 1 .857.271c.652 1.211.434 2.116.136 2.661-.132.24-.3.455-.495.647a4.81 4.81 0 0 1 .825 2.698c0 1.735-1.006 3.193-2.316 4.033l1.402 2.207 1.14.006 1.36-1.985c.32-.468.805-.783 1.365-.887a2.126 2.126 0 0 1 2.482 1.724c.1.56-.022 1.124-.345 1.585l-2.154 3.066a.696.696 0 0 1-.006.008c-.619.851-1.158.853-1.903.855l-1.656.001-.004 2.152 2.782 2.74c.571.56.567.984.562 1.57l-.002.218v1.01a.645.645 0 0 1-1.29 0v-1.01-.23c.005-.461.005-.461-.175-.638l-2.787-2.745H8.5c.593 1.513 2.178 2.378 3.18 2.923.142.078.277.152.396.22l2.436 1.369c.203.114.329.33.329.563l-.002 3.953h2.69c.757 0 1.985.564 2.608 1.405zm-5.297-16.58l-.003 1.79 1.65-.002c.626-.002.628-.002.859-.319l2.15-3.06a.814.814 0 0 0 .132-.616.844.844 0 0 0-.352-.55.827.827 0 0 0-.625-.133.827.827 0 0 0-.535.348l-1.553 2.267a.646.646 0 0 1-.536.28zm-1.26-9.494c-1.274.64-2.803.796-3.215.827-1.552.12-2.514 2.065-2.8 2.738.36.745.856 1.269 1.496 1.577a.64.64 0 0 1 .056.026c.45.205.969.307 1.56.307 1.618 0 3.497-1.535 3.497-3.514 0-.704-.208-1.384-.595-1.961zM7.08 6.114c.649-.988 1.692-2.075 3.185-2.19 1.454-.11 3.243-.64 3.736-1.543.14-.256.169-.544.086-.873-1.161.465-2.14.537-3.033.537-.11 0-.219 0-.326-.002l-.292-.001c-.5 0-.879.025-1.23.15-1.043.37-1.696.98-1.996 1.865-.195.575-.238 1.264-.13 2.057zm.986 8.269a.843.843 0 0 0-.274-1.638c-.09 0-.18.014-.265.044l-3.892 1.334a.851.851 0 0 0-.565.751v1.272a.654.654 0 0 1 0 .135v2.466c0 .453.389.836.849.836h.003a.84.84 0 0 0 .833-.846l-.011-2.752a.645.645 0 0 1 .436-.613zm-.433 1.513l.561 2.838h5.345l.005-2.42.005-2.898-1.575-2.48a4.23 4.23 0 0 1-1.297.213 5.27 5.27 0 0 1-1.622-.24l-.48.694c.57.226 1.03.691 1.235 1.297a2.136 2.136 0 0 1-1.326 2.704zM3.541 29.233l-1.045-2.727-1.021.377L2.87 30.66c.586-.533.783-1.13.67-1.427zM10.914 24c-.874-.478-2.155-1.217-3.018-2.41l-.564 2.929a.645.645 0 0 1-.429.49l-3.188 1.067.783 2.046 4.967-1.716c.316-.11.393-.215.505-.446zm8.327 7.476a1.041 1.041 0 0 0-.14-.25c-.4-.54-1.257-.884-1.572-.884h-2.692l-.003 1.134z"/></g></g></svg>';
							break;
						case 'group':
							echo '<svg xmlns="http://www.w3.org/2000/svg" width="29" height="33" viewBox="0 0 29 33"><g><g><path fill="#187daf" d="M22.16 28.13v-.862h-.862a.639.639 0 0 1 0-1.278h.862v-.862a.639.639 0 0 1 1.277 0v.862h.862a.639.639 0 0 1 0 1.278h-.862v.862a.639.639 0 0 1-1.277 0zm5.788 1.723a6.049 6.049 0 0 1-5.15 2.849 6.087 6.087 0 0 1-5.885-4.558H8.025a.639.639 0 0 1-.639-.639V22.48H.64A.639.639 0 0 1 0 21.84v-6.544a3.666 3.666 0 0 1 3.662-3.66h.51a6.45 6.45 0 0 1-2.607-5.18C1.565 2.896 4.463 0 8.025 0c1.696 0 3.298.652 4.512 1.835a6.415 6.415 0 0 1 1.909 3.902c.315-.048.637-.072.966-.072 3.562 0 6.46 2.896 6.46 6.456a6.45 6.45 0 0 1-2.607 5.18h.51a3.667 3.667 0 0 1 3.643 3.286 6.055 6.055 0 0 1 4.492 2.758l.027.043a.639.639 0 0 1-1.078.685l-.023-.037a4.785 4.785 0 0 0-4.038-2.202A4.803 4.803 0 0 0 18 26.629a4.803 4.803 0 0 0 4.798 4.796 4.778 4.778 0 0 0 4.069-2.251.638.638 0 1 1 1.081.679zM15.412 6.943a5.187 5.187 0 0 0-5.183 5.178 5.187 5.187 0 0 0 5.183 5.18 5.187 5.187 0 0 0 5.182-5.18 5.187 5.187 0 0 0-5.182-5.179zm-7.387 4.692c.32 0 .64-.029.952-.087a6.473 6.473 0 0 1 4.216-5.49 5.149 5.149 0 0 0-5.168-4.78 5.187 5.187 0 0 0-5.182 5.178 5.187 5.187 0 0 0 5.182 5.18zm3.024 5.666h.51A6.459 6.459 0 0 1 9 12.913H3.662a2.387 2.387 0 0 0-2.385 2.383v5.906h6.11v-.24a3.666 3.666 0 0 1 3.662-3.661zm5.678 9.565a6.11 6.11 0 0 1-.005-.237c0-3.123 2.371-5.703 5.409-6.036a2.388 2.388 0 0 0-2.356-2.015h-8.726a2.387 2.387 0 0 0-2.385 2.383v5.905zm11.753.353a.645.645 0 0 1-.71-.153.644.644 0 0 1-.102-.728.644.644 0 0 1 .659-.34.644.644 0 0 1 .535.507c.06.294-.105.599-.382.714z"/></g></g></svg>';
							break;
					} ?>
					<span class="tour-info-type tour-info-category tour-info-type--<?php echo $type; ?>" <?php echo $type == 'fit' ? 'style="text-transform: uppercase;"' : '' ?>><?php echo $type; ?></span>
				</div>
			<?php endif; ?>
		</div>
		<?php if($cities_to_visit = get_field('cities_to_visit')): ?>
			<h3 class="tour-info-visited-cities wow animate__animated animate__fadeInUp"><?php echo $cities_to_visit ?></h3>
		<?php endif; ?>
		<?php if($tour_description = get_field('tour_description')): ?>
			<p class="wow animate__animated animate__fadeInUp" ><?php echo $tour_description; ?></p>
		<?php endif; ?>
		<div class="hide-for-small wow animate__animated animate__fadeInUp">
			<div class="tour-info-plan">
				<?php if($tour_duration_title = get_field('tour_duration_title')): ?>
					<h4 class="tour-info-plan-title wow animate__animated animate__fadeInUp"><?php echo $tour_duration_title; ?></h4>
				<?php endif; ?>
				<?php if( have_rows('tour_plan') ): 
					$rows = get_field('tour_plan');  
					$half = ceil(count($rows) / 2);
					$i = 1;
				?>
					<div class="tour-info-plan-list">
						<?php while( have_rows('tour_plan') ): the_row(); ?>
							<?php if($i == 1): ?>
								<ul class="list-col">
							<?php endif; ?>
							<li class="tour-info-plan-list__item wow animate__animated animate__fadeInUp">
								<?php if($plan_item_title = get_sub_field('plan_item_title')): ?>
									<span class="tour-info-plan-item-title"><?php echo $plan_item_title; ?></span>
								<?php endif; ?>
								<?php if($plan_item_description = get_sub_field('plan_item_description')): ?>
									<span class="tour-info-plan-item-description"><?php echo $plan_item_description; ?></span>
								<?php endif; ?>
							</li>
							<?php if($i == $half): ?>
								</ul>	
								<ul class="list-col">
							<?php endif; ?>
							<?php $i++; endwhile; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
			<div class="tour-info-additional-info">
				<?php if($additional_info_title = get_field('additional_info_title')): ?>
					<p class="tour-info-additional-info__title"><?php echo $additional_info_title; ?></p>
				<?php endif; ?>
				<?php if($additional_info_text = get_field('additional_info_text')): ?>
					<p class="tour-info-additional-info__description"><?php echo $additional_info_text; ?></p>
				<?php endif;?>
				<?php if($button = get_field('button')): ?>
					<a href="<?php echo $button['url'] ?>" class="button tour-info-additional-info__link" <?php echo $link['target'] == '_blank' ? 'target="_blank"' : '' ?>><?php echo $button['title'] ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="column tour-info__slider-column wow animate__animated animate__fadeInUp">
		<?php if($images = get_field('slider')): ?>
			<div class="tour-info-slider-for tour-info-slider">
				<?php foreach( $images as $image ): ?>
					<div class="tour-info-slide cover-bg">
						<picture >
							<source media='(max-width: 400px)'
								srcset='<?php echo $image['sizes']['max_400'] ?>'/>
							<source media='(max-width: 767px)'
								srcset='<?php echo $image['sizes']['max_767'] ?>'/>
							<source media='(max-width: 1024px)'
								srcset='<?php echo $image['sizes']['max_1024'] ?>'/>
							<img src='<?php echo $image['sizes']['full_hd'] ?>'/>
						</picture>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="tour-info-slider-nav-container">
				<div class="tour-info-slider-nav">
					<div class="tour-info-slider-nav-container-arrows">
						<a href="#" class="tour-info-slider-nav-prev-arr tour-info-slider-nav-arrows"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="17" viewBox="0 0 13 17"><g><g transform="rotate(-180 6.5 9)"><path d="M.68 14.953l6.136-5.51L.68 3.896v-.22L3.748.83l8.932 8.32v.548l-8.932 8.32L.68 15.173z"/></g></g></svg></a>
						<a href="#" class="tour-info-slider-nav-next-arr tour-info-slider-nav-arrows"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="17" viewBox="0 0 13 17"><g><g transform="rotate(-360 6.5 8)"><path d="M.68 13.953l6.136-5.51L.68 2.896v-.22L3.748-.17l8.932 8.32v.548l-8.932 8.32L.68 14.173z"/></g></g></svg></a>
					</div>
					<?php foreach( $images as $image ): ?>
						<div class="tour-info-slide-nav" <?php bg($image, 'max_250') ?>></div>	
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="show-for-small ">
			<div class="tour-info-plan">
				<?php if($tour_duration_title = get_field('tour_duration_title')): ?>
					<div class="tour-info-plan__title wow animate__animated animate__fadeInUp">
						<h4><?php echo $tour_duration_title; ?></h4>
					</div>
				<?php endif; ?>
				<?php if( have_rows('tour_plan') ): 
					$rows = get_field('tour_plan');  
					$half = ceil(count($rows) / 2);
					$i = 1;
				?>
					<div class="tour-info-plan-list">
						<?php while( have_rows('tour_plan') ): the_row(); ?>
							<?php if($i == 1): ?>
								<ul class="list-col">
							<?php endif; ?>
							<li class="tour-info-plan-list__item wow animate__animated animate__fadeInUp">
								<?php if($plan_item_title = get_sub_field('plan_item_title')): ?>
									<span class="tour-info-plan-item-title"><?php echo $plan_item_title; ?></span>
								<?php endif; ?>
								<?php if($plan_item_description = get_sub_field('plan_item_description')): ?>
									<span class="tour-info-plan-item-description"><?php echo $plan_item_description; ?></span>
								<?php endif; ?>
							</li>
							<?php if($i == $half): ?>
								</ul>	
								<ul class="list-col">
							<?php endif; ?>
							<?php $i++; endwhile; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
			<div class="tour-info-additional-info">
				<?php if($additional_info_title = get_field('additional_info_title')): ?>
					<p class="tour-info-additional-info__title"><?php echo $additional_info_title; ?></p>
				<?php endif; ?>
				<?php if($additional_info_text = get_field('additional_info_text')): ?>
					<p class="tour-info-additional-info__description"><?php echo $additional_info_text; ?></p>
				<?php endif;?>
				<?php if($button = get_field('button')): ?>
					<a href="<?php echo $button['url'] ?>" class="button tour-info-additional-info__link" <?php echo $link['target'] == '_blank' ? 'target="_blank"' : '' ?>><?php echo $button['title'] ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>


<?php do_action( 'block_end', __DIR__); ?>
