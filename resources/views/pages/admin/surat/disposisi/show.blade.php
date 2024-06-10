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
                <td class=" txt-center">
                    <h3><b>PEMERINTAHAN KABUPATEN TULANG BAWANG BARAT</b></h3>
                    <h1><b> SEKERTARIAT DAERAH </b></h1>
                    <div>Jalan Tuan Rio Sanak, Komplek Perkantoran Pemerintahan Daerah <br>
                        Kabupaten Tulang Bawang Barat, Panaragan 34593</div>
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
                <td class="txt-left">
                    <ul>
                        <li><b>Asal surat</b>: {{ $data->asal_surat }}</li>
                        <li><b>No.surat</b>: {{ $data->nomor_surat }}</li>
                        <li><b>Tgl.surat:</b>: {{ $data->tanggal_surat }}</li>
                    </ul>
                </td>



                <td class="txt-left">
                    Diterima Tanggal : {{ $data->tanggal_diterima }}<br>
                    No.Agenda : {{ $data->nomor_agenda }}<br>
                    Sifat :
                    <form>
                        <div class="checkbox-container">
                            <label>
                                <input type="checkbox" name="option1" value="1" {{ in_array('Sangat Segera', explode(',', $data->sifat_surat)) ? 'checked' : '' }}>
                                Sangat Segera
                            </label>
                            <label>
                                <input type="checkbox" name="option2" value="2" {{ in_array('Segera', explode(',', $data->sifat_surat)) ? 'checked' : '' }}>
                                Segera
                            </label>
                            <label>
                                <input type="checkbox" name="option3" value="3" {{ in_array('Rahasia', explode(',', $data->sifat_surat)) ? 'checked' : '' }}>
                                Rahasia
                            </label>
                        </div>
                    </form>
                </td>
            </tr>
        </table>

        <!-- INI TABEL KEDUA -->
        <table>
            <tr>
                <td class="txt-left">
                    <br><br> Hal<br><br><br>
                </td>
                <td class="txt-left">
                    : {{ $data->perihal }}
                </td>
            </tr>
        </table>


        <!-- TABEL KETIGA -->
        <table>
            <tr>
                <td class="txt-left">
                    Diteruskan kepada sdr: <br>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Sekertaris Dinas" {{ in_array('Sekertaris Dinas', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                            <label class="form-check-label">Sekertaris Dinas</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Informasi & Statistik"{{ in_array('Bidang Informasi & Statistik', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                            <label class="form-check-label">Bidang Informasi & Statistik</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Media"{{ in_array('Bidang Media', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                            <label class="form-check-label">Bidang Media</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Teknologi Komunikasi & Persandian"{{ in_array('Bidang Teknologi Komunikasi & Persandian', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                            <label class="form-check-label">Bidang Teknologi Komunikasi & Persandian</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Aplikasi & Sistem Informasi"{{ in_array('Bidang Aplikasi & Sistem Informasi', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                            <label class="form-check-label">Bidang Aplikasi & Sistem Informaasi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">..............................................................................</label>
                        </div>
                </td>

                <td class="txt-left">
                    Dengan Hormat Harap: <br>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hormat_tanggapan_dan_saran" name="hormat" value="Tanggapan dan saran"{{ in_array('Tanggapan dan saran', explode(',', $data->hormat)) ? 'checked' : '' }}>
                            <label class="form-check-label">Tanggapan dan saran</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hormat_tanggapan_dan_saran" name="hormat" value="Proses lebih lanjut"{{ in_array('Proses lebih lanjut', explode(',', $data->hormat)) ? 'checked' : '' }}>
                            <label class="form-check-label">Proses lebih lanjut</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hormat_tanggapan_dan_saran" name="hormat" value="Koordinasi/konfirmasikan"{{ in_array('Koordinasi/konfirmasikan', explode(',', $data->hormat)) ? 'checked' : '' }}>
                            <label class="form-check-label">Koordinasi/konfirmasikan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">............................................</label>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <!-- BAGIAN CATATAN DAN TTD -->
        <br>
        <p class="txt-left">Catatan : {{ $data->catatan }}</p>
        <br><br><br><br><br><br>
        <p class="txt-right"> {{ Auth::user()->name }}, <br> (paraf dan tanggal) <br> .................................</p>
    </section>
</body>

</html>
