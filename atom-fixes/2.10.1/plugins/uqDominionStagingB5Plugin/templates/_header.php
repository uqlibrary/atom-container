<div class="visually-hidden-focusable p-3 border-bottom">
rDominion/uqDominionStaging/g
  <a class="btn btn-sm btn-secondary" href="#main-column">
rDominion/uqDominionStaging/g
    <?php echo __('Skip to main content'); ?>
rDominion/uqDominionStaging/g
  </a>
rDominion/uqDominionStaging/g
</div>
rDominion/uqDominionStaging/g

rDominion/uqDominionStaging/g
<?php echo get_component('default', 'privacyMessage'); ?>
rDominion/uqDominionStaging/g

rDominion/uqDominionStaging/g
<?php echo get_component('default', 'updateCheck'); ?>
rDominion/uqDominionStaging/g

rDominion/uqDominionStaging/g
<?php if ($sf_user->isAdministrator() && '' === (string) QubitSetting::getByName('siteBaseUrl')) { ?>
rDominion/uqDominionStaging/g
  <div class="alert alert-warning rounded-0 text-center mb-0" role="alert">
rDominion/uqDominionStaging/g
    <?php echo link_to(__('Please configure your site base URL'), 'settings/siteInformation', ['class' => 'alert-link']); ?>
rDominion/uqDominionStaging/g
  </div>
rDominion/uqDominionStaging/g
<?php } ?>
rDominion/uqDominionStaging/g

rDominion/uqDominionStaging/g
<?php $bgColor = sfConfig::get('app_header_background_colour'); ?>
rDominion/uqDominionStaging/g
<?php if (!empty($bgColor)) { ?>
rDominion/uqDominionStaging/g
  <style <?php echo __(sfConfig::get('csp_nonce')); ?>>
rDominion/uqDominionStaging/g
    #top-bar {
rDominion/uqDominionStaging/g
      background-color: <?php echo $bgColor; ?> !important;
rDominion/uqDominionStaging/g
    }
rDominion/uqDominionStaging/g
  </style>
rDominion/uqDominionStaging/g
<?php } ?>
rDominion/uqDominionStaging/g
<header id="top-bar" class="navbar navbar-expand-lg navbar-dark bg-warning d-print-none" role="navigation" aria-label="<?php echo __('Main navigation'); ?>">
rDominion/uqDominionStaging/g
  <div class="container-fluid">
rDominion/uqDominionStaging/g
    <?php if (sfConfig::get('app_toggleLogo') || sfConfig::get('app_toggleTitle')) { ?>
rDominion/uqDominionStaging/g
      <a class="navbar-brand d-flex flex-wrap flex-lg-nowrap align-items-center py-0 me-0" href="<?php echo url_for('@homepage'); ?>" title="<?php echo __('Home'); ?>" rel="home">
rDominion/uqDominionStaging/g
        <?php if (file_exists($staticPath = sfConfig::get('app_static_path').DIRECTORY_SEPARATOR.'logo.png')) { ?>
rDominion/uqDominionStaging/g
          <?php $logoLoc = sfConfig::get('app_static_alias').'/logo.png'; ?>
rDominion/uqDominionStaging/g
        <?php } else { ?>
rDominion/uqDominionStaging/g
          <?php $logoLoc = DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR.'arDominionB5Plugin'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'logo.png'; ?>
rDominion/uqDominionStaging/g
        <?php } ?>
rDominion/uqDominionStaging/g
        <?php if (sfConfig::get('app_toggleLogo')) { ?>
rDominion/uqDominionStaging/g
          <?php echo image_tag($logoLoc, ['alt' => __('AtoM logo'), 'class' => 'd-inline-block my-2 me-3', 'height' => '35']); ?>
rDominion/uqDominionStaging/g
        <?php } ?>
rDominion/uqDominionStaging/g
        <?php if (sfConfig::get('app_toggleTitle') && !empty(sfConfig::get('app_siteTitle'))) { ?>
rDominion/uqDominionStaging/g
          <span class="text-wrap my-1 me-3"><?php echo esc_specialchars(sfConfig::get('app_siteTitle')); ?></span>
rDominion/uqDominionStaging/g
        <?php } ?>
rDominion/uqDominionStaging/g
      </a>
rDominion/uqDominionStaging/g
    <?php } ?>
rDominion/uqDominionStaging/g
    <button class="navbar-toggler atom-btn-secondary my-2 me-1 px-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false">
rDominion/uqDominionStaging/g
      <i 
rDominion/uqDominionStaging/g
        class="fas fa-2x fa-fw fa-bars" 
rDominion/uqDominionStaging/g
        data-bs-toggle="tooltip"
rDominion/uqDominionStaging/g
        data-bs-placement="bottom"
rDominion/uqDominionStaging/g
        title="<?php echo __('Toggle navigation'); ?>"
rDominion/uqDominionStaging/g
        aria-hidden="true">
rDominion/uqDominionStaging/g
      </i>
rDominion/uqDominionStaging/g
      <span class="visually-hidden"><?php echo __('Toggle navigation'); ?></span>
rDominion/uqDominionStaging/g
    </button>
rDominion/uqDominionStaging/g
    <div class="collapse navbar-collapse flex-wrap justify-content-end me-1" id="navbar-content">
rDominion/uqDominionStaging/g
      <div class="d-flex flex-wrap flex-lg-nowrap flex-grow-1">
rDominion/uqDominionStaging/g
        <?php echo get_component('menu', 'browseMenu', ['sf_cache_key' => 'dominion-b5'.$sf_user->getCulture().$sf_user->getUserID()]); ?>
rDominion/uqDominionStaging/g
        <?php echo get_component('search', 'box'); ?>
rDominion/uqDominionStaging/g
      </div>
rDominion/uqDominionStaging/g
      <div class="d-flex flex-nowrap flex-column flex-lg-row align-items-strech align-items-lg-center">
rDominion/uqDominionStaging/g
        <ul class="navbar-nav mx-lg-2">
rDominion/uqDominionStaging/g
          <?php echo get_component('menu', 'mainMenu', ['sf_cache_key' => 'dominion-b5'.$sf_user->getCulture().$sf_user->getUserID()]); ?>
rDominion/uqDominionStaging/g
          <?php echo get_component('menu', 'clipboardMenu'); ?>
rDominion/uqDominionStaging/g
          <?php if (sfConfig::get('app_toggleLanguageMenu')) { ?>
rDominion/uqDominionStaging/g
            <?php echo get_component('menu', 'changeLanguageMenu'); ?>
rDominion/uqDominionStaging/g
          <?php } ?>
rDominion/uqDominionStaging/g
          <?php echo get_component('menu', 'quickLinksMenu'); ?>
rDominion/uqDominionStaging/g
        </ul>
rDominion/uqDominionStaging/g
        <?php echo get_component('menu', 'userMenu'); ?>
rDominion/uqDominionStaging/g
      </div>
rDominion/uqDominionStaging/g
    </div>
rDominion/uqDominionStaging/g
  </div>
rDominion/uqDominionStaging/g
</header>
rDominion/uqDominionStaging/g

rDominion/uqDominionStaging/g
<?php if (sfConfig::get('app_toggleDescription') && !empty(sfConfig::get('app_siteDescription'))) { ?>
rDominion/uqDominionStaging/g
  <div class="bg-secondary text-white d-print-none">
rDominion/uqDominionStaging/g
    <div class="container-xl py-1">
rDominion/uqDominionStaging/g
      <?php echo esc_specialchars(sfConfig::get('app_siteDescription')); ?>
rDominion/uqDominionStaging/g
    </div>
rDominion/uqDominionStaging/g
  </div>
rDominion/uqDominionStaging/g
<?php } ?>
rDominion/uqDominionStaging/g
