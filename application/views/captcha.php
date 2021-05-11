<html>
<head>
<title>Adding a Captcha!</title>
</head>
<body>
<script>
    
       setTimeout(function(){ window.location = "http://localhost/codeIgniter_captcha/"; },180000);
   
</script>

<?php echo form_open('captcha'); ?>
<div class="formSignIn" >
  
  <div class="form-group">
    <input autocomplete="off" type="text" id="name" name="name" placeholder="Enter Name" value="<?php echo set_value('name'); ?>" />
    <span class="required-server"><?php echo form_error('name','<p style="color:red">','</p>'); ?></span> 
  </div><br>  

  <div class="form-group">
    <input autocomplete="off" type="text" id="email" name="email" placeholder="Enter Email" value="<?php echo set_value('email'); ?>" />
    <span class="required-server"><?php echo form_error('email','<p style="color:red">','</p>'); ?></span> 
  </div><br>  

  <div class="form-group">
    <input autocomplete="off" type="date" id="dob" name="dob" placeholder="Date Of Birth" value="<?php echo set_value('dob'); ?>" />
    <span class="required-server"><?php echo form_error('dob','<p style="color:red">','</p>'); ?></span> 
  </div><br>

  <div class="form-group">
    <input autocomplete="off" type="text" id="about" name="about" placeholder="About yourself" value="<?php echo set_value('about'); ?>" />
    <span class="required-server"><?php echo form_error('about','<p style="color:red">','</p>'); ?></span> 
	</div><br>

  <div class="form-group">
    <label for="captcha"><?php echo $captcha['image']; ?></label>
    <br>
    <input type="text" autocomplete="off" name="userCaptcha" placeholder="Enter captcha" value="<?php if(!empty($userCaptcha)){ echo $userCaptcha;} ?>" />
    <span class="required-server"><?php echo form_error('userCaptcha','<p style="color:red">','</p>'); ?></span> 
	</div><br>

  <div class="form-group">
    <input type="submit" class="btn btn-success" value="Sign In" name="" />
  </div>

</div>
<?php echo form_close(); ?>
</body>
</html>