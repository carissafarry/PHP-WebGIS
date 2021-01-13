<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>

<script src="assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
<script src="assets/js/leaflet.ajax.js"></script>

<script type="text/javascript">
    var map = L.map('mapid').setView([-7.6599953, 112.7868995], 8);

    var LayerKita = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
    });
    map.addLayer(LayerKita);

    var myStyle2 = {
        "color": "#ffff00",
        "weight": 1,
        "opacity": 0.9
    };

    function popUp(f, l) {
        var out = [];
        if (f.properties) {
            out.push("Provinsi: " + f.properties['PROPINSI']);
            out.push("Kabupaten: " + f.properties['KABUPATEN']);
            l.bindPopup(out.join("<br />"));
        }
    }

    // legend

    function iconByName(name) {
        return '<i class="icon" style="background-color:' + name + ';border-radius:50%"></i>';
    }

    function featureToMarker(feature, latlng) {
        return L.marker(latlng, {
            icon: L.divIcon({
                className: 'marker-' + feature.properties.amenity,
                html: iconByName(feature.properties.amenity),
                iconUrl: '../images/markers/' + feature.properties.amenity + '.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            })
        });
    }

    var baseLayers = [{
            name: "OpenStreetMap",
            layer: LayerKita
        },
        {
            name: "OpenCycleMap",
            layer: L.tileLayer('http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png')
        },
        {
            name: "Outdoors",
            layer: L.tileLayer('http://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png')
        }
    ];

    <?php
    $getKabupaten = $db->ObjectBuilder()->get('m_kabupaten');
    foreach ($getKabupaten as $row) {
    ?>

        var myStyle<?= $row->id_kabupaten ?> = {
            "color": "<?= $row->warna_kabupaten ?>",
            "weight": 1,
            "opacity": 1
        };

    <?php
        $arrayKab[] = '{
			name: "' . $row->nm_kabupaten . '",
			icon: iconByName("' . $row->warna_kabupaten . '"),
			layer: new L.GeoJSON.AJAX(["assets/unggah/geojson/' . $row->geojson_kabupaten . '"],{onEachFeature:popUp,style: myStyle' . $row->id_kabupaten . ',pointToLayer: featureToMarker }).addTo(map)
			}';
    }
    ?>

    var overLayers = [{
        group: "Layer Kabupaten",
        layers: [
            <?= implode(',', $arrayKab); ?>
        ]
    }];

    var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers, {
        collapsibleGroups: true
    });

    map.addControl(panelLayers);

    // marker
    var myIcon = L.icon({
        iconUrl: '<?= assets('icons/marker.png') ?>',
        iconSize: [38, 45],
    });
    <?php

    $getdata = $db->ObjectBuilder()->get('t_candi');
    foreach ($getdata as $row) {
    ?>
        L.marker([<?= $row->lat ?>, <?= $row->lng ?>], {
                icon: myIcon
            }).addTo(map)
            .bindPopup("Nama Candi : <?= $row->nama_candi ?>");
    <?php
    }
    ?>
</script>