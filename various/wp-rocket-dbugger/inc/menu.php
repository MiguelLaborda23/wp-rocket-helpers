<div class="menu">
<a href="tools.php?page=wprockettoolset&mode=rucss" class="button-<?php if($mode == 'rucss' || $mode == '') {echo 'primary';} else {echo 'secondary';}?>">RUCSS</a>
<a href="tools.php?page=wprockettoolset&mode=preload" class="button-<?php if($mode == 'preload') {echo 'primary';} else {echo 'secondary';}?>">Preload</a>
<a href="tools.php?page=wprockettoolset&mode=debug" class="button-<?php if($mode == 'debug') {echo 'primary';} else {echo 'secondary';}?>">WPR_DEBUG_LOG</a>
<a href="tools.php?page=wprockettoolset&mode=configs" class="button-<?php if($mode == 'configs') {echo 'primary';} else {echo 'secondary';}?>">Config Files</a>
<a href="tools.php?page=wprockettoolset&mode=phpinfo" class="button-<?php if($mode == 'phpinfo') {echo 'primary';} else {echo 'secondary';}?>">phpinfo()</a>
<a href="<?php echo get_site_url();?>/wp-cron.php?doing_wp_cron" target="_blank" class="button-secondary">Run WP-Cron </a>

</div>