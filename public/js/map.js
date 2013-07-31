
			var mapa;
			var dymek = new google.maps.InfoWindow();

			function mapaStart()
				{
				mapa = new google.maps.Map
					(
					document.getElementById("map_canvas"),
						{
						zoom: 12,
						center: new google.maps.LatLng(50.111717,18.321676),
						mapTypeId: google.maps.MapTypeId.ROADMAP
						}
					);

				var marker = new google.maps.Marker
					({
					position: new google.maps.LatLng(50.111717,18.321676),
					icon: new google.maps.MarkerImage('http://labs.google.com/ridefinder/images/mm_20_red.png'),
					map: mapa
					});

					dymek.setContent('<div class=\"places\"><div class=\"titlePlaces\">Kotły Ekopal</div><div class=\"addressPlaces\">ul. Rybnicka 24</div><div class=\"addressPlaces\">47-435 Żytna</div><div class=\"addressPlaces\">tel. (+48) 515 266 977</div></div><img class=\"map-thumb\"src=\"img/map_thumb.jpg\"/>');
					dymek.open(mapa, marker);
				}

			window.onload = mapaStart;
