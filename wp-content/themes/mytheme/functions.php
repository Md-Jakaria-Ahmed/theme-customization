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
