<div class="columns">
cd <?php echo $_SERVER['DOCUMENT_ROOT']; ?>/wp-admin/<br>
chown <?php echo(exec("whoami")); ?>: plugin-install.php theme-install.php update.php<br>
cd	<?php echo $_SERVER['DOCUMENT_ROOT']; ?>/wp-content<br>
chown <?php echo(exec("whoami")); ?>: -R plugins/*<br>
</div>