<div>
    <p><strong>ENTER YOUR E-MAIL TO RESET YOUR PASSWORD</strong></p>
    <?php echo validation_errors(); ?>
    <?php echo form_open(base_url().'index.php/users/change_pwd');?>
    <p><label>Username:</label><br />
    <p><input type="text" name="username" /></p>
    <br>
    <p><label>Password:</label><br />
    <p><input type="password" name="password" /></p>
    <br>
    <p><label>Confirm Password:</label><br />
    <p><input type="password" name="conf_password"/></p>
    <br>
    <input type="submit" value="Reset" />
    </form>
</div>
<?php echo form_close();?>
</div>