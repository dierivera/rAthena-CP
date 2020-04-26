<?php 
if (!defined('FLUX_ROOT')) exit;
?>
<h2 class="title"><?php echo htmlspecialchars(Flux::message('CMSNewsHeader')) ?></h2>

<?php if($newstype == '1'):?>
<?php if($news): ?>
<?php foreach($news as $nrow):?>
<div class="column">
	<div class="card">
		<header class="card-header">
			<h2><?php echo $nrow->title ?></h2>
		</header>
		<div class="card-content">
			<div class="content">
				<div class="newsCont">
					<p><?php echo $nrow->body ?></p>
					<?php if($nrow->created != $nrow->modified && Flux::config('CMSDisplayModifiedBy')):?>
						<small><?php echo htmlspecialchars(Flux::message('CMSModifiedLabel')) ?> : <?php echo date('m-d-y',strtotime($nrow->modified))?></small>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<footer class="card-footer">
		<?php if($nrow->link): ?>
			<a class="card-footer-item" href="<?php echo $nrow->link ?>"><small><?php echo htmlspecialchars(Flux::message('CMSNewsLink')) ?></small></a>
			<a class="card-footer-item"><small>by <?php echo $nrow->author ?></small></a>
			<a class="card-footer-item"><small><?php echo date(Flux::config('DateFormat'),strtotime($nrow->created))?></small></a>
		<?php endif; ?>
		</footer>
	</div>
</div>
<?php endforeach; ?> 
<?php else: ?>
<p>
	<?php echo htmlspecialchars(Flux::message('CMSNewsEmpty')) ?><br/><br/>
</p>
<?php endif ?>

<?php elseif($newstype == '2'):?>
<div class="colums">
<?php if(isset($xml) && isset($xml->channel)): ?>
<?php foreach($xml->channel->item as $rssItem): ?>
<?php $i++; if($i <= $newslimit): ?>
<div class="column is-3">
	<div class="card">
		<header class="card-header">
			<h2>
			<?php 
				$titleRSS = $rssItem->title;
				$titleRSS = explode(" ", $titleRSS);
				$titleRSS = array_slice($titleRSS, 0, $hurtsky["newsTitleLimit"]);
				$titleRSS = implode(" ", $titleRSS);
				echo $titleRSS;
			?>
			</h2>
		</header>
		<div class="card-content">
			<div class="content">
				<div class="newsCont">
					<p>
					<?php 
						$desc = $rssItem->description;
						$desc = explode(" ", $desc);
						$desc = array_slice($desc, 0, $hurtsky["newsContentLimit"]);
						$desc = implode(" ", $desc);
						echo $desc;
					?>
					</p>
				</div>
			</div>
		</div>
		<footer class="card-footer">
			<a class="news_link" href="<?php echo $rssItem->link ?>"><small><?php echo htmlspecialchars(Flux::message('CMSNewsLink')) ?></small></a>
			<a class="newsDate"><small>Posted on <?php echo date(Flux::config('DateFormat'),strtotime($rssItem->pubDate))?></small></a>
		</footer>
	</div>
</div>
<?php endif ?>
<?php endforeach; ?>
<?php else: ?>
<p>
	<?php echo htmlspecialchars(Flux::message('CMSNewsRSSNotFound')) ?><br/><br/>
</p>
</div>
<?php endif ?>
<?php else: ?>
<p>Setting not properly configured.</p>
<?php endif ?>
