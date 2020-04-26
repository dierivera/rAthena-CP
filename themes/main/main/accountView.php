<?php 
if (!defined('FLUX_ROOT')) exit;
include $this->themePath('src/accountView.php', true);
?>

<?php if (!empty($errorMessage)): ?>
<div class="notification is-danger">
	<button class="delete"></button>
	<?php echo htmlspecialchars($errorMessage) ?>
</div>
<?php endif ?>

<?php if ($account): ?>
<?php if (Flux::config('PincodeEnabled') && $session->account->pincode == NULL): ?>
<div class="notification is-danger">
	<button class="delete"></button>
	There is no pincode set! Please login via the game client now to secure your account
</div>
<?php endif ?>

<div class="notification is-info">
	<h2 class="title is-2 has-text-black">Your Account</h2>
	<h1 class="title is-4">
		<?php echo htmlspecialchars(Flux::message('EmailAddressLabel')) ?>
	</h1>
	<h2 class="subtitle">
	<?php if ($account->email): ?>
	<?php if ($auth->actionAllowed('account', 'index')): ?>
	<?php echo $this->linkToAccountSearch(array('email' => $account->email), $account->email) ?>
	<?php else: ?>
		<?php echo htmlspecialchars($account->email) ?>
	<?php endif ?>
	<?php else: ?>
		<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
	<?php endif ?>
	</h2>
	
	<h1 class="title is-4">
		<?php echo htmlspecialchars(Flux::message('GenderLabel')) ?>
	</h1>
	<h2 class="subtitle">
	<?php if ($gender = $this->genderText($account->sex)): ?>
	<?php echo $gender ?>
	<?php else: ?>
		<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('UnknownLabel')) ?></span>
	<?php endif ?>
	</h2>
	
	<h1 class="title is-4">
		<?php echo htmlspecialchars(Flux::message('LoginCountLabel')) ?>
	</h1>
	<h2 class="subtitle">
		<?php echo number_format((int)$account->logincount) ?>
	</h2>
	
	<h1 class="title is-4">
		<?php echo htmlspecialchars(Flux::message('CreditBalanceLabel')) ?>
	</h1>
	<h2 class="subtitle">
	<?php echo number_format((int)$account->balance) ?>
	<?php if ($auth->allowedToDonate && $isMine): ?>
		<a href="<?php echo $this->url('donate') ?>"><?php echo htmlspecialchars(Flux::message('AccountViewDonateLink')) ?></a>
	<?php endif ?>
	</h2>
	
	<h1 class="title is-4">
		<?php echo htmlspecialchars(Flux::message('VIPStateLabel')) ?>
	</h1>
	<h2 class="subtitle">
		<?php echo $vipexpires ?>
	</h2>
	
	<h1 class="title is-4">
		<?php echo htmlspecialchars(Flux::message('LastLoginDateLabel')) ?>
	</h1>
	<h2 class="subtitle">
	<?php if (!$account->lastlogin || $account->lastlogin <= '1000-01-01 00:00:00'): ?>
		<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NeverLabel')) ?></span>
	<?php else: ?>
	<?php echo $this->formatDateTime($account->lastlogin) ?>
	<?php endif ?>
	</h2>
	
	<div class="notification is-warning">
		<a href="<?php echo $this->url('account', 'logout') ?>">
			<div class="has-text-centered">
				LOGOUT
			</div>
		</a>
	</div>

</div>

<div class="notification is-info">
	<?php foreach ($characters as $serverName => $chars): $zeny = 0; ?>
	<?php if ($chars): ?>
	<?php foreach ($chars as $char): $zeny += $char->zeny; ?>
	<h1 class="title is-marginless is-paddingless">
		<?php if ($auth->actionAllowed('character', 'view') && ($isMine || (!$isMine && $auth->allowedToViewCharacter))): ?>
		<?php echo $this->linkToCharacter($char->char_id, $char->name, $serverName) ?>
		<?php else: ?>
		<?php echo htmlspecialchars($char->name) ?>
		<?php endif ?>
	</h1>
	<p class="subtitle is-marginless is-paddingless">
		<?php echo htmlspecialchars($this->jobClassText($char->class)) ?>
		Blvl:<?php echo (int)$char->base_level ?> - Jlvl:<?php echo (int)$char->job_level ?>
	</p>
	<p class="subtitle is-marginless is-paddingless">
		ZENY: <?php echo number_format((int)$char->zeny) ?>
	</p>
	<p class="subtitle is-marginless is-paddingless">
		GUILD: 
		<?php if ($char->guild_name): ?>
		<?php if ($char->guild_emblem_len): ?>
		<img src="<?php echo $this->emblem($char->guild_id) ?>" />
		<?php endif ?>
		<?php echo htmlspecialchars($char->guild_name) ?>
		<?php else: ?>	
		<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
		<?php endif ?>
	</p>
	<p class="subtitle is-marginless is-paddingless">
		<?php if ($char->online): ?>
		<span class="online"><?php echo htmlspecialchars(Flux::message('OnlineLabel')) ?></span>
		<?php else: ?>
		<span class="offline"><?php echo htmlspecialchars(Flux::message('OfflineLabel')) ?></span>
		<?php endif ?>
	</p>
	<?php endforeach ?>
	
	<div class="notification is-warning">
		<div class="has-text-centered">
			Total Zeny: <?php echo number_format($zeny) ?>
		</div>
	</div>
	
	<?php else: ?>
	<p><?php echo htmlspecialchars(sprintf(Flux::message('AccountViewNoChars'), $serverName)) ?></p>
	<?php endif ?>
	<?php endforeach ?>
	
	<?php else: ?>
	<p>
		<?php echo htmlspecialchars(Flux::message('AccountViewNotFound')) ?>
	</p>
	<?php endif ?>
</div>

