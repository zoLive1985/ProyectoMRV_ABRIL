<?php // $file = /home/esteveza/public_html/mrv/wp-content/themes/yootheme/vendor/yootheme/builder/elements/social/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'social', 
  'title' => 'Social', 
  'group' => 'multiple items', 
  'icon' => $filter->apply('url', 'images/icon.svg', $file), 
  'iconSmall' => $filter->apply('url', 'images/iconSmall.svg', $file), 
  'element' => true, 
  'container' => true, 
  'width' => 500, 
  'defaults' => [
    'link_style' => 'button', 
    'gap' => 'small', 
    'margin' => 'default'
  ], 
  'placeholder' => [
    'children' => [[
        'type' => 'social_item', 
        'props' => [
          'link' => 'https://twitter.com'
        ]
      ], [
        'type' => 'social_item', 
        'props' => [
          'link' => 'https://facebook.com'
        ]
      ], [
        'type' => 'social_item', 
        'props' => [
          'link' => 'https://www.youtube.com'
        ]
      ]]
  ], 
  'templates' => [
    'render' => $filter->apply('path', './templates/template.php', $file), 
    'content' => $filter->apply('path', './templates/content.php', $file)
  ], 
  'fields' => [
    'content' => [
      'label' => 'Items', 
      'type' => 'content-items', 
      'title' => 'link', 
      'item' => 'social_item'
    ], 
    'link_target' => [
      'type' => 'checkbox', 
      'text' => 'Open links in a new window.'
    ], 
    'link_style' => [
      'label' => 'Style', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'Button' => 'button', 
        'Link' => 'link', 
        'Link Muted' => 'muted', 
        'Link Text' => 'text', 
        'Link Reset' => 'reset'
      ]
    ], 
    'icon_width' => [
      'label' => 'Icon Width', 
      'description' => 'Set the icon width.', 
      'enable' => 'link_style != \'button\''
    ], 
    'gap' => [
      'label' => 'Column Gap', 
      'description' => 'Set the size of the gap between the grid columns.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large'
      ]
    ], 
    'position' => $config->get('builder.position'), 
    'position_left' => $config->get('builder.position_left'), 
    'position_right' => $config->get('builder.position_right'), 
    'position_top' => $config->get('builder.position_top'), 
    'position_bottom' => $config->get('builder.position_bottom'), 
    'position_z_index' => $config->get('builder.position_z_index'), 
    'margin' => $config->get('builder.margin'), 
    'margin_remove_top' => $config->get('builder.margin_remove_top'), 
    'margin_remove_bottom' => $config->get('builder.margin_remove_bottom'), 
    'maxwidth' => $config->get('builder.maxwidth'), 
    'maxwidth_breakpoint' => $config->get('builder.maxwidth_breakpoint'), 
    'block_align' => $config->get('builder.block_align'), 
    'block_align_breakpoint' => $config->get('builder.block_align_breakpoint'), 
    'block_align_fallback' => $config->get('builder.block_align_fallback'), 
    'text_align' => $config->get('builder.text_align'), 
    'text_align_breakpoint' => $config->get('builder.text_align_breakpoint'), 
    'text_align_fallback' => $config->get('builder.text_align_fallback'), 
    'animation' => $config->get('builder.animation'), 
    '_parallax_button' => $config->get('builder._parallax_button'), 
    'visibility' => $config->get('builder.visibility'), 
    'name' => $config->get('builder.name'), 
    'status' => $config->get('builder.status'), 
    'source' => $config->get('builder.source'), 
    'id' => $config->get('builder.id'), 
    'class' => $config->get('builder.cls'), 
    'attributes' => $config->get('builder.attrs'), 
    'css' => [
      'label' => 'CSS', 
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-link</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500
      ]
    ]
  ], 
  'fieldset' => [
    'default' => [
      'type' => 'tabs', 
      'fields' => [[
          'title' => 'Content', 
          'fields' => ['content', 'link_target']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Social Icons', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['link_style', 'icon_width', 'gap']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', '_parallax_button', 'visibility']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
