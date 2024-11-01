<?php

/*
Plugin Name: WP Nearby Places Basic
Plugin URI:  https://wpnearbyplaces.com 
Version: 1.9
Description: Build Your Digital Neighborhood Easily Using Google Mapping Technology. Find your Nearby Places on Google Map quickly and easily
Author:  Albert Harlow & Sons, Inc.
Author URI: https://albertharlow.com 
*/

// Exit if accessed directly

if (!defined('ABSPATH')) {
    exit;
}

add_action( 'admin_menu', 'wnp_mynearbyplaces_admin_menu' );

function wnp_mynearbyplaces_admin_menu(){
	add_menu_page('WP Nearby Places', 'WP Nearby Places', 'manage_options', 'mynearbyplaces_settings_page', 'wnp_manage_setting_options',plugins_url( 'images/menu_icon.png', __FILE__ ));
	add_submenu_page( 'mynearbyplaces_settings_page', 'Settings', 'Settings','manage_options', 'mynearbyplaces_settings','wnp_manage_settings_page');
}

function wnp_manage_setting_options(){
	include("manage_settings.php");
}

function wnp_manage_settings_page(){
	include("mange_main_settings.php");
}

function wnp_load_custom_wp_admin_style() {
	wp_enqueue_style( 'mynearbyplaces', plugins_url('css/mynearbyplaces_admin10.css', __FILE__) );
	wp_enqueue_style( 'mCustomScrollbar', plugins_url('css/jquery.mCustomScrollbar.min.css', __FILE__) );
	wp_enqueue_script( 'mynearbyplaces-scrollbar', plugins_url('js/jquery.mCustomScrollbar.js', __FILE__) );
	wp_enqueue_script( 'mynearbyplaces-myjs', plugins_url('js/nearbyplacesscript.js', __FILE__) );
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'wnp_load_custom_wp_admin_style' );

function wnp_mynearbyplaces_activate() {
	global $wpdb;

	/*
	update_option("wnp_nearbyplaces_api_key", "");
	update_option("nearbyplaces_base_latitude", "");
	update_option("nearbyplaces_base_longitude", "");
	update_option("nearbyplaces_base_location_name", "");
	update_option("nearbyplaces_base_radius", "");
	*/
	
	$charset_collate = $wpdb->get_charset_collate();
	
	$table_name=$wpdb->prefix."mynearbyplaces_category";
	
	$check_category=$wpdb->get_results("SELECT COUNT(id) as totalrows from $table_name");
	$totalrows1=0;
	foreach($check_category as $crow){
		$totalrows1=$crow->totalrows;
	}
	
	if($totalrows1==0){
		$sql = "CREATE TABLE $table_name (
		  id int(11) NOT NULL AUTO_INCREMENT,
		  category_name varchar(250) NOT NULL,
		  PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		
		$wpdb->insert($table_name, array('category_name'=>'Accommodations'));
		$wpdb->insert($table_name, array('category_name'=>'Activities'));
		$wpdb->insert($table_name, array('category_name'=>'Healthcare'));
		$wpdb->insert($table_name, array('category_name'=>'Education / Schools'));
		$wpdb->insert($table_name, array('category_name'=>'Food Establishments'));
		$wpdb->insert($table_name, array('category_name'=>'Municipality / Government Services'));
		$wpdb->insert($table_name, array('category_name'=>'Personal Care'));
		$wpdb->insert($table_name, array('category_name'=>'Religion'));
		$wpdb->insert($table_name, array('category_name'=>'Services'));
		$wpdb->insert($table_name, array('category_name'=>'Shopping'));
		$wpdb->insert($table_name, array('category_name'=>'Transportation'));
		
	}

	$table_name2=$wpdb->prefix."mynearbyplaces_sub_category";
	
	$check_sub_category=$wpdb->get_results("SELECT COUNT(id) as totalrows from $table_name2");
	$totalrows2=0;
	foreach($check_sub_category as $crow2){
		$totalrows2=$crow2->totalrows;
	}
	
	if($totalrows2==0){
		$sql = "CREATE TABLE $table_name2 (
		  id int(11) NOT NULL AUTO_INCREMENT,
		  category_id int(11) NOT NULL,
		  sub_category_name varchar(250) NOT NULL,
		  is_active varchar(50) NOT NULL,
		  PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		
		/*** Change from here ***/
		
		$wpdb->insert($table_name2,	array('category_id'=>1,'sub_category_name'=>'campground'));
		$wpdb->insert($table_name2,	array('category_id'=>1,'sub_category_name'=>'lodging'));
		$wpdb->insert($table_name2,	array('category_id'=>1,'sub_category_name'=>'rv_park'));
		
		$wpdb->insert($table_name2,	array('category_id'=>2,'sub_category_name'=>'amusement_park'));
		$wpdb->insert($table_name2,	array('category_id'=>2,'sub_category_name'=>'aquarium'));
		$wpdb->insert($table_name2,	array('category_id'=>2,'sub_category_name'=>'art_gallery'));
		$wpdb->insert($table_name2,	array('category_id'=>2,'sub_category_name'=>'bar'));
		$wpdb->insert($table_name2,	array('category_id'=>2,'sub_category_name'=>'bowling_alley'));
		$wpdb->insert($table_name2,	array('category_id'=>2,'sub_category_name'=>'casino'));
		$wpdb->insert($table_name2,	array('category_id'=>2,'sub_category_name'=>'movie_theater'));
		$wpdb->insert($table_name2,	array('category_id'=>2,'sub_category_name'=>'museum'));
		$wpdb->insert($table_name2,	array('category_id'=>2,'sub_category_name'=>'night_club'));
		$wpdb->insert($table_name2,	array('category_id'=>2,'sub_category_name'=>'park'));
		$wpdb->insert($table_name2,	array('category_id'=>2,'sub_category_name'=>'stadium'));
		$wpdb->insert($table_name2,	array('category_id'=>2,'sub_category_name'=>'zoo'));
			
			
		$wpdb->insert($table_name2,	array('category_id'=>3,'sub_category_name'=>'hospital'));
		$wpdb->insert($table_name2,	array('category_id'=>3,'sub_category_name'=>'dentist'));
		$wpdb->insert($table_name2,	array('category_id'=>3,'sub_category_name'=>'doctor'));
		$wpdb->insert($table_name2,	array('category_id'=>3,'sub_category_name'=>'pharmacy'));
		$wpdb->insert($table_name2,	array('category_id'=>3,'sub_category_name'=>'physiotherapist'));
		$wpdb->insert($table_name2,	array('category_id'=>3,'sub_category_name'=>'spa'));
		$wpdb->insert($table_name2,	array('category_id'=>3,'sub_category_name'=>'veterinary_care'));
		
		$wpdb->insert($table_name2,	array('category_id'=>4,'sub_category_name'=>'library'));
		$wpdb->insert($table_name2,	array('category_id'=>4,'sub_category_name'=>'school'));
		$wpdb->insert($table_name2,	array('category_id'=>4,'sub_category_name'=>'university'));
		
		$wpdb->insert($table_name2,	array('category_id'=>5,'sub_category_name'=>'bakery'));
		$wpdb->insert($table_name2,	array('category_id'=>5,'sub_category_name'=>'cafe'));
		$wpdb->insert($table_name2,	array('category_id'=>5,'sub_category_name'=>'restaurant'));
		$wpdb->insert($table_name2,	array('category_id'=>5,'sub_category_name'=>'meal_delivery'));
		$wpdb->insert($table_name2,	array('category_id'=>5,'sub_category_name'=>'meal_takeaway'));
		
		
		$wpdb->insert($table_name2,	array('category_id'=>6,'sub_category_name'=>'city_hall'));
		$wpdb->insert($table_name2,	array('category_id'=>6,'sub_category_name'=>'courthouse'));
		$wpdb->insert($table_name2,	array('category_id'=>6,'sub_category_name'=>'embassy'));
		$wpdb->insert($table_name2,	array('category_id'=>6,'sub_category_name'=>'fire_station'));
		$wpdb->insert($table_name2,	array('category_id'=>6,'sub_category_name'=>'local_government_office'));
		$wpdb->insert($table_name2,	array('category_id'=>6,'sub_category_name'=>'police'));
		$wpdb->insert($table_name2,	array('category_id'=>6,'sub_category_name'=>'post_office'));
		
		$wpdb->insert($table_name2,	array('category_id'=>7,'sub_category_name'=>'beauty_salon'));
		$wpdb->insert($table_name2,	array('category_id'=>7,'sub_category_name'=>'gym'));
		$wpdb->insert($table_name2,	array('category_id'=>7,'sub_category_name'=>'hair_care'));
		$wpdb->insert($table_name2,	array('category_id'=>7,'sub_category_name'=>'spa'));
		
		
		$wpdb->insert($table_name2,	array('category_id'=>8,'sub_category_name'=>'church'));
		$wpdb->insert($table_name2,	array('category_id'=>8,'sub_category_name'=>'cemetery'));
		$wpdb->insert($table_name2,	array('category_id'=>8,'sub_category_name'=>'funeral_home'));
		$wpdb->insert($table_name2,	array('category_id'=>8,'sub_category_name'=>'hindu_temple'));
		$wpdb->insert($table_name2,	array('category_id'=>8,'sub_category_name'=>'mosque'));
		$wpdb->insert($table_name2,	array('category_id'=>8,'sub_category_name'=>'synagogue'));
		
		
		$wpdb->insert($table_name2,	array('category_id'=>9,'sub_category_name'=>'accounting'));
		$wpdb->insert($table_name2,	array('category_id'=>9,'sub_category_name'=>'electrician'));
		$wpdb->insert($table_name2,	array('category_id'=>9,'sub_category_name'=>'insurance_agency'));
		$wpdb->insert($table_name2,	array('category_id'=>9,'sub_category_name'=>'laundry'));
		$wpdb->insert($table_name2,	array('category_id'=>9,'sub_category_name'=>'lawyer'));
		$wpdb->insert($table_name2,	array('category_id'=>9,'sub_category_name'=>'locksmith'));
		$wpdb->insert($table_name2,	array('category_id'=>9,'sub_category_name'=>'movie_rental'));
		$wpdb->insert($table_name2,	array('category_id'=>9,'sub_category_name'=>'moving_company'));
		$wpdb->insert($table_name2,	array('category_id'=>9,'sub_category_name'=>'painter'));
		$wpdb->insert($table_name2,	array('category_id'=>9,'sub_category_name'=>'plumber'));
		$wpdb->insert($table_name2,	array('category_id'=>9,'sub_category_name'=>'real_estate_agency'));
		$wpdb->insert($table_name2,	array('category_id'=>9,'sub_category_name'=>'storage'));
		
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'atm'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'bank'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'bicycle_store'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'book_store'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'clothing_store'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'convenience_store'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'department_store'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'electronics_store'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'florist'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'furniture_store'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'hardware_store'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'home_goods_store'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'jewelry_store'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'liquor_store'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'pet_store'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'shoe_store'));
		$wpdb->insert($table_name2,	array('category_id'=>10,'sub_category_name'=>'shopping_mall'));
			
		
		$wpdb->insert($table_name2,	array('category_id'=>11,'sub_category_name'=>'airport'));
		$wpdb->insert($table_name2,	array('category_id'=>11,'sub_category_name'=>'bus_station'));
		$wpdb->insert($table_name2,	array('category_id'=>11,'sub_category_name'=>'car_dealer'));
		$wpdb->insert($table_name2,	array('category_id'=>11,'sub_category_name'=>'car_rental'));
		$wpdb->insert($table_name2,	array('category_id'=>11,'sub_category_name'=>'car_repair'));
		$wpdb->insert($table_name2,	array('category_id'=>11,'sub_category_name'=>'car_wash'));
		$wpdb->insert($table_name2,	array('category_id'=>11,'sub_category_name'=>'gas_station'));
		$wpdb->insert($table_name2,	array('category_id'=>11,'sub_category_name'=>'parking'));
		$wpdb->insert($table_name2,	array('category_id'=>11,'sub_category_name'=>'subway_station'));
		$wpdb->insert($table_name2,	array('category_id'=>11,'sub_category_name'=>'taxi_stand'));
		$wpdb->insert($table_name2,	array('category_id'=>11,'sub_category_name'=>'train_station'));
		$wpdb->insert($table_name2,	array('category_id'=>11,'sub_category_name'=>'transit_station'));
			
		/*** Change ends here ***/
	}
	
}
register_activation_hook( __FILE__, 'wnp_mynearbyplaces_activate' );


function wnp_nearby_places_scripts() {
	$api_key=get_option('wnp_nearbyplaces_api_key');
	$map_icon=get_option('nearbyplaces_base_location_marker_icon');
	$image_attributes = wp_get_attachment_image_src( $map_icon, array( 22 , 22 ) );
	$src = $image_attributes[0];
	
	$map_icon2=get_option('nearbyplaces_base_location_marker_icon2');
	$image_attributes2 = wp_get_attachment_image_src( $map_icon2, array( 22 , 22 ) );
	$src2 = $image_attributes2[0];
	
	$map_icon3=get_option('nearbyplaces_base_location_marker_icon3');
	$image_attributes3 = wp_get_attachment_image_src( $map_icon3, array( 22 , 22 ) );
	$src3 = $image_attributes3[0];
	
	wp_enqueue_style( 'mynearbyplaces', plugins_url('css/mynearbyplaces.css', __FILE__) );
		
	wp_enqueue_script( 'mynearbyplaces-mapapi', "https://maps.googleapis.com/maps/api/js?key=$api_key&callback=initMap", array(), '',true );
	wp_enqueue_script( 'mynearbyplaces-cluster', plugins_url('js/markerclusterer.js', __FILE__) );
	//wp_deregister_script('jquery');
    //    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
    //    wp_enqueue_script('jquery');
	wp_enqueue_script('mynearbyplaces-js',"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js");
    wp_enqueue_style( 'mCustomScrollbar', plugins_url('css/jquery.mCustomScrollbar.min.css', __FILE__) );
	wp_enqueue_script( 'mynearbyplaces-scrollbar', plugins_url('js/jquery.mCustomScrollbar.js', __FILE__),array(),'',true );
	wp_enqueue_script( 'mynearbyplaces-myjs', plugins_url('js/nearbyplacesscript-frontend45.js', __FILE__) );
	$translation_array = array(
		'ajaxurl' => admin_url().'admin-ajax.php',
		'lat' => get_option('nearbyplaces_base_latitude'),
		'lng' => get_option('nearbyplaces_base_longitude'),
		'rad' => get_option('nearbyplaces_base_radius'),
		'map_icon' => $src,
		'lat2' => get_option('nearbyplaces_base_latitude2'),
		'lng2' => get_option('nearbyplaces_base_longitude2'),
		'map_icon2' => $src2,
		'lat3' => get_option('nearbyplaces_base_latitude3'),
		'lng3' => get_option('nearbyplaces_base_longitude3'),
		'map_icon3' => $src3,
		'map_title' => get_option('nearbyplaces_base_location_name'),
		'map_title2' => get_option('nearbyplaces_base_location_name2'),
		'map_title3' => get_option('nearbyplaces_base_location_name3'),
		'cluster_pin_icon' => plugins_url('images/clusterpin.png', __FILE__)
	);
	wp_localize_script( 'mynearbyplaces-myjs', 'ajaxobj', $translation_array );
}
add_action( 'wp_enqueue_scripts', 'wnp_nearby_places_scripts' );

add_shortcode("show_nearby_places","wnp_generate_myplaces_shortcode");

function wnp_generate_myplaces_shortcode(){
	
	global $wpdb;
	$table_name2=$wpdb->prefix."mynearbyplaces_sub_category";
	$query=$wpdb->get_results("SELECT * FROM $table_name2 WHERE is_active='yes' ");
	$radius=get_option('nearbyplaces_base_radius');
        $radiusmiles = round($radius* 0.000621);
	$main_cat_array=array();
	foreach($query as $row){
		$main_cat_array[]=wnp_get_main_cat_details($row->category_id);
	}
	
	$top_categories=array_unique($main_cat_array);
	
	$content='<div class="mycustommainmapwrapper">';
	$content='<div style="text-align:right;padding-right:10px;color:#000000" id="mapnote"><a href="https://wpnearbyplaces.com/basic-upgrade-to-premium/" target="blank" style="color:#000000"><img src="https://wpnearbyplaces.com/wp-content/uploads/2018/01/WP-Nearby-Places-Favicon-57-1.png" width="25">WPNearbyPlaces</a>
</div>';
		$content.='<div class="mapsidebar">';
			foreach($top_categories as $tc){
				$cat_nm=explode('_',$tc);
				$content.='<h3 class="mpsidebartitle">'.$cat_nm[0].'</h3>';
				$query_sub=$wpdb->get_results(
					$wpdb->prepare(
						"
							SELECT * FROM $table_name2 
							WHERE is_active='yes' 
							AND 
							category_id = %d 
						",
						$cat_nm[1]
					)
				);
				$content.='<ul>';
				foreach($query_sub as $row_sub){					
					$content.='<li>';
						//$content.='<input type="checkbox" id="'.$row_sub->sub_category_name.'" />';
						$content.='<a href="#" id="'.$row_sub->sub_category_name.'">'.str_replace('_',' ',$row_sub->sub_category_name).'</a>';
						//$content.=str_replace('_',' ',$row_sub->sub_category_name);
					$content.='</li>';						
				}
				$content.='</ul>';

			}

                $content.='</div>';
                $content.='<div class="mapbox">';
		$content .= '<div style="text-align:right;padding-right:10px" id="mapnote">Radius: ' . $radius . ' meters / ' . $radiusmiles . ' miles</div>';
			$content.='<div id="map" style="height:400px;"></div>';

$content.='</div>';
		$content.='<div class="mapbottombar"></div>';	
	$content.='</div>';
	
	return $content;
}

add_action("wp_ajax_nopriv_generate_new_map","wnp_generate_new_map");
add_action("wp_ajax_generate_new_map","wnp_generate_new_map");

function wnp_generate_new_map(){
	


	$api_key=get_option('wnp_nearbyplaces_api_key');
	$lat=get_option('nearbyplaces_base_latitude');
	$lng=get_option('nearbyplaces_base_longitude');
	$rad=get_option('nearbyplaces_base_radius');
	$type=$_POST['qry_type'];
	
	$url="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat,$lng&radius=$rad&type=$type&key=$api_key";
	
	$ch =  curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
	$result = curl_exec($ch);
	curl_close($ch);
	$res=json_decode($result);
	$array = json_decode(json_encode($res), true);
	echo json_encode($array["results"]);
	die();
}

function wnp_arthur_image_uploader( $name, $width, $height ) {

    // Set variables
    $options = get_option( 'nearbyplaces_base_location_marker_icon' );
    $default_image = plugins_url('images/no-image.png', __FILE__);

    if ( !empty( $options ) ) {
        $image_attributes = wp_get_attachment_image_src( $options, array( $width, $height ) );
        $src = $image_attributes[0];
        $value = $options;
    } else {
        $src = $default_image;
        $value = '';
    }

    $text = __( 'Upload', RSSFI_TEXT );

    // Print HTML field
    echo '
        <div class="upload">
            <img data-src="' . $default_image . '" src="' . $src . '" width="' . $width . 'px" height="' . $height . 'px" />
            <div>
                <input type="hidden" name="nearbyplaces_base_location_marker_icon" id="nearbyplaces_base_location_marker_icon" value="' . $value . '" />
                <button type="submit" class="upload_image_button button">' . $text . '</button>
                <button type="submit" class="remove_image_button button">&times;</button>
            </div>
        </div>
    ';
}

function wnp_arthur_image_uploader2( $name, $width, $height ) {

    // Set variables
    $options = get_option( 'nearbyplaces_base_location_marker_icon2' );
    $default_image = plugins_url('images/no-image.png', __FILE__);

    if ( !empty( $options ) ) {
        $image_attributes = wp_get_attachment_image_src( $options, array( $width, $height ) );
        $src = $image_attributes[0];
        $value = $options;
    } else {
        $src = $default_image;
        $value = '';
    }

    $text = __( 'Upload', RSSFI_TEXT );

    // Print HTML field
    echo '
        <div class="upload">
            <img data-src="' . $default_image . '" src="' . $src . '" width="' . $width . 'px" height="' . $height . 'px" />
            <div>
                <input type="hidden" name="nearbyplaces_base_location_marker_icon2" id="nearbyplaces_base_location_marker_icon2" value="' . $value . '" />
                <button type="submit" class="upload_image_button button">' . $text . '</button>
                <button type="submit" class="remove_image_button button">&times;</button>
            </div>
        </div>
    ';
}

function wnp_arthur_image_uploader3( $name, $width, $height ) {

    // Set variables
    $options = get_option( 'nearbyplaces_base_location_marker_icon3' );
    $default_image = plugins_url('images/no-image.png', __FILE__);

    if ( !empty( $options ) ) {
        $image_attributes = wp_get_attachment_image_src( $options, array( $width, $height ) );
        $src = $image_attributes[0];
        $value = $options;
    } else {
        $src = $default_image;
        $value = '';
    }

    $text = __( 'Upload', RSSFI_TEXT );

    // Print HTML field
    echo '
        <div class="upload">
            <img data-src="' . $default_image . '" src="' . $src . '" width="' . $width . 'px" height="' . $height . 'px" />
            <div>
                <input type="hidden" name="nearbyplaces_base_location_marker_icon3" id="nearbyplaces_base_location_marker_icon3" value="' . $value . '" />
                <button type="submit" class="upload_image_button button">' . $text . '</button>
                <button type="submit" class="remove_image_button button">&times;</button>
            </div>
        </div>
    ';
}

function wnp_get_main_cat_details($cid){
	global $wpdb;
	$table_name=$wpdb->prefix."mynearbyplaces_category";
	$name;
	$query=$wpdb->get_results("SELECT * FROM $table_name WHERE id='".$cid."'");
	foreach($query as $row){
		$name=$row->category_name.'_'.$row->id;
	}
	return $name;
}



add_action( 'admin_notices', 'my_acf_admin_notice' );

function my_acf_admin_notice() {

	if ( isset( $_GET['my-acf-notice-dismissed'] ) ) {
		update_option("my-acf-notice-dismissed", date('Y-m-d', strtotime("+30 days")));
	}
	$notice_html = get_option( 'my-acf-notice-dismissed');

	if ( !$notice_html ) {
		include("html-notice-custom.php");
	}else{
		if(strtotime(date('Y-m-d')) > strtotime($notice_html)){
			include("html-notice-custom.php");
		}
	}

    ?>
    <!-- <div class="notice error notice-warning is-dismissible" >
        <a class="notice-dismiss" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'wc-hide-notice', 'update' ), 'wp-nearby-places-basic', '_wc_notice_nonce' ) ); ?>"><?php _e( 'Dismiss', 'wp-nearby-places-basic' ); ?></a>
        ALERT! WP Nearby Places Basic Users: Please rate us at <a href="https://wordpress.org/plugins/wp-nearby-places-basic/#reviews" target="_blank">WordPress.org</a>. Also, <a href="https://members.wpnearbyplaces.com/product-category/premium-products/" target="_blank">upgrade to Premium</a> now and receive a 10% discount. Use the discount code "BasicUpgrade".
    </div> -->

    <?php
}
