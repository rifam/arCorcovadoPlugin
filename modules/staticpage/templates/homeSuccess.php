<?php decorate_with('layout_2col') ?>

<?php slot('title') ?>
  <h1><?php echo render_title($resource->getTitle(array('cultureFallback' => true))) ?></h1>
<?php end_slot() ?>

<?php slot('teste') ?>
<div class = "container">
  <div class = "row-fluid">
    <div class = "span6">
        <h2> xesquedele 1<?//php echo __('Teste') ?></h2>
            <ul>
              <?php $icons = array(
                'browseInformationObjects' => '/images/icons-large/icon-archival.png',
                'browseActors' => '/images/icons-large/icon-people.png',
                'browseRepositories' => '/images/icons-large/icon-institutions.png',
                'browseSubjects' => '/images/icons-large/icon-subjects.png',
                'browseFunctions' => '/images/icons-large/icon-functions.png',
                'browsePlaces' => '/images/icons-large/icon-places.png',
                'browseDigitalObjects' => '/images/icons-large/icon-media.png',
                'browseTextualDocument'=> '/images/icons-large/folder.png',              //traduzir futuramente
                'browseIconographicDocument' => '/images/icons-large/folder.png',       //traduzir futuramente
                'browseSoundDocuments' => '/images/icons-large/folder.png',            //traduzir futuramente
                'browseAudiovisualsDocument' => '/images/icons-large/folder.png',     //traduzir futuramente
                'browseHowToSearch' => '/images/icons-large/search.png',             //traduzir futuramente
                'browseUsefulInformation' => '/images/icons-large/gear-teste.png') ?>  <!--- traduzir futuramente --->
              <?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID) ?>
              <?php if ($browseMenu->hasChildren()): ?>
                <?php foreach ($browseMenu->getChildren() as $item): ?>
                  <ul>
                    <li>
                      <a href="<?php echo url_for($item->getPath(array('getUrl' => true, 'resolveAlias' => true))) ?>">
                        <?php if (isset($icons[$item->name])): ?>
                          <?php echo image_tag($icons[$item->name], array('width' => 42, 'height' =>42, 'alt' => '')) ?>
                          <?php endif; ?>
                        <?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?>
                      </a>
                    </li>
                  </ul>
                  <br>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul>
    </div>          
    <div class = "span6">
      <h2> xesquedele 2 <?//php echo __('Teste') ?></h2>
            <ul> 
              <li> <a><i class="material-icons">folder</i></a></li>
              <li> <i class="far fa-file-alt">TESTE NEW ICONS</i></li>
              <li> <i class="fa-star-half">TESTE NEW ICONS</i></li>
              <li> <i class="far fa-file-alt">TESTE NEW ICONS</i></li>
              <li> <i class="fa-camera-retro">TESTE NEW ICONS</i></li>
            </ul>
    </div>            
  </div>              
</div>            

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
