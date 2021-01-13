<?php
$title = "Kabupaten";
$judul = $title;
$url = 'kabupaten';
if (isset($_POST['simpan'])) {
    $file = upload('geojson_kabupaten', 'geojson');
    if ($file != false) {
        $data['geojson_kabupaten'] = $file;
    }

    if ($_POST['id_kabupaten'] == "") {
        $data['kd_kabupaten'] = $_POST['kd_kabupaten'];
        $data['nm_kabupaten'] = $_POST['nm_kabupaten'];
        $data['warna_kabupaten'] = $_POST['warna_kabupaten'];
        $exec = $db->insert("m_kabupaten", $data);
        $info = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses Ditambahkan!
                </div>';
    } else {
        $data['kd_kabupaten'] = $_POST['kd_kabupaten'];
        $data['nm_kabupaten'] = $_POST['nm_kabupaten'];
        $data['warna_kabupaten'] = $_POST['warna_kabupaten'];
        $db->where('id_kabupaten', $_POST['id_kabupaten']);
        $exec = $db->update("m_kabupaten", $data);
        $info = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses Diubah!
                </div>';
    }

    if ($exec) {
        $session->set('info', $info);
    } else {
        $session->set("info", '
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4> Proses gagal dilakukan!
        </div>');
    }
    header("Location: " . url($url));
    die();
}

if (isset($_GET['hapus'])) {
    $db->where('id_kabupaten', $_GET['id']);
    $exec = $db->delete('m_kabupaten');
    $info = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses Dihapus!
                </div>';
    if ($exec) {
        $session->set('info', $info);
    } else {
        $session->set("info", '
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4> Proses gagal dilakukan!
        </div>');
    }
    header("Location: " . url($url));
    die();
}

if (isset($_GET['tambah']) or isset($_GET['ubah'])) {
    $id_kabupaten = "";
    $kd_kabupaten = "";
    $nm_kabupaten = "";
    $warna_kabupaten = "";
    $geojson_kabupaten = "";
    if (isset($_GET['ubah']) and isset($_GET['id'])) {
        $id = $_GET['id'];
        $db->where('id_kabupaten', $id);
        $row = $db->ObjectBuilder()->getOne('m_kabupaten');
        if ($db->count > 0) {
            $id_kabupaten = $row->id_kabupaten;
            $kd_kabupaten = $row->kd_kabupaten;
            $nm_kabupaten = $row->nm_kabupaten;
            $warna_kabupaten = $row->warna_kabupaten;
            $geojson_kabupaten = $row->geojson_kabupaten;
        }
    }
?>

    <?= content_open('Form Kabupaten'); ?>
    <form method="post" enctype="multipart/form-data">
        <?= input_hidden('id_kabupaten', $id_kabupaten) ?>
        <div class="form-group">
            <label>Kode Kabupaten</label>
            <?= input_text('kd_kabupaten', $kd_kabupaten) ?>
        </div>
        <div class="form-group">
            <label>Nama Kabupaten</label>
            <?= input_text('nm_kabupaten', $nm_kabupaten) ?>
        </div>
        <div class="form-group">
            <label>GeoJSON</label>
            <?= input_file('geojson_kabupaten', $geojson_kabupaten) ?>
        </div>
        <div class="form-group">
            <label>Warna</label>
            <div class="row">
                <div class="col-md-3">
                    <?= input_color('warna_kabupaten', $warna_kabupaten) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <a href="<?= url($url) ?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
            <button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </form>
    <?= content_close(); ?>

<?php } else { ?>

    <?= content_open('Data Kabupaten'); ?>
    <a href="<?= url($url . '&tambah') ?>" class="btn btn-success"> Tambah</a>
    <hr>
    <?= $session->pull("info") ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Kabupaten</th>
                <th>GeoJSON</th>
                <th>Warna</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $getdata = $db->ObjectBuilder()->get('m_kabupaten');
            foreach ($getdata as $row) {
            ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row->kd_kabupaten ?></td>
                    <td><?= $row->nm_kabupaten ?></td>
                    <td><a href="<?= assets('unggah/geojson/' . $row->geojson_kabupaten) ?>" target="_BLANK"><?= $row->geojson_kabupaten ?></a></td>
                    <td style="background: <?= $row->warna_kabupaten ?>"></td>
                    <td>
                        <a href="<?= url($url . '&ubah&id=' . $row->id_kabupaten) ?>" class="btn btn-info"><i class="fa fa-edit"></i>Ubah</a>
                        <a href="<?= url($url . '&hapus&id=' . $row->id_kabupaten) ?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
    <?= content_close(); ?>
<?php } ?>