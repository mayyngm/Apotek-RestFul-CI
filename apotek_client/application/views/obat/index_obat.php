<font color="orange">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<h2>DAFTAR OBAT-OBATAN:</h2>
<table border='1'>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAMA OBAT</th>
            <th scope="col">HARGA</th>
            <th scope="col">STOK</th>
            <th scope="col">PROSES</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    foreach ($dataobat as $obat){
        echo " <tr>
            <td>$obat->id</td>
            <td>$obat->nama_obat</td>
            <td>$obat->harga</td>
            <td>$obat->stok</td>
            <td>".anchor('obat/edit/'.$obat->id, 'Edit')."
                ".anchor('obat/delete/'.$obat->id, 'Delete')."</td>
            </tr>";
    }?>
    </tbody>
</table>
<a href="http://localhost/12.codeigniter/apotek_client/obat/create">+ Tambah data<a>
<a href="http://localhost/12.codeigniter/apotek_client/">+ Kembali<a>