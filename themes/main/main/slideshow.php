<div id="slideshow" class='carousel carousel-animated carousel-animate-slide' data-autoplay="true">
	<div class='carousel-container'>
		<?php for ($i = 0; $i < (count($showcaseImages)); ++$i): ?>
		<div class='carousel-item has-background is-active'>
			<img class="is-background is-image-responsive" src="<?php echo $this->themePath('img/'.$showcaseImages[$i], true) ?>" alt=""/>
		</div>
		<?php endfor ?>
	</div>
	<div class="carousel-navigation is-overlay">
		<div class="carousel-nav-left">
			<i class="fa fa-chevron-left" aria-hidden="true"></i>
		</div>
		<div class="carousel-nav-right">
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
		</div>
	</div>
</div>