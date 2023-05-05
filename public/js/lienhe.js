	function initialize() {
	
		var mapOptions = {
		zoom: 17,
		hue: '#E9E5DC',
		scrollwheel: false,
		mapTypeId:google.maps.MapTypeId.TERRAIN,
		center: new google.maps.LatLng(15.975322399084016, 108.25321532118582)
		};

		var map = new google.maps.Map(document.getElementById('googleMap'),
			mapOptions);


		var marker = new google.maps.Marker({
		position: map.getCenter(),
		icon: 'https://img.icons8.com/color/48/000000/marker--v1.png',
		map: map
		});

	}

	google.maps.event.addDomListener(window, 'load', initialize);