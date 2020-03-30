<?php echo form_open('obat/edit');?>
<?php echo form_hidden('id',$dataobat[0]->id);?>
<table>
    <tr>
        <td>ID</td>
        <td><?php echo form_input('', $dataobat[0]->id,"disabled");?></td>
    </tr>
    <tr>
        <td>NAMA OBAT</td>
        <td><?php echo form_input('nama_obat', $dataobat[0]->nama_obat);?></td>
    </tr>
    <tr>
        <td>HARGA</td>
        <td><?php echo form_input('harga', $dataobat[0]->harga);?></td>
    </tr>
    <tr>
        <td>STOK</td>
        <td><?php echo form_input('stok', $dataobat[0]->stok);?></td>
    </tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('obat','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>