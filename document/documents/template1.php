<?php 
	$post_type = 'spicepress_portfolio';
	$tax = 'portfolio_categories'; 
	$term_args=array( 'hide_empty' => true,'orderby' => 'slug');
	$tax_terms = get_terms($tax, $term_args);
	$defualt_tex_id = get_option('spicepress_default_term_id');
	$j=1;
	$tab= get_option('tab');
	if(isset($_GET['div']))
	{
		$tab=$_GET['div'];
	}
$portfolio_tmp_title = get_theme_mod('portfolio_tmp_title',__('Portfolio title','spicepress'));
$portfolio_tmp_desc = get_theme_mod('portfolio_tmp_desc','Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
?>

<section class="portfolio-section padding-0">
	<div class="container">
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-header">
					<h1 class="widget-title wow fadeInUp animated animated" data-wow-duration="500ms" data-wow-delay="0ms"><?php echo esc_attr($portfolio_tmp_title); ?></h1>
					<div class="widget-separator"><span></span></div>
					<p class="wow fadeInDown animated"><?php echo esc_attr($portfolio_tmp_desc); ?></p>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
	
		<div class="row">
			<ul id="mytabs" class="portfolio-tabs">
					<?php	foreach ($tax_terms  as $tax_term) { 
					?>
					<li class="tab <?php if($tab==''){if($j==1){echo 'active';$j=2;}}else if($tab==$tax_term->slug){echo 'active';}?>"><a id="tab" href="#<?php echo $tax_term->slug; ?>" data-toggle="tab"><?php echo $tax_term->name; ?></a></li>
					<?php } ?>
			</ul>		
		</div><!-- .row -->
		
		<div class="tab-content" id="myTabContent">
		
		<?php 
			global $paged;
			$curpage = $paged ? $paged : 1;
			
			$norecord=0;
			$total_posts=0;
			$min_post_start=0;
			$is_active=true;
			
			if ($tax_terms) 
			{ 
				foreach ($tax_terms  as $tax_term)
				{
					if(isset($_POST['total_posts']))
					{
						$count_posts = $_POST['total_posts'];
					}
					else
					{
						//$count_posts = wp_count_posts( $post_type)->publish; 
						if(is_page_template('template/template-portfolio-2-col.php')) {$count_posts = 4;}
						if(is_page_template('template/template-portfolio-2-col.php')) {$count_posts = 6;}
						if(is_page_template('template/template-portfolio-2-col.php')) {$count_posts = 8;}
						
					}
					
					if(isset($_POST['min_post_start']))
					{
						$min_post_start = $_POST['min_post_start'];
					}
				
					//$total_posts=$count_posts;
				
					$args = array (
					'max_num_pages' =>5, 
					'post_status' => 'publish',
					'post_type' => $post_type,
					'portfolio_categories' => $tax_term->slug,
					//'posts_per_page' =>$count_posts,
					'paged' => $curpage,
					);
					
		
					$portfolio_query = null;		
					$portfolio_query = new WP_Query($args);	
					
					if( $portfolio_query->have_posts() ):
					
						?>
						
						<div id="<?php echo $tax_term->slug; ?>" class="tab-pane fade in <?php if($tab==''){if($is_active==true){echo 'active';}$is_active=false;}else if($tab==$tax_term->slug){echo 'active';} ?>">
						
						<div class="row">
								
								<?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
								
									<?php 
									
									$portfolio_target = sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_target', true )); 
									
									if(get_post_meta( get_the_ID(),'portfolio_link', true )) { 
										$portfolio_link = get_post_meta( get_the_ID(),'portfolio_link', true );
									} 
									else 
									{
										$portfolio_link = '';
									} 
									
									$class = '';
									
									if(is_page_template('template/template-portfolio-2-col.php')) {
										$class = 'col-md-6 col-sm-6 col-xs-12';
									}
									
									if(is_page_template('template/template-portfolio-3-col.php')) {
										$class = 'col-md-4 col-sm-4 col-xs-12';
									}
									
									if(is_page_template('template/template-portfolio-4-col.php')) {
										$class = 'col-md-3 col-sm-3 col-xs-12';
									}
									
									echo '<div class="'.$class.'">';
									?>
										
										<article class="post">
											<figure class="post-thumbnail">
												<?php if(is_page_template('template/template-portfolio-2-col.php')) { 
												spicepress_image_thumbnail('','img-responsive');
												} ?>
												
												<?php if(is_page_template('template/template-portfolio-3-col.php')) {
												spicepress_image_thumbnail('','img-responsive');
												} ?>
												
												<?php if(is_page_template('template/template-portfolio-4-col.php')) { 
												spicepress_image_thumbnail('','img-responsive');
												} ?>

												<?php
												if(has_post_thumbnail())
												{ 
													$post_thumbnail_id = get_post_thumbnail_id();
													$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );
												} 
												?>
												<div class="thumbnail-showcase-overlay">
												
													<div class="thumbnail-showcase-icons">
														
															<?php if(isset($post_thumbnail_url)){ ?>
															<a href="<?php echo $post_thumbnail_url; ?>"  data-lightbox="image" title="<?php the_title(); ?>" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
															<?php } ?>
															<?php if(!empty($portfolio_link)) {?>
															<a href="<?php echo $portfolio_link;?>" <?php if(!empty($portfolio_target)){ echo 'target="_blank"'; } ?> class="hover_thumb"><i class="fa fa-link"></i></a>
															<?php } ?>
														
													</div>
													
												</div>
												
											</figure>
											<header class="entry-header">
												<h4 class="entry-title"><?php if(!empty($portfolio_link)) {?>
													<a href="<?php echo $portfolio_link;?>" <?php if(!empty($portfolio_target)){ echo 'target="_blank"'; } ?> class="hover_thumb"><?php the_title(); ?></a>
													<?php } else the_title();  ?>
												</h4>
											</header>
											<div class="entry-content">
												<?php if(get_post_meta( get_the_ID(), 'portfolio_title_description', true )){ ?>
												<p><?php echo get_post_meta( get_the_ID(), 'portfolio_title_description', true ); ?></p>
												<?php } ?>
											</div><!-- .portfolio-caption -->
										</article>
											<!-- .portfolio-image -->
											
											
							
									<?php echo '</div>'; ?>
									
									<?php 
			
										$norecord=1;
									?>
									
								<?php endwhile; ?>
							</div>
							
						</div>
								
						<?php
						
						wp_reset_query();
						
					else:
					
						?>
						<div id="<?php echo $tax_term->slug; ?>" class="tab-pane fade in <?php if($tab==''){if($is_active==true){echo 'active';}$is_active=false;}else if($tab==$tax_term->slug){echo 'active';} ?>"></div>
						<?php
					
					endif;
			
				
				}
			}
		?>
		
		</div><!-- .tab-content -->
		
	</div><!-- .container -->
	
</section><!-- .page-builder -->

<!-- /Portfolio Section -->


<script type="text/javascript">
jQuery('.tab').click(function(e) {
				e.preventDefault();
				var h = jQuery("a",this).attr('href').replace(/#/, "");
				jQuery.ajax({
					url: "",
					type: "POST",
					data: { code : h },
					dataType: "html"
				});
});

</script>
<?php 

if(isset($_POST['code'])){
	
	$code = $_POST['code'];
	update_option('tab',$code);
	
}
	
get_footer();
