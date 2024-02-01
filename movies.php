<?php
 /**
  * Plugin Name: movies
  *Version :0.1.1
  */
//   Function create_movies_table(){
//     global $wpdb;
//     $table_name=$wpdb->prefix.'movies';
//     $sql="CREATE TABLE $table_name (
//         id int(9) NOT NULL AUTO_INCREMENT,
//         title VARCHAR(100) NOT NULL,
//         posterURL VARCHAR(255),
//         PRIMARY KEY  (id)
//     ) ENGINE=InnoDB DEFAULT CHARSET=utf8;"; 
// require_once ABSPATH . '/wp-admin/includes/upgrade.php';
// dbDelta($sql);
// //$wpdb->query($sql);
    
// }
// add_action('wp_loaded', 'create_movies_table');
add_action('rest_api_init','movies_register_routes');
function movies_register_routes(){
    register_rest_route(
        'movies-api/v1',
        '/movies/',
        array(
            'method'=>'GET',
            'callback'=>'movies_get',
            'permission_callback'=>'__return_true'
        )
        );
}


function movies_get(){
    global $wpdb;
   // $table_name=$wpdb->prefix.’movies';
   $query = "SELECT * FROM {$wpdb->prefix}movies";
    $results=$wpdb->get_results($query);
    $results = $wpdb->get_results($query, ARRAY_A);

   return $results;
   wp_enqueue_script()
}
