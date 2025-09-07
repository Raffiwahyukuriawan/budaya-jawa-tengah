<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>Login</h2>
<?php if($this->session->flashdata('error')) echo $this->session->flashdata('error'); ?>
<form method="post" action="<?= site_url('auth/login') ?>">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
</body>
</html>
