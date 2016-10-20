<style>
	#under-strap-custom td a {color: #333; font-size: 1.2em; font-weight: bold; line-height: 1.8em; text-decoration: none;}
	<?php if ( get_option('color') ): ?>
	#under-strap-custom td.<?php echo get_option('color'); ?> {background: #666; color: #fff;}
	#under-strap-custom td.<?php echo get_option('color'); ?> a {color: #fff;}
	<?php endif; ?>
</style>

<div id="icon-themes" class="icon32"></div>

<h1><?php echo esc_attr__( 'Theme Options' ); ?></h1>

<?php if ( get_option('color') ): ?>
<p>Theme of the currently selected is "<b><?php echo ucfirst(get_option('color')); ?></b>".</p>
<?php else: ?>
<p>Please select a theme.</p>
<?php endif; ?>

<div class="wrap">
	<table id="under-strap-custom" width="100%" cellpadding="10" cellspacing="0" border="0">
		<tr>
			<td width="100%" class="default" colspan="4">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=default">Default</a>
			</td>
		</tr>
		<tr>
			<td width="25%" class="cerulean">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=cerulean">
					Cerulean<br />
					<img width="100%" src="https://bootswatch.com/cerulean/thumbnail.png" alt="cerulean thumbnail">
				</a>
			</td>
			<td width="25%" class="cosmo">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=cosmo">
					Cosmo<br />
					<img width="100%" src="https://bootswatch.com/cosmo/thumbnail.png" alt="cosmo thumbnail">
				</a>
			</td>
			<td width="25%" class="cyborg">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=cyborg">
					Cyborg<br />
					<img width="100%" src="https://bootswatch.com/cyborg/thumbnail.png" alt="cyborg thumbnail">
				</a>
			</td>
			<td width="25%" class="darkly">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=darkly">
					Darkly<br />
					<img width="100%" src="https://bootswatch.com/darkly/thumbnail.png" alt="darkly thumbnail">
				</a>
			</td>
		</tr>
		<tr>
			<td width="25%" class="flatly">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=flatly">
					Flatly<br />
					<img width="100%" src="https://bootswatch.com/flatly/thumbnail.png" alt="flatly thumbnail">
				</a>
			</td>
			<td width="25%" class="journal">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=journal">
					Journal<br />
					<img width="100%" src="https://bootswatch.com/journal/thumbnail.png" alt="journal thumbnail">
				</a>
			</td>
			<td width="25%" class="lumen">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=lumen">
					Lumen<br />
					<img width="100%" src="https://bootswatch.com/lumen/thumbnail.png" alt="lumen thumbnail">
				</a>
			</td>
			<td width="25%" class="paper">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=paper">
					Paper<br />
					<img width="100%" src="https://bootswatch.com/paper/thumbnail.png" alt="paper thumbnail">
				</a>
			</td>
		</tr>
		<tr>
			<td width="25%" class="readable">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=readable">
					Readable<br />
					<img width="100%" src="https://bootswatch.com/readable/thumbnail.png" alt="readable thumbnail">
				</a>
			</td>
			<td width="25%" class="sandstone">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=sandstone">
					Sandstone<br />
					<img width="100%" src="https://bootswatch.com/sandstone/thumbnail.png" alt="sandstone thumbnail">
				</a>
			</td>
			<td width="25%" class="simplex">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=simplex">
					Simplex<br />
					<img width="100%" src="https://bootswatch.com/simplex/thumbnail.png" alt="simplex thumbnail">
				</a>
			</td>
			<td width="25%" class="slate">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=slate">
					Slate<br />
					<img width="100%" src="https://bootswatch.com/slate/thumbnail.png" alt="slate thumbnail">
				</a>
			</td>
		</tr>
		<tr>
			<td width="25%" class="spacelab">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=spacelab">
					Spacelab<br />
					<img width="100%" src="https://bootswatch.com/spacelab/thumbnail.png" alt="spacelab thumbnail">
				</a>
			</td>
			<td width="25%" class="superhero">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=superhero">
					Superhero<br />
					<img width="100%" src="https://bootswatch.com/superhero/thumbnail.png" alt="superhero thumbnail">
				</a>
			</td>
			<td width="25%" class="united">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=united">
					United<br />
					<img width="100%" src="https://bootswatch.com/united/thumbnail.png" alt="united thumbnail">
				</a>
			</td>
			<td width="25%" class="yeti">
				<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=functions.php&color=yeti">
					Yeti<br />
					<img width="100%" src="https://bootswatch.com/yeti/thumbnail.png" alt="yeti thumbnail">
				</a>
			</td>
		</tr>
	</table>
</div>

