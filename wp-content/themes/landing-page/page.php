<?php get_header();?>
    <!-- Banner -->
	<section class="banner inner-page">
		<div class="container">
			<div class="banner-wrap">
				<h1><?php the_title();?></span></h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php the_title();?></li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
    <!-- Banner End -->
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="content">
                        <?php while (have_posts()) : the_post(); ?>

                               <?php the_content(); ?>
    
                           <?php endwhile; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar();?>
                </div>
            </div>
        </div>
    </section>
    
    <!--Start Faqs-->
    <!-- <section class="faqs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-section">
                        <span class="sub-heading">Faqs</span>
                        <h2>Frequently Asked Questions(FAQs)</h2>
                    </div>
                    <div class="faq-wrap">
                        <?php 
						$faqs=get_field('faqs');
						if($faqs){
						?>
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<?php
								$a=1;
								foreach($faqs as $f){
							?>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading<?php echo $a++; ?>">
									<h3 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $a; ?>" aria-expanded="true">
											<i class="more-less fas fa-chevron-down"></i>
											<?php if($f['question']){?>
												<?php echo $f['question'];?>
											<?php } ?>
										</a>
									</h3>
								</div>
								<div id="collapse<?php echo $a++; ?>" class="panel-collapse collapse<?php if($a==2) echo 'show'; ?>" role="tabpanel" data-parent="#accordion">
									<div class="panel-body">
										<?php if($f['answer']){?>
											<?php echo $f['answer'];?>
										<?php } ?>
									</div>
								</div>
							</div>
							<?php } $a++; ?>
						</div>
						<?php } ?>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section> -->
     <!--End faqs-->
<?php get_footer();?>