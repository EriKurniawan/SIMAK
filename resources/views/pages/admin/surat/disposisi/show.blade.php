<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>surat</title>
    <style>
        .page-surat {
            width: 21cm;
            height: 29.7cm;
            font-size: 18px;
            padding: 1cm;
            margin: 0;
        }

        @media print {
            .page-surat {
                clear: both;
                page-break-after: always;
            }
        }

        @font-face {
            font-family: tubaba-regular;
            src: url("public/assets/tubaba-fonts/Tubaba-Regular.ttf");
        }

        @font-face {
            font-family: tubaba-bold;
            src: url("public/assets/tubaba-fonts/Tubaba-Bold.ttf");
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* Menggabungkan garis border */
            background-color: white;
            /* Warna latar belakang tabel */

            td {
                border: 1px solid black;
                /* Garis berwarna hitam */
                padding: 5px;
            }
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: tubaba-bold;
        }

        .txt-center {
            text-align: center;
        }

        .txt-end {
            text-align: end;
        }

        .txt-bold {
            font-weight: bold;
        }

        .txt-left {
            text-align: left;
        }

        .txt-right {
            text-align: right;
        }

        .w-80 {
            width: 80%;
        }

        .w-20 {
            width: 20%;
        }

        .w-30 {
            width: 30%;
        }

        .w-50 {
            width: 50%;
        }

        .w-2 {
            width: 2%;
        }

        .border-buttom {
            border-bottom: solid 2px black;
        }

        .border-double {
            border-bottom: 5px double #000;
            /* Garis double dan tebal */
        }

        img {
            height: 100px;
            width: auto;
        }

        .letter-spacing-example {
            letter-spacing: 6px;
            /* Menambahkan jarak antar huruf */
            text-align: center;
            margin-bottom: 15px;
        }

        .checkbox-container {
            display: flex;
            gap: 10px;
            /* Jarak antar checkbox */
        }

        .checkbox-container label {
            display: flex;
            align-items: center;
        }

        .checkbox-container input[type="checkbox"] {
            margin-right: 5px;
            /* Jarak antara kotak cek dan teks */
        }

        ul {
            list-style: none;
            display: table;
        }

        li {
            display: table-row;
        }

        b {
            display: table-cell;
            padding-right: 1em;
        }
    </style>
</head>

<body>
    <section class="page-surat">
        <table>
            <!-- HEADER SURAT -->
            <tr class="border-double">
                <td class=" txt-center">
                    <img src="/assets/img/logotubaba.jpeg" alt="">
                </td>
                <td class="center" style="text-align: center; padding: 10px;">
                    <h3 style="margin: 0; font-weight: bold;">PEMERINTAHAN KABUPATEN TULANG BAWANG BARAT</h3>
                    <h1 style="margin: 0; font-weight: bold;">SEKERTARIAT DAERAH</h1>
                    <p style="margin-top: 5px; margin-bottom: 0;">Jalan Tuan Rio Sanak, Komplek Perkantoran Pemerintahan Daerah<br>
                        Kabupaten Tulang Bawang Barat, Panaragan 34593</p>
                </td>

            </tr>
        </table>

        <!-- INI TABEL DISPOSISI -->
        <br>
        <table>
            <td class="txt-center">
                <h3 class="letter-spacing-example">LEMBAR DISPOSISI</h3>
            </td>
        </table>

        <!-- INI TABEL PERTAMA -->
        <table>
            <tr>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td class="txt-left" style="padding-right: 20px; vertical-align: top;">
                            <ul style="list-style-type: none; padding-left: 0;">
                                <li>Asal surat: {{ $data->asal_surat }}</li>
                                <li>No.surat: {{ $data->nomor_surat }}</li>
                                <li>Tgl.surat: {{ $data->tanggal_surat }}</li>
                            </ul>
                        </td>
                        <td class="txt-left" style="vertical-align: top;">
                            <ul style="list-style-type: none; padding-left: 0;">
                                <li>Diterima Tanggal: {{ $data->tanggal_diterima }}</li>
                                <li>No.Agenda: {{ $data->nomor_agenda }}</li>
                                <li>Sifat:
                                    <div class="checkbox-container">
                                        <label>
                                            <input type="checkbox" name="option1" value="1" {{ in_array('Sangat Rahasia', explode(',', $data->sifat_surat)) ? 'checked' : '' }}>
                                            Sangat Rahasia
                                        </label>
                                        <label>
                                            <input type="checkbox" name="option2" value="2" {{ in_array('Rahasia', explode(',', $data->sifat_surat)) ? 'checked' : '' }}>
                                            Rahasia
                                        </label>
                                        <label>
                                            <input type="checkbox" name="option3" value="3" {{ in_array('Penting', explode(',', $data->sifat_surat)) ? 'checked' : '' }}>
                                            Penting
                                        </label>
                                        <label>
                                            <input type="checkbox" name="option4" value="3" {{ in_array('Biasa', explode(',', $data->sifat_surat)) ? 'checked' : '' }}>
                                            Biasa
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr>
                </table>


            </tr>
        </table>

        <!-- INI TABEL KEDUA -->
        <table>
            <tr>
                <td class="txt-left">
                    <br><br> Perihal<br><br><br>
                </td>
                <td class="txt-left">
                    : {{ $data->perihal }}
                </td>
            </tr>
        </table>


        <!-- TABEL KETIGA -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="col-md-6">Diteruskan kepada sdr: <br>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="1" {{ in_array('Sekertaris Dinas', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="diteruskan_sekertaris">Sekertaris Dinas</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="bidang_informasi" name="diteruskan" value="2"{{ in_array('Bidang Informasi & Statistik', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="bidang_informasi">Bidang Informasi & Statistik</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="bidang_media" name="diteruskan" value="3"{{ in_array('Bidang Media', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="bidang_media">Bidang Media</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="bidang_teknologi" name="diteruskan" value="4"{{ in_array('Bidang Teknologi Komunikasi & Persandian', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="bidang_teknologi">Bidang Teknologi Komunikasi & Persandian</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="bidang_aplikasi" name="diteruskan" value="5"{{ in_array('Bidang Aplikasi & Sistem Informasi', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="bidang_aplikasi">Bidang Aplikasi & Sistem Informasi</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">..............................................................................</label>
                            </div>

                        </div>
                    </td>
                    <td class="col-md-6">Dengan Hormat Harap: <br>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="hormat_tanggapan_dan_saran" name="hormat" value="1"{{ in_array('Tanggapan dan saran', explode(',', $data->hormat)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="hormat_tanggapan_dan_saran">Tanggapan dan saran</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="proses" name="hormat" value="2"{{ in_array('Proses lebih lanjut', explode(',', $data->hormat)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="proses">Proses lebih lanjut</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="koordinasi" name="hormat" value="3"{{ in_array('Koordinasi/konfirmasikan', explode(',', $data->hormat)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="koordinasi">Koordinasi/konfirmasikan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">..............................................................................</label>
                            </div>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- BAGIAN CATATAN DAN TTD -->
        <br>
        <p class="txt-left">Catatan : {{ $data->catatan }}</p>
        <br><br><br><br><br><br>
        <p class="txt-right"> Sekretaris Dinas, <br> (paraf dan tanggal) <br> .................................</p>
    </section>
</body>

</html>
