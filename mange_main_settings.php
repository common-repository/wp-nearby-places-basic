<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
if(! empty( $_POST ) && check_admin_referer( 'update_wnp_main_settings', 'wnp_main_settings_nonce' )){
	$apikey = sanitize_text_field( $_POST['apikey'] );
	update_post_meta( $post->ID, 'apikey', $apikey );
	
	$latitude = sanitize_text_field( $_POST['latitude'] );
	update_post_meta( $post->ID, 'latitude', $latitude );
	
	$longitude = sanitize_text_field( $_POST['longitude'] );
	update_post_meta( $post->ID, 'longitude', $longitude );
	
	$loc_name = sanitize_text_field( $_POST['loc_name'] );
	update_post_meta( $post->ID, 'loc_name', $loc_name );
	
	$radius = sanitize_text_field( $_POST['radius'] );
	update_post_meta( $post->ID, 'radius', $radius );
	
	$latitude2 = sanitize_text_field( $_POST['latitude2'] );
	update_post_meta( $post->ID, 'latitude2', $latitude2 );
	
	$longitude2 = sanitize_text_field( $_POST['longitude2'] );
	update_post_meta( $post->ID, 'longitude2', $longitude2 );
	
	$loc_name2 = sanitize_text_field( $_POST['loc_name2'] );
	update_post_meta( $post->ID, 'loc_name2', $loc_name2 );
	
	$latitude3 = sanitize_text_field( $_POST['latitude3'] );
	update_post_meta( $post->ID, 'latitude3', $latitude3 );
	
	$longitude3 = sanitize_text_field( $_POST['longitude3'] );
	update_post_meta( $post->ID, 'longitude3', $longitude3 );
	
	$loc_name3 = sanitize_text_field( $_POST['loc_name3'] );
	update_post_meta( $post->ID, 'loc_name3', $loc_name3 );

	if(isset($_POST['savecategory'])){
		//if($_POST['$apikey']!=''){
			//update_option("wnp_nearbyplaces_api_key", $_POST['$apikey']);
			if($apikey!=''){
			update_option("wnp_nearbyplaces_api_key", $apikey);
		}
		if($latitude!=''){
			update_option("nearbyplaces_base_latitude", $latitude);
		}
		if($longitude!=''){
			update_option("nearbyplaces_base_longitude", $longitude);
		}
		if($loc_name!=''){
			update_option("nearbyplaces_base_location_name", $loc_name);
		}
		if($radius!=''){
			update_option("nearbyplaces_base_radius", $radius);
		}
		
		if($latitude2!=''){
			update_option("nearbyplaces_base_latitude2", $latitude2);
		}
		if($longitude2!=''){
			update_option("nearbyplaces_base_longitude2", $longitude2);
		}
		if($loc_name2!=''){
			update_option("nearbyplaces_base_location_name2", $loc_name2);
		}

		if($latitude3!=''){
			update_option("nearbyplaces_base_latitude3", $latitude3);
		}
		if($longitude3!=''){
			update_option("nearbyplaces_base_longitude3", $longitude3);
		}
		if($loc_name3!=''){
			update_option("nearbyplaces_base_location_name3", $loc_name3);
		}
		
		$marker1 = intval( $_POST['nearbyplaces_base_location_marker_icon'] );
		$marker2 = intval( $_POST['nearbyplaces_base_location_marker_icon2'] );
		$marker3 = intval( $_POST['nearbyplaces_base_location_marker_icon3'] );


		update_option('nearbyplaces_base_location_marker_icon',$marker1);
		update_option('nearbyplaces_base_location_marker_icon2',$marker2);
		update_option('nearbyplaces_base_location_marker_icon3',$marker3);
	}
}
?>

<div class="is-dismissible notice">
<a href="https://wpnearbyplaces.com/10-sale-on-premium-version/" target="_blank"><img style="margin:20px;" width="90%" height="100%" src="<?php
        echo plugins_url('images/BFD_Banner1.jpg', __FILE__);
?>"></a><br/><br/>
</div>
<div class="wrap">
	<h2>Settings</h2>
</div>
<h2>WP Nearby Places Instructions</h2>

<h3>Follow the steps below:</h3>
<ul style="margin-left: 20px;font-size: 16px;">
<li style="list-style: decimal;">Go to WP Nearby Places > Settings and add your Google Map API Key. <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Get your API Key</a>.</li>
<li style="list-style: decimal;">Add your Base Location. (Location name, Latitude, Longitude etc..)</li>
<li style="list-style: decimal;">Go to WP Nearby Places Dashboard and select Categories to show what's nearby.</li>
<li style="list-style: decimal;">Copy the ShortCode [show_nearby_places] from Settings screen.</li>
<li style="list-style: decimal;">Paste the Shortcode in any WordPress Page, Update and the WP Nearby Places map is inserted into that page, ready to be used.</li>
</ul>
<div style="float: left;">
<div style="float: left; width:75%">

<div class="topcontainerboxnew">
<h4 style="background-color:#979478;color:#ffffff; padding:10px">To gain the full benefit in using WP Nearby Places, including complete access to all training videos,
bonuses and other resources such as a free training guide for Google My Business, <a href="https://members.wpnearbyplaces.com/" target="_blank">click here.</a> Registration is free.</h4>
<form action="" method="post">
	<?php 
		wp_nonce_field( 'update_wnp_main_settings', 'wnp_main_settings_nonce' );
	?>
	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th>Title</th>
				<th>Content</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td width="15%">Google Maps API Key</td>
				<td><input type="text" name="apikey" value="<?php echo get_option('wnp_nearbyplaces_api_key');?>" style="width:100%;padding:5px 15px;" /><br/>
				<a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Get your API Key</a><br/><a href="https://www.youtube.com/watch?v=PYHbEKc_7-Y&feature=youtu.be" target="_blank">Video Tutorial-  How to Get Google API Key</a>
				</td>
			</tr>
			<tr style="background: #F5A42C;">
				<td>
					<h3 style="color:#fff;">Only Available in Premium Versions</h3>
				</td>
			</tr>
<tr><td colspan="2"><img src="<?php
        echo plugins_url('images/image_3.png', __FILE__);
?>" title="Premium version feature" style="position:relative;top:5px;" width="90%" id="myBtnwp"></td></tr>

<!-- The Modal -->
<div id="myModalwp" class="modalwp">

  <!-- Modal content -->
  <div class="modalwp-content">
    <span class="closewp">&times;</span>
    
    <a href="https://members.wpnearbyplaces.com/product/wp-nearby-places-premium/" target="_blank"><img id="myImg"  height="600" src="<?php
        echo plugins_url('images/featureimage4.png', __FILE__);
?>">
</a>
  </div>

</div>

			<!--Base Location 1-->
			<tr>
				<td colspan="2" style="background:#373737;color:#fff;font-weight:bold;cursor:pointer;" class="locationtitle1">Base Area 1</td>
			</tr>

			<tr class="loctitle1">
				<td>Area Name <img src="<?php
        echo plugins_url('images/help.png', __FILE__);
?>" title="Your Area Name" style="position:relative;top:5px;"></td>
				<td><input type="text" name="loc_name" value="<?php echo get_option('nearbyplaces_base_location_name');?>" style="width:100%;padding:5px 15px;" /></td>
			</tr>
			<tr class="loctitle1">
				<td>Base Latitude <img src="<?php
        echo plugins_url('images/help.png', __FILE__);
?>" title="Your Location Latitude" style="position:relative;top:5px;"></td>
				<td><input type="text" name="latitude" value="<?php echo get_option('nearbyplaces_base_latitude');?>" style="width:100%;padding:5px 15px;" /><a href="https://www.latlong.net/" target="_blank">Get Latitude</a></td>
			</tr>
			<tr class="loctitle1">
				<td>Base Longitude <img src="<?php
        echo plugins_url('images/help.png', __FILE__);
?>" title="Your Location Logitude" style="position:relative;top:5px;"></td>
				<td><input type="text" name="longitude" value="<?php echo get_option('nearbyplaces_base_longitude');?>" style="width:100%;padding:5px 15px;" /><a href="https://www.latlong.net/" target="_blank">Get Longitude</a></td>
			</tr>
			
			<tr class="loctitle1">
				<td>Base Area Marker Icon <img src="<?php
        echo plugins_url('images/help.png', __FILE__);
?>" title="Your Location Marker Icon" style="position:relative;top:5px;"></td>
				<td><?php wnp_arthur_image_uploader( 'custom_image', $width = 30, $height = 30 );?>(maximum height should be 30px to look good on map)</td>
			</tr>
			<tr class="loctitle1">
				<td>Radius <img src="<?php
        echo plugins_url('images/help.png', __FILE__);
?>" title="Your map Radius in meter" style="position:relative;top:5px;"></td>
				<td><input type="text" name="radius" value="<?php echo get_option('nearbyplaces_base_radius');?>" style="width:100%;padding:5px 15px;" /></td>
			</tr>
			<!--Base Location 2-->
			<tr>
				<td colspan="2" style="background:#373737;color:#fff;font-weight:bold;cursor:pointer;" class="locationtitle2">Base Area 2</td>
			</tr>
			<tr class="loctitle2">
				<td>Area Name <img src="<?php
        echo plugins_url('images/help.png', __FILE__);
?>" title="Your Location Name" style="position:relative;top:5px;"></td>
				<td><input type="text" name="loc_name2" value="<?php echo get_option('nearbyplaces_base_location_name2');?>" style="width:100%;padding:5px 15px;" /></td>
			</tr>
			<tr class="loctitle2">
				<td>Base Latitude <img src="<?php
        echo plugins_url('images/help.png', __FILE__);
?>" title="Your Location Latitude" style="position:relative;top:5px;"></td>
				<td><input type="text" name="latitude2" value="<?php echo get_option('nearbyplaces_base_latitude2');?>" style="width:100%;padding:5px 15px;" /><a href="https://www.latlong.net/" target="_blank">Get Latitude</a></td>
			</tr>
			<tr class="loctitle2">
				<td>Base Longitude <img src="<?php
        echo plugins_url('images/help.png', __FILE__);
?>" title="Your Location Longitude" style="position:relative;top:5px;"></td>
				<td><input type="text" name="longitude2" value="<?php echo get_option('nearbyplaces_base_longitude2');?>" style="width:100%;padding:5px 15px;" /><a href="https://www.latlong.net/" target="_blank">Get Longitude</a></td>
			</tr>
			
			<tr class="loctitle2">
				<td>Base Area Marker Icon <img src="<?php
        echo plugins_url('images/help.png', __FILE__);
?>" title="Your Map Marker icon" style="position:relative;top:5px;"></td>
				<td><?php wnp_arthur_image_uploader2( 'custom_image2', $width = 30, $height = 30 );?>(maximum height should be 30px to look good on map)</td>
			</tr>
			<!--Base Location 3-->
			<tr>
				<td colspan="2" style="background:#373737;color:#fff;font-weight:bold;cursor:pointer;" class="locationtitle3">Base Area 3</td>
			</tr>
			<tr class="loctitle3">
				<td>Area Name <img src="<?php
        echo plugins_url('images/help.png', __FILE__);
?>" title="Your Location Name" style="position:relative;top:5px;"></td>
				<td><input type="text" name="loc_name3" value="<?php echo get_option('nearbyplaces_base_location_name3');?>" style="width:100%;padding:5px 15px;" /></td>
			</tr>
			<tr class="loctitle3">
				<td>Base Latitude <img src="<?php
        echo plugins_url('images/help.png', __FILE__);
?>" title="Your Location Latitude" style="position:relative;top:5px;"></td>
				<td><input type="text" name="latitude3" value="<?php echo get_option('nearbyplaces_base_latitude3');?>" style="width:100%;padding:5px 15px;" /><a href="https://www.latlong.net/" target="_blank">Get Latitude</a></td>
			</tr>
			<tr class="loctitle3">
				<td>Base Longitude <img src="<?php
        echo plugins_url('images/help.png', __FILE__);
?>" title="Your Location Longitude" style="position:relative;top:5px;"></td>
				<td><input type="text" name="longitude3" value="<?php echo get_option('nearbyplaces_base_longitude3');?>" style="width:100%;padding:5px 15px;" /><a href="https://www.latlong.net/" target="_blank">Get Longitude</a></td>
			</tr>
			
			<tr class="loctitle3">
				<td>Base Area Marker Icon <img src="<?php
        echo plugins_url('images/help.png', __FILE__);
?>" title="Your Location Maker Icon" style="position:relative;top:5px;"></td>
				<td><?php wnp_arthur_image_uploader3( 'custom_image3', $width = 30, $height = 30 );?>(maximum height should be 30px to look good on map)</td>
			</tr>
		</tbody>
	</table>
<div class="cusbtnbox">
	<button class="button button-primary button-large" name="savecategory" type="submit">Save</button>
</div>
</form>
</div>
<div class="topcontainerbox" >
<h2>Shortcode</h2>
	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th>Title</th>
				<th>Content</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Shortcode</td>
				<td><label>[show_nearby_places]</label></td>
			</tr>
		</tbody>
	</table>
</div>

<div>
<div class="mmnbplcs-col-3" style="float:left; width:100%">
Support:<br/>
<a href="https://wpnearbyplaces.com/support/" target="_blank">https://wpnearbyplaces.com/support/</a> 
<br/><br/>
Registration:<br/>
<a href="https://members.wpnearbyplaces.com/" target="_blank">https://members.wpnearbyplaces.com/</a>
<br/><br/>
</div>

<div style="float:left;">
<h3 style="text-align:center;">Learn About WP Nearby Places Upgrades & Bonuses</h3>
	<iframe style="float:right;margin-right:20px" width="300" height="255" src="https://www.youtube.com/embed/KDNvhwRoPWQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</div>

</div>


</div>
<div class="topcontainerimage">
<h4 style="background-color:#E94B44; padding: 10px 5px; color:#ffffff;margin-top:0px; text-align:center">Don't Miss These<br/> Upgrade Offers</h4>
<!--<a style="vertical-align:middle" href="https://members.wpnearbyplaces.com/product/pro/" target="_blank">
<img src="<?php
        echo plugins_url('images/upgrade_to_pro.png', __FILE__);
?>" title="Upgrade To Pro"></a><br/><br/>
<a href="https://clickitphones.com/pro-sample-map/" class="w3-btn w3-black" target="_blank">Live DEMO for Premium Here</a>
<br/><br/>-->
<a style="vertical-align:middle" href="https://members.wpnearbyplaces.com/product/wp-nearby-places-premium/" target="_blank">
<img src="<?php
        echo plugins_url('images/upgrade_to_premium1.png', __FILE__);
?>" title="Upgrade To Premium"></a><br/><br/>
<a href="https://www.clevelandheightsapartmentliving.com/nearby-places/" class="w3-btn w3-black" target="_blank">Live DEMO for Premium</a>
<br/><br/>
<br/>
</div>
</div>



<p style="width: 100%;float: left;text-align: center;">© Copyright 2018 <a href="https://albertharlow.com/" target="_blank">Albert Harlow & Sons, Inc.</a> - Protected under the Copyright & Trademark Laws of the United States of America. See all <a href="https://members.wpnearbyplaces.com/legal/" target="_blank">Legal Statements.</a></p>

<script>
// Get the modal
var modalwp = document.getElementById('myModalwp');

// Get the button that opens the modal
var btnwp = document.getElementById("myBtnwp");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closewp")[0];

// When the user clicks the button, open the modal 
btnwp.onmousedown= function() {
    modalwp.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modalwp.style.display = "none";
}


</script>

