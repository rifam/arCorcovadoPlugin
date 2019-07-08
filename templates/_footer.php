<footer>

  <div class="container">
    <div class="row">
        <div class="span3 offset1">
            <h3><strong>Reitoria</strong></h3>
            <p>Av. Fernando Machado, 108 E</p>
            <p>Centro, Chapecó, SC - Brasil</p>
            <p>Caixa Postal 181 - CEP 89802-112</p>
            <p>Telefone: (49) 2049-3100</p>
            <p>CNPJ 11.234.780/0001-50</p>
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
          <a href="http://www.accesstomemory.org"><?php echo image_tag('/images/atom-logo.png', array('id' => 'atom-logo')) ?></a>
        </div>
    </div>

    <?php if (QubitAcl::check('userInterface', 'translate')): ?>
      <?php echo get_component('sfTranslatePlugin', 'translate') ?>
    <?php endif; ?>

    <?php echo get_component_slot('footer') ?>

  </div>

</footer>

<?php if (null !== $gaKey = sfConfig::get('app_google_analytics_api_key')): ?>
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '<?php echo $gaKey ?>']);
    _gaq.push(['_trackPageview']);
    <?php include_slot('google_analytics') ?>
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
<?php endif; ?>
