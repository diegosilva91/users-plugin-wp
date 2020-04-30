<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package users-plugin
 */

 if( !defined('WP_UNINSTALL_PLUGIN')){
     die;
 }

 //Clear DB stored data

 $books= get_posts( array('post_type'=>'book', 'numberposts'=>-1) );

 foreach($books as $book){
    wp_delete_post($book->ID, false);
 }

//Acess the database via SQL
global $wpd;
$wpd->query("DELETE FROM wp_posts WHERE post_type = 'book'");
$wpd->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpd->query("DELETE FROM wp_term_relations WHERE post_id NOT IN (SELECT id FROM wp_posts)");