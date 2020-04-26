<?php if (!defined('FLUX_ROOT')) exit; ?>
</div>
<!--box-->
</div>
<!--column-->
</div>
<!--columns-->
</div>
<!--container-->
</div>
<!--hero-body-->
<div class="hero-foot">
	<?php if ($hurtsky['enableSocialNetworkLink']) : ?>
		<div class="container">
			<div class="columns is-centered">
				<div class="column"></div>
				<div class="column">
					<nav id="connected" class="level">
						<div class="level-item">
							<p class="heading">GET CONNECTED WITH US</p>
						</div>
					</nav>
					<nav class="level">
						<?php if ($hurtsky['enableFacebookIcon']) : ?>
							<div class="level-item">
								<a class="icon is-large has-text-warning" href="<?php echo $hurtsky['facebookLink']; ?>" target="_blank">
									<i class="fab fa-facebook-square fa-3x"></i>
								</a>
							</div>
						<?php endif ?>

						<?php if ($hurtsky['enableDiscordIcon']) : ?>
							<div class="level-item">
								<a class="icon is-large has-text-warning" href="<?php echo $hurtsky['discordInviteLink']; ?>" target="_blank">
									<i class="fab fa-discord fa-3x"></i>
								</a>
							</div>
						<?php endif ?>

						<?php if ($hurtsky['enableTwitterIcon']) : ?>
							<div class="level-item">
								<a class="icon is-large has-text-warning" href="<?php echo $hurtsky['twitterLink']; ?>" target="_blank">
									<i class="fab fa-twitter-square fa-3x"></i>
								</a>
							</div>
						<?php endif ?>
					</nav>
				</div>
				<div class="column"></div>
			</div>
		</div>
	<?php endif ?>
	<nav id="footer">
		<div class="container">
			<p class="has-text-centered">
				<?php if (Flux::config('ShowCopyright')) : ?>
					Powered by <a class="has-text-warning" href="https://github.com/rathena/FluxCP" target="_blank">FluxCP</a>
				<?php endif ?>
				<?php if (Flux::config('ShowRenderDetails')) : ?>

					Page generated in <strong class="has-text-warning"><?php echo round(microtime(true) - __START__, 5) ?></strong> second(s).
					Number of queries executed: <strong class="has-text-warning"><?php echo (int) Flux::$numberOfQueries ?></strong>.
					<?php if (Flux::config('GzipCompressOutput')) : ?>Gzip Compression: <strong class="has-text-warning">Enabled</strong>.<?php endif ?>

				<?php endif ?>
				<?php if (count(Flux::$appConfig->get('ThemeName', false)) > 1) : ?>

					<span>Theme:
						<select name="preferred_theme" onchange="updatePreferredTheme(this)">
							<?php foreach (Flux::$appConfig->get('ThemeName', false) as $themeName) : ?>
								<option value="<?php echo htmlspecialchars($themeName) ?>" <?php if ($session->theme == $themeName) echo ' selected="selected"' ?>><?php echo htmlspecialchars($themeName) ?></option>
							<?php endforeach ?>
						</select>
					</span>
				<?php endif ?>
				<form action="<?php echo $this->urlWithQs ?>" method="post" name="preferred_theme_form" style="display: none">
					<input type="hidden" name="preferred_theme" value="" />
				</form>

			</p>
			<p class="has-text-centered">
				<?php echo $hurtsky['footerCopyrightTrademarkLable']; ?>
			</p>
			<p class="has-text-centered">
				<?php echo $hurtsky['footerCopyrightInitialDate']; ?> - <?php echo date("Y"); ?> <?php echo $hurtsky['yourServerName']; ?> All rights reserved.
			</p>
		</div>
	</nav>
	<nav class="level">
		<div class="level-left">
		</div>
		<div class="level-right">
			<div class="level-item">
				<span class="tag is-dark">
					<a class="has-text-white" href="https://github.com/hurtsky" target="_blank">Beautified by Hurtsky</a>
					<span class="icon is-dark">
						<img src="https://avatars3.githubusercontent.com/u/4039059?s=460&v=4">
					</span>
				</span>
			</div>
		</div>
	</nav>
</div>
</section>

<script type="text/javascript" src="<?php echo $this->themePath('js/jquery-3.4.1.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->themePath('js/extensions.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->themePath('js/carousel.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->themePath('js/init.js') ?>?v<?php echo time(); ?>"></script>
<script type="text/javascript" src="<?php echo $this->themePath('js/flux.datefields.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitip.js') ?>"></script>

<script type="text/javascript">
	function updatePreferredServer(sel) {
		var preferred = sel.options[sel.selectedIndex].value;
		document.preferred_server_form.preferred_server.value = preferred;
		document.preferred_server_form.submit();
	}

	function updatePreferredTheme(sel) {
		var preferred = sel.options[sel.selectedIndex].value;
		document.preferred_theme_form.preferred_theme.value = preferred;
		document.preferred_theme_form.submit();
	}

	// Preload spinner image.
	var spinner = new Image();
	spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>';

	function refreshSecurityCode(imgSelector) {
		$(imgSelector).attr('src', spinner.src);

		// Load image, spinner will be active until loading is complete.
		var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>;
		var image = new Image();
		image.src = "<?php echo $this->url('captcha') ?>" + (clean ? '?nocache=' : '&nocache=') + Math.random();

		$(imgSelector).attr('src', image.src);
	}

	function toggleSearchForm() {
		//$('.search-form').toggle();
		$('.search-form').slideToggle('fast');
	}
</script>

<?php if (Flux::config('EnableReCaptcha') && Flux::config('ReCaptchaTheme')) : ?>
	<script type="text/javascript">
		var RecaptchaOptions = {
			theme: '<?php echo Flux::config('ReCaptchaTheme') ?>'
		};
	</script>
<?php endif ?>

<script type="text/javascript">
	$(document).ready(function() {
		var inputs = 'input[type=text],input[type=password],input[type=file]';
		$(inputs).focus(function() {
			$(this).css({
				'background-color': '#f9f5e7',
				'border-color': '#dcd7c7',
				'color': '#726c58'
			});
		});
		$(inputs).blur(function() {
			$(this).css({
				'backgroundColor': '#ffffff',
				'borderColor': '#dddddd',
				'color': '#444444'
			}, 500);
		});
		$('.menuitem a').hover(
			function() {
				$(this).fadeTo(200, 0.85);
				$(this).css('cursor', 'pointer');
			},
			function() {
				$(this).fadeTo(150, 1.00);
				$(this).css('cursor', 'normal');
			}
		);
		$('.money-input').keyup(function() {
			var creditValue = parseInt($(this).val() / <?php echo Flux::config('CreditExchangeRate') ?>, 10);
			if (isNaN(creditValue))
				$('.credit-input').val('?');
			else
				$('.credit-input').val(creditValue);
		}).keyup();
		$('.credit-input').keyup(function() {
			var moneyValue = parseFloat($(this).val() * <?php echo Flux::config('CreditExchangeRate') ?>);
			if (isNaN(moneyValue))
				$('.money-input').val('?');
			else
				$('.money-input').val(moneyValue.toFixed(2));
		}).keyup();

		// In: js/flux.datefields.js
		processDateFields();
	});

	function reload() {
		window.location.href = '<?php echo $this->url ?>';
	}
</script>
</body>

</html>