<?php if (!defined('FLUX_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php if (isset($metaRefresh)): ?>
		<meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
		<?php endif ?>
		<title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link href="<?php echo $this->themePath('css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php if (Flux::config('EnableReCaptcha')): ?>
		<link href="<?php echo $this->themePath('css/flux/recaptcha.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		
       	<?php endif ?>

      
		<script type="text/javascript" src="<?php echo $this->themePath('js/jquery-1.8.3.min.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.datefields.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitip.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/drawmove.monsterdevil_.js') ?>"></script>

				
		<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux/ie.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<![endif]-->	
		
		<!--[if lt IE 9]>
		<script src="<?php echo $this->themePath('js/ie9.js') ?>" type="text/javascript"></script>
		<![endif]-->
		
		<!--[if lt IE 6]>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitpngfix.js') ?>"></script>
		<![endif]-->
		
		<script type="text/javascript">
			jQuery(document).ready(function(){
				var inputs = 'input[type=text],input[type=password],input[type=file]';
				jQuery(inputs).focus(function(){
					jQuery(this).css({
						'background-color': '#f9f5e7',
						'border-color': '#dcd7c7',
						'color': '#726c58'
					});
				});
				jQuery(inputs).blur(function(){
					jQuery(this).css({
						'backgroundColor': '#ffffff',
						'borderColor': '#dddddd',
						'color': '#444444'
					}, 500);
				});
				jQuery('.menuitem a').hover(
					function(){
						jQuery(this).fadeTo(200, 0.85);
						jQuery(this).css('cursor', 'pointer');
					},
					function(){
						jQuery(this).fadeTo(150, 1.00);
						jQuery(this).css('cursor', 'normal');
					}
				);
				jQuery('.money-input').keyup(function() {
					var creditValue = parseInt(jQuery(this).val() / <?php echo Flux::config('CreditExchangeRate') ?>, 10);
					if (isNaN(creditValue))
						jQuery('.credit-input').val('?');
					else
						jQuery('.credit-input').val(creditValue);
				}).keyup();
				jQuery('.credit-input').keyup(function() {
					var moneyValue = parseFloat(jQuery(this).val() * <?php echo Flux::config('CreditExchangeRate') ?>);
					if (isNaN(moneyValue))
						jQuery('.money-input').val('?');
					else
						jQuery('.money-input').val(moneyValue.toFixed(2));
				}).keyup();
				
				// In: js/flux.datefields.js
				processDateFields();
			});
			
			function reload(){
				window.location.href = '<?php echo $this->url ?>';
			}
		</script>
		
		<script type="text/javascript">
			function updatePreferredServer(sel){
				var preferred = sel.options[sel.selectedIndex].value;
				document.preferred_server_form.preferred_server.value = preferred;
				document.preferred_server_form.submit();
			}
			
			// Preload spinner image.
			var spinner = new Image();
			spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>';
			
			function refreshSecurityCode(imgSelector){
				jQuery(imgSelector).attr('src', spinner.src);
				
				// Load image, spinner will be active until loading is complete.
				var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>;
				var image = new Image();
				image.src = "<?php echo $this->url('captcha') ?>"+(clean ? '?nocache=' : '&nocache=')+Math.random();
				
				jQuery(imgSelector).attr('src', image.src);
			}
			function toggleSearchForm()
			{
				//jQuery('.search-form').toggle();
				jQuery('.search-form').slideToggle('fast');
			}
		</script>
		
		<?php if (Flux::config('EnableReCaptcha') && Flux::config('ReCaptchaTheme')): ?>
		<script type="text/javascript">
			 var RecaptchaOptions = {
			    theme : '<?php echo Flux::config('ReCaptchaTheme') ?>'
			 };
		</script>
		<?php endif ?>
		
	</head>
	
	
	<body>
		
		<div id="wrapper">
			
			<div id="header" style="background-image: url('<?php echo $this->themePath('img/bg.jpg'); ?>');">
				<div id="topbar">
					<div id="toppanel">
						<div class="statusInfo">Server: <a id="server"  class="<?php echo $serverOnline; ?>" href="<?php echo $this->url('server', 'status'); ?>"><?php echo $serverOnline; ?></a></div>
						<div class="statusInfo">Players: <a id="players" href="<?php echo $this->url('character', 'online'); ?>"><?php echo $onlinePlayersCount; ?></a> </div>
                        <div class="statusInfo">WoE: <a id="woeUp" class="<?php echo $woeUp; ?>"href="<?php echo $this->url('woe', 'index'); ?>"><?php echo $woeUp; ?></a> </div>

                    </div> <!-- toppanel -->
				</div> <!-- topbar -->
				
				<div class="colwidth">
					
					
					<div id="logo">
							<a href="<?php echo $this->basePath ?>">
								<img src='<?php echo $this->themePath('img/logo.png') ?>' />
							</a>
					</div> <!-- logo -->
					
					<div id="monsterdevil">
						
					</div> <!-- drawmove canvas -->
				</div> <!-- colwidth -->
		
			</div> <!-- header -->
		
		<div id="menu" style="background-image: url('<?php echo $this->themePath('img/menufond.png'); ?>');">
			<div class="colwidth">
				<ul>
					<!--------------------------------------->
					<!-- Top Menu, You may add links here! -->
					<!--------------------------------------->
					<li><a href='?module=news&action=view'><b>News</b></a></li>
					<li><a href='?module=server&action=info'>Informations</a></li>
					<li><a href='?module=donate'>Donation</a></li>
					<li><a href='?module=pages&action=content&path=staff'>Staff</a></li>
					<!--------------------------------------->

				</ul>
				
				<div id="loginbox">
					<?php if ($session->isLoggedIn()): ?>
						<?php include ('main/loginbox.php'); ?>
					<?php else:?>
						<?php include ('main/loginsmall.php'); ?>
					<?php endif?>
				</div> <!-- login box -->
				 
			</div> <!-- col width menu -->
		</div>	 <!-- menu -->
		
		<div id="content" style="background-image: url('<?php echo $this->themePath('img/deggreysite.png'); ?>');">
			
			<div class="colwidth">
		
                                
                <?php include 'main/sidebar.php' ?>

				<div id="wrapperMain">
				
					<!-- admin menu -->
					<?php include 'main/adminmenu.php' ?>
	
					<div id="main">
						
						<?php if (Flux::config('DebugMode') && @gethostbyname(Flux::config('ServerAddress')) == '127.0.0.1'): ?>
							<p class="notice">Please change your <strong>ServerAddress</strong> directive in your application config to your server's real address (e.g., myserver.com).</p>
						<?php endif ?>
						
						<!-- Messages -->
						<?php if ($message=$session->getMessage()): ?>
							<p class="message"><?php echo htmlspecialchars($message) ?></p>
						<?php endif ?>
						
						<!-- Sub menu -->
						<?php include 'main/submenu.php' ?>
						
						<!-- Page menu -->
						<?php include 'main/pagemenu.php' ?>
						
						<!-- Credit balance -->
						<?php if (in_array($params->get('module'), array('donate', 'purchase'))) include 'main/balance.php' ?>
		
