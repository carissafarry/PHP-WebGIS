<?php
$title = "Candi";
$judul = $title;
$url = 'hotspot';
if (isset($_POST['simpan'])) {
    $data['nama_candi'] = $_POST['nama_candi'];
    $data['lat'] = $_POST['lat'];
    $data['lng'] = $_POST['lng'];
    if ($_POST['id_candi'] == "") {
        $exec = $db->insert("t_candi", $data);
        $info = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses Ditambah </div>';
    } else {
        $db->where('id_candi', $_POST['id_candi']);
        $exec = $db->update("t_candi", $data);
        $info = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses diubah </div>';
    }

    if ($exec) {
        $session->set('info', $info);
    } else {
        $session->set("info", '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4> Proses gagal dilakukan
            </div>');
    }
    redirect(url($url));
}

if (isset($_GET['hapus'])) {
    $setTemplate = false;
    $db->where("id_candi", $_GET['id_candi']);
    $exec = $db->delete("t_candi");
    $info = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses dihapus </div>';
    if ($exec) {
        $session->set('info', $info);
    } else {
        $session->set("info", '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4> Proses gagal dilakukan
            </div>');
    }
    redirect(url($url));
} elseif (isset($_GET['tambah']) or isset($_GET['ubah'])) {
    $id_candi = "";
    $nama_candi = "";
    $lat = "";
    $lng = "";
    if (isset($_GET['ubah']) and isset($_GET['id'])) {
        $id = $_GET['id'];
        $db->where('id_kabupaten', $id);
        $row = $db->ObjectBuilder()->getOne('t_candi');
        if ($db->count > 0) {
            $id_candi = $row->id_candi;
            $nama_candi = $row->nama_candi;
            $lat = $row->lat;
            $lng = $row->lng;
        }
    }
?>
    <?= content_open('Form Candi') ?>
    <form method="post">
        <?= input_hidden('id_candi', $id_candi) ?>
        <div class="form-group">
            <label>Nama Candi</label>
            <div class="row">
                <div class="col-md-3">
                    <?= input_text('nama_candi', $nama_candi) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Titik Koordinat</label>
            <div class="row">
                <div class="col-md-3">
                    <?= input_text('lat', $lat) ?>
                </div>
                <div class="col-md-3">
                    <?= input_text('lng', $lng) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
            <a href="<?= url($url) ?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
        </div>
    </form>
    <?= content_close() ?>

<?php  } else { ?>
    <?= content_open('Data Candi') ?>

    <a href="<?= url($url . '&tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
    <hr>
    <?= $session->pull("info") ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <!-- <th>Kabupaten</th> -->
                <th>Nama Candi</th>
                <th>Lat</th>
                <th>Lng</th>
                <!-- <th>Tanggal</th> -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            // $db->join('m_kabupaten b', 'a.id_kabupaten=b.id_kabupaten', 'LEFT');
            $getdata = $db->ObjectBuilder()->get('t_candi a');
            foreach ($getdata as $row) {
            ?>
                <tr>
                    <td><?= $no; ?></td>
                    <!-- <td><?= $row->id_kabupaten ?></td> -->
                    <td><?= $row->nama_candi ?></td>
                    <td><?= $row->lat ?></td>
                    <td><?= $row->lng ?></td>
                    <!-- <td>Tanggal</td> -->
                    <td>
                        <a href="<?= url($url . '&ubah&id=' . $row->id_candi) ?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="<?= url($url . '&hapus&id=' . $row->id_candi) ?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
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