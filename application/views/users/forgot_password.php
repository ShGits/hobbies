<div>
    <p><strong>FORGOT PASSWORD?</strong></p>
    <?php echo validation_errors(); ?>
<?php echo form_open(base_url().'index.php/users/forgot_password'); ?>
<p><label>E-mail:</label><br />
<p><input type="text" name="email" class="textFld" /></p>
<br>
<input type="submit" value="Submit" />
</form>
</div>
<?php echo form_close();?>
</div>