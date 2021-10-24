<?php
$title = $page->customTitle()->or($page->title() . ' | ' . '99%');
$description = $page->description()->or($site->description());
$thumbnail = (function () use ($page, $site) {
  $file = $page->thumbnail()->toFile() ?? $site->thumbnail()->toFile();
  return $file ? $file->resize(1200)->url() : '/img/android-chrome-512x512.png';
})();

?>

<title><?= $title ?></title>
<link rel="canonical" href="<?= $page->url() ?>">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
<meta charset="UTF-8">
<?php if($page->template() == 'review'): ?>
  <meta name="author" content="<?= $page->author() ?>">
<?php endif ?>

<!-- <meta name="description" content="<?= $site->text() ?>"> -->

<meta name="keywords" content="contemporary art, Melbourne, politics, populism">



<link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">

<meta property="og:url" content="<?= $page->url() ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= $title ?>">
<meta property="og:description" content="<?= $description ?>">
<meta property="og:image" content="<?= $thumbnail ?>">

<meta name="twitter:url" content="<?= $page->url() ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= $title ?>">
<meta name="twitter:description" content="<?= $description ?>">
<meta name="twitter:image" content="<?= $thumbnail ?>">

<meta name="theme-color" content="#41b883">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="apple-mobile-web-app-title" content="<?= $site->title() ?>">

<!-- <link rel="manifest" href="/manifest.json"> -->
<!-- <link rel="icon" href="/img/favicon.svg" type="image/svg+xml"> -->
<!-- <link rel="apple-touch-icon" href="/img/apple-touch-icon.png" sizes="180x180"> -->
