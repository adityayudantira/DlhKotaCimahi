<?= $this->extend('layout/templatePencemaran');  ?>


<?= $this->section('content'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Hi Abae,</h1>
        <h4>Create BOD Potensial - Domestik</h4>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="domestik">
            <div class="row">
                <div class="col-lg-12">
                    <div class="domestikcard">
                        <div class="card-body">
                            <div class="col-lg-3 col-md-4 mb-3">
                                <div class="kecamatan">
                                    <h5>Kecamatan</h5>
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option selected>Pilih Kecamatan</option>
                                        <option value="1">Cimahi Selatan</option>
                                        <option value="2">Cimahi Tengah</option>
                                        <option value="3">Cimahi Utara</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 mb-3">
                                <div class="tahun">
                                    <h5>Tahun</h5>
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option selected>Pilih Tahun</option>
                                        <option value="1">2021</option>
                                        <option value="2">2022</option>
                                        <option value="3">2023</option>
                                        <option value="3">2024</option>
                                        <option value="3">2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="perhitungan">
            <div class="row">
                <div class="col-lg-12">
                    <div class="perhitungancard">
                        <div class="card-body">
                            <div class="col-lg-3">
                                <div class="jmlpenduduk">
                                    <h5>Jumlah Penduduk:</h5>
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="rasio">
                                    <h5>Rasio Ekivalen:</h5>
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="alfa">
                                    <h5>Alfa:</h5>
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="faktor">
                                    <h5>Faktor Emisi Penduduk:</h5>
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <button class="tombol2 btn btn-primary" type="submit" onclick="document.location.href='#'" >Cek Hasil</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="domestik">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hasilcard">
                        <div class="card-body">
                            <h5>Beban Pencemaran Sektor Potensial:</h5>
                            <div clas>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?= $this->endSection();  ?>