<?php if (!defined('FLUX_ROOT')) exit; ?>

<form action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="post">
	<?php if (count($serverNames) === 1): ?>
	<input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
	<?php endif ?>
	<input placeholder="username" type="text" name="username" id="login_username" value="<?php echo htmlspecialchars($params->get('username')) ?>" />&nbsp;<input placeholder="password" type="password" name="password" id="login_password" />
		
		<?php if (count($serverNames) > 1): ?>
			<label for="login_server"><?php echo htmlspecialchars(Flux::message('AccountServerLabel')) ?></label>

				<select name="server" id="login_server"<?php if (count($serverNames) === 1) echo ' disabled="disabled"' ?>>
					<?php foreach ($serverNames as $serverName): ?>
					<option value="<?php echo htmlspecialchars($serverName) ?>"><?php echo htmlspecialchars($serverName) ?></option>
					<?php endforeach ?>
				</select>

		<?php endif ?>
		
		<?php if (Flux::config('UseLoginCaptcha')): ?>
			<?php if (Flux::config('EnableReCaptcha')): ?>
			<label for="register_security_code"><?php echo htmlspecialchars(Flux::message('AccountSecurityLabel')) ?></label>
			<?php echo $recaptcha ?>
			<?php else: ?>
			<label for="register_security_code"><?php echo htmlspecialchars(Flux::message('AccountSecurityLabel')) ?></label>
			
				<div class="security-code">
					<img src="<?php echo $this->url('captcha') ?>" />
				</div>
				<input type="text" name="security_code" id="register_security_code" />
				<div style="font-size: smaller;" class="action">
					<strong><a href="javascript:refreshSecurityCode('.security-code img')"><?php echo htmlspecialchars(Flux::message('RefreshSecurityCode')) ?></a></strong>
				</div>
			
			<?php endif ?>
		<?php endif ?>
		<input type="submit" value="<?php echo htmlspecialchars(Flux::message('LoginButton')) ?>" />

</form>

<script type="text/javascript">
	jQuery.fn.placeholder();
</script>