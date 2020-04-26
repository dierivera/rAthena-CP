<?php if (!empty($adminMenuItems) && Flux::config('AdminMenuNewStyle')): ?>
	<?php $mItems = array(); foreach ($adminMenuItems as $menuItem) $mItems[] = sprintf('<a href="%s">%s</a>', $menuItem['url'], $menuItem['name']) ?>
	<div class="loginbox-admin-menu">
		<strong>Admin</strong>: <?php echo implode(' &#9679; ', $mItems) ?>
	</div>
<?php endif ?>