<?= $this->extend('layout/template');  ?>


<?= $this->section('content'); ?>


<link href="/custom_css/pages/titikPantau.css" rel="stylesheet">

<main id="main" class="main">


    <!-- Header -->

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex flex-column custom__header">
                    <h1>Hi fiqron</h1>
                    <h4>Data Titik Pantau</h4>
                </div>

            </div>
            <div class="col">
                <div class="container__search">
                    <div class="input__container">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="search">
                    </div>
                </div>
            </div>
        </div>

        <!-- ENd Header -->

        <?php 
                if (!empty(session()->getFlashdata('success'))) { ?>
                <div class="alert alert-success"> 
                    <?php echo session()->getFlashdata('success'); ?>
                </div>
                <?php }
        ?>

        <div class="custom__wrapper">


                <div class="custom__card__large">
                    <div class="custom__header__card__large">   
                        <a href="<?= base_url('dataTitikPantau/add') ?>" >
                        <button type="button" class="btn btn-primary"> 
                            Add Data
                        </button></a>
                    </div>

                    <div class="table__wrapper">
                        <table class="custom__table" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Sungai</th>
                                        <th>Nama Titik Pantau</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($titikPantau as $key => $value) { ?>
                                    <tr>
                                        <td> <?= $no++; ?> </td>
                                        <td> <?= $value['nama_sungai']; ?> </td>
                                        <td><?= $value['nama_titikPantau']; ?></th>
                                        <td><?= $value['latitude']; ?></td>
                                        <td><?= $value['longitude']; ?></td>
                                        <td><?= $value['deskripsi']; ?></td>
                                        <td><img src="<?= base_url('/assets/img/'.$value['foto']);?>" width="100px" height="80x"></td>
                                        <td>
                                        <div class="button__action__container">
                                            
                                            <a href="<?= base_url('dataTitikPantau/edit/'.$value['id']);?>" >
                                            <button type="button" class="btn btn-primary custom__button__edit">Update</button></a>

                                            <a href="<?= base_url('dataTitikPantau/delete/'.$value['id']);?>">
                                            <button type="button" class="btn btn-danger custom__button__delete" onclick="return confirm('Apakah Yakin Ingin Mengahapus Data ?')">Delete</button></a>
                                        </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                    </div>

                </div>




            </div>
        </div>
    </div>








</main>



