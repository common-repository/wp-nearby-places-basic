//map initialization
function initMap() {
	
	//location 1
	var myLatLng = {lat: parseFloat(ajaxobj.lat), lng: parseFloat(ajaxobj.lng)};

	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 12,
	  center: myLatLng,
	});
	


	var infowindow = new google.maps.InfoWindow({
		content: '<div class="info_content" style="width:220px;">'+'<h3 style="margin:0px 0px 5px 0px;color:#373737;font-size:17px;">'+ajaxobj.map_title+'</h3>'+'<p style="line-height:18px;margin:0;">'+ajaxobj.map_title+'</p>'+'</div>'
	});

	var marker = new google.maps.Marker({
	  position: myLatLng,
	  map: map,
	  icon: ajaxobj.map_icon,	
	  title: ajaxobj.map_title,


	});

   var circle = new google.maps.Circle({
		map: map,
		radius: 5000,    // metres
		strokeColor: '#666666',
		strokeOpacity: 0.3,
		strokeWeight: 0,
		fillColor: '#cccccc',
		fillOpacity: 0.5,
	});
	circle.bindTo('center', marker, 'position');



	
	//location 2
	var myLatlng2 = new google.maps.LatLng(parseFloat(ajaxobj.lat2), parseFloat(ajaxobj.lng2));
				
	var infowindow2 = new google.maps.InfoWindow({
		content: '<div class="info_content" style="width:220px;">'+'<h3 style="margin:0px 0px 5px 0px;color:#373737;font-size:17px;">'+ajaxobj.map_title2+'</h3>'+'<p style="line-height:18px;margin:0;">'+ajaxobj.map_title2+'</p>'+'</div>'
	});
	
	marker2 = new google.maps.Marker({
		position: myLatlng2,
		map: map,
		icon: ajaxobj.map_icon2,
		title: ajaxobj.map_title2
	});
	
	marker2.addListener('click', function() {
		infowindow2.open(map, marker2);
	});
	
	//location 3
	var myLatlng3 = new google.maps.LatLng(parseFloat(ajaxobj.lat3), parseFloat(ajaxobj.lng3));
				
	var infowindow3 = new google.maps.InfoWindow({
		content: '<div class="info_content" style="width:220px;">'+'<h3 style="margin:0px 0px 5px 0px;color:#373737;font-size:17px;">'+ajaxobj.map_title3+'</h3>'+'<p style="line-height:18px;margin:0;">'+ajaxobj.map_title3+'</p>'+'</div>'
	});
	
	marker3 = new google.maps.Marker({
		position: myLatlng3,
		map: map,
		icon: ajaxobj.map_icon3,
		title: ajaxobj.map_title3
	});
	
	marker3.addListener('click', function() {
		infowindow3.open(map, marker3);
	});
				
 }
 
 function addMarker(location) {
	marker = new google.maps.Marker({
		position: location,
		map: map
	});
}
 
jQuery(document).ready(function(){
	jQuery(".mapsidebar").mCustomScrollbar({
		axis:"yx",
		theme:"dark"	
	});
	jQuery(".mapbottombar").mCustomScrollbar({
		axis:"y",
		theme:"dark"	
	});
	jQuery(".mapsidebar li a").click(function(e){
		e.preventDefault();
                var current_text=jQuery(this).text();
		jQuery.ajax({
			url: ajaxobj.ajaxurl,
			type: "post",
			async: false,
			data:{"action":"generate_new_map",qry_type:jQuery(this).attr('id')},
			success:function(res){
				var json_to_array=JSON.parse(res);
				var result_length=json_to_array.length;	
				
                        
			if(result_length==0){
					alert("There are no nearby "+current_text+" places in the specified radius.");
				}
				
				else{
				var map = new google.maps.Map(document.getElementById('map'), {
				  zoom: 12,
				  center: {lat: parseFloat(ajaxobj.lat), lng: parseFloat(ajaxobj.lng)}
				});
				
				var myLatlng = new google.maps.LatLng(parseFloat(ajaxobj.lat), parseFloat(ajaxobj.lng));
				
				var infowindow_main = new google.maps.InfoWindow({
					content: '<div class="info_content" style="width:220px;">'+'<h3 style="margin:0px 0px 5px 0px;color:#373737;font-size:17px;">'+ajaxobj.map_title+'</h3>'+'<p style="line-height:18px;margin:0;">'+ajaxobj.map_title+'</p>'+'</div>'
				});
				
				marker = new google.maps.Marker({
					position: myLatlng,
					map: map,
					icon: ajaxobj.map_icon,
					title: ajaxobj.map_title
				});
		
 var circle = new google.maps.Circle({
		map: map,
		radius: 5000,    // metres
		strokeColor: '#666666',
		strokeOpacity: 0.3,
		strokeWeight: 0,
		fillColor: '#cccccc',
		fillOpacity: 0.5,
	});

	circle.bindTo('center', marker, 'position');



				marker.addListener('click', function() {
					infowindow_main.open(map, marker);
				});
				
				//location 2
				var myLatlng2 = new google.maps.LatLng(parseFloat(ajaxobj.lat2), parseFloat(ajaxobj.lng2));
							
				var infowindow2 = new google.maps.InfoWindow({
					content: '<div class="info_content" style="width:220px;">'+'<h3 style="margin:0px 0px 5px 0px;color:#373737;font-size:17px;">'+ajaxobj.map_title2+'</h3>'+'<p style="line-height:18px;margin:0;">'+ajaxobj.map_title2+'</p>'+'</div>'
				});
				
				marker2 = new google.maps.Marker({
					position: myLatlng2,
					map: map,
					icon: ajaxobj.map_icon2,
					title: ajaxobj.map_title2
				});
				
				marker2.addListener('click', function() {
					infowindow2.open(map, marker2);
				});
				
				//location 3
				var myLatlng3 = new google.maps.LatLng(parseFloat(ajaxobj.lat3), parseFloat(ajaxobj.lng3));
							
				var infowindow3 = new google.maps.InfoWindow({
					content: '<div class="info_content" style="width:220px;">'+'<h3 style="margin:0px 0px 5px 0px;color:#373737;font-size:17px;">'+ajaxobj.map_title3+'</h3>'+'<p style="line-height:18px;margin:0;">'+ajaxobj.map_title3+'</p>'+'</div>'
				});
				
				marker3 = new google.maps.Marker({
					position: myLatlng3,
					map: map,
					icon: ajaxobj.map_icon3,
					title: ajaxobj.map_title3
				});
				
				marker3.addListener('click', function() {
					infowindow3.open(map, marker3);
				});
				
				var locations = [];
				for(var i=0;i<json_to_array.length;i++){
					var address='<div class="info_content" style="width:220px;">'+'<h3 style="margin:0px 0px 5px 0px;color:#373737;font-size:14px;"><span style="font-weight:bold;">Name:</span> <span style="color:#007acc;">'+json_to_array[i].name+'</span></h3>'+'<p style="line-height:18px;margin:0;"><span style="font-weight:bold;">Address: </span> <span style="color:#555;">'+json_to_array[i].vicinity+'</span></p>'+'</div>';
					locations[i]=[address,json_to_array[i].geometry.location.lat, json_to_array[i].geometry.location.lng]	

				}
				var iconSrc;
                                if(current_text == 'restaurant' ){
                                iconSrc= 'http://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png'
                                   }
                                else {
                                  iconSrc = json_to_array[0].icon
                                  }

				var map_icon = {
                                

					url: iconSrc, // url
                                        scaledSize: new google.maps.Size(28, 28), // scaled size
					origin: new google.maps.Point(0,0), // origin
					anchor: new google.maps.Point(0, 0) // anchor
				};
				
				var infoWin = new google.maps.InfoWindow();
				var markers = locations.map(function(location,i) {
					  var marker = new google.maps.Marker({
					  position: {lat: locations[i][1], lng: locations[i][2]},
					  icon: map_icon
					});
					
					google.maps.event.addListener(marker, 'click', function(evt) {
					  infoWin.setContent(locations[i][0]);
					  infoWin.open(map, marker);
					})
					return marker;
				});
				
				var clusterStyles = [
				{
					textColor: '#373737',
					textSize:15,
					url: ajaxobj.cluster_pin_icon,
					height: 48,
					width: 48
				  },
				];
				
				var mcOptions = {
					gridSize: 55,
					styles: clusterStyles,
					maxZoom: 12
				};
				
				var markerCluster= new MarkerClusterer(map, markers, mcOptions);
				
				var bottombarHtml='';
				for(var i=0;i<json_to_array.length;i++){
					bottombarHtml+='<div class="detailbox">';
						bottombarHtml+='<h3>Name: <span>'+json_to_array[i].name+'</span></h3>';
						bottombarHtml+='<address>Address: <span>'+json_to_array[i].vicinity+'</span></address>';
					bottombarHtml+='</div>';
				}
				jQuery(".mapbottombar").html(bottombarHtml);
			}
		}
		});
	});
});

