<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php include $this->themePath('src/woe.php', true) ?>

<?php if ($woeTimes) : ?>
	<div id="woeSchedule" class="notification is-primary">
		<img class="is-image-responsive" src="<?php echo $this->themePath('img/woe.gif', true) ?>" alt="Logo">
		<?php foreach ($woeTimes as $serverName => $times) : ?>
			<?php foreach ($times as $time) : ?>
				<div class="columns is-mobile is-centered">
					<div class="column">
						<div class="notification is-link has-text-centered">
							<?php echo htmlspecialchars($time['startingDay']) ?>
							<?php echo htmlspecialchars($time['startingHour']) ?> -
							<?php echo htmlspecialchars($time['endingHour']) ?>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		<?php endforeach ?>
	</div>
<?php else : ?>
	<p><?php echo htmlspecialchars(Flux::message('WoeNotScheduledInfo')) ?></p>
<?php endif ?>