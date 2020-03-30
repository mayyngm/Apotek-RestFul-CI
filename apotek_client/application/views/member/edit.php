<?php echo form_open('member/edit');?>
<?php echo form_hidden('id',$datamember[0]->id);?>
<table>
    <tr>
        <td>ID</td>
        <td><?php echo form_input('', $datamember[0]->id,"disabled");?></td>
    </tr>
    <tr>
        <td>NAMA</td>
        <td><?php echo form_input('nama', $datamember[0]->nama);?></td>
    </tr>
    <tr>
        <td>NOMOR TELEPON</td>
        <td><?php echo form_input('no_telp', $datamember[0]->no_telp);?></td>
    </tr>
    <tr>
        <td>EMAIL</td>
        <td><?php echo form_input('email', $datamember[0]->email);?></td>
    </tr>
    <tr>
        <td>NOMOR MEMBER</td>
        <td><?php echo form_input('no_member', $datamember[0]->no_member);?></td>
    </tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit', 'simpan');?>
        <?php echo anchor('member', 'kembali');?></td></tr>
</table>
<?php
echo form_close();
?>