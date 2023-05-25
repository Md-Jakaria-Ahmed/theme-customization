<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php wp_head(); ?>
    </head>
<!-- body class used for style -->
<body <?php body_class(); ?> >
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="tagline">
                    <?php bloginfo("description") ?>
                </h3>
                <h1 class="align-self-center display-1 text-center heading">
                    <?php bloginfo("name"); ?>
                </h1>
            </div>
        </div>
    </div>
</div>



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



<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                &copy; LWHH - All Rights Reserved
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>