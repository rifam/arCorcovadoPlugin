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
       <div id="homepage-hero">
      </div>
      <!--- <div class="span3">

          <div id="sidebar">
            <?//php include_slot('sidebar') ?>
          </div>
      </div>  --->
      <div class="span9">
          
          <div id="main-column">
            <?//php include_slot('title') ?>  <!--- bem vindo apenas -->
            <?php include_slot('teste') ?>
           
            <?//php include_slot('before-content') ?>

            <?//php if (!include_slot('content')): ?>
            <!--- 
              <div id="content">
                <?//php echo $sf_content ?>
              </div> -->
            <?//php endif; ?>

            <?//php include_slot('after-content')?>

          </div>

        </div>
      </div>
    </div>

    <?//php include_slot('post') ?>

    <?//php echo get_partial('footer') ?>
  <footer>
  <div class="container">

    <div class="row">

      <div class="span3 offset1">
        <h5>Relevant links</h5>
        <ul>
          <li><a href="http://www.accesstomemory.org/">www.accesstomemory.org</a></li>
          <li><a href="https://www.accesstomemory.org/en/docs/2.3/">AtoM Documentation</a></li>
          <li><a href="https://wiki.accesstomemory.org/Main_Page">AtoM Wiki</a></li>
          <li><a href="https://www.accesstomemory.org/en/docs/2.3/admin-manual/customization/theming/#customization-theming">AtoM Theming Documentation</a></li>
          <li><a href="https://groups.google.com/forum/#!forum/ica-atom-users">AtoM Users Forum</a></li>
          <li><a href="https://www.artefactual.com/">Artefactual</a></li>
        </ul>
      </div>

      <div class="span2">
        <h5>Contact us</h5>
        <ul>
          <li><a href="mailto:demo@example.com">Email</a></li>
          <li><a href="https://twitter.com/accesstomemory">Twitter</a></li>
        </ul>
      </div>

      <div class="span3 offset3">
        <h5>Powered by</h5>
        <a href="http://www.accesstomemory.org"><?php echo image_tag('/plugins/arDemoThemePlugin/images/atom-logo.png', array('id' => 'atom-logo')) ?></a>
      </div>

    </div>

    <?php if (QubitAcl::check('userInterface', 'translate')): ?>
      <?php echo get_component('sfTranslatePlugin', 'translate') ?>
    <?php endif; ?>

    <?php echo get_component_slot('footer') ?>

  </div>
  </footer>

  </body>
</html>
