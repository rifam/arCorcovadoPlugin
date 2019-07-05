<?php decorate_with('layout_2col') ?>

<?php slot('title') ?>
  <h1><?php echo render_title($resource->getTitle(array('cultureFallback' => true))) ?></h1>
<?php end_slot() ?>

<?php slot('teste') ?>
  <section>
    <h2><?php echo __('Teste') ?></h2>
        <ul>
          <?php $icons = array(
            'browseInformationObjects' => '/images/icons-large/gear-teste.png',
            'browseActors' => '/images/icons-large/icon-people.png',
            'browseRepositories' => '/images/icons-large/icon-institutions.png',
            'browseSubjects' => '/images/icons-large/icon-subjects.png',
            'browseFunctions' => '/images/icons-large/icon-functions.png',
            'browsePlaces' => '/images/icons-large/icon-places.png',
            'browseDigitalObjects' => '/images/icons-large/icon-media.png') ?>
          <?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID) ?>
          <?php if ($browseMenu->hasChildren()): ?>
            <?php foreach ($browseMenu->getChildren() as $item): ?>
              <li>
                <a href="<?php echo url_for($item->getPath(array('getUrl' => true, 'resolveAlias' => true))) ?>">
                  <?php if (isset($icons[$item->name])): ?>
                    <?php echo image_tag($icons[$item->name], array('width' => 42, 'height' =>42, 'alt' => '')) ?>
                    <?php endif; ?>
                  <?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?>
                </a>
              </li>
              <br>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
  </section> 
<?php end_slot() ?>

<?php slot('sidebar') ?>

  <?php echo get_component('menu', 'staticPagesMenu') ?>

  <section>
    <h2><?php echo __('Browse by') ?></h2>
    <ul>
      <?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID) ?>
      <?php if ($browseMenu->hasChildren()): ?>
        <?php foreach ($browseMenu->getChildren() as $item): ?>
          <li><a href="<?php echo url_for($item->getPath(array('getUrl' => true, 'resolveAlias' => true))) ?>"><?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?></a></li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </section>

  <?php echo get_component('default', 'popular', array('limit' => 10, 'sf_cache_key' => $sf_user->getCulture())) ?>

<?php end_slot() ?>
<?php slot('footer') ?>
<p> teste footer</p>
<?php end_slot() ?>


<div class="page">
  <?php echo render_value($sf_data->getRaw('content')) ?>
</div>

<?php if (QubitAcl::check($resource, 'update')): ?>
  <?php slot('after-content') ?>
    <section class="actions">
      <ul>
        <li><?php echo link_to(__('Edit'), array($resource, 'module' => 'staticpage', 'action' => 'edit'), array('title' => __('Edit this page'), 'class' => 'c-btn')) ?></li>
      </ul>
    </section>
  <?php end_slot() ?>


<?php endif; ?>
