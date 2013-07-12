<?php
function tufts_preprocess_page(&$variables) {
  if (!empty($variables['node'])) {
    $variables['theme_hook_suggestions'][] = 'page__node_' . $variables['node']->type;
  }
}
?>
