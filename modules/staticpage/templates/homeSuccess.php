<?php decorate_with('layout_uffshome') ?>

<?php slot('title') ?>
  <h1><?php echo render_title($resource->getTitle(array('cultureFallback' => true))) ?></h1>
<?php end_slot() ?>

<?php slot('icons') ?>
<div class = "container-home">
  <div class = "row-fluid">
    <div class = "span4">
        <h2>  <?//php echo __('Teste') ?></h2> <!--- insert name to span -->
            <ul>
              <?php $icons = array(
                'browseInformationObjects' => '/images/generic-icons/document.png',
                'browseActors' => '/images/generic-icons/team.png',
                'browseRepositories' => '/images/generic-icons/institution.png',
                'browseSubjects' => '/images/generic-icons/speech.png',
                'browseFunctions' => '/images/icons-large/folder.png',
                'browsePlaces' => '/images/generic-icons/pin.png',
                'browseDigitalObjects' => '/images/generic-icons/user.png',
                'browseTextualDocument'=> '/images/generic-icons/document2.png',              //traduzir futuramente
                'browseIconographicDocument' => '/images/generic-icons/picture.png',       //traduzir futuramente
                'browseSoundDocuments' => '/images/generic-icons/volume.png',            //traduzir futuramente
                'browseAudiovisualsDocument' => '/images/generic-icons/film.png',     //traduzir futuramente
                'browseHowToSearch' => '/images/generic-icons/search.png',             //traduzir futuramente
                'browseUsefulInformation' => '/images/generic-icons/info.png') ?>  <!--- traduzir futuramente --->
              <?php $count = 0; ?>
              <?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID) ?>
                <?php if ($browseMenu->hasChildren()): ?>
                  <?php foreach ($browseMenu->getChildren() as $item): ?>
                    <?php if (($count <= 5) and ($item != 'browseFunctions')): ?> 
                      <ul>
                        <li>
                          <a href="<?php echo url_for($item->getPath(array('getUrl' => true, 'resolveAlias' => true))) ?>">
                            <?php if (isset($icons[$item->name])): ?>
                              <?php echo image_tag($icons[$item->name], array('width' => 42, 'height' =>42, 'title'=>$item->description)) ?>
                            <?php endif; ?>
                            <?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?>
                          </a>
                        </li>
                        <?php $count++; ?>
                        <?//php echo $count; ?>  
                      </ul> 
                    <?php endif; ?>  
                  <?php endforeach; ?> 
                <?php endif; ?> 
            </ul>
    </div>          
    <div class = "span4">
      <h2>  <?//php echo __('Teste') ?></h2> <!--- insert name to span -->
            <ul>
              <?php $icons = array(
                'browseInformationObjects' => '/images/generic-icons/document.png',
                'browseActors' => '/images/generic-icons/team.png',
                'browseRepositories' => '/images/generic-icons/institution.png',
                'browseSubjects' => '/images/generic-icons/speech.png',
                'browseFunctions' => '/images/icons-large/folder.png',
                'browsePlaces' => '/images/generic-icons/pin.png',
                'browseDigitalObjects' => '/images/generic-icons/user.png',
                'browseTextualDocument'=> '/images/generic-icons/document2.png',              //traduzir futuramente
                'browseIconographicDocument' => '/images/generic-icons/picture.png',       //traduzir futuramente
                'browseSoundDocuments' => '/images/generic-icons/volume.png',            //traduzir futuramente
                'browseAudiovisualsDocument' => '/images/generic-icons/film.png',     //traduzir futuramente
                'browseHowToSearch' => '/images/generic-icons/search.png',             //traduzir futuramente
                'browseUsefulInformation' => '/images/generic-icons/info.png') ?>  <!--- traduzir futuramente --->
              <?php $count = 0; ?>
              <?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID) ?>
                <?php if ($browseMenu->hasChildren()): ?>
                  <?php foreach ($browseMenu->getChildren() as $item): ?>
                      <ul>
                        <li>
                          <a href="<?php echo url_for($item->getPath(array('getUrl' => true, 'resolveAlias' => true ))) ?>">
                            <?php if (isset($icons[$item->name]) and ($count > 6)): ?>  
                              <?php  echo image_tag($icons[$item->name], array('width' => 42, 'height' =>42, 'alt' => '', 'title'=>$item->description)) ?>
                            <?php endif; ?>
                            <?php if ($count > 6): ?>
                              <?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?>
                            <?php endif; ?>
                          </a>
                        </li>
                        <?php $count++; ?>  
                      </ul> 
                  <?php endforeach; ?>
                <?php endif; ?> 
            </ul>            
    </div>
    <div class = "span4"> 
      <?php echo get_component('default', 'popular', array('limit' => 10, 'sf_cache_key' => $sf_user->getCulture())) ?>          
    </div>           
  </div>              
</div> 
           

<?php end_slot() ?>

<?php slot('sidebar') ?>

<?php echo get_component('menu', 'staticPagesMenu') ?>

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
