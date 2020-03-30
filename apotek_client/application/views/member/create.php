<?php echo form_open_multipart('member/create');?>
<table>
    <tr>
        <td>ID</td>
        <td><?php echo form_input('id');?></td>
    </tr>
    <tr>
        <td>NAMA</td>
        <td><?php echo form_input('nama');?></td>
    </tr>
    <tr>
        <td>NOMOR TELEPON</td>
        <td><?php echo form_input('no_telp');?></td>
    </tr>
    <tr>
        <td>EMAIL</td>
        <td><?php echo form_input('email');?></td>
    </tr>
    <tr>
        <td>NOMOR MEMBER</td>
        <td><?php echo form_input('no_member');?></td>
    </tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit', 'simpan');?>
        <?php echo anchor('member', 'kembali');?></td></tr>
</table>
<?php
echo form_close();
?>