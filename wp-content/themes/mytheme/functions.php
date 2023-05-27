<?php

function mytheme_bootstraping(){

    load_theme_textdomain('mytheme');
    add_theme_support('post_thumbnails');
    add_theme_support('title_tag');       
}
add_action( "after_setup_theme","mytheme_bootstraping" );

function mytheme_assets(){
    wp_enqueue_style("mystyle", get_stylesheet_uri()); //load my current theme stylesheet
    wp_enqueue_style("bootstrap","//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
}
add_action("wp_enqueue_scripts","mytheme_assets");

// this function working for sidebar
function mytheme_sidebar(){
    register_sidebar( 
         array(
            'name'           => __('Single Post Sidebar','mytheme'),
            'id'             => 'sidebar-1',
            'description'    => __('Right Sidebar','mytheme'),          
            'before_widget'  => '<section id="%1$s" class="widget %2$s">',
            'after_widget'   => '</section>',
            'before_title'   => '<h2 class="widget-title">',
            'after_title'    => '</h2>',
         ) 
    );

    register_sidebar( 
        array(
           'name'           => __('Footer Left','mytheme'),
           'id'             => 'footer-left',
           'description'    => __('Footer Left Widget','mytheme'),          
           'before_widget'  => '<section id="%1$s" class="widget %2$s">',
           'after_widget'   => '</section>',
           'before_title'   => '<h2 class="widget-title">',
           'after_title'    => '</h2>',
        ) 
   );

   register_sidebar( 
    array(
       'name'           => __('Footer Right','mytheme'),
       'id'             => 'footer-right',
       'description'    => __('Footer Right Widget','mytheme'),          
       'before_widget'  => '<section id="%1$s" class="widget %2$s">',
       'after_widget'   => '</section>',
       'before_title'   => '<h2 class="widget-title">',
       'after_title'    => '</h2>',
    ) 
);
}
add_action( "widgets_init","mytheme_sidebar");


// post password protected
function mytheme_the_excerpt($excerpt){
    if(!post_password_required()){
        return $excerpt;
    }else{
        echo get_the_password_form();
    }
}
add_filter("the_excerpt", "mytheme_the_excerpt");

function mytheme_protected_title_change(){
    return "%s";
}
add_filter("protected_title_format", "mytheme_protected_title_change");