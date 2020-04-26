<?php
if (!defined('FLUX_ROOT')) exit;
include $this->themePath('src/login.php', true);
?>
<div class="card">

	<div class="card-image">
		<img class="is-image-responsive" src="<?php echo $this->themePath('img/login_card.jpg', true) ?>" alt="Logo">
	</div>
	<div class="card-content">
		<div class="has-text-centered">

			<?php if (isset($errorMessage)) : ?>
				<div class="notification is-danger">
					<button class="delete"></button>
					<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
				</div>
			<?php else : ?>

			<?php endif ?>
			<form id="login-form" action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="post">
				<?php if (count($serverNames) === 1) : ?>
					<div class="field">
						<div class="control">
							<input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
						</div>
					</div>
				<?php endif ?>

				<div class="field">
					<div class="control has-icons-left">
						<input class="input" type="text" name="username" id="login_username" value="<?php echo htmlspecialchars($params->get('username')) ?>" placeholder="<?php echo htmlspecialchars(Flux::message('AccountUsernameLabel')) ?>">
						<span class="icon is-small is-left">
							<i class="fas fa-id-badge"></i>
						</span>
					</div>
				</div>

				<div class="field">
					<div class="control has-icons-left">
						<input class="input" type="password" name="password" id="login_password" placeholder="<?php echo htmlspecialchars(Flux::message('AccountPasswordLabel')) ?>">
						<span class="icon is-small is-left">
							<i class="fas fa-lock"></i>
						</span>
					</div>
				</div>

				<?php if (count($serverNames) > 1) : ?>
					<div class="select">
						<select name="server" id="login_server" <?php if (count($serverNames) === 1) echo ' disabled="disabled"' ?>>
							<?php foreach ($serverNames as $serverName) : ?>
								<option value="<?php echo htmlspecialchars($serverName) ?>"><?php echo htmlspecialchars($serverName) ?></option>
							<?php endforeach ?>
						</select>
					</div>
				<?php endif ?>

				<?php if (Flux::config('UseLoginCaptcha')) : ?>
					<?php if (Flux::config('EnableReCaptcha')) : ?>
						<button class="g-recaptcha button is-block is-info is-medium is-fullwidth" data-sitekey="<?php echo $recaptcha ?>" data-callback="onSubmit" type="submit" value="<?php echo htmlspecialchars(Flux::message('LoginButton')) ?>">
							<?php echo htmlspecialchars(Flux::message('LoginButton')) ?>
						</button>
					<?php else : ?>
						<div class="field">
							<label for="register_security_code"><?php echo htmlspecialchars(Flux::message('AccountSecurityLabel')) ?></label>
							<div class="security-code">
								<img src="<?php echo $this->url('captcha') ?>" />
							</div>
							<input type="text" name="security_code" id="register_security_code" />
							<div style="font-size: smaller;" class="action">
								<strong><a href="javascript:refreshSecurityCode('.security-code img')"><?php echo htmlspecialchars(Flux::message('RefreshSecurityCode')) ?></a></strong>
							</div>
						</div>
						<button class="button is-block is-info is-medium is-fullwidth" type="submit" value="<?php echo htmlspecialchars(Flux::message('LoginButton')) ?>">
							<?php echo htmlspecialchars(Flux::message('LoginButton')) ?>
						</button>
					<?php endif ?>
				<?php else : ?>
					<button class="button is-block is-info is-large is-fullwidth" type="submit" value="<?php echo htmlspecialchars(Flux::message('LoginButton')) ?>">
						<?php echo htmlspecialchars(Flux::message('LoginButton')) ?>
					</button>
				<?php endif ?>
			</form>
		</div>
	</div>
</div>