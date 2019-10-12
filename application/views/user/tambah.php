<h3 class="center">Tambah User</h3>
<form action="<?= base_url() ?>user/create" method="POST">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <button type="submit" class="btn">Save</button>
</form>