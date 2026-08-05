<!DOCTYPE html>
rDominion/uqDominionProd/g
<html lang="<?php echo $sf_user->getCulture(); ?>"
rDominion/uqDominionProd/g
      dir="<?php echo sfCultureInfo::getInstance($sf_user->getCulture())->direction; ?>"
rDominion/uqDominionProd/g
      media="<?php echo isset($_GET['media']) ? htmlspecialchars($_GET['media'], ENT_QUOTES, 'UTF-8') : 'screen'; ?>">
rDominion/uqDominionProd/g
  <head>
rDominion/uqDominionProd/g
    <?php echo get_partial('default/googleAnalytics'); ?>
rDominion/uqDominionProd/g
    <meta charset="utf-8">
rDominion/uqDominionProd/g
    <meta name="viewport" content="width=device-width, initial-scale=1">
rDominion/uqDominionProd/g
    <?php include_title(); ?>
rDominion/uqDominionProd/g
    <?php echo get_component('default', 'tagManager', ['code' => 'script']); ?>
rDominion/uqDominionProd/g
    <?php if (file_exists($staticPath = sfConfig::get('app_static_path').DIRECTORY_SEPARATOR.'favicon.ico')) { ?>
rDominion/uqDominionProd/g
      <?php $faviconLoc = sfConfig::get('app_static_alias').'/favicon.ico'; ?>
rDominion/uqDominionProd/g
    <?php } else { ?>
rDominion/uqDominionProd/g
      <?php $faviconLoc = public_path('favicon.ico'); ?>
rDominion/uqDominionProd/g
    <?php } ?>
rDominion/uqDominionProd/g
    <link rel="shortcut icon" href="<?php echo $faviconLoc; ?>">
rDominion/uqDominionProd/g
    <%= htmlWebpackPlugin.tags.headTags %>
rDominion/uqDominionProd/g
    <?php echo get_component_slot('css'); ?>
rDominion/uqDominionProd/g
  </head>
rDominion/uqDominionProd/g
  <body class="d-flex flex-column min-vh-100 <?php echo $sf_context->getModuleName(); ?> <?php echo $sf_context->getActionName(); ?><?php echo sfConfig::get('app_show_tooltips') ? ' show-edit-tooltips' : ''; ?>">
rDominion/uqDominionProd/g
    <?php echo get_component('default', 'tagManager', ['code' => 'noscript']); ?>
rDominion/uqDominionProd/g
    <?php echo get_partial('header'); ?>
rDominion/uqDominionProd/g
    <?php include_slot('pre'); ?>
rDominion/uqDominionProd/g
