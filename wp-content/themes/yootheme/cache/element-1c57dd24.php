<?php // $file = C:/xampp/htdocs/esteveza/wp-content/themes/yootheme/vendor/yootheme/builder/elements/layout/element.json

return [
  'name' => 'layout', 
  'title' => 'Layout', 
  'container' => true, 
  'templates' => [
    'render' => $filter->apply('path', './templates/template.php', $file), 
    'content' => $filter->apply('path', './templates/template.php', $file)
  ]
];
