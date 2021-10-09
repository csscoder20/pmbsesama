<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Formulir - Portal PMB Oline UNIPA</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/form-pendaftaran.css">


    <style>
        img.img-profile {
            width: 75px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .col-sm-6.profile {
            display: flex;
            justify-content: end;
            align-items: center;
        }

        @media (max-width: 570px) {
            .col-sm-12.fotopas .col-sm-6 {
                width: 50%;
            }
        }
    </style>
</head>

<body class='snippet-body'>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-10 col-lg-10 col-xl-8 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 id="heading">FORMULIR BIODATA MAHASISWA BARU <?php echo $username; ?></h2>
                    <p>Lengkapi data di bawah ini dengan benar</p>
                    <form id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account">
                                <strong>Informasi Pribadi</strong>
                            </li>
                            <li id="personal">
                                <strong>Riwayat Pendidikan</strong>
                            </li>
                            <li id="payment">
                                <strong>Data Orang Tua</strong>
                            </li>
                            <li id="wali">
                                <strong>Data Wali</strong>
                            </li>
                            <li id="confirm">
                                <strong>Verifikasi</strong>
                            </li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                        <!-- fieldsets -->
                        <?php foreach ($biodata as $row) : ?>

                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">Data Pribadi</h2>
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                Pastikan data yang Anda isi telah sesuai dengan data yang tercantum pada ijazah. Bidang/isian yang bertanda bintang (*) wajib untuk diisi.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 fotopas">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pas Foto</label><br>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Unggah Foto</button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 profile">
                                                    <?php form_open_multipart('user/next1') ?>
                                                    <img class="img-profile" src="<?php echo base_url('assets/img/profile/profil_default.svg') ?>">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Lengkap *</label>
                                                <input name="namalengkap" type="text" class="form-control" placeholder="" value="<?php echo strtoupper($row['namalengkap']); ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 jeniskelamin">
                                            <label>Jenis Kelamin</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input jenkel" type="radio" name="jeniskelamin" id="jeniskelamin" value="Laki-laki" <?php echo ($row['jeniskelamin'] == 'Laki-laki') ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="exampleRadios1">Laki-Laki</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input jenkel" type="radio" name="jeniskelamin" id="jeniskelamin" value="Perempuan" <?php echo ($row['jeniskelamin'] == 'Perempuan') ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="exampleRadios1">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>NIK/No. KTP *</label>
                                                <input id="nik" name="nik" type="text" class="form-control" placeholder="" required value="<?php echo $row['nik']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <select id="agama" name="agama" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['agama'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($agama as $ag) : ?>
                                                        <option value="<?php echo $ag['idagama']; ?>" <?php echo ($row['agama'] == $ag['idagama']) ? 'selected' : ''; ?>><?php echo $ag['agama']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Suku</label>
                                                <input id="suku" name="suku" type="text" class="form-control" placeholder="" required value="<?php echo $row['suku']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Status Menikah *</label>
                                                <select id="statusmenikah" name="statusmenikah" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['statusmenikah'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($statusmenikah as $sm) : ?>
                                                        <option value="<?php echo $sm['idstatusmenikah']; ?>" <?php echo ($row['statusmenikah'] == $sm['idstatusmenikah']) ? 'selected' : ''; ?>><?php echo $sm['status']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">Pilihan Program Studi</h2>
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                Bidang/isian yang bertanda bintang (*) wajib untuk diisi.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Pilihan 1 *</label>
                                                <select id="prodipilihan1" name="prodipilihan1" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['prodipilihan1'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($prodi as $pr1) : ?>
                                                        <option value="<?php echo $pr1['idprodi']; ?>" <?php echo ($row['prodipilihan1'] == $pr1['idprodi']) ? 'selected' : ''; ?>><?php echo $pr1['namaprodi']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Pilihan 2</label>
                                                <select id="prodipilihan2" name="prodipilihan2" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['prodipilihan2'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($prodi as $pr2) : ?>
                                                        <option value="<?php echo $pr2['idprodi']; ?>" <?php echo ($row['prodipilihan2'] == $pr2['idprodi']) ? 'selected' : ''; ?>><?php echo $pr2['namaprodi']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Pilihan 3</label>
                                                <select id="prodipilihan3" name="prodipilihan3" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['prodipilihan3'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($prodi as $pr3) : ?>
                                                        <option value="<?php echo $pr3['idprodi']; ?>" <?php echo ($row['prodipilihan3'] == $pr3['idprodi']) ? 'selected' : ''; ?>><?php echo $pr3['namaprodi']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">Tempat Tanggal Lahir</h2>
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                Isi tempat lahir Anda dengan nama Kota, bukan lokasi lahir.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class=" col-sm-4">
                                            <div class="form-group">
                                                <label>Provinsi *</label>
                                                <select name="provtempatlahir" id="provtempatlahir" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['prov_tempatlahir'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($provinsi as $prov) : ?>
                                                        <option value="<?php echo $prov['kode']; ?>" <?php echo ($row['prov_tempatlahir'] == $prov['kode']) ? 'selected' : ''; ?>><?php echo $prov['nama']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Kabupaten/Kota *</label>
                                                <select name="kabtempatlahir" id="kabtempatlahir" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['kab_tempatlahir'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Tempat Lahir *</label>
                                                <input name="tempatlahir" id="tempatlahir" type="text" class="form-control" placeholder="" value="<?php echo $row['lokasi_tempatlahir']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Tanggal Lahir *</label><br>
                                                <input type="date" name="tanggallahir" id="tanggallahir" class="datepicker" data-date-format="mm/dd/yyyy" value="<?php echo $row['tgl_lahir']; ?>">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">Tempat Tinggal</h2>
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                Bidang/isian yang bertanda bintang (*) wajib untuk diisi.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Negara Tinggal *</label>
                                                <input name="negaratinggal" id="negaratinggal" type="text" class="form-control" placeholder="" required value="<?php echo $row['negara_tempattinggal']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Provinsi *</label>
                                                <select name="provtempattinggal" id="provtempattinggal" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['prov_tempattinggal'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($provinsi as $prov) : ?>
                                                        <option value="<?php echo $prov['kode']; ?>" <?php echo ($row['prov_tempattinggal'] == $prov['kode']) ? 'selected' : ''; ?>><?php echo $prov['nama']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Kabupaten/Kota *</label>
                                                <select name="kabtempattinggal" id="kabtempattinggal" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['kab_tempattinggal'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($kabupaten as $kab) : ?>
                                                        <option value="<?php echo $kab['kode']; ?>" <?php echo ($row['kab_tempattinggal'] == $kab['kode']) ? 'selected' : ''; ?>><?php echo $kab['nama']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Kecamatan/Distrik *</label>
                                                <select name="kectempattinggal" id="kectempattinggal" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['kec_tempattinggal'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Kelurahan/Desa *</label>
                                                <select name="destempattinggal" id="destempattinggal" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['des_tempattinggal'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Kode Pos</label>
                                                <input name="kodepos" id="kodepos" type="text" class="form-control" placeholder="" value="<?php echo $row['kodepos_tempattinggal']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat *</label>
                                                <input name="alamattempattinggal" id="alamattempattinggal" row="8" type="text" class="form-control" placeholder="" value="<?php echo $row['alamat_tempattinggal']; ?>" required></input>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat Tinggal Lain</label>
                                                <input name="alamatlaintempattinggal" id="alamatlaintempattinggal" type="text" class="form-control" placeholder="" value="<?php echo $row['alamatlain_tempattinggal']; ?>" required></input>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">Data Tambahan</h2>
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                Bidang/isian yang bertanda bintang (*) wajib untuk diisi.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>No. Telp./HP *</label>
                                                <input name="nohp" type="text" class="form-control" placeholder="" required value="<?php echo $nohp; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Alamat Email *</label>
                                                <input name="email" type="email" class="form-control" placeholder="" required value="<?php echo $email; ?>" readonly>
                                                <small>Email Aktif</small>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Tinggi Badan *</label>
                                                <input name="tinggibadan" id="tinggibadan" type="text" class="form-control" placeholder="" value="<?php echo $row['tinggibadan']; ?>" required>
                                                <small>Satuan cm. Contoh: 165</small>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Berat Badan *</label>
                                                <input name="beratbadan" id="beratbadan" type="text" class="form-control" placeholder="" value="<?php echo $row['beratbadan']; ?>" required>
                                                <small>Satuan kg. Contoh: 60</small>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <input type="button" name="next1" id="next1" class="next action-button" value="Lanjut" />
                            </fieldset>



                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">Identitas Sekolah:</h2>
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                Bidang/isian yang bertanda bintang (*) wajib untuk diisi.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tahun Lulus SMTA *</label>
                                                <select name="tahunlulussmta" id="tahunlulussmta" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['tahunlulus_smta'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php
                                                    $thn_skr = date('Y');
                                                    for ($x = $thn_skr; $x >= 2000; $x--) {
                                                    ?>
                                                        <option value="<?php echo $x ?>" <?php echo ($row['tahunlulus_smta'] == $x) ? 'selected' : ''; ?>><?php echo $x ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jurusan SMTA *</label>
                                                <select class="form-select" name="jurusansmta" id="jurusansmta" aria-label="Default select example">
                                                    <option <?php echo ($row['jurusansmta'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($jurusansmta as $jur) : ?>
                                                        <option value="<?php echo $jur['idjurusansmta']; ?>" <?php echo ($row['jurusansmta'] == $jur['idjurusansmta']) ? 'selected' : ''; ?>><?php echo $jur['namajurusan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis SMTA *</label>
                                                <select name="jenissmta" id="jenissmta" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['jenissmta'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($jenissmta as $jen) : ?>
                                                        <option value="<?php echo $jen['idjenissmta']; ?>" <?php echo ($row['jenissmta'] == $jen['idjenissmta']) ? 'selected' : ''; ?>><?php echo $jen['namajenissmta']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama SMTA *</label>
                                                <input name="namasmta" id="namasmta" type="text" class="form-control" placeholder="" value="<?php echo $row['nama_smta']; ?>" required>
                                                <small>Ketik nama SMTA Anda.</small>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Provinsi SMTA *</label>
                                                <select name="provinsismta" id="provinsismta" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['prov_smta'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($provinsi as $prov) : ?>
                                                        <option value="<?php echo $prov['kode']; ?>" <?php echo ($row['prov_smta'] == $prov['kode']) ? 'selected' : ''; ?>><?php echo $prov['nama']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Alamat SMTA</label>
                                                <input name="alamatsmta" id="alamatsmta" type="text" class="form-control" placeholder="" value="<?php echo $row['alamat_smta']; ?>" required></input>
                                                <small>Maksimal 50 karakter, gunakan spasi untuk memisahkan tiap kata</small>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 pilihanamat">
                                            <label>Lulus SMTA</label>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <input type="radio" name="lulussmta" class="lulussmta" id="lulussmta" value="Lulus" <?php echo ($row['lulus_smta'] == "Lulus") ? "Checked" : ""; ?>>
                                                        <label class="form-check-label" for="exampleRadios1">Sudah</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <input type="radio" name="lulussmta" class="lulussmta" id="lulussmta" value="Belum Lulus" <?php echo ($row['lulus_smta'] == "Belum Lulus") ? "Checked" : ""; ?>>
                                                        <label class="form-check-label" for="exampleRadios2">Belum</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row BoxLulus">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>Nomor Ijazah</label>
                                                            <input name="nomorijazah" id="nomorijazah" type="text" class="form-control" placeholder="" value="<?php echo $row['nomor_ijazah']; ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>Nilai UAN Matematika</label>
                                                            <input name="uanmtk" id="uanmtk" type="text" class="form-control" placeholder="" value="<?php echo $row['uan_mtk']; ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>Nilai UAN Bahasa Inggris</label>
                                                            <input name="uanbing" id="uanbing" type="text" class="form-control" placeholder="" value="<?php echo $row['uan_bing']; ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>Nilai UAN Bahasa Indonesia</label>
                                                            <input name="uanbind" id="uanbind" type="text" class="form-control" placeholder="" value="<?php echo $row['uan_bind']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row BoxBelumLulus">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Nilai Rapor Terakhir Matematika</label>
                                                            <input name="rapormtk" id="rapormtk" type="text" class="form-control" placeholder="" value="<?php echo $row['rapor_mtk']; ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Nilai Rapor Terakhir Inggris</label>
                                                            <input name="raporbing" id="raporbing" type="text" class="form-control" placeholder="" value="<?php echo $row['rapor_bing']; ?>" required>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Nilai Rapor Terakhir Indonesia</label>
                                                            <input name="raporbind" id="raporbind" type="text" class="form-control" placeholder="" value="<?php echo $row['rapor_bind']; ?>" required>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <input type="button" name="next2" id="next2" class="next action-button" value="Lanjut" />
                                <input type="button" name="previous" class="previous action-button-previous" value="Kembali" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">Biodata Orang Tua</h2>
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                Silakan isi data orang tua Anda sesuai dengan bidang-bidang yang diminta.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <h4>Biodata Ayah</h4>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>NIK/No. KTP Ayah</label>
                                                <input name="nikayah" id="nikayah" type="text" class="form-control" placeholder="" value="<?php echo $row['nik_ayah']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Ayah *</label>
                                                <input name="namaayah" id="namaayah" type="text" class="form-control" placeholder="" value="<?php echo $row['nama_ayah']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Pendidikan Ayah *</label>
                                                <select name="pendidikanayah" id="pendidikanayah" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['pendidikan_ayah'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($pendidikanortu as $pd) : ?>
                                                        <option value="<?php echo $pd['idpendidikan']; ?>" <?php echo ($row['pendidikan_ayah'] == $pd['idpendidikan']) ? 'selected' : ''; ?>><?php echo $pd['namajenjang']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small>Pendidikan terakhir</small>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Pekerjaan Ayah *</label>
                                                <select name="pekerjaanayah" id="pekerjaanayah" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['pekerjaan_ayah'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($pekerjaanortu as $pk) : ?>
                                                        <option value="<?php echo $pk['idpekerjaan']; ?>" <?php echo ($row['pekerjaan_ayah'] == $pk['idpekerjaan']) ? 'selected' : ''; ?>><?php echo $pk['namapekerjaan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat Kantor Ayah *</label>
                                                <input name="alamatkantorayah" id="alamatkantorayah" type="text" class="form-control" placeholder="" value="<?php echo $row['alamatkantor_ayah']; ?>" required>
                                                <small>Alamat kantor Ayah, maksimal 50 karakter.</small>
                                            </div>
                                        </div>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>Biodata Ibu</h4>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>NIK/No. KTP Ibu</label>
                                                <input name="nikibu" type="text" class="form-control" placeholder="" value="<?php echo $row['nik_ibu']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Ibu *</label>
                                                <input name="namaibu" id="namaibu" type="text" class="form-control" placeholder="" value="<?php echo $row['nama_ibu']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Pendidikan Ibu *</label>
                                                <select name="pendidikanibu" id="pendidikanibu" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['pendidikan_ibu'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($pendidikanortu as $pd) : ?>
                                                        <option value="<?php echo $pd['idpendidikan']; ?>" <?php echo ($row['pendidikan_ibu'] == $pd['idpendidikan']) ? 'selected' : ''; ?>><?php echo $pd['namajenjang']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small>Pendidikan terakhir</small>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Pekerjaan Ibu *</label>
                                                <select name="pekerjaanibu" id="pekerjaanibu" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['pekerjaan_ibu'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($pekerjaanortu as $pk) : ?>
                                                        <option value="<?php echo $pk['idpekerjaan']; ?>" <?php echo ($row['pekerjaan_ibu'] == $pk['idpekerjaan']) ? 'selected' : ''; ?>><?php echo $pk['namapekerjaan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Penghasilan Orang Tua*</label>
                                                <select name="penghasilanortu" id="penghasilanortu" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['penghasilan_ortu'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($penghasilanortu as $ph) : ?>
                                                        <option value="<?php echo $ph['idpenghasilan']; ?>" <?php echo ($row['penghasilan_ortu'] == $ph['idpenghasilan']) ? 'selected' : ''; ?>><?php echo $ph['penghasilan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small>Penghasilan Orang Tua Per Bulan</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>Alamat Orang Tua</h4>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat Orang Tua *</label>
                                                <input name="alamatortu" id="alamatortu" type="text" class="form-control" placeholder="" value="<?php echo $row['alamat_ortu']; ?>" required>
                                                <small>Alamat tinggal orang tua saat ini. Maksimal 50 karakter.</small>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Provinsi *</label>
                                                <select name="provortu" id="provortu" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['provinsi_tempattinggalortu'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($provinsi as $prov) : ?>
                                                        <option value="<?php echo $prov['kode']; ?>" <?php echo ($row['provinsi_tempattinggalortu'] == $prov['kode']) ? 'selected' : ''; ?>><?php echo $prov['nama']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kabupaten/Kota *</label>
                                                <select name="kabupatenortu" id="kabupatenortu" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['kab_tempattinggalortu'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($kabupaten as $kab) : ?>
                                                        <option value="<?php echo $kab['kode']; ?>" <?php echo ($row['kab_tempattinggalortu'] == $kab['kode']) ? 'selected' : ''; ?>><?php echo $kab['nama']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kecamatan/Distrik *</label>
                                                <select name="kecamatanortu" id="kecamatanortu" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['kec_tempattinggalortu'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($kecamatan as $kec) : ?>
                                                        <option value="<?php echo $kec['kode']; ?>" <?php echo ($row['kec_tempattinggalortu'] == $kec['kode']) ? 'selected' : ''; ?>><?php echo $kec['nama']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kode Pos *</label>
                                                <input name="kodeposortu" id="kodeposortu" type="text" class="form-control" placeholder="" value="<?php echo $row['kodepost_tempattinggalortu']; ?>" required>
                                                <small>Kode pos tempat tinggal orang tua saat ini</small>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>No. Telp./HP *</label>
                                                <input name="nohportu" id="nohportu" type="text" class="form-control" placeholder="" value="<?php echo $row['nohp_ortu']; ?>" required>
                                                <small>Nomor telp atau handphone orang tua yang bisa dihubungi</small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <input type="button" name="next3" id="next3" class="next action-button" value="Lanjut" />
                                <input type="button" name="previous" class="previous action-button-previous" value="Kembali" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">Biodata Wali</h2>
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                Silakan isi data wali Anda sesuai dengan bidang-bidang yang diminta.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Wali</label>
                                                <input name="namawali" id="namawali" type="text" class="form-control" placeholder="" value="<?php echo $row['nama_wali']; ?>" required>
                                            </div>

                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Pekerjaan Wali *</label>
                                                <select name="pekerjaanwali" id="pekerjaanwali" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['pekerjaan_wali'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($pekerjaanortu as $pk) : ?>
                                                        <option value="<?php echo $pk['idpekerjaan']; ?>" <?php echo ($row['pekerjaan_wali'] == $pk['idpekerjaan']) ? 'selected' : ''; ?>><?php echo $pk['namapekerjaan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Penghasilan Wali *</label>
                                                <select name="penghasilanwali" id="penghasilanwali" class="form-select" aria-label="Default select example">
                                                    <option <?php echo ($row['penghasilan_wali'] == '') ? 'selected' : ''; ?>> -- Pilih -- </option>
                                                    <?php foreach ($penghasilanortu as $ph) : ?>
                                                        <option value="<?php echo $ph['idpenghasilan']; ?>" <?php echo ($row['penghasilan_wali'] == $ph['idpenghasilan']) ? 'selected' : ''; ?>><?php echo $ph['penghasilan']; ?></option>
                                                    <?php endforeach; ?>
                                                    <small>Penghasilan Wali</small>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat Wali *</label>
                                                <input name="alamatwali" id="alamatwali" type="text" class="form-control" placeholder="" required>
                                                <small>Alamat wali saat ini. Maksimal 50 karakter.</small>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <input type="button" name="next4" id="next4" class="next action-button" value="Lanjut" />
                                <input type="button" name="previous" class="previous action-button-previous" value="Kembali" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">Konfirmasi</h2>
                                        </div>

                                        <table class="table tabelkonfirmasi">
                                            <tbody>
                                                <tr>
                                                    <td>Tanggal Pendaftaran</td>
                                                    <td>:</td>
                                                    <td><?php echo date("d-F-Y"); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Verifikasi</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" name="kodeverifikasi">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Syarat Pendaftaran</td>
                                                    <td>:</td>
                                                    <td>1</td>
                                                </tr>
                                                <tr>
                                                    <td>Kebijakan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input id="chk1" type="checkbox" name="chk" class="custom-control-input">
                                                            <label for="chk1" class="custom-control-label text-sm">Dengan ini saya menyatakan bahwa data yang saya isikan adalah data yang sebenarnya, jika di kemudian hari ternyata data yang saya isikan terbukti tidak benar maka saya bersedia digugurkan dan diproses sesuai aturan perundang-undangan.</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <input type="button" name="next" class="next action-button" value="Simpan" />
                                <input type="button" name="previous" class="previous action-button-previous" value="Kembali" />
                            </fieldset>
                        <?php endforeach; ?>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unggah Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Foto Pas</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <small>Rasio Foto : 4 x 6, atau max resolusi 300px x 450px, dengan max size : 200kb, Tipe file : jpg, jpeg, png</small>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
                    <button type="button" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'>
        $(document).ready(function() {
            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;
            setProgressBar(current);
            $(".next").click(function() {
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);
            });
            $(".previous").click(function() {
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                //show the previous fieldset
                previous_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar").css("width", percent + "%")
            }
            $(".submit").click(function() {
                return false;
            })
        });
    </script>

    <!-- Date Picker - Tanggal lahir -->
    <script>
        $('datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>

    <!-- Munculkan input ketika radio diklik -->
    <script>
        $('input[name="lulussmta"]').click(function() {
            var inputValue = $(this).attr("value");
            if (inputValue == "Lulus") {
                $(".BoxBelumLulus").hide();
                $(".BoxLulus").show();
            } else if (inputValue == "Belum Lulus") {
                $(".BoxLulus").hide();
                $(".BoxBelumLulus").show();
            } else {
                $(".BoxLulus").hide();
                $(".BoxBelumLulus").hide();
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            if ($(".lulussmta:checked").val() == "Lulus") {
                $(".BoxLulus").show();
                $(".BoxBelumLulus").hide();
            } else if ($(".lulussmta:checked").val() == "Belum Lulus") {
                $(".BoxLulus").hide();
                $(".BoxBelumLulus").show();
            } else {
                $(".BoxLulus").hide();
                $(".BoxBelumLulus").hide();
            }


            $("#provtempatlahir").change(function() {
                var url = "<?php echo site_url('register/add_ajax_kab'); ?>/" + $(this).val();
                $('#kabtempatlahir').load(url);
                return false;
            });
            $("#provtempattinggal").change(function() {
                var url = "<?php echo site_url('register/add_ajax_kab'); ?>/" + $(this).val();
                $('#kabtempattinggal').load(url);
                return false;
            });
            $("#kabtempattinggal").change(function() {
                var url = "<?php echo site_url('register/add_ajax_kec'); ?>/" + $(this).val();
                $('#kectempattinggal').load(url);
                return false;
            });
            $("#kectempattinggal").change(function() {
                var url = "<?php echo site_url('register/add_ajax_des'); ?>/" + $(this).val();
                $('#destempattinggal').load(url);
                return false;
            });

            $('#next1').on('click', function() {
                $("#next1").attr("disabled", "disabled");
                var jenkel = $(".jenkel:checked").val();
                var nik = $("input[name='nik']").val();
                var agama = $("select[name='agama']").val();
                var suku = $("input[name='suku']").val();
                var statusmenikah = $("select[name='statusmenikah']").val();
                var prodipilihan1 = $("select[name='prodipilihan1']").val();
                var prodipilihan2 = $("select[name='prodipilihan2']").val();
                var prodipilihan3 = $("select[name='prodipilihan3']").val();
                var prov_tempatlahir = $("select[name='provtempatlahir']").val();
                var kab_tempatlahir = $("select[name='kabtempatlahir']").val();
                var lokasi_tempatlahir = $("input[name='tempatlahir']").val();
                var tgl_lahir = $("input[name='tanggallahir']").val();
                var negara_tempattinggal = $("input[name='negaratinggal']").val();
                var prov_tempattinggal = $("select[name='provtempattinggal']").val();
                var kab_tempattinggal = $("select[name='kabtempattinggal']").val();
                var kec_tempattinggal = $("select[name='kectempattinggal']").val();
                var des_tempattinggal = $("select[name='destempattinggal']").val();
                var kodepos_tempattinggal = $("input[name='kodepos']").val();
                var alamat_tempattinggal = $("input[name='alamattempattinggal']").val();
                var alamatlain_tempattinggal = $("input[name='alamatlaintempattinggal']").val();
                var tinggibadan = $("input[name='tinggibadan']").val();
                var beratbadan = $("input[name='beratbadan']").val();


                $.ajax({
                    url: "<?php echo site_url('register/next1'); ?>",
                    type: "POST",
                    data: {
                        jenkel: jenkel,
                        nik: nik,
                        agama: agama,
                        suku: suku,
                        statusmenikah: statusmenikah,
                        prodipilihan1: prodipilihan1,
                        prodipilihan2: prodipilihan2,
                        prodipilihan3: prodipilihan3,
                        prov_tempatlahir: prov_tempatlahir,
                        kab_tempatlahir: kab_tempatlahir,
                        lokasi_tempatlahir: lokasi_tempatlahir,
                        tgl_lahir: tgl_lahir,
                        negara_tempattinggal: negara_tempattinggal,
                        prov_tempattinggal: prov_tempattinggal,
                        kab_tempattinggal: kab_tempattinggal,
                        kec_tempattinggal: kec_tempattinggal,
                        des_tempattinggal: des_tempattinggal,
                        kodepos_tempattinggal: kodepos_tempattinggal,
                        alamat_tempattinggal: alamat_tempattinggal,
                        alamatlain_tempattinggal: alamatlain_tempattinggal,
                        tinggibadan: tinggibadan,
                        beratbadan: beratbadan,



                    },
                    //cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 1) {
                            $("#next1").removeAttr("disabled");
                            $('#fupForm').find('input:text').val('');
                            $("#success").show();
                            $('#success').html('Data added successfully !');

                            $(".BoxLulus").hide();
                            $(".BoxBelumLulus").hide();
                        } else {
                            alert("Error occured !");
                        }

                    }
                });
            });


            $('#next2').on('click', function() {
                $("#next2").attr("disabled", "disabled");
                var tahunlulussmta = $("select[name='tahunlulussmta']").val();
                var jurusansmta = $("select[name='jurusansmta']").val();
                var jenissmta = $("select[name='jenissmta']").val();
                var namasmta = $("input[name='namasmta']").val();
                var provinsismta = $("select[name='provinsismta']").val();
                var alamatsmta = $("input[name='alamatsmta']").val();
                var lulussmta = $(".lulussmta:checked").val();

                if (lulussmta == 'Lulus') {
                    var nomorijazah = $("input[name='nomorijazah']").val();
                    var uanmtk = $("input[name='uanmtk']").val();
                    var uanbing = $("input[name='uanbing']").val();
                    var uanbind = $("input[name='uanbind']").val();
                    var rapormtk = "";
                    var raporbing = "";
                    var raporbind = "";
                } else if (lulussmta == 'Belum Lulus') {
                    var nomorijazah = "";
                    var uanmtk = "";
                    var uanbing = "";
                    var uanbind = "";
                    var rapormtk = $("input[name='rapormtk']").val();
                    var raporbing = $("input[name='raporbing']").val();
                    var raporbind = $("input[name='raporbind']").val();

                } else {
                    var nomorijazah = "";
                    var uanmtk = "";
                    var uanbing = "";
                    var uanbind = "";
                    var rapormtk = "";
                    var raporbing = "";
                    var raporbind = "";
                };




                $.ajax({
                    url: "<?php echo site_url('register/next2'); ?>",
                    type: "POST",
                    data: {
                        tahunlulussmta: tahunlulussmta,
                        jurusansmta: jurusansmta,
                        jenissmta: jenissmta,
                        namasmta: namasmta,
                        provinsismta: provinsismta,
                        alamatsmta: alamatsmta,
                        lulussmta: lulussmta,
                        nomorijazah: nomorijazah,
                        uanmtk: uanmtk,
                        uanbing: uanbing,
                        uanbind: uanbind,
                        rapormtk: rapormtk,
                        raporbing: raporbing,
                        raporbind: raporbind,


                    },
                    //cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 1) {
                            $("#next2").removeAttr("disabled");
                            $('#fupForm').find('input:text').val('');
                            $("#success").show();
                            $('#success').html('Data added successfully !');
                        } else {
                            alert("Error occured !");
                        }

                    }
                });
            });


            $('#next3').on('click', function() {
                $("#next3").attr("disabled", "disabled");
                var nik_ayah = $("input[name='nikayah']").val();
                var nama_ayah = $("input[name='namaayah']").val();
                var pendidikanayah = $("select[name='pendidikanayah']").val();
                var pekerjaanayah = $("select[name='pekerjaanayah']").val();
                var alamatkantor_ayah = $("input[name='alamatkantorayah']").val();
                var nik_ibu = $("input[name='nikibu']").val();
                var nama_ibu = $("input[name='namaibu']").val();
                var pendidikanibu = $("select[name='pendidikanibu']").val();
                var pekerjaanibu = $("select[name='pekerjaanibu']").val();
                var penghasilanortu = $("select[name='penghasilanortu']").val();
                var alamat_ortu = $("input[name='alamatortu']").val();
                var provinsi_ortu = $("select[name='provortu']").val();
                var kabupaten_ortu = $("select[name='kabupatenortu']").val();
                var kecamatan_ortu = $("select[name='kecamatanortu']").val();
                var kodepos_ortu = $("input[name='kodeposortu']").val();
                var nohp_ortu = $("input[name='nohportu']").val();


                $.ajax({
                    url: "<?php echo site_url('register/next3'); ?>",
                    type: "POST",
                    data: {
                        nik_ayah: nik_ayah,
                        nama_ayah: nama_ayah,
                        pendidikanayah: pendidikanayah,
                        pekerjaanayah: pekerjaanayah,
                        alamatkantor_ayah: alamatkantor_ayah,
                        nik_ibu: nik_ibu,
                        nama_ibu: nama_ibu,
                        pendidikanibu: pendidikanibu,
                        pekerjaanibu: pekerjaanibu,
                        penghasilanortu: penghasilanortu,
                        alamat_ortu: alamat_ortu,
                        provinsi_ortu: provinsi_ortu,
                        kabupaten_ortu: kabupaten_ortu,
                        kecamatan_ortu: kecamatan_ortu,
                        kodepos_ortu: kodepos_ortu,
                        nohp_ortu: nohp_ortu,


                    },
                    //cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 1) {
                            $("#next3").removeAttr("disabled");
                            $('#fupForm').find('input:text').val('');
                            $("#success").show();
                            $('#success').html('Data added successfully !');
                        } else {
                            alert("Error occured !");
                        }

                    }
                });
            });

            $('#next4').on('click', function() {
                $("#next4").attr("disabled", "disabled");
                var nama_wali = $("input[name='namawali']").val();
                var pekerjaanwali = $("select[name='pekerjaanwali']").val();
                var penghasilanwali = $("select[name='penghasilanwali']").val();
                var alamat_wali = $("input[name='alamatwali']").val();


                $.ajax({
                    url: "<?php echo site_url('register/next4'); ?>",
                    type: "POST",
                    data: {
                        nama_wali: nama_wali,
                        pekerjaanwali: pekerjaanwali,
                        penghasilanwali: penghasilanwali,
                        alamat_wali: alamat_wali,

                    },
                    //cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 1) {
                            $("#next4").removeAttr("disabled");
                            $('#fupForm').find('input:text').val('');
                            $("#success").show();
                            $('#success').html('Data added successfully !');
                        } else {
                            alert("Error occured !");
                        }

                    }
                });
            });
        });
    </script>
</body>

</html>