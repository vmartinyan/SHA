<div class="hover-content">
   <figure class="<?php echo $hover_effect; ?>">
	    <img src="<?php echo $image_url; ?>">
	    <figcaption>
	        <h3 class="<?php echo $heading_effect; ?> ih-delay-md"><?php echo $caption_heading; ?></h3>
	        <p class="<?php echo $caption_effect; ?> ih-delay-lg">
					<?php echo $content; ?>
			</p>
	    </figcaption>
	    <?php if ($caption_url!='') { ?>
	    	<a href="<?php echo $caption_url; ?>" target="<?php echo $caption_url_target; ?>"></a>
	    <?php } ?>
	</figure>
</div>