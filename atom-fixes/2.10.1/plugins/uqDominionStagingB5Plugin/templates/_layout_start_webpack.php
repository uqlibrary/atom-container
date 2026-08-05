<!DOCTYPE html>
rDominion/uqDominionStaging/g
<html lang="<?php echo $sf_user->getCulture(); ?>"
rDominion/uqDominionStaging/g
      dir="<?php echo sfCultureInfo::getInstance($sf_user->getCulture())->direction; ?>"
rDominion/uqDominionStaging/g
      media="<?php echo isset($_GET['media']) ? htmlspecialchars($_GET['media'], ENT_QUOTES, 'UTF-8') : 'screen'; ?>">
rDominion/uqDominionStaging/g
  <head>
rDominion/uqDominionStaging/g
    <?php echo get_partial('default/googleAnalytics'); ?>
rDominion/uqDominionStaging/g
    <meta charset="utf-8">
rDominion/uqDominionStaging/g
    <meta name="viewport" content="width=device-width, initial-scale=1">
rDominion/uqDominionStaging/g
    <?php include_title(); ?>
rDominion/uqDominionStaging/g
    <?php echo get_component('default', 'tagManager', ['code' => 'script']); ?>
rDominion/uqDominionStaging/g
    <?php if (file_exists($staticPath = sfConfig::get('app_static_path').DIRECTORY_SEPARATOR.'favicon.ico')) { ?>
rDominion/uqDominionStaging/g
      <?php $faviconLoc = sfConfig::get('app_static_alias').'/favicon.ico'; ?>
rDominion/uqDominionStaging/g
    <?php } else { ?>
rDominion/uqDominionStaging/g
      <?php $faviconLoc = public_path('favicon.ico'); ?>
rDominion/uqDominionStaging/g
    <?php } ?>
rDominion/uqDominionStaging/g
    <link rel="shortcut icon" href="<?php echo $faviconLoc; ?>">
rDominion/uqDominionStaging/g
    <%= htmlWebpackPlugin.tags.headTags %>
rDominion/uqDominionStaging/g
    <?php echo get_component_slot('css'); ?>
rDominion/uqDominionStaging/g
  </head>
rDominion/uqDominionStaging/g
  <body class="d-flex flex-column min-vh-100 <?php echo $sf_context->getModuleName(); ?> <?php echo $sf_context->getActionName(); ?><?php echo sfConfig::get('app_show_tooltips') ? ' show-edit-tooltips' : ''; ?>">
rDominion/uqDominionStaging/g
    <?php echo get_component('default', 'tagManager', ['code' => 'noscript']); ?>
rDominion/uqDominionStaging/g
    <?php echo get_partial('header'); ?>
rDominion/uqDominionStaging/g
    <?php include_slot('pre'); ?>
rDominion/uqDominionStaging/g
