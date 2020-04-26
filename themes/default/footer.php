<?php if (!defined('FLUX_ROOT')) exit; ?>
		
						</div> <!-- main end -->
					
					</div> <!-- wrapper main end -->
				
                    
                <div id="sidebar">
					
					<a href='?module=account&action=create'><img class="imageButton" src='<?php echo $this->themePath('img/register.png') ?>'/></a>
					<a href='?module=pages&action=content&path=download'><img class="imageButton" src='<?php echo $this->themePath('img/download.png') ?>'/></a>
					<a href='?module=voteforpoints'><img class="imageButton" src='<?php echo $this->themePath('img/vote.png') ?>'/></a>
                    <a href='/forum'><img class="imageButton" src='<?php echo $this->themePath('img/forum.png') ?>'/></a>

    				<br>
					<!-- Drawmove Logo, you can remove it =) -->
					<center>
					<a href='http://www.drawmove.net'><img src='<?php echo $this->themePath('img/drawmove.png') ?>' /></a>
					</center>
					<!-- End drawmove logo part -->
					
				</div>	<!-- sidebar -->
                
				<div style="clear:both;"></div>
            </div> <!-- col width after content -->
			
			
			</div> <!-- content end -->			
			
			<div id="footer" style="background-image: url('<?php echo $this->themePath('img/bg.jpg'); ?>');">
				<div id="copyright">
					<?php if (Flux::config('ShowCopyright')): ?>
							<p>
							<strong>Powered by rA's Flux Control Panel (<?php echo htmlspecialchars(Flux::VERSION) ?>)</strong>
							&mdash; Copyright &copy; 2008-2012, Matthew Harris, Nikunj Mehta, and Xantara.
							</p>
						
					<?php endif ?>
					
                            
					<!-- DrawMove copyright, we appreciate if you keep it, but there's no obligation. :D -->
					<p>
						Free Design by <strong><a href="http://www.drawmove.net">www.drawmove.net</a></strong>, KamiShi, ArkReika.
					<p>
					<!-- Drawmove Copyright End -->
                    
                    
					
					<!-- DrawMove hidden box no-one will see, please KEEP IT, it's not visible! è_é -->
					<p style='display:none;'>
						<a href='http://www.drawmove.net'>http://www.drawmove.net</a>
					</p>
					<!-- DrawMove hidden box -->
					
				</div> <!-- copyright end -->
				
			<?php if (Flux::config('ShowRenderDetails')): ?>
				<div id="renderDetails">
					<p>
						Page generated in <strong><?php echo round(microtime(true) - __START__, 5) ?></strong> second(s).
						Number of queries executed: <strong><?php echo (int)Flux::$numberOfQueries ?></strong>.
						<?php if (Flux::config('GzipCompressOutput')): ?>Gzip Compression: <strong>Enabled</strong>.<?php endif ?>
					</p>
				</div>
			<?php endif ?>
			
			<div> <!-- footer end -->
		</div> <!-- wrapper end -->
	
	</body>
</html>
