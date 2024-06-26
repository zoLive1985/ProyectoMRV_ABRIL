<?php // $file = C:/xampp/htdocs/esteveza/wp-content/themes/yootheme/vendor/yootheme/builder/elements/column/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'column', 
  'title' => 'Column', 
  'container' => true, 
  'width' => 500, 
  'defaults' => [
    'image_position' => 'center-center', 
    'media_overlay_gradient' => ''
  ], 
  'templates' => [
    'render' => $filter->apply('path', './templates/template.php', $file), 
    'content' => $filter->apply('path', './templates/content.php', $file)
  ], 
  'fields' => [
    'image' => [
      'label' => 'Image', 
      'description' => 'Upload a background image.', 
      'type' => 'image', 
      'source' => true
    ], 
    '_media' => [
      'type' => 'button-panel', 
      'panel' => 'builder-column-media', 
      'text' => 'Edit Settings', 
      'show' => 'image'
    ], 
    'vertical_align' => [
      'label' => 'Vertical Alignment', 
      'description' => 'Vertically align the elements in the column.', 
      'type' => 'select', 
      'options' => [
        'Top' => '', 
        'Middle' => 'middle', 
        'Bottom' => 'bottom'
      ]
    ], 
    'style' => [
      'label' => 'Style', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Default' => 'default', 
        'Muted' => 'muted', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary'
      ]
    ], 
    'preserve_color' => [
      'description' => 'Preserve the text color, for example when using cards.', 
      'type' => 'checkbox', 
      'text' => 'Preserve text color', 
      'enable' => 'style == \'primary\' || style == \'secondary\''
    ], 
    'text_color' => [
      'label' => 'Text Color', 
      'description' => 'Force a light or dark color for text, buttons and controls on the image or video background.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'source' => true, 
      'enable' => '!style || image'
    ], 
    'padding' => [
      'label' => 'Padding', 
      'description' => 'Set the padding.', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'X-Small' => 'xsmall', 
        'Small' => 'small', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        'None' => 'none'
      ], 
      'enable' => 'style || image'
    ], 
    'source' => $config->get('builder.source'), 
    'id' => $config->get('builder.id'), 
    'class' => $config->get('builder.cls'), 
    'attributes' => $config->get('builder.attrs'), 
    'css' => [
      'label' => 'CSS', 
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-column</code>', 
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
          'fields' => ['image', '_media']
        ], [
          'title' => 'Settings', 
          'fields' => ['vertical_align', 'style', 'preserve_color', 'text_color', 'padding']
        ], [
          'title' => 'Advanced', 
          'fields' => ['source', 'id', 'class', 'attributes', 'css']
        ]]
    ]
  ], 
  'panels' => [
    'builder-column-media' => [
      'title' => 'Image', 
      'width' => 500, 
      'fields' => [
        'image_width' => [
          'label' => 'Width', 
          'attrs' => [
            'placeholder' => 'auto'
          ]
        ], 
        'image_height' => [
          'label' => 'Height', 
          'attrs' => [
            'placeholder' => 'auto'
          ]
        ], 
        'image_size' => [
          'label' => 'Image Size', 
          'description' => 'Determine whether the image will fit the section dimensions by clipping it or by filling the empty areas with the background color.', 
          'type' => 'select', 
          'options' => [
            'Auto' => '', 
            'Cover' => 'cover', 
            'Contain' => 'contain', 
            'Width 100%' => 'width-1-1', 
            'Height 100%' => 'height-1-1'
          ]
        ], 
        'image_position' => [
          'label' => 'Image Position', 
          'description' => 'Set the initial background position, relative to the section layer.', 
          'type' => 'select', 
          'options' => [
            'Top Left' => 'top-left', 
            'Top Center' => 'top-center', 
            'Top Right' => 'top-right', 
            'Center Left' => 'center-left', 
            'Center Center' => 'center-center', 
            'Center Right' => 'center-right', 
            'Bottom Left' => 'bottom-left', 
            'Bottom Center' => 'bottom-center', 
            'Bottom Right' => 'bottom-right'
          ]
        ], 
        'image_effect' => [
          'label' => 'Image Effect', 
          'description' => 'Add a parallax effect or fix the background with regard to the viewport while scrolling.', 
          'type' => 'select', 
          'options' => [
            'None' => '', 
            'Parallax' => 'parallax', 
            'Fixed' => 'fixed'
          ]
        ], 
        'image_parallax_bgx_start' => [
          'label' => 'Horizontal Start', 
          'type' => 'range', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'image_parallax_bgx_end' => [
          'label' => 'Horizontal End', 
          'type' => 'range', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'image_parallax_bgy_start' => [
          'label' => 'Vertical Start', 
          'type' => 'range', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'image_parallax_bgy_end' => [
          'label' => 'Vertical End', 
          'type' => 'range', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'image_parallax_easing' => [
          'label' => 'Parallax Easing', 
          'description' => 'Set the animation easing. Zero transitions at an even speed, a positive value starts off quickly while a negative value starts off slowly.', 
          'type' => 'range', 
          'attrs' => [
            'min' => -2, 
            'max' => 2, 
            'step' => 0.1
          ], 
          'show' => 'image_effect == \'parallax\''
        ], 
        'image_parallax_breakpoint' => [
          'label' => 'Parallax Breakpoint', 
          'description' => 'Display the parallax effect only on this device width and larger.', 
          'type' => 'select', 
          'options' => [
            'Always' => '', 
            'Small (Phone Landscape)' => 's', 
            'Medium (Tablet Landscape)' => 'm', 
            'Large (Desktop)' => 'l', 
            'X-Large (Large Screens)' => 'xl'
          ], 
          'show' => 'image_effect == \'parallax\''
        ], 
        'media_visibility' => [
          'label' => 'Visibility', 
          'description' => 'Display the image only on this device width and larger.', 
          'type' => 'select', 
          'options' => [
            'Always' => '', 
            'Small (Phone Landscape)' => 's', 
            'Medium (Tablet Landscape)' => 'm', 
            'Large (Desktop)' => 'l', 
            'X-Large (Large Screens)' => 'xl'
          ]
        ], 
        'media_background' => [
          'label' => 'Background Color', 
          'description' => 'Use the background color in combination with blend modes, a transparent image or to fill the area, if the image doesn\'t cover the whole section.', 
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
          ]
        ], 
        'media_overlay' => [
          'label' => 'Overlay Color', 
          'description' => 'Set an additional transparent overlay to soften the image or video.', 
          'type' => 'gradient', 
          'internal' => 'media_overlay_gradient'
        ]
      ], 
      'fieldset' => [
        'default' => [
          'fields' => [[
              'description' => 'Set the width and height in pixels. Setting just one value preserves the original proportions. The image will be resized and cropped automatically.', 
              'name' => '_image_dimension', 
              'type' => 'grid', 
              'width' => '1-2', 
              'fields' => ['image_width', 'image_height']
            ], 'image_size', 'image_position', 'image_effect', [
              'name' => '_image_parallax_bgx', 
              'type' => 'grid', 
              'width' => '1-2', 
              'show' => 'image_effect == \'parallax\'', 
              'fields' => ['image_parallax_bgx_start', 'image_parallax_bgx_end']
            ], [
              'name' => '_image_parallax_bgy', 
              'type' => 'grid', 
              'width' => '1-2', 
              'show' => 'image_effect == \'parallax\'', 
              'fields' => ['image_parallax_bgy_start', 'image_parallax_bgy_end']
            ], 'image_parallax_easing', 'image_parallax_breakpoint', 'media_visibility', 'media_background', 'media_blend_mode', 'media_overlay']
        ]
      ]
    ]
  ]
];
