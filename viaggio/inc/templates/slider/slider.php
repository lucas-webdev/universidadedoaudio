<?php 
    //slider function 
function viaggio_slider_option(){?>
<!-- SLIDER AREA START HERE -->
    <section class="slider-area">
        <div class="slider-wrapper">
            <div id="slider" class="nivoSlider">
                <?php $the_featured_post = new WP_Query('cat="'.cs_get_option('slider_main').'"');?>
                <?php while($the_featured_post->have_posts()) : $the_featured_post->the_post();?>
                    <?php if(has_post_thumbnail()){ ?>
                        <img src="<?php the_post_thumbnail_url( 'full' );?>" alt="" title="#htmlcaption<?php the_ID(); ?>" />
                    <?php }else{?>
                        <img src="<?php if(viaggio_post_thumbnail_default()){viaggio_post_thumbnail_default();}else{ echo "#";}?>" alt="" title="#htmlcaption<?php the_ID(); ?>">
                <?php } endwhile;?>
            </div>
            <!-- CAPTION 1 -->
    <?php $the_featured_post = new WP_Query('cat="'.cs_get_option('slider_main').'"');?>
            <?php while($the_featured_post->have_posts()) : $the_featured_post->the_post();?>

            <?php if( cs_get_option('slider_style') == 'slider_default') :?>

            <div id="htmlcaption<?php the_ID(); ?>" class="nivo-html-caption slider-caption-1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="content_position">
                                    <div class="slider_layer">
                                        <div class="the_slider_content">
                                                <div class="wow bounceInLeft slide_meta" data-wow-duration='1' data-wow-delay='.3s'>
                                                <span class='slider_meta'><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php the_author();?></a> - <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>"><?php the_time('M jS, Y');?></a></span>
                                            </div>
                                            <div class="wow bounceInLeft" data-wow-duration="1.5" data-wow-delay=".5s ">
                                                <h2 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                            </div>
                                            <!-- layer 2 -->
                                            <div class="wow bounceInRight" data-wow-duration="2" data-wow-delay=".9s ">
                                                <p class="description"><?php viaggio_read_more_text(20)?></p>
                                            </div>
                                            <!-- layer 3 -->
                                            <div class="wow bounceInUp" data-wow-duration="1.5" data-wow-delay=".9s ">
                                                <a href="<?php the_permalink();?>" class="read_more"><?php esc_html_e('Read More' , 'viaggio')?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php else :?>


            <div id="htmlcaption<?php the_ID(); ?>" class="nivo-html-caption slider-caption-1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="content_position">
                                    <div class="slider_layer">
                                        <div class="the_slider_content_alter">
                                                <div class="wow bounceInLeft slide_meta" data-wow-duration='1' data-wow-delay='.3s'>
                                                <span class='slider_meta'><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php the_author();?></a> - <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>"><?php the_time('M jS, Y');?></a></span>
                                            </div>
                                            <div class="wow bounceInLeft" data-wow-duration="1.5" data-wow-delay=".5s ">
                                                <h2 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                            </div>
                                            <!-- layer 2 -->
                                            <div class="wow bounceInRight" data-wow-duration="2" data-wow-delay=".9s ">
                                                <p class="description"><?php viaggio_read_more_text(20)?></p>
                                            </div>
                                            <!-- layer 3 -->
                                            <div class="wow bounceInUp" data-wow-duration="1.5" data-wow-delay=".9s ">
                                                <a href="<?php the_permalink();?>" class="read_more"><?php esc_html_e('Read More' , 'viaggio')?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <?php endif;?>

            <?php endwhile;?>
            <!-- CAPTION 1 END -->
        </div>
    </section>
    <!-- SLIDER AREA END HERE -->


<?php }?>