<?php
$label_id = rand(0, 1000);
?>
<script>
  (function() {
    var cx = '<?php echo esc_attr(get_theme_mod('idaho_gcs_id', '')); ?>';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search enableAutoComplete="true"></gcse:search>


