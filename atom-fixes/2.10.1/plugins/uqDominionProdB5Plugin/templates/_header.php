<div class="visually-hidden-focusable p-3 border-bottom">
rDominion/uqDominionProd/g
  <a class="btn btn-sm btn-secondary" href="#main-column">
rDominion/uqDominionProd/g
    <?php echo __('Skip to main content'); ?>
rDominion/uqDominionProd/g
  </a>
rDominion/uqDominionProd/g
</div>
rDominion/uqDominionProd/g

rDominion/uqDominionProd/g
<?php echo get_component('default', 'privacyMessage'); ?>
rDominion/uqDominionProd/g

rDominion/uqDominionProd/g
<?php echo get_component('default', 'updateCheck'); ?>
rDominion/uqDominionProd/g

rDominion/uqDominionProd/g
<?php if ($sf_user->isAdministrator() && '' === (string) QubitSetting::getByName('siteBaseUrl')) { ?>
rDominion/uqDominionProd/g
  <div class="alert alert-warning rounded-0 text-center mb-0" role="alert">
rDominion/uqDominionProd/g
    <?php echo link_to(__('Please configure your site base URL'), 'settings/siteInformation', ['class' => 'alert-link']); ?>
rDominion/uqDominionProd/g
  </div>
rDominion/uqDominionProd/g
<?php } ?>
rDominion/uqDominionProd/g

rDominion/uqDominionProd/g
<?php $bgColor = sfConfig::get('app_header_background_colour'); ?>
rDominion/uqDominionProd/g
<?php if (!empty($bgColor)) { ?>
rDominion/uqDominionProd/g
  <style <?php echo __(sfConfig::get('csp_nonce')); ?>>
rDominion/uqDominionProd/g
    #top-bar {
rDominion/uqDominionProd/g
      background-color: <?php echo $bgColor; ?> !important;
rDominion/uqDominionProd/g
    }
rDominion/uqDominionProd/g
  </style>
rDominion/uqDominionProd/g
<?php } ?>
rDominion/uqDominionProd/g
<header id="top-bar" class="navbar navbar-expand-lg navbar-dark bg-uq d-print-none" role="navigation" aria-label="<?php echo __('Main navigation'); ?>">
rDominion/uqDominionProd/g
  <div class="container-fluid">
rDominion/uqDominionProd/g
    <?php if (sfConfig::get('app_toggleLogo') || sfConfig::get('app_toggleTitle')) { ?>
rDominion/uqDominionProd/g
      <a class="navbar-brand d-flex flex-wrap flex-lg-nowrap align-items-center py-0 me-0" href="<?php echo url_for('@homepage'); ?>" title="<?php echo __('Home'); ?>" rel="home">
rDominion/uqDominionProd/g
        <?php if (file_exists($staticPath = sfConfig::get('app_static_path').DIRECTORY_SEPARATOR.'logo.png')) { ?>
rDominion/uqDominionProd/g
          <?php $logoLoc = sfConfig::get('app_static_alias').'/logo.png'; ?>
rDominion/uqDominionProd/g
        <?php } else { ?>
rDominion/uqDominionProd/g
          <?php $logoLoc = DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR.'arDominionB5Plugin'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'logo.png'; ?>
rDominion/uqDominionProd/g
        <?php } ?>
rDominion/uqDominionProd/g
        <?php if (sfConfig::get('app_toggleLogo')) { ?>
rDominion/uqDominionProd/g
          <?php echo image_tag($logoLoc, ['alt' => __('AtoM logo'), 'class' => 'd-inline-block my-2 me-3', 'height' => '35']); ?>
rDominion/uqDominionProd/g
        <?php } ?>
rDominion/uqDominionProd/g
        <?php if (sfConfig::get('app_toggleTitle') && !empty(sfConfig::get('app_siteTitle'))) { ?>
rDominion/uqDominionProd/g
          <span class="text-wrap my-1 me-3"><?php echo esc_specialchars(sfConfig::get('app_siteTitle')); ?></span>
rDominion/uqDominionProd/g
        <?php } ?>
rDominion/uqDominionProd/g
      </a>
rDominion/uqDominionProd/g
    <?php } ?>
rDominion/uqDominionProd/g
    <button class="navbar-toggler atom-btn-secondary my-2 me-1 px-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false">
rDominion/uqDominionProd/g
      <i 
rDominion/uqDominionProd/g
        class="fas fa-2x fa-fw fa-bars" 
rDominion/uqDominionProd/g
        data-bs-toggle="tooltip"
rDominion/uqDominionProd/g
        data-bs-placement="bottom"
rDominion/uqDominionProd/g
        title="<?php echo __('Toggle navigation'); ?>"
rDominion/uqDominionProd/g
        aria-hidden="true">
rDominion/uqDominionProd/g
      </i>
rDominion/uqDominionProd/g
      <span class="visually-hidden"><?php echo __('Toggle navigation'); ?></span>
rDominion/uqDominionProd/g
    </button>
rDominion/uqDominionProd/g
    <div class="collapse navbar-collapse flex-wrap justify-content-end me-1" id="navbar-content">
rDominion/uqDominionProd/g
      <div class="d-flex flex-wrap flex-lg-nowrap flex-grow-1">
rDominion/uqDominionProd/g
        <?php echo get_component('menu', 'browseMenu', ['sf_cache_key' => 'dominion-b5'.$sf_user->getCulture().$sf_user->getUserID()]); ?>
rDominion/uqDominionProd/g
        <?php echo get_component('search', 'box'); ?>
rDominion/uqDominionProd/g
      </div>
rDominion/uqDominionProd/g
      <div class="d-flex flex-nowrap flex-column flex-lg-row align-items-strech align-items-lg-center">
rDominion/uqDominionProd/g
        <ul class="navbar-nav mx-lg-2">
rDominion/uqDominionProd/g
          <?php echo get_component('menu', 'mainMenu', ['sf_cache_key' => 'dominion-b5'.$sf_user->getCulture().$sf_user->getUserID()]); ?>
rDominion/uqDominionProd/g
          <?php echo get_component('menu', 'clipboardMenu'); ?>
rDominion/uqDominionProd/g
          <?php if (sfConfig::get('app_toggleLanguageMenu')) { ?>
rDominion/uqDominionProd/g
            <?php echo get_component('menu', 'changeLanguageMenu'); ?>
rDominion/uqDominionProd/g
          <?php } ?>
rDominion/uqDominionProd/g
          <?php echo get_component('menu', 'quickLinksMenu'); ?>
rDominion/uqDominionProd/g
        </ul>
rDominion/uqDominionProd/g
        <?php echo get_component('menu', 'userMenu'); ?>
rDominion/uqDominionProd/g
      </div>
rDominion/uqDominionProd/g
    </div>
rDominion/uqDominionProd/g
  </div>
rDominion/uqDominionProd/g
</header>
rDominion/uqDominionProd/g

rDominion/uqDominionProd/g
<?php if (sfConfig::get('app_toggleDescription') && !empty(sfConfig::get('app_siteDescription'))) { ?>
rDominion/uqDominionProd/g
  <div class="bg-secondary text-white d-print-none">
rDominion/uqDominionProd/g
    <div class="container-xl py-1">
rDominion/uqDominionProd/g
      <?php echo esc_specialchars(sfConfig::get('app_siteDescription')); ?>
rDominion/uqDominionProd/g
    </div>
rDominion/uqDominionProd/g
  </div>
rDominion/uqDominionProd/g
<?php } ?>
rDominion/uqDominionProd/g
