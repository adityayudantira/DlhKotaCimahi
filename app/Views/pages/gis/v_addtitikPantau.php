<?= $this->extend('layout/template');  ?>


<?= $this->section('content'); ?>


<link href="/custom_css/pages/titikPantau.css" rel="stylesheet">

<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<main id="main" class="main">
    <div class="pagetitle">
        <h4>Tambah Data Titik Pantau</h4> <br>
        <h3>Lokasi</h3>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-13 mb-2">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="panel panel-default">
                            <!-- /. panel heading -->
                            <div class=panel-body>

                            <div id="map" style="width: 100%; height: 650px;"></div>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="panel panel-default">
                            <div class="panel-heading"> <h3 style="color: dark blue;">Data Titik Pantau</h3></div> <br>
                            <div class=panel-body>

                                <?php 
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                <div class="alert alert-danger"> 
                                !!!! Ada kesalahan input data yaitu :
                                    <ul>
                                        <?php foreach ($errors as $key => $error) { ?>
                                            <li><?= esc($error) ?></li>
                                            <?php } ?>
                                    </ul>
                                </div>
                                <?php }
                                ?>

                                <?php 
                                echo form_open_multipart('dataTitikPantau/save');
                                ?>
                                <div class="row">
                                <div class="col d-flex flex-column gap-4">
                                    <div class="d-flex justify-content-between align-items-center container__create">
                                        <h4>Nama Sungai</h4>
                                        <input name="nama_sungai" class="form-control" placeholder="Masukkan Nama Sungai">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center container__create">
                                        <h4>Nama Titik Pantau</h4>
                                        <input name="nama_titikPantau" class="form-control" placeholder="Masukkan Nama Sungai">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center container__create">
                                        <h4>Latitude</h4>
                                        <input class="form-control" name="latitude" id="Latitude"readonly>
						            </div>

                                    <div class="d-flex justify-content-between align-items-center container__create">
                                        <h4>Longitude</h4>
                                        <input class="form-control" name="longitude" id="Longitude"readonly>
						            </div>

                                    <div class="d-flex justify-content-between align-items-center container__create">
                                        <h4>Deskripsi</h4>
                                        <input name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center container__create">
                                        <h4>Foto</h4>
                                        <input type="file" name="foto" class="form-control">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center container__create">
                                        <h4>Video</h4>
                                        <input type="file" name="video" class="form-control">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center container__create">
                                        <button type ="submit" class="btn btn-primary custom__btn__result"> Simpan</button>
                                    </div>
                                </div>     
                                </div>             


                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>

                    </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<script>
    var map = L.map('map').setView([-6.8704427,107.5523863], 13);

    var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 25,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    //get coordinate
	var latInput = document.querySelector("[name=latitude]");
	var lngInput = document.querySelector("[name=longitude]");

	var curLocation = [-6.8704427,107.5523863];

	map.attributionControl.setPrefix(false);

	var marker = new L.marker(curLocation, {
		draggable : 'true',
	});

	//get coordinate when marker drag
	marker.on('dragend', function(e) {
		var position = marker.getLatLng();
		marker.setLatLng(position, {
			curLocation
		}).bindPopup(position).update();
		$("#Latitude").val(position.lat);
		$("#Longitude").val(position.lng);
	});

	//get coordinate when map clicked
	map.on("click", function(e) {
		var lat = e.latlng.lat;
		var lng = e.latlng.lng;
		if (!marker) {
			marker = L.marker(e.latlng).addTo(map);
		} else {
			marker.setLatLng(e.latlng);
		}
		latInput.value = lat;
		lngInput.value = lng;
	});

	map.addLayer(marker);
</script>
