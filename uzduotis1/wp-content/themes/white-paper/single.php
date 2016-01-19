<?php get_header(); ?>   
		<div class="content">
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post-main"> 
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span><?php the_date(); ?></span></h1>
				<div class="post">
					<?php the_content(); ?>
					
					<?php wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'white-paper' ),		'after'  => '</div>',) );	?>
						<div class="categories"><div class="tagi"><?php the_tags(); ?></div>	<?php _e( 'Categories ', 'white-paper' ); ?> <?php the_category(' '); ?></div>
						<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'white-paper' ) . '</span> %title' ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'white-paper' ) . '</span>' ); ?></span>
					<?php comments_template(); ?>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
</div>
</div>
<?php get_footer(); ?>