questApp.directive('myMap', function () {
    // directive link function
    var link = function (scope, element, attrs) {
        function initMap() {
            var styles = [
                {
                    "stylers": [
                        {
                            "hue": "#ff1a00"
                        },
                        {
                            "invert_lightness": true
                        },
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 33
                        },
                        {
                            "gamma": 0.5
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#2D333C"
                        }
                    ]
                }
            ];
            var styledMap = new google.maps.StyledMapType(styles,
                {name: "Styled Map"});


            var mapOptions = {
                zoom: 12,
                scrollwheel: false,
                center: new google.maps.LatLng(55.6468, 37.581),
                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                }
            };
            var map = new google.maps.Map(document.getElementById('map'),
                mapOptions);

            map.mapTypes.set('map_style', styledMap);
            map.setMapTypeId('map_style');
        }

        // show the map and place some markers
        initMap();

   /*     setMarker(map, new google.maps.LatLng(51.508515, -0.125487), 'London', 'Just some content');
        setMarker(map, new google.maps.LatLng(52.370216, 4.895168), 'Amsterdam', 'More content');
        setMarker(map, new google.maps.LatLng(48.856614, 2.352222), 'Paris', 'Text here');*/
    };

    return {
        restrict: 'A',
        template: '<div id="map"></div>',
        replace: true,
        link: link
    };
});

