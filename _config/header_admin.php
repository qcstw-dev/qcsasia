<?php
$root = '../';

if ($page == 'home') $root = '';

echo '<h1><a href="'.$root.'index.php" accesskey="4">'.SITE_NAME.'</a></h1>
<span id="tagline">Information Management</span>';
?>