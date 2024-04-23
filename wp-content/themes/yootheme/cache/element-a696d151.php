<?php // $file = /home/geekecua/public_html/singei/wp-content/themes/yootheme/vendor/yootheme/builder/elements/overlay-slider_item/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'overlay-slider_item', 
  'title' => 'Item', 
  'width' => 500, 
  'placeholder' => [
    'props' => [
      'image' => $filter->apply('url', '~yootheme/theme/assets/images/element-image-placeholder.png', $file), 
      'video' => '', 
      'title' => 'Title', 
      'meta' => '', 
      'content' => ''
    ]
  ], 
  'templates' => [
    'render' => $filter->apply('path', './templates/template.php', $file), 
    'content' => $filter->apply('path', './templates/content.php', $file)
  ], 
  'fields' => [
    'image' => [
      'label' => 'Image', 
      'type' => 'image', 
      'source' => true, 
      'show' => '!video', 
      'altRef' => '%name%_alt'
    ], 
    'video' => [
      'label' => 'Video', 
      'description' => 'Select a video file or enter a link from <a href="https://www.youtube.com" target="_blank">YouTube</a> or <a href="https://vimeo.com" target="_blank">Vimeo</a>.', 
      'type' => 'video', 
      'source' => true, 
      'show' => '!image'
    ], 
    '_media' => [
      'type' => 'button-panel', 
      'panel' => 'builder-overlay-slider-item-media', 
      'text' => 'Edit Settings', 
      'show' => 'image || video'
    ], 
    'image_alt' => [
      'label' => 'Image Alt', 
      'source' => true, 
      'show' => 'image && !video'
    ], 
    'title' => [
      'label' => 'Title', 
      'source' => true
    ], 
    'meta' => [
      'label' => 'Meta', 
      'source' => true
    ], 
    'content' => [
      'label' => 'Content', 
      'type' => 'editor', 
      'source' => true
    ], 
    'link' => $config->get('builder.link'), 
    'text_color' => [
      'label' => 'Text Color', 
      'description' => 'Set a different text color for this item.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'source' => true
    ], 
    'text_color_hover' => [
      'type' => 'checkbox', 
      'text' => 'Inverse the text color on hover'
    ], 
    'status' => $config->get('builder.statusItem'), 
    'source' => $config->get('builder.source')
  ], 
  'fieldset' => [
    'default' => [
      'type' => 'tabs', 
      'fields' => [[
          'title' => 'Content', 
          'fields' => ['image', 'video', '_media', 'image_alt', 'title', 'meta', 'content', 'link']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Overlay', 
              'type' => 'group', 
              'fields' => ['text_color', 'text_color_hover']
            ]]
        ], $config->get('builder.advancedItem')]
    ]
  ], 
  'panels' => [
    'builder-overlay-slider-item-media' => [
      'title' => 'Image/Video', 
      'width' => 500, 
      'fields' => [
        'media_background' => [
          'label' => 'Background Color', 
          'description' => 'Use the background color in combination with blend modes.', 
          'type' => 'color'
        ], 
        'media_blend_mode' => [
          'label' => 'Blend Mode', 
          'description' => 'Determine how the image or video will blend with the background color.', 
          'type' => 'select', 
          'options' => [
            'Normal' => '', 
            'Multiply' => 'multiply', 
            'Screen' => 'screen', 
            'Overlay' => 'overlay', 
            'Darken' => 'darken', 
            'Lighten' => 'lighten', 
            'Color-dodge' => 'color-dodge', 
            'Color-burn' => 'color-burn', 
            'Hard-light' => 'hard-light', 
            'Soft-light' => 'soft-light', 
            'Difference' => 'difference', 
            'Exclusion' => 'exclusion', 
            'Hue' => 'hue', 
            'Saturation' => 'saturation', 
            'Color' => 'color', 
            'Luminosity' => 'luminosity'
          ], 
          'enable' => 'media_background'
        ], 
        'media_overlay' => [
          'label' => 'Overlay Color', 
          'description' => 'Set an additional transparent overlay to soften the image or video.', 
          'type' => 'color'
        ]
      ], 
      'fieldset' => [
        'default' => [
          'fields' => ['media_background', 'media_blend_mode', 'media_overlay']
        ]
      ]
    ]
  ]
];
