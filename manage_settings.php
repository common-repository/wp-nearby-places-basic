<?php 
	if ( ! defined( 'ABSPATH' ) ) exit;
	if(! empty( $_POST ) && isset($_POST['savecategory']) && check_admin_referer( 'update_selected_categories', 'select_categories_nonce' )){
		if(is_array($_POST['selectedcat'])){
			global $wpdb;
			$table_name2=$wpdb->prefix."mynearbyplaces_sub_category";
			$wpdb->query("UPDATE $table_name2 SET `is_active`='no' ");	
			for($i=0;$i<sizeof($_POST['selectedcat']);$i++){
				if(is_string($_POST['selectedcat'][$i])){
					$selectedCat = sanitize_text_field( $_POST['selectedcat'][$i] ) ;
					$wpdb->query(
						$wpdb->prepare( 
							"
								UPDATE $table_name2 SET 
								`is_active`='yes' 
								WHERE 
								`sub_category_name`= %s
							", 
							$selectedCat
						)
					);				
				}
			}
		}
	}
?>

<div class="is-dismissible notice">
<a href="https://wpnearbyplaces.com/10-sale-on-premium-version/" target="_blank"><img style="margin:20px;" width="90%" height="100%" src="<?php
        echo plugins_url('images/BFD_Banner1.jpg', __FILE__);
?>"></a><br/><br/>
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

<div class="wrap">
	<h2>WP Nearby Places - Management Area</h2>
</div>
<div style="float: left;">
<div class="topcontainerbox">
<h4 style="background-color:#979478; padding:10px; color:#ffffff">To gain the full benefit in using WP Nearby Places, including complete access to all training videos,
bonuses and other resources such as a free training guide for Google My Business, <a href="https://members.wpnearbyplaces.com/" target="_blank">click here.</a> Registration is free.</h4>



<form action="" method="post">
	<h2>Select Categories below to show your Nearby Locations</h2>
<?php 
	wp_nonce_field( 'update_selected_categories', 'select_categories_nonce' );
	global $wpdb;
	$table_name=$wpdb->prefix."mynearbyplaces_category";
	$query=$wpdb->get_results("SELECT * FROM $table_name");
	foreach($query as $row){
?>
	<div class="mmnbplcs-col-3">
	
		<h3><?php echo $row->category_name;?></h3>
		<div class="mmnbplcs-subcategories">
			<ul>
			<li><input type="checkbox" class="allcb" />Select All/Unselect All</li>
			<?php 
				$table_name2=$wpdb->prefix."mynearbyplaces_sub_category";
				$query2=$wpdb->get_results(
							$wpdb->prepare( 
								"SELECT * FROM $table_name2 
								WHERE `category_id`= %d",
								$row->id)
							);
				foreach($query2 as $row2){
			?>
				<li><input type="checkbox" class="chk" name="selectedcat[]" value="<?php echo $row2->sub_category_name;?>" <?php if($row2->is_active=='yes'){?> checked <?php } ?> /> <?php echo $row2->sub_category_name;?></li>
			<?php }?>
			</ul>
		</div>
	</div>
<?php }?>
<div class="cusbtnbox">
	<button class="button button-primary button-large" name="savecategory" type="submit">Save</button>
</div>
</form></div>
<div class="topcontainerimage">
<h4 style="background-color:#E94B44; padding: 10px 5px; text-align:center; color:#ffffff">Don't Miss These <br/> Upgrade Offers</h4>

<a style="vertical-align:middle" href="https://members.wpnearbyplaces.com/product/wp-nearby-places-premium/" target="_blank">
<img src="<?php
        echo plugins_url('images/upgrade_to_premium1.png', __FILE__);
?>" title="Upgrade To Premium"></a><br/><br/>
<a href="https://www.clevelandheightsapartmentliving.com/nearby-places/" class="w3-btn w3-black" target="_blank">Live DEMO for Premium</a>
<br/><br/>
</div>	
</div>
<h3 style="color:#fff;background: #F5A42C;clear: both;padding: 20px;">Only Available in Premium Versions</h3>
<div><img src="<?php
        echo plugins_url('images/featureneighbor.png', __FILE__);
?>" title="Premium version feature" style="position:relative;top:5px;" width="90%" id="myBtnwp"></div>

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


<div id="bottom-video" style="float: left;">
<div class="mmnbplcs-col-3" style="float:left; width:100%">
Support:<br/>
<a href="https://wpnearbyplaces.com/support/" target="_blank">https://wpnearbyplaces.com/support/</a> 
<br/><br/>
Registration:<br/>
<a href="https://members.wpnearbyplaces.com/" target="_blank">https://members.wpnearbyplaces.com/</a>
<br/><br/>
</div>

<div style="float: left;">
<h3>Learn About WP Nearby Places Upgrades & Bonuses</h3>
	<iframe style="float:right;margin-right:20px" width="300" height="255" src="https://www.youtube.com/embed/KDNvhwRoPWQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</div>

</div>

<p style="width: 100%;float: left;text-align: center;">© Copyright 2019 <a href="https://albertharlow.com/" target="_blank">Albert Harlow & Sons, Inc.</a> - Protected under the Copyright & Trademark Laws of the United States of America. See all <a href="https://members.wpnearbyplaces.com/legal/" target="_blank">Legal Statements.</a></p>	

<script>
jQuery(document).ready(function(){
jQuery('.allcb').click(function(){
jQuery(this).parent().parent().parent().parent().find('.chk').prop('checked', this.checked);
});
});
</script>



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
