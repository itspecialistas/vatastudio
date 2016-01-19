<?php get_header(); ?>  
		<div class="content">
<div class="anketa">
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post-main">
		
				<div class="post">
					<div class="aprasymas">
<h1>Mes visad ieškome naujų veidų, todėl gali drąsiai pildyti anketą žemiau</h1>
<p><span class="orange">REIKALAVIMAI:</span> ŪGIS VIRŠ 170 CM, AMŽIUS TARP 12-22 METŲ.<br />
Labai prašom pridėti savo veido ir visu ūgiu nuotraukas. Jos turėtų būti paprastos, natūralios, be makiažo, kad galėtume kuo geriau pamatyti, kaip atrodai. Taip pat būk atidi teisingai užpildydama savo kontaktinę informaciją.</p>
</div>
<?php echo do_shortcode('[contact-form-7 id="7" title="anketa"]'); ?>

				</div>
			</div>
			<?php endwhile; ?>			
			<?php endif; ?>
		</div>
</div>

</div>
</div>
<?php get_footer(); ?>