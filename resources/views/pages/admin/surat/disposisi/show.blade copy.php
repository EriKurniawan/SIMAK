<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disposisi Fisik</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/contoh.css" />
</head>

<style>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: tubaba-bold;
    }
</style>
<div class="container">
    <div class="row kop-surat">
        <div class="col-md-1">
            <br>
            <img src="/assets/img/logotubaba.jpeg" alt="Logo Tubaba" class="logo" style="width: 90px;">
            </br>
        </div>
        <div class="col-md-11 header-text text-center">
            <br>
            <h6 style="font-size: 12pt;"><b>PEMERINTAHAN KABUPATEN TULANG BAWANG BARAT</b></h6>
            <h1 style="font-size: 18pt; margin-top: 0px;"><b>SEKERTARIAT DAERAH</b></h1>
            <p style="font-size: 12pt; margin-top: 0px;"> <b>Jalan Tuan Rio Sanak, Komplek Perkantoran Pemerintahan Daerah</b></p>
            <p style="font-size: 12pt;"> <b>Kabupaten Tulang Bawang Barat, Panaragan 34593</b></p>
            </br>

        </div>


    </div>
    <hr>
    <h5 class="col-md-19 header-text text-center">LEMBAR DISPOSISI</h5>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td class="col-md-4"> Asal Surat : {{ $data->asal_surat }}<br>
                    No. Surat : {{ $data->nomor_surat }} <br>
                    Tgl. Surat : {{ $data->tanggal_surat }}<br>
                </td>

                <td class="col-md-8">Diterima Tgl : {{ $data->tanggal_diterima }} <br>
                    No.Agenda : {{ $data->nomor_agenda }} <br>
                    Sifat : <br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sifat_sangat_segera" name="sifat_surat" value="Sangat Segera" {{ in_array('Sangat Segera', explode(',', $data->sifat_surat)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="sifat_sangat_segera">Sangat Segera</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sifat_segera" name="sifat_surat" value="Segera" {{ in_array('Segera', explode(',', $data->sifat_surat)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="sifat_segera">Segera</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sifat_rahasia" name="sifat_surat" value="Rahasia" {{ in_array('Rahasia', explode(',', $data->sifat_surat)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="sifat_rahasia">Rahasia</label>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td class="col-md-2">Hal </td>
                <td class="col-md-10">: {{ $data->perihal }} </td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <td class="col-md-6">Diteruskan kepada sdr: <br>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Sekertaris Dinas" {{ in_array('Sekertaris Dinas', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="diteruskan_sekertaris">Sekertaris Dinas</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Informasi & Statistik"{{ in_array('Bidang Informasi & Statistik', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="diteruskan_sekertaris">Bidang Informasi & Statistik</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Media"{{ in_array('Bidang Media', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="diteruskan_sekertaris">Bidang Media</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Teknologi Komunikasi & Persandian"{{ in_array('Bidang Teknologi Komunikasi & Persandian', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="diteruskan_sekertaris">Bidang Teknologi Komunikasi & Persandian</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Aplikasi & Sistem Informasi"{{ in_array('Bidang Aplikasi & Sistem Informasi', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="diteruskan_sekertaris">Bidang Aplikasi & Sistem Informasi</label>
                        </div>

                        <p>Dan Seterusnya...</p>
                    </div>
                </td>
                <td class="col-md-6">Dengan Hormat Harap: <br>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hormat_tanggapan_dan_saran" name="hormat" value="Tanggapan dan saran"{{ in_array('Tanggapan dan saran', explode(',', $data->hormat)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="hormat_tanggapan_dan_saran">Tanggapan dan saran</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hormat_tanggapan_dan_saran" name="hormat" value="Proses lebih lanjut"{{ in_array('Proses lebih lanjut', explode(',', $data->hormat)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="hormat_tanggapan_dan_saran">Proses lebih lanjut</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hormat_tanggapan_dan_saran" name="hormat" value="Koordinasi/konfirmasikan"{{ in_array('Koordinasi/konfirmasikan', explode(',', $data->hormat)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="hormat_tanggapan_dan_saran">Koordinasi/konfirmasikan</label>
                        </div>
                        <p>Dan Seterusnya...</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <p class="catatan">Catatan : {{ $data->catatan }}</p>
    <br><br><br>
    <p class="ttd"> {{ Auth::user()->name }}, <br> (paraf dan tanggal) <br> .................................</p>
</div>


<!-- Link ke Bootstrap JS dan dependensi Popper.js -->



<!-- Link ke Bootstrap JS dan dependensi Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
