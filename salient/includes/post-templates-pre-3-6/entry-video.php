<article class="post video">
	
	<div class="post-content">
		
		<?php if( !is_single() ) { ?>
				
			<div class="post-meta">
				
				<?php $options = get_option('salient'); 
				$blog_type = $options['blog_type']; ?>
				
				<div class="date">
					<?php if($blog_type == 'masonry-blog-sidebar' || $blog_type == 'masonry-blog-fullwidth') {
						echo the_time('F d, Y');
					}
					else { ?>
					
						<span class="month"><?php the_time('M'); ?></span>
						<span class="day"><?php the_time('d'); ?></span>
						<?php $options = get_option('salient'); 
						if(!empty($options['display_full_date']) && $options['display_full_date'] == 1) {
							echo '<span class="year">'. get_the_time('Y') .'</span>';
						}
					} ?>
				</div><!--/date-->
				
				<div class="nectar-love-wrap">
					<?php if( function_exists('nectar_love') ) nectar_love(); ?>
				</div><!--/nectar-love-wrap-->	
							
			</div><!--/post-meta-->
			
		<?php } ?>
		
		<div class="content-inner">
				
			<?php 
	            $video_embed = get_post_meta($post->ID, '_nectar_video_embed', true);
				
	            if( !empty( $video_embed ) ) {
	                echo '<div class="video-wrap">' . stripslashes(htmlspecialchars_decode($video_embed)) . '</div>';
	            } else { 
	                nectar_video($post->ID); 
	            }
	        ?>
	        
	        <?php if( !is_single() ) { ?>
				<div class="post-header">
					<h2 class="title"><?php if( !is_single() ) { ?> <a href="<?php the_permalink(); ?>"><?php } ?><?php the_title(); ?><?php if( !is_single() ) {?> </a> <?php } ?></h2>	
					<?php echo __('Posted by', NECTAR_THEME_NAME); ?> <?php the_author_posts_link(); ?> | <?php the_category(', '); ?> | <a href="<?php comments_link(); ?>">
					<?php comments_number( __('No Comments', NECTAR_THEME_NAME), __('One Comment ', NECTAR_THEME_NAME), __('% Comments', NECTAR_THEME_NAME) ); ?></a>
				</div><!--/post-header-->
			<?php 
			
				//if no excerpt is set
				global $post;
				if(empty( $post->post_excerpt )) {
					the_content('<span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) . '</span>'); 
				}
				
				//excerpt
				else {
					echo '<div class="excerpt">';
						the_excerpt();
					echo '</div>';
					echo '<a class="more-link" href="' . get_permalink() . '"><span class="continue-reading">Read More</span></a>';
				}
				
				?>
			
			<?php } ?>
			
		   
			<?php 
			if(is_single()){
				//on the single post page display the content
				the_content('<span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) . '</span>'); 
			} ?>
			
			<?php $options = get_option('salient');
				if( $options['display_tags'] == true ){
					 
					if( is_single() && has_tag() ) {
					
						echo '<div class="post-tags"><h4>Tags: </h4>'; 
						the_tags('','','');
						echo '<div class="clear"></div></div> ';
						
					}
				}
			?>
			
		</div><!--/content-inner-->
		
	</div><!--/post-content-->
		
</article><!--/article-->