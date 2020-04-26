<?php 
if (!defined('FLUX_ROOT')) exit;
?>

<div class="columns is-multiline is-centered is-gapless">

	<?php if($newstype == '1'):?>
	<?php if($news): ?>
	<div class="column is-12">
		<nav class="panel has-background-primary">
			<p class="panel-heading">
				Update List
			</p>
			<?php foreach($news as $nrow):?>
			<a class="panel-block" href="<?php echo $nrow->link ?>" target="_blank">
				<span class="panel-icon">
					<i class="fas fa-book" aria-hidden="true"></i>
				</span>
				Created on <?php echo date(Flux::config('DateFormat'),strtotime($nrow->created))?> :
				by <?php echo $nrow->author ?> - <?php echo $nrow->title ?>
			</a>
			<?php endforeach; ?>
		</nav>
	</div>
	<?php else: ?>
	<p>
		<?php echo htmlspecialchars(Flux::message('CMSNewsEmpty')) ?><br/><br/>
	</p>
	<?php endif ?>

	<?php elseif($newstype == '2'):?>
	<div class="column is-12">
		<nav class="panel has-background-primary">
			<p class="panel-heading">
				Update List
			</p>
			<?php if(isset($xml) && isset($xml->channel)): ?>
			<?php foreach($xml->channel->item as $rssItem): ?>
			<?php $i++; if($i <= $newslimit): ?>
			<a class="panel-block" href="<?php echo $rssItem->link ?>" target="_blank">
				<span class="panel-icon">
					<i class="fas fa-wrench" aria-hidden="true"></i>
				</span>
				Posted on <?php echo date(Flux::config('DateFormat'),strtotime($rssItem->pubDate))?> :
				<?php 
				$titleRSS = $rssItem->title;
				$titleRSS = explode(" ", $titleRSS);
				$titleRSS = array_slice($titleRSS, 0, $hurtsky["newsTitleLimit"]);
				$titleRSS = implode(" ", $titleRSS);
				echo $titleRSS;
				?>
			</a>
			<?php endif ?>
			<?php endforeach; ?>
		</nav>
	</div>
	<?php else: ?>
	<p>
		<?php echo htmlspecialchars(Flux::message('CMSNewsRSSNotFound')) ?><br/><br/>
	</p>
	<?php endif ?>
	<?php else: ?>
	<p>Setting not properly configured.</p>
	<?php endif ?>
</div>