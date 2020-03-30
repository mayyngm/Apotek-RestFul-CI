<?php echo form_open_multipart('obat/create');?>
<table>
    <tr>
        <td>ID</td>
        <td><?php echo form_input('id');?></td>
    </tr>
    <tr>
        <td>NAMA OBAT</td>
        <td><?php echo form_input('nama_obat');?></td>
    </tr>
    <tr>
        <td>HARGA</td>
        <td><?php echo form_input('harga');?></td>
    </tr>
    <tr>
        <td>STOK</td>
        <td><?php echo form_input('stok');?></td>
    </tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('obat','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>