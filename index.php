<?php include_once 'config/init.class.php'; ?>

<?php
$template = new Template('templates/frontpage.php');

$template->title = 'Latest Jobs';
echo $template;