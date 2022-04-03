<?= $this->extend('layout/template');  ?>


<?= $this->section('content'); ?>


<link href="/custom_css/pages/titikPantau.css" rel="stylesheet">

<main id="main" class="main">

     <div class="container">
        <div class="row">
			<div class="col">
                <div class="d-flex flex-column custom__header">
                    <h1>Hi fiqron</h1>
                    <h4>Data Titik Pantau</h4>
                </div>
			</div>
        </div>
	  </div>
		
	<div id="map" style="width: 100%; height: 740px;"></div>
		<script>

			var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
				maxZoom: 25,
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
					'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				id: 'mapbox/streets-v11',
				tileSize: 512,
				zoomOffset: -1
			});

			var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
				maxZoom: 25,
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
					'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				id: 'mapbox/satellite-v9',
				tileSize: 512,
				zoomOffset: -1
			});

			var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				maxZoom: 25,
				attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
				tileSize: 512,
				zoomOffset: -1
			});

			var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
				maxZoom: 25,
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
					'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				id: 'mapbox/dark-v10',
				tileSize: 512,
				zoomOffset: -1
			});

			var map = L.map('map',{
				center :[-6.8704427,107.5523863],
				zoom : 13,
				layers: [peta1],
			});

			var baseLayers = {
				'Default' : peta1,
				'Satellite Maps' : peta2,
				'OpenStreets Maps': peta3,
				'Dark Maps': peta4,

			};

			var layerControl = L.control.layers(baseLayers).addTo(map);
		

			//menampilkan batas administrasi kecamatan cimahi utara
			$.getJSON("<?= base_url('assets/dataGis/adm-cimahiutara.geojson') ?>", function(data){
				geoLayer = L.geoJson(data, {
					style: function(feature){
						return{
							color : 'yellow',
							fillOpacity: 0.3,
							weight:0.5,
						}
					}
				}).addTo(map);
				
				geoLayer.eachLayer(function(layer){
			
						layer.bindPopup("<b> Nama Kecamatan: </b>" + "Kecamatan Cimahi Utara", {maxHeight: 400});
				});
			});

			//menampilkan batas administrasi kecamatan cimahi tengah
			$.getJSON("<?= base_url('assets/dataGis/adm-cimahitengah.geojson') ?>", function(data){
				geoLayer = L.geoJson(data, {
					style: function(feature){
						return{
							color : 'green',
							fillOpacity: 0.3,
							weight:0.5,
						}
					}
				}).addTo(map);
				
				geoLayer.eachLayer(function(layer){
			
						layer.bindPopup("<b> Nama Kecamatan: </b>" + "Kecamatan Cimahi Tengah", {maxHeight: 400});
				});
			});

			//menampilkan batas administrasi kecamatan cimahi selatan
			$.getJSON("<?= base_url('assets/dataGis/adm-cimahiselatan.geojson') ?>", function(data){
				geoLayer = L.geoJson(data, {
					style: function(feature){
						return{
							color : 'red',
							fillOpacity: 0.3,
							weight:0.5,
						}
					}
				}).addTo(map);
				
				geoLayer.eachLayer(function(layer){
			
						layer.bindPopup("<b> Nama Kecamatan: </b>" + "Kecamatan Cimahi Selatan", {maxHeight: 400});
				});
			});

			//menampilkan polyline sungai Cisangkan
			$.getJSON("<?= base_url('assets/dataGis/sungaiCisangkan.geojson') ?>", function(data){
				geoLayer = L.geoJson(data, {
					style: function(feature){
						return{
							color : 'blue',
							fillOpacity: 1,
							weight: 4,
						}
					}
				}).addTo(map);
				
				geoLayer.eachLayer(function(layer){
			
						layer.bindPopup("<b> Nama Sungai: </b>" + "Sungai Cisangkan", {maxHeight: 400});
				});
			});

			//menampilkan polyline sungai Cimahi
			$.getJSON("<?= base_url('assets/dataGis/sungaiCimahi.geojson') ?>", function(data){
				geoLayer = L.geoJson(data, {
					style: function(feature){
						return{
							color : 'brown',
							fillOpacity: 1,
							weight: 4,
						}
					}
				}).addTo(map);
				
				geoLayer.eachLayer(function(layer){
			
						layer.bindPopup("<b> Nama Sungai: </b>" + "Sungai Cimahi", {maxHeight: 400});
				});
			});


			//menampilkan polyline sungai Cibaligo
			$.getJSON("<?= base_url('assets/dataGis/sungaiCibaligo.geojson') ?>", function(data){
			geoLayer = L.geoJson(data, {
				style: function(feature){
					return{
						color : 'purple',
						fillOpacity: 1,
							weight: 4,
					}
				}
			}).addTo(map);
			
			geoLayer.eachLayer(function(layer){
		
					layer.bindPopup("<b> Nama Sungai: </b>" + "Sungai Cibaligo", {maxHeight: 400});
				});
			});

			//menampilkan polyline sungai Cilisung
			$.getJSON("<?= base_url('assets/dataGis/sungaiCilisung.geojson') ?>", function(data){
				geoLayer = L.geoJson(data, {
					style: function(feature){
						return{
							color : 'cyan',
							fillOpacity: 1,
							weight: 4,
						}
					}
				}).addTo(map);
				
				geoLayer.eachLayer(function(layer){
			
						layer.bindPopup("<b> Nama Sungai: </b>" + "Sungai Cilisung", {maxHeight: 400});
				});
			});

			//menampilkan polyline sungai Cibeureum
			$.getJSON("<?= base_url('assets/dataGis/sungaiCibeureum.geojson') ?>", function(data){
				geoLayer = L.geoJson(data, {
					style: function(feature){
						return{
							color : 'lime',
							fillOpacity: 1,
							weight: 4,
						}
					}
				}).addTo(map);
				
				geoLayer.eachLayer(function(layer){
			
						layer.bindPopup("<b> Nama Sungai: </b>" + "Sungai Cibeureum", {maxHeight: 400});
				});
			});

			<?php foreach ($titikPantau as $key => $value) { ?>
				L.marker([<?= $value['latitude'] ?>,<?= $value['longitude'] ?>]).addTo(map)
				.bindPopup("<b>Informasi </b><br>" + 
				"<b> Nama Sungai: </b>" + "<?= $value['nama_sungai']?><br>" + 
				"<b> Nama Titik Pantau: </b>" + "<?= $value['nama_titikPantau']?><br>" + 
				"<b> Koordinat: </b>" + "<?= $value['latitude']?>" + ", <?= $value['longitude']?><br>" + 
				"<b> Deskripsi: </b>" + "<?= $value['deskripsi']?><br>" +
				"<img src='<?= base_url('/assets/img/'.$value['foto']) ?>' width='100%' height='100%'>"
				);
			<?php } ?>

		</script>

</main>

<?= $this->endSection();  ?>