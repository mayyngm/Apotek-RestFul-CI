<font color="orange">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<h2>DATA MEMBER APOTEK:</h2>
<table border='1'>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAMA</th>
            <th scope="col">NO TELEPON</th>
            <th scope="col">EMAIL</th>
            <th scope="col">NO MEMBER</th>
            <th scope="col">PROSES</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    foreach ($datamember as $member){
        echo " <tr>
            <td>$member->id</td>
            <td>$member->nama</td>
            <td>$member->no_telp</td>
            <td>$member->email</td>
            <td>$member->no_member</td>
            <td>".anchor('member/edit/'.$member->id, 'Edit')."
                ".anchor('member/delete/'.$member->id, 'Delete')."</td>
            </tr>";
    }?>
    </tbody>
</table>
<a href="http://localhost/12.codeigniter/apotek_client/member/create">+ Tambah data<a>
<a href="http://localhost/12.codeigniter/apotek_client/">+ Kembali<a>