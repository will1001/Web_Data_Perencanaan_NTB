<div id="app2"> 
    <h3>Tabel User</h3>
    <p><a href="<?=base_url()?>user/create" class="btn">Tambah user</a></p>
    <table class="table">
    <tr>
                <th>username</th>
                <th>role</th>
                <th></th>
            </tr>
        <?php foreach ($users as $user) {?>
            <tr>
                <td><?= $user['username']?></td>
                <td><?php 
                    if($user['role_id'] == 1){
                        echo "Admin";
                    }else{
                        echo "User";
                    }
                ?></td>
                <td class="right">
                <?php if($user['role_id'] == 2):?>
                    <a href="<?=base_url().'user/update?id='.$user['id']?>" class="btn">Edit</a>
                    <a href="<?=base_url().'user/delete?id='.$user['id']?>" class="btn">Hapus</a>
                <?php endif; ?>
                </td>
            </tr>
        <?php }?>
    </table>
</div>
<h6 class="center-align">{{ provinsi.nama = "" }}</h6><br>
<br><br>

<?php
  $this->load->view('templates/footer');
?>

