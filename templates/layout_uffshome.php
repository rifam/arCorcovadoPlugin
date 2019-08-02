<!DOCTYPE html>
<html lang="<?php echo $sf_user->getCulture() ?>" dir="<?php echo sfCultureInfo::getInstance($sf_user->getCulture())->direction ?>">

  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="<?php echo public_path('favicon.ico') ?>"/>
    <?php include_stylesheets() ?>
    <?php include_component_slot('css') ?>
    <?php if ($sf_context->getConfiguration()->isDebug()): ?>
      <script type="text/javascript" charset="utf-8">
        less = { env: 'development', optimize: 0, relativeUrls: true };
      </script>
    <?php endif; ?>
    <?php include_javascripts() ?>
  </head>
  <body class="yui-skin-sam <?php echo $sf_context->getModuleName() ?> <?php echo $sf_context->getActionName() ?>">

    <?php echo get_partial('header') ?>

    <?php include_slot('pre') ?>
    
    <div id="wrapper" class="container" role="main">

      <?php echo get_component('default', 'alerts') ?>
      <div class="row">

        <div id="homepage-hero" alt='Banner imagem comemoração UFFS' title='Imagem comemorando 10 anos da UFFS'>

        </div>
        
        <div class="span12"> 
          <div id="main-column">
            <?//php include_slot('title') ?>  <!--- insert welcome or outher phrase bellow image -->
            <?php include_slot('icons') ?>
          </div>
        </div>
      </div>   
    </div>

    <?php include_slot('post') ?>
    
    <div class="col-md-12">
      <?php echo get_partial('footer') ?>
    </div>  
  </body>
</html>
