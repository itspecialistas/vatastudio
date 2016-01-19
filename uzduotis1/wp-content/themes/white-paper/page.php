<?php get_header(); ?>  
		<div class="content">
<div class="anketa">
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post-main">
		
				<div class="post">
					<?php the_content(); ?>
				</div>
			</div>
			<?php endwhile; ?>			
			<?php endif; ?>
		</div>
</div>

</div>
</div>
<?php get_footer(); ?>