<?php 
/**
 * Template Name: Team Members
 */
get_header(); 

if (get_post_meta( get_the_ID(), 'slider_chkbx', true )) {

get_template_part('index','slider');

}

spicepress_overlap_bredcrumb();

if ( $post->post_content!=="" )
{
?>
<!-- About Section -->
<section class="about-section">		
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
			<div class="row">
				<?php 
				the_post();
				the_content();
				wp_link_pages();?>
			</div>				
			</div>	
		</div>
	</div>
</section>
<!-- /About Section -->
<?php } ?>

<?php spicepress_before_team_section_trigger(); ?>
<?php $team_options = get_theme_mod('spicepress_team_content');
$team_section_enable = get_theme_mod('team_section_enable','on');
if($team_section_enable !='off')
{
?>
<!-- Homepage Team Section  -->	
<section id="myteam" class="homepage-team-section">
	<div class="container">
	
		<?php 
		$home_team_section_title = get_theme_mod('home_team_section_title',__('Meet The Team','spicepress'));
		$home_team_section_discription = get_theme_mod('home_team_section_discription','Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
		if(($home_team_section_title) || ($home_team_section_discription)!='' ) { 
		?>
	    <!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-header">
					<?php if($home_team_section_title) {?>
					<h1 class="widget-title wow fadeInUp animated animated" data-wow-duration="500ms" data-wow-delay="0ms">
					   Melbourne Store Location
					</h1>
					<?php } ?>
					<div class="widget-separator"><span></span></div>
					<?php if($home_team_section_discription) {?>
					<p class="wow fadeInDown animated">
					   John Stonemart Memorials owns 7 stores with displaying rooms in Melbourne and all stores are near to cemetaries. You can get a free quote in any store.
					</p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		<?php } ?>
			
		<!-- Team Area -->
	    <div class="row">
					   
						<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="team-area wow fadeInDown animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
								<div class="team-image">
																			<a href="https://www.google.com.au/maps/place/310+Mahoneys+Rd,+Thomastown+VIC+3074/data=!4m2!3m1!1s0x6ad6455e9f189f07:0x8199f42dc22cbfce?sa=X&amp;ved=0CB0Q8gEwAGoVChMI--HdkIG6xwIVQhqmCh2ihAoQ"><img class="img" src="http://35.222.150.70/wp-content/uploads/2019/05/310-mahony.jpg" alt="310 Mahoneys Road Thomastown Vic 3074 (Close to Fawkner &amp; Keilor Cemeteries)" title="310 Mahoneys Road Thomastown Vic 3074 (Close to Fawkner &amp; Keilor Cemeteries)"></a>																	
								<div class="team-showcase-overlay">
									<div class="team-showcase-overlay-inner">
								
										<div class="team-showcase-icons">
																					
																
																
														<a target="_blank" href="https://www.google.com.au/maps/place/310+Mahoneys+Rd,+Thomastown+VIC+3074/data=!4m2!3m1!1s0x6ad6455e9f189f07:0x8199f42dc22cbfce?sa=X&amp;ved=0CB0Q8gEwAGoVChMI--HdkIG6xwIVQhqmCh2ihAoQ" class="btn btn-just-icon btn-simple"><i class="fa fa-map-marker "></i></a>
															
																									</div>
								</div>
							</div>
							</div>
							<div class="team-caption">							
							        							        <a href="https://www.google.com.au/maps/place/310+Mahoneys+Rd,+Thomastown+VIC+3074/data=!4m2!3m1!1s0x6ad6455e9f189f07:0x8199f42dc22cbfce?sa=X&amp;ved=0CB0Q8gEwAGoVChMI--HdkIG6xwIVQhqmCh2ihAoQ" target="_blank">
																			<h4 class="card-title">310 Mahoneys Road Thomastown Vic 3074 (Close to Fawkner &amp; Keilor Cemeteries)</h4>
										
									</a>
																			
																			<h6 class="category text-muted">Tel: 03 9359 0898</h6>
                                                                            <h6 class="category text-muted">Fax. 03 9359 9196</h6>
																</div>
					</div>
				</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="team-area wow fadeInDown animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
								<div class="team-image">
																			<a href="https://www.google.co.in/maps/place/340+Frankston+-+Dandenong+Rd,+Dandenong+South+VIC+3175,+Australia/@-38.034171,145.2084493,17z/data=!3m1!4b1!4m5!3m4!1s0x6ad61230df9e38ab:0xb0ad323efc382c4c!8m2!3d-38.034171!4d145.210638"><img class="img" src="http://35.222.150.70/wp-content/uploads/2019/07/IMG_0037.jpg" alt="340 Frankston Dandenong Road Dandenong South, Vic 3175 (Close to Bunurong Cemetery)" title="340 Frankston Dandenong Road Dandenong South, Vic 3175 (Close to Bunurong Cemetery)"></a>																	
								<div class="team-showcase-overlay">
									<div class="team-showcase-overlay-inner">
								
										<div class="team-showcase-icons">
																					
																
																
														<a target="_blank" href="https://www.google.co.in/maps/place/340+Frankston+-+Dandenong+Rd,+Dandenong+South+VIC+3175,+Australia/@-38.034171,145.2084493,17z/data=!3m1!4b1!4m5!3m4!1s0x6ad61230df9e38ab:0xb0ad323efc382c4c!8m2!3d-38.034171!4d145.210638" class="btn btn-just-icon btn-simple"><i class="fa fa-map-marker "></i></a>
															
																									</div>
								</div>
							</div>
							</div>
							<div class="team-caption">							
							        							        <a href="https://www.google.co.in/maps/place/340+Frankston+-+Dandenong+Rd,+Dandenong+South+VIC+3175,+Australia/@-38.034171,145.2084493,17z/data=!3m1!4b1!4m5!3m4!1s0x6ad61230df9e38ab:0xb0ad323efc382c4c!8m2!3d-38.034171!4d145.210638" target="_blank">
																			<h4 class="card-title">340 Frankston Dandenong Road Dandenong South, Vic 3175 (Close to Bunurong Cemetery)</h4>
										
									</a>
																			
																			<h6 class="category text-muted">Tel:  03 9706 4486</h6>
                                                                            <h6 class="category text-muted">Fax:  03 9706 4486</h6>
																</div>
					</div>
				</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="team-area wow fadeInDown animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
								<div class="team-image">
																			<a href="https://www.google.com.au/maps/place/269-271+Princes+Hwy,+Dandenong+VIC+3175/data=!4m2!3m1!1s0x6ad614691f26ebb5:0x40cd4c5b121a3492?sa=X&amp;ved=0CBwQ8gEwAGoVChMIt9aRzYG6xwIVoSumCh1E3Qju"><img class="img" src="http://35.222.150.70/wp-content/uploads/2019/05/271-princes-Hwy.jpg" alt="271 Princes Highway Dandenong Vic 3175 (Close to Springvale &amp; Bunurong Cemeteries)" title="271 Princes Highway Dandenong Vic 3175 (Close to Springvale &amp; Bunurong Cemeteries)"></a>																	
								<div class="team-showcase-overlay">
									<div class="team-showcase-overlay-inner">
								
										<div class="team-showcase-icons">
																					
																
																
														<a target="_blank" href="https://www.google.com.au/maps/place/269-271+Princes+Hwy,+Dandenong+VIC+3175/data=!4m2!3m1!1s0x6ad614691f26ebb5:0x40cd4c5b121a3492?sa=X&amp;ved=0CBwQ8gEwAGoVChMIt9aRzYG6xwIVoSumCh1E3Qju" class="btn btn-just-icon btn-simple"><i class="fa fa-map-marker "></i></a>
															
																									</div>
								</div>
							</div>
							</div>
							<div class="team-caption">							
							        							        <a href="https://www.google.com.au/maps/place/269-271+Princes+Hwy,+Dandenong+VIC+3175/data=!4m2!3m1!1s0x6ad614691f26ebb5:0x40cd4c5b121a3492?sa=X&amp;ved=0CBwQ8gEwAGoVChMIt9aRzYG6xwIVoSumCh1E3Qju" target="_blank">
																			<h4 class="card-title">271 Princes Highway Dandenong Vic 3175 (Close to Springvale &amp; Bunurong Cemeteries)</h4>
										
									</a>
																			
																			<h6 class="category text-muted">Tel: 03 9706 8108</h6>
                                                                            <h6 class="category text-muted">Fax: 03 9706 8998</h6>
																</div>
					</div>
				</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="team-area wow fadeInDown animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
								<div class="team-image">
																			<a href="https://www.google.com.au/maps/place/1+Queens+Ave,+Springvale+VIC+3171/data=!4m2!3m1!1s0x6ad614c6e1756b1b:0x8e081baf7f294bb9?sa=X&amp;ved=0CB0Q8gEwAGoVChMI65PA3IG6xwIVJhmmCh1E3Ao3"><img class="img" src="http://35.222.150.70/wp-content/uploads/2019/05/queen.jpg" alt="1 Queens Avenue Springvale Vic 3171 (Close to Springvale &amp; Bunurong Cemeteries)" title="1 Queens Avenue Springvale Vic 3171 (Close to Springvale &amp; Bunurong Cemeteries)"></a>																	
								<div class="team-showcase-overlay">
									<div class="team-showcase-overlay-inner">
								
										<div class="team-showcase-icons">
																					
																
																
														<a target="_blank" href="https://www.google.com.au/maps/place/1+Queens+Ave,+Springvale+VIC+3171/data=!4m2!3m1!1s0x6ad614c6e1756b1b:0x8e081baf7f294bb9?sa=X&amp;ved=0CB0Q8gEwAGoVChMI65PA3IG6xwIVJhmmCh1E3Ao3" class="btn btn-just-icon btn-simple"><i class="fa fa-map-marker "></i></a>
															
																									</div>
								</div>
							</div>
							</div>
							<div class="team-caption">							
							        							        <a href="https://www.google.com.au/maps/place/1+Queens+Ave,+Springvale+VIC+3171/data=!4m2!3m1!1s0x6ad614c6e1756b1b:0x8e081baf7f294bb9?sa=X&amp;ved=0CB0Q8gEwAGoVChMI65PA3IG6xwIVJhmmCh1E3Ao3" target="_blank">
																			<h4 class="card-title">1 Queens Avenue Springvale Vic 3171 (Close to Springvale &amp; Bunurong Cemeteries)</h4>
										
									</a>
																			
																			<h6 class="category text-muted">Tel: 03 9540 8807</h6>
                                                                            <h6 class="category text-muted">Fax: 03 9540 8880</h6>
																</div>
					</div>
				</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="team-area wow fadeInDown animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
								<div class="team-image">
																			<a href="https://www.google.com.au/maps/place/770+Princes+Hwy,+Springvale+VIC+3171/data=!4m2!3m1!1s0x6ad614e3ea4d0d95:0xe2d94e847f6d64e1?sa=X&amp;ved=0CB0Q8gEwAGoVChMI7Nzj6oG6xwIVwtmmCh0ebg8n"><img class="img" src="http://35.222.150.70/wp-content/uploads/2019/05/770.jpg" alt="770 Princes Highway Springvale VIC (3171 Close to Springvale &amp; Bunurong Cemeteries)" title="770 Princes Highway Springvale VIC (3171 Close to Springvale &amp; Bunurong Cemeteries)"></a>																	
								<div class="team-showcase-overlay">
									<div class="team-showcase-overlay-inner">
								
										<div class="team-showcase-icons">
																					
																
																
														<a target="_blank" href="https://www.google.com.au/maps/place/770+Princes+Hwy,+Springvale+VIC+3171/data=!4m2!3m1!1s0x6ad614e3ea4d0d95:0xe2d94e847f6d64e1?sa=X&amp;ved=0CB0Q8gEwAGoVChMI7Nzj6oG6xwIVwtmmCh0ebg8n" class="btn btn-just-icon btn-simple"><i class="fa fa-map-marker "></i></a>
															
																									</div>
								</div>
							</div>
							</div>
							<div class="team-caption">							
							        							        <a href="https://www.google.com.au/maps/place/770+Princes+Hwy,+Springvale+VIC+3171/data=!4m2!3m1!1s0x6ad614e3ea4d0d95:0xe2d94e847f6d64e1?sa=X&amp;ved=0CB0Q8gEwAGoVChMI7Nzj6oG6xwIVwtmmCh0ebg8n" target="_blank">
																			<h4 class="card-title">770 Princes Highway Springvale VIC (3171 Close to Springvale &amp; Bunurong Cemeteries)</h4>
										
									</a>
																			
																			<h6 class="category text-muted">Tel: 03 9548 4199</h6>
                                                                            <h6 class="category text-muted">Fax: 03 9548 4088</h6>
																</div>
					</div>
				</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="team-area wow fadeInDown animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
								<div class="team-image">
																			<a href="https://www.google.com.au/maps/place/337+Barkly+St,+Footscray+VIC+3011/data=!4m2!3m1!1s0x6ad65df243abf5bd:0x699a0ee83962a645?sa=X&amp;ved=0CB0Q8gEwAGoVChMI8vDr94G6xwIVoimmCh1ODwgD"><img class="img" src="http://35.222.150.70/wp-content/uploads/2019/05/337.jpg" alt="337 Barkly Street Footscray Vic 3011(Close to Williamstown, Footscray &amp; Keilor Cemeteries)" title="337 Barkly Street Footscray Vic 3011(Close to Williamstown, Footscray &amp; Keilor Cemeteries)"></a>																	
								<div class="team-showcase-overlay">
									<div class="team-showcase-overlay-inner">
								
										<div class="team-showcase-icons">
																					
																
																
														<a target="_blank" href="https://www.google.com.au/maps/place/337+Barkly+St,+Footscray+VIC+3011/data=!4m2!3m1!1s0x6ad65df243abf5bd:0x699a0ee83962a645?sa=X&amp;ved=0CB0Q8gEwAGoVChMI8vDr94G6xwIVoimmCh1ODwgD" class="btn btn-just-icon btn-simple"><i class="fa fa-map-marker "></i></a>
															
																									</div>
								</div>
							</div>
							</div>
							<div class="team-caption">							
							        							        <a href="https://www.google.com.au/maps/place/337+Barkly+St,+Footscray+VIC+3011/data=!4m2!3m1!1s0x6ad65df243abf5bd:0x699a0ee83962a645?sa=X&amp;ved=0CB0Q8gEwAGoVChMI8vDr94G6xwIVoimmCh1ODwgD" target="_blank">
																			<h4 class="card-title">337 Barkly Street Footscray Vic 3011(Close to Williamstown, Footscray &amp; Keilor Cemeteries)</h4>
										
									</a>
																			
																			<h6 class="category text-muted">Tel: 03 9689 8882</h6> 
                                                                            <h6 class="category text-muted">Fax: 03 9689 0887</h6> 
																</div>
					</div>
				</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="team-area wow fadeInDown animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
								<div class="team-image">
																			<a href="https://www.google.co.in/maps/place/356+Whitehorse+Rd,+Nunawading+VIC+3131,+Australia/@-37.818802,145.1746883,17z/data=!3m1!4b1!4m5!3m4!1s0x6ad638d9fac1779f:0x64f839a41ead53ab!8m2!3d-37.818802!4d145.176877"><img class="img" src="http://35.222.150.70/wp-content/uploads/2019/05/365.jpg" alt="356 Whitehorse Road Nunawading, Vic 3131 (Close to Lilydale Cemetery )" title="356 Whitehorse Road Nunawading, Vic 3131 (Close to Lilydale Cemetery )"></a>																	
								<div class="team-showcase-overlay">
									<div class="team-showcase-overlay-inner">
								
										<div class="team-showcase-icons">
																					
																
																
														<a target="_blank" href="https://www.google.co.in/maps/place/356+Whitehorse+Rd,+Nunawading+VIC+3131,+Australia/@-37.818802,145.1746883,17z/data=!3m1!4b1!4m5!3m4!1s0x6ad638d9fac1779f:0x64f839a41ead53ab!8m2!3d-37.818802!4d145.176877" class="btn btn-just-icon btn-simple"><i class="fa fa-map-marker "></i></a>
															
																									</div>
								</div>
							</div>
							</div>
							<div class="team-caption">							
							        							        <a href="https://www.google.co.in/maps/place/356+Whitehorse+Rd,+Nunawading+VIC+3131,+Australia/@-37.818802,145.1746883,17z/data=!3m1!4b1!4m5!3m4!1s0x6ad638d9fac1779f:0x64f839a41ead53ab!8m2!3d-37.818802!4d145.176877" target="_blank">
																			<h4 class="card-title">356 Whitehorse Road Nunawading, Vic 3131 (Close to Lilydale Cemetery )</h4>
										
									</a>
																			
																			<h6 class="category text-muted">Tel: 03 9890 1118</h6>
                                                                            <h6 class="category text-muted">Fax: 03 9890 1119</h6>
																</div>
					</div>
				</div>
						
					</div>
		<!-- /Team Area -->
	</div>
</section>
<section id="myteam" class="homepage-team-section">
	<div class="container">
	
		<?php 
		$home_team_section_title = get_theme_mod('home_team_section_title',__('Meet The Team','spicepress'));
		$home_team_section_discription = get_theme_mod('home_team_section_discription','Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
		if(($home_team_section_title) || ($home_team_section_discription)!='' ) { 
		?>
	    <!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-header">
					<?php if($home_team_section_title) {?>
					<h1 class="widget-title wow fadeInUp animated animated" data-wow-duration="500ms" data-wow-delay="0ms">
					   Sydney Store Location
					</h1>
					<?php } ?>
					<div class="widget-separator"><span></span></div>
					<?php if($home_team_section_discription) {?>
					<p class="wow fadeInDown animated">
					   John Stonemart Memorials owns 2 stores with displaying rooms in Melbourne and all stores are near to cemetaries. You can get a free quote in any store.
					</p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		<?php } ?>
			
		<!-- Team Area -->
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="team-area wow fadeInDown animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
								<div class="team-image">
																			<a href="https://www.google.co.uk/maps/place/3%2F177+Arthur+St,+Rookwood+NSW+2141/@-33.8655662,151.0561823,17z/data=!3m1!4b1!4m5!3m4!1s0x6b12bb5b5181cf43:0x4d1cf72e428bac9e!8m2!3d-33.8655662!4d151.058371"><img class="img" src="http://35.222.150.70/wp-content/uploads/2019/05/AuthurSt-300x258.jpg" alt="3/177 Arthur Street Rookwood NSW 2124 (Close to Rookwood Cemetery &amp; Macquarie Park Cemetery)" title="3/177 Arthur Street Rookwood NSW 2124 (Close to Rookwood Cemetery &amp; Macquarie Park Cemetery)"></a>																	
								<div class="team-showcase-overlay">
									<div class="team-showcase-overlay-inner">
								
										<div class="team-showcase-icons">
																					
																
																
														<a target="_blank" href="https://www.google.co.uk/maps/place/3%2F177+Arthur+St,+Rookwood+NSW+2141/@-33.8655662,151.0561823,17z/data=!3m1!4b1!4m5!3m4!1s0x6b12bb5b5181cf43:0x4d1cf72e428bac9e!8m2!3d-33.8655662!4d151.058371" class="btn btn-just-icon btn-simple"><i class="fa fa-map-marker "></i></a>
															
																									</div>
								</div>
							</div>
							</div>
							<div class="team-caption">							
							        							        <a href="https://www.google.co.uk/maps/place/3%2F177+Arthur+St,+Rookwood+NSW+2141/@-33.8655662,151.0561823,17z/data=!3m1!4b1!4m5!3m4!1s0x6b12bb5b5181cf43:0x4d1cf72e428bac9e!8m2!3d-33.8655662!4d151.058371" target="_blank">
																			<h4 class="card-title">3/177 Arthur Street Rookwood NSW 2124 (Close to Rookwood Cemetery &amp; Macquarie Park Cemetery)</h4>
										
									</a>
																			
																			<h6 class="category text-muted">Tel: 02 9746 6966</h6>
                                                                            <h6 class="category text-muted">Fax: 02 9746 5966</h6>
																</div>
					</div>
				</div>
            <div class="col-md-3 col-sm-6 col-xs-12">
						<div class="team-area wow fadeInDown animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
								<div class="team-image">
																			<a href="https://www.google.com/maps/place/159+Perry+St,+Matraville+NSW+2036/@-33.9604948,151.2284734,17z/data=!3m1!4b1!4m5!3m4!1s0x6b12b15f2810bd89:0x7b3ff7e311de6b12!8m2!3d-33.9604993!4d151.2306674?hl=en-AU&amp;shorturl=1"><img class="img" src="http://35.222.150.70/wp-content/uploads/2019/05/159-Perry-St-1.jpg" alt="159 Perry Street Matraville NSW 2036 (Close to Botany Cemetery)" title="159 Perry Street Matraville NSW 2036 (Close to Botany Cemetery)"></a>																	
								<div class="team-showcase-overlay">
									<div class="team-showcase-overlay-inner">
								
										<div class="team-showcase-icons">
																					
																
																
														<a target="_blank" href="https://www.google.com/maps/place/159+Perry+St,+Matraville+NSW+2036/@-33.9604948,151.2284734,17z/data=!3m1!4b1!4m5!3m4!1s0x6b12b15f2810bd89:0x7b3ff7e311de6b12!8m2!3d-33.9604993!4d151.2306674?hl=en-AU&amp;shorturl=1" class="btn btn-just-icon btn-simple"><i class="fa fa-map-marker "></i></a>
															
																									</div>
								</div>
							</div>
							</div>
							<div class="team-caption">							
							        							        <a href="https://www.google.com/maps/place/159+Perry+St,+Matraville+NSW+2036/@-33.9604948,151.2284734,17z/data=!3m1!4b1!4m5!3m4!1s0x6b12b15f2810bd89:0x7b3ff7e311de6b12!8m2!3d-33.9604993!4d151.2306674?hl=en-AU&amp;shorturl=1" target="_blank">
																			<h4 class="card-title">159 Perry Street Matraville NSW 2036 (Close to Botany Cemetery)</h4>
										
									</a>
																			
																			<h6 class="category text-muted">Tel: 02 8608 2436</h6>
                                                                            <h6 class="category text-muted">Fax: 02 9311 0708</h6>
																</div>
					</div>
				</div>
            
		</div>
		<!-- /Team Area -->
	</div>
</section>
<!-- /Homepage Team Section -->
<div class="clearfix"></div>
<?php  } ?>
<?php spicepress_after_team_section_trigger(); ?>

<div class="clearfix"></div>
<?php get_footer(); ?>
