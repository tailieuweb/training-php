

    /*----------------------------------------------------*/
    /*  Google map js
    /*----------------------------------------------------*/
    
    if ( $('#mapBox').length ){
        var $lat = $('#mapBox').data('lat');
        var $lon = $('#mapBox').data('lon');
        var $zoom = $('#mapBox').data('zoom');
        var $marker = $('#mapBox').data('marker');
        var $info = $('#mapBox').data('info');
        var $markerLat = $('#mapBox').data('mlat');
        var $markerLon = $('#mapBox').data('mlon');
        var map = new GMaps({
        el: '#mapBox',
        lat: $lat,
        lng: $lon,
        scrollwheel: false,
        scaleControl: true,
        streetViewControl: false,
        panControl: true,
        disableDoubleClickZoom: true,
        mapTypeControl: false,
        zoom: $zoom,
            styles: [
				{
					"featureType": "administrative",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "administrative",
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"color": "#444444"
						}
					]
				},
				{
					"featureType": "administrative.country",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#e31b1b"
						}
					]
				},
				{
					"featureType": "administrative.country",
					"elementType": "geometry.stroke",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "administrative.country",
					"elementType": "labels.text.stroke",
					"stylers": [
						{
							"color": "#ff0000"
						}
					]
				},
				{
					"featureType": "administrative.province",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "administrative.locality",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "administrative.neighborhood",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "administrative.land_parcel",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "administrative.land_parcel",
					"elementType": "geometry.stroke",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "landscape",
					"elementType": "all",
					"stylers": [
						{
							"color": "#f2f2f2"
						}
					]
				},
				{
					"featureType": "landscape.man_made",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "landscape.man_made",
					"elementType": "geometry.stroke",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "landscape.natural",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "landscape.natural.landcover",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "poi",
					"elementType": "all",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "poi",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "poi.business",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"weight": "0.01"
						}
					]
				},
				{
					"featureType": "poi.place_of_worship",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "poi.place_of_worship",
					"elementType": "geometry.stroke",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "poi.place_of_worship",
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "poi.place_of_worship",
					"elementType": "labels.text.stroke",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "road",
					"elementType": "all",
					"stylers": [
						{
							"saturation": -100
						},
						{
							"lightness": 45
						}
					]
				},
				{
					"featureType": "road",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#3a1f44"
						},
						{
							"saturation": "-24"
						},
						{
							"lightness": "-51"
						},
						{
							"gamma": "1.48"
						},
						{
							"weight": "0.97"
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "all",
					"stylers": [
						{
							"visibility": "simplified"
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#3a1f44"
						}
					]
				},
				{
					"featureType": "road.highway.controlled_access",
					"elementType": "geometry.stroke",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "road.arterial",
					"elementType": "labels.icon",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "road.local",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "transit",
					"elementType": "all",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "transit.station.bus",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#e7d5d3"
						}
					]
				},
				{
					"featureType": "water",
					"elementType": "all",
					"stylers": [
						{
							"color": "#46bcec"
						},
						{
							"visibility": "on"
						}
					]
				},
				{
					"featureType": "water",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#fbf1ed"
						}
					]
				}
			]
        });

        map.addMarker({
            lat: $markerLat, 
            lng: $markerLon,
            icon: $marker,    
            infoWindow: {
              content: $info
            }
        })
    }



    /*----------------------------------------------------*/
    /*  Google map js
    /*----------------------------------------------------*/
    
//    if ( $('#mapBox2').length ){
//        var $lat = $('#mapBox2').data('lat');
//        var $lon = $('#mapBox2').data('lon');
//        var $zoom = $('#mapBox2').data('zoom');
//        var $marker = $('#mapBox2').data('marker');
//        var $info = $('#mapBox2').data('info');
//        var $markerLat = $('#mapBox2').data('mlat');
//        var $markerLon = $('#mapBox2').data('mlon');
//        var map = new GMaps({
//        el: '#mapBox2',
//        lat: $lat,
//        lng: $lon,
//        scrollwheel: false,
//        scaleControl: true,
//        streetViewControl: false,
//        panControl: true,
//        disableDoubleClickZoom: true,
//        mapTypeControl: false,
//        zoom: $zoom,
//            styles: [
//                {
//                    "featureType": "all",
//                    "elementType": "labels.text.fill",
//                    "stylers": [
//                        {
//                            "saturation": 36
//                        },
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 40
//                        }
//                    ]
//                },
//                {
//                    "featureType": "all",
//                    "elementType": "labels.text.stroke",
//                    "stylers": [
//                        {
//                            "visibility": "on"
//                        },
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 16
//                        }
//                    ]
//                },
//                {
//                    "featureType": "all",
//                    "elementType": "labels.icon",
//                    "stylers": [
//                        {
//                            "visibility": "off"
//                        }
//                    ]
//                },
//                {
//                    "featureType": "administrative",
//                    "elementType": "geometry.fill",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 20
//                        }
//                    ]
//                },
//                {
//                    "featureType": "administrative",
//                    "elementType": "geometry.stroke",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 17
//                        },
//                        {
//                            "weight": 1.2
//                        }
//                    ]
//                },
//                {
//                    "featureType": "landscape",
//                    "elementType": "geometry",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 20
//                        }
//                    ]
//                },
//                {
//                    "featureType": "poi",
//                    "elementType": "geometry",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 21
//                        }
//                    ]
//                },
//                {
//                    "featureType": "road.highway",
//                    "elementType": "geometry.fill",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 17
//                        }
//                    ]
//                },
//                {
//                    "featureType": "road.highway",
//                    "elementType": "geometry.stroke",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 29
//                        },
//                        {
//                            "weight": 0.2
//                        }
//                    ]
//                },
//                {
//                    "featureType": "road.arterial",
//                    "elementType": "geometry",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 18
//                        }
//                    ]
//                },
//                {
//                    "featureType": "road.local",
//                    "elementType": "geometry",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 16
//                        }
//                    ]
//                },
//                {
//                    "featureType": "transit",
//                    "elementType": "geometry",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 19
//                        }
//                    ]
//                },
//                {
//                    "featureType": "water",
//                    "elementType": "geometry",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 17
//                        }
//                    ]
//                }
//            ]
//        });
//
//        map.addMarker({
//            lat: $markerLat, 
//            lng: $markerLon,
//            icon: $marker,    
//            infoWindow: {
//              content: $info
//            }
//        })
//    }