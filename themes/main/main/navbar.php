<?php if (!defined('FLUX_ROOT')) exit; ?>

<nav class="navbar has-background-custom1">
	<div class="container">
		<div class="navbar-brand">
			<a class="navbar-item has-text-white" href="./"><strong><?php echo Flux::config('SiteTitle'); ?></strong></a>
			<span class="navbar-burger burger" data-target="navbarMenuHeroC">
				<span></span>
				<span></span>
				<span></span>
			</button>
		</div>
		<div id="navbarMenuHeroC" class="navbar-menu">
			<div class="navbar-end">
			<?php $menuItems = $this->getMenuItems(); ?>
			<?php if (!empty($menuItems)): ?>
			<?php foreach ($menuItems as $menuCategory => $menus): ?>
			<?php if (!empty($menus)): ?>
				<div class="navbar-item has-dropdown is-hoverable">
					<div class="navbar-item">
						<a href="#" class="has-text-white">
							<strong><?php echo htmlspecialchars(Flux::message($menuCategory)) ?></strong>
						</a>
						<a class="icon is-small has-text-white">
							<i class="fas fa-angle-down" aria-hidden="true"></i>
						</a>
					</div>
					<div class="navbar-dropdown is-boxed">
					<?php foreach ($menus as $menuItem):  ?>
						<a href="<?php echo $menuItem['url'] ?>" class="dropdown-item">
							<?php echo htmlspecialchars(Flux::message($menuItem['name'])) ?>
						</a>
					<?php endforeach ?>
					</div>
				</div>
			<?php endif ?>
			<?php endforeach ?>
			<?php endif ?>
			
			</div>
		</div>
	</div>
</nav>
