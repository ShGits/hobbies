<div>
<p><strong>Login</strong></p>
<form method="post" action="<?php echo base_url(); ?>.index.php/users/login">
<p><input type="text" name="username" value="username" /></p>
<p><input type="password" name="password" value="password" /></p>
<input type="submit" value=" Login" />
<p><a href="/<?php echo base_url(); ?>.index.php/users/forgot_pwd">Forgot Password?</a></p>
<!--<?php echo form_close();?>-->