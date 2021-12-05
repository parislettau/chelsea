<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <?php snippet('head/meta') ?>
  <?php snippet('head/assets') ?>    

</head>
<body 
   data-display="<?= $page->template() ?>" 
   class="<?php if($page->template() == 'exhibition'): ?>content-pane-open<?php endif ?>"
    style="background-image: url('<?= $site->background()->toFile()->url() ?>')"
    >
      <?php snippet('nav') ?>
      <?php snippet('home') ?>
      <?php snippet('menu') ?>
      <?php snippet('content-pane') ?>
