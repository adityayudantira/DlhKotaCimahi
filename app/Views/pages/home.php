<?= $this->extend('layout/template');  ?>


<?= $this->section('content'); ?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Hi Marco,</h1>
        <h4>Welcome to DLH Cimahi!</h4>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 col-md-4 mb-3">
                        <div class="card info-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-user"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Karyawan</h6>
                                        <h5 class="card-title">123</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-lg-3 col-md-4 mb-3">
                        <div class="card info-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-location-plus"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Titik Pantau</h6>
                                        <h5 class="card-title">123</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-lg-3 col-md-4 mb-3">
                        <div class="card info-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-bar-chart-alt-2"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Perusahaan</h6>
                                        <h5 class="card-title">123</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-lg-3 col-md-4 mb-3">
                        <div class="card info-card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-layer-plus"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Total Data BOD</h6>
                                        <h5 class="card-title">123</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->
                </div>
            </div>
        </div>
    </section>

    <!-- grafik -->

    <section class="section">
        <div class="grafik">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Beban Pencemar BOD Aktual</h5>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="pilihanperiode">
                                        <label for="">Pilih Periode</label>
                                        <select id="bulan" class="form-control">
                                            <option value="2">1</option>
                                            <option value="7">2</option>
                                            <option value="10">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="container"></div>
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
                            <script>
                                // Chart
                                const options = {
                                    chart: {
                                        type: 'areaspline',
                                        events: {
                                            load: getData(3)
                                        },
                                        height: 350,
                                        zoom: {
                                            enabled: false
                                        }
                                    },
                                    title: {
                                        text: ''
                                    },
                                    xAxis: {
                                        type: 'datetime',
                                        dateTimeLabelFormats: {
                                            day: '%e of %b'
                                        }
                                    },
                                    series: [{
                                        name: "Sungai Bod",
                                        data: [],
                                        pointStart: Date.UTC(2020, 3, 1),
                                        pointInterval: 24 * 3600 * 1000 // one day

                                    }],

                                };
                                const chart = Highcharts.chart('container', options)

                                // Data
                                $("#bulan").change(function() {
                                    const val = $(this).val();
                                    getData(val);
                                })

                                function getData(bulan) {
                                    const url = `/home/apiData/${bulan}`;

                                    $.getJSON(url, function(data) {
                                        const p = [];
                                        data.map((obj) => {
                                            p.push(parseInt(obj.jumlah))
                                        });

                                        chart.series[0].update({
                                            data: p,
                                            pointStart: Date.UTC(2020, bulan - 1, 1)
                                        })
                                        chart.redraw();
                                    })
                                }
                            </script>
                        </div>
                    </div>
                </div>

                <!-- GRAFIK 1 LAGI -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Beban Pencemar TSS Aktual</h5>
                            <div id="areaChart"></div>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    const series = {
                                        "monthDataSeries1": {
                                            "prices": [
                                                8107.85,
                                                8128.0,
                                                8122.9,
                                                8165.5,
                                                8340.7,
                                                8423.7,
                                                8423.5,
                                                8514.3,
                                                8481.85,
                                                8487.7,
                                                8506.9,
                                                8626.2,
                                                8668.95,
                                                8602.3,
                                                8607.55,
                                                8512.9,
                                                8496.25,
                                                8600.65,
                                                8881.1,
                                                9340.85
                                            ],
                                            "dates": [
                                                "13 Nov 2021",
                                                "14 Nov 2021",
                                                "15 Nov 2021",
                                                "16 Nov 2021",
                                                "17 Nov 2021",
                                                "20 Nov 2021",
                                                "21 Nov 2021",
                                                "22 Nov 2021",
                                                "23 Nov 2021",
                                                "24 Nov 2021",
                                                "27 Nov 2021",
                                                "28 Nov 2021",
                                                "29 Nov 2021",
                                                "30 Nov 2021",
                                                "01 Dec 2021",
                                                "04 Dec 2021",
                                                "05 Dec 2021",
                                                "06 Dec 2021",
                                                "07 Dec 2021",
                                                "08 Dec 2021"
                                            ]
                                        },
                                    }
                                    new ApexCharts(document.querySelector("#areaChart"), {
                                        series: [{
                                            name: "Status Mutu Air",
                                            data: series.monthDataSeries1.prices
                                        }],
                                        chart: {
                                            type: 'area',
                                            height: 350,
                                            zoom: {
                                                enabled: false
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            curve: 'straight'
                                        },
                                        subtitle: {
                                            // text: 'Price Movements',
                                            align: 'left'
                                        },
                                        labels: series.monthDataSeries1.dates,
                                        xaxis: {
                                            type: 'datetime',
                                        },
                                        yaxis: {
                                            opposite: true
                                        },
                                        legend: {
                                            horizontalAlign: 'left'
                                        }
                                    }).render();
                                });
                            </script>
                            <!-- End Area Chart -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<?= $this->endSection();  ?>