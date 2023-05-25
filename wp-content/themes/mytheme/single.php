<?php get_header(); ?>


<!-- body class used for style -->
<body <?php body_class(); ?> >
<?php get_template_part("hero"); ?>


<!-- post -->
<div class="posts">

<!-- post loop  -->
    <?php 

     while( have_posts() ){
        the_post();
    ?>

    <div class="post" <?php post_class(); ?> >
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
            <!-- post title with clickable link -->
                    <h2 class="post-title text-center">
                      <?php the_title(); ?>
                    </h2>
                    <p class="text-center">
                        <strong><?php the_author(); ?></strong><br/>
                        <?php echo get_the_date(); ?>
                    </p>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-10 offset-md-1">

         <!-- post image or thumbnail show -->
                    <p>
                        <?php 
                            if( has_post_thumbnail() ){
                                the_post_thumbnail("large",array("class"=>"img-fluid"));
                            }
                        ?> 
                    
                    </p>   
         <!-- if it is a single post then show the full content 
        otherwise show the readmore or not show full content -->

                   <?php  
                     the_content();
                   ?>
                   
                </div>
        <!-- coment section -->
             <?php if(comments_open()){ ?>
                <div class="col-md-10 offset-md-1">
                    <?php comments_template() ; ?>
                 </div>
             <?php } ?>
            </div>

        </div>
    </div>


    <?php
      }
    ?>

    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <?php
                    the_posts_pagination( array(
                        "screen_reader_text"=>'',
                        "prev_text"=>'Previous',
                        "next text"=>'Next'
                    ));
                ?>
            </div>
        </div>
    </div>

</div>
<!-- post end -->



<!-- footer section -->
<?php get_footer(); ?>