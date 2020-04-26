<?php
if (!defined('FLUX_ROOT')) exit;
?>

<div class="columns is-multiline">

	<div class="column is-4">
		<?php if ($session->isLoggedIn()) : ?>
			<div class="columns">
				<div class="column">
					<?php include $this->themePath('main/accountView.php', true) ?>
				</div>
			</div>
		<?php else : ?>
			<div class="columns">
				<div class="column">
					<?php include $this->themePath('main/login.php', true) ?>
				</div>
			</div>
		<?php endif ?>
	</div>

	<div class="column is-8">
		<?php include $this->themePath('main/announcement.php', true) ?>
	</div>

	<div class="column is-8">
		<?php include $this->themePath('main/slideshow.php', true) ?>
	</div>

	<div class="column is-4">
		<?php include $this->themePath('main/woe.php', true) ?>
	</div>

</div>