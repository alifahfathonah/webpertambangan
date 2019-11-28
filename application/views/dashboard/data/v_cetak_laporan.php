<!DOCTYPE html>
<html>
    <head>
    <style>
    #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #fff;
    color: black;
    }
    </style>
    <script>
    window.print();

    </script>
    </head>
        <body>
            <center><h1>Laporan Transaksi</h1></center>
            <table id="customers">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penyewa</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Total Biaya</th>
                    <th>Bukti</th>
                    
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th>No</th>
                    <th>Nama Penyewa</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Total Biaya</th>
                    <th>Bukti</th>
                </tr>
            </tfoot>
            <tbody>
                 <?php $i = 0; foreach($laporan as $row){ $i++;?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row['nama_depan']; ?> <?= $row['nama_belakang']; ?></td>
                        <td><?= $row['nama_product']; ?></td>
                        <td><?= $row['tgl_sewa']; ?></td>
                        <td><?= $row['tgl_pengembalian']; ?></td>
                        <td><?= number_format($row['biaya'],2,",","."); ?></td>
                        <td>
                            <center>
                            <img src="<?= base_url() ?>assets/dashboard/img/bukti/<?= $row['bukti'] ?>" alt="" width="80" height="80">
                            </center>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
