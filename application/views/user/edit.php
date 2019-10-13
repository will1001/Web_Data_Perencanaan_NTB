<h3 class="center">Update User</h3>
<form action="<?= base_url() ?>user/update" method="POST">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="<?= $user['username']?>">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="<?= $user['password']?>">
    
    <input type="text" name="id" id="name" value="<?= $user['id']?>" hidden>
    <button type="submit" class="btn">Save</button>
</form>

<h6 class="center-align">{{ provinsi.nama = "" }}</h6><br>
<br><br>