<?php
/**
 * @package WordPress
 * @subpackage hastuzeit
 */
?>
	</div><!-- end #main -->
	
	<div id="sidebar">

		<?php get_search_form(); ?>
		
		
		
		<ul id="sidebarbottom">
			<li class="widget" id="twitter">

				<h4 class="widgettitle">Gezwitscher</h4>


<a class="twitter-timeline"  href="https://twitter.com/hastuzeit"  data-widget-id="474959667450220545">Tweets von @hastuzeit</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


			</li>


			<li class="widget" id="pinnwand">
				
				<h4 class="widgettitle">Pinnwand</h4>
				
				<ul>
					<?php
						$pinnwand = get_posts('showposts=5&cat=-3&category_name=Pinnwand');
						foreach ($pinnwand as $post) : 
						setup_postdata($post);
					?>
					<li>
						<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
						<span class="date"><?php the_time('d.m. Y') ?></span>
						<?php trim_excerpt('10'); ?>
						<a class="more-link" href="<?php the_permalink(); ?>">Mehr</a>
						<?php edit_post_link('Bearbeiten', '', ''); ?>
					</li>
				
				<?php endforeach; ?>
					
					<li class="more">
						<h5><a class="more-link" href="/pinnwand" title="Pinnwand ansehen">Die ganze Pinnwand</a></h5>
					</li>
				
				</ul>		
			
			</li>
			
			<li class="widget" id="termine">
				
				<h4 class="widgettitle">N&auml;chste Termine</h4>
				
				<ul>
					<li>
					<?php if (function_exists('ec3_get_events')) {
						ec3_get_events(
						   6,
						   '<a href="%LINK%">%TITLE% (%TIME%)</a>',
						   '%DATE%:',
						   'j. F'
						);
					}
					?></li>
					<li class="more">
						<!-- Just for Contributors and above -->
			            <?php if ( current_user_can('level_1') ) : ?>
			            	<h5><a class="more-link new-post" href="<?php echo get_option('home'); ?>/wp-admin/post-new.php">Neuen Termin anlegen</a></h5>     
			            <?php endif ?>
						<h5><a class="more-link" href="/termine/" title="Termine einsehen">Alle Termine <span class="amp">&amp;</span> Kalender</a></h5>
						<h5><a class="more-link ical infopopup" href="webcal://hastuzeit.de/?ec3_ical" title="Alle Termine als Webcal-Kalender abonnieren (f&uuml;r Import in iCal, Sunbird, Google Calendar etc.) Neue Termine erscheinen dann bequem und automagisch in eurem Kalender">Termine abonnieren</a></h5>
					</li>
				</ul>
			</li>
			</ul>
			
			<ul id="sidebar-left" class="column">
				 
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebarleft') ) : ?>
								
				<?php endif; ?>
				
			</ul>
					
			<ul id="sidebar-right" class="column">		
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebarright') ) : ?>
				
				<?php endif; ?>
				
			</ul>
			
			<ul class="twoColumn">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebarbottom') ) : ?>
							
			<?php endif; ?>
			</ul>

	</div><!-- end #sidebar -->
	
</div><!-- end #content -->