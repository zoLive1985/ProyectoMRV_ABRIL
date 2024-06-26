<?php // $file = /home/esteveza/public_html/mrv/wp-content/themes/yootheme/vendor/yootheme/builder/elements/section/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'section', 
  'title' => 'Section', 
  'container' => true, 
  'width' => 500, 
  'defaults' => [
    'style' => 'default', 
    'width' => 'default', 
    'vertical_align' => 'middle', 
    'title_position' => 'top-left', 
    'title_rotation' => 'left', 
    'title_breakpoint' => 'xl', 
    'image_position' => 'center-center'
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
      'show' => '!video'
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
      'panel' => 'builder-section-media', 
      'text' => 'Edit Settings', 
      'show' => 'image || video'
    ], 
    'title' => [
      'label' => 'Title', 
      'description' => 'Enter a decorative section title which is aligned to the section edge.', 
      'source' => true
    ], 
    'style' => [
      'label' => 'Style', 
      'type' => 'select', 
      'options' => [
        'Default' => 'default', 
        'Muted' => 'muted', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary'
      ]
    ], 
    'preserve_color' => [
      'type' => 'checkbox', 
      'text' => 'Preserve text color', 
      'enable' => 'style == \'primary\' || style == \'secondary\''
    ], 
    'overlap' => [
      'description' => 'Preserve the text color, for example when using cards. Section overlap is not supported by all styles and may have no visual effect.', 
      'type' => 'checkbox', 
      'text' => 'Overlap the following section'
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
      'enable' => 'image || video'
    ], 
    'width' => [
      'label' => 'Max Width', 
      'type' => 'select', 
      'options' => [
        'Default' => 'default', 
        'XSmall' => 'xsmall', 
        'Small' => 'small', 
        'Large' => 'large', 
        'XLarge' => 'xlarge', 
        'Expand' => 'expand', 
        'None' => ''
      ]
    ], 
    'padding_remove_horizontal' => [
      'description' => 'Set the maximum content width.', 
      'type' => 'checkbox', 
      'text' => 'Remove horizontal padding', 
      'enable' => 'width && width != \'expand\''
    ], 
    'width_expand' => [
      'label' => 'Expand One Side', 
      'description' => 'Expand the width of one side to the left or right while the other side keeps within the constraints of the max width.', 
      'type' => 'select', 
      'options' => [
        'Don\'t expand' => '', 
        'To left' => 'left', 
        'To right' => 'right'
      ], 
      'enable' => 'width && width != \'expand\''
    ], 
    'height' => [
      'label' => 'Height', 
      'description' => 'Enabling viewport height on a section that directly follows the header will subtract the header\'s height from it. On short pages, a section can be expanded to fill the viewport.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Viewport' => 'full', 
        'Viewport (Minus 20%)' => 'percent', 
        'Viewport (Minus the following section)' => 'section', 
        'Expand' => 'expand'
      ]
    ], 
    'vertical_align' => [
      'label' => 'Vertical Alignment', 
      'description' => 'Align the section content vertically, if the section height is larger than the content itself.', 
      'type' => 'select', 
      'options' => [
        'Top' => '', 
        'Middle' => 'middle', 
        'Bottom' => 'bottom'
      ], 
      'enable' => 'height == \'full\' || height == \'percent\' || height == \'section\''
    ], 
    'padding' => [
      'label' => 'Padding', 
      'description' => 'Set the vertical padding.', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'X-Small' => 'xsmall', 
        'Small' => 'small', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        'None' => 'none'
      ]
    ], 
    'padding_remove_top' => [
      'type' => 'checkbox', 
      'text' => 'Remove top padding', 
      'enable' => 'padding != \'none\''
    ], 
    'padding_remove_bottom' => [
      'type' => 'checkbox', 
      'text' => 'Remove bottom padding', 
      'enable' => 'padding != \'none\''
    ], 
    'header_transparent' => [
      'label' => 'Transparent Header', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Overlay (Light)' => 'light', 
        'Overlay (Dark)' => 'dark'
      ], 
      'source' => true
    ], 
    'header_transparent_noplaceholder' => [
      'description' => 'Make the header transparent and overlay the section background. Select dark or light text. Note: This only applies, if the section directly follows the header.', 
      'type' => 'checkbox', 
      'text' => 'Pull content beneath navbar', 
      'enable' => 'header_transparent'
    ], 
    'animation' => [
      'label' => 'Animation', 
      'description' => 'Apply an animation to elements once they enter the viewport. Slide animations can come into effect with a fixed offset or at 100% of the element\'s own size.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Fade' => 'fade', 
        'Scale Up' => 'scale-up', 
        'Scale Down' => 'scale-down', 
        'Slide Top Small' => 'slide-top-small', 
        'Slide Bottom Small' => 'slide-bottom-small', 
        'Slide Left Small' => 'slide-left-small', 
        'Slide Right Small' => 'slide-right-small', 
        'Slide Top Medium' => 'slide-top-medium', 
        'Slide Bottom Medium' => 'slide-bottom-medium', 
        'Slide Left Medium' => 'slide-left-medium', 
        'Slide Right Medium' => 'slide-right-medium', 
        'Slide Top 100%' => 'slide-top', 
        'Slide Bottom 100%' => 'slide-bottom', 
        'Slide Left 100%' => 'slide-left', 
        'Slide Right 100%' => 'slide-right'
      ]
    ], 
    'animation_delay' => [
      'label' => 'Animation Delay', 
      'description' => 'Delay the element animations in milliseconds, e.g. <code>200</code>.', 
      'attrs' => [
        'placeholder' => '0'
      ], 
      'enable' => 'animation', 
      'divider' => true
    ], 
    'title_position' => [
      'label' => 'Position', 
      'description' => 'Define the title position within the section.', 
      'type' => 'select', 
      'options' => [
        'Left Top' => 'top-left', 
        'Left Center' => 'center-left', 
        'Left Bottom' => 'bottom-left', 
        'Right Top' => 'top-right', 
        'Right Center' => 'center-right', 
        'Right Bottom' => 'bottom-right'
      ], 
      'enable' => 'title'
    ], 
    'title_rotation' => [
      'label' => 'Rotation', 
      'description' => 'Rotate the title 90 degrees clockwise or counterclockwise.', 
      'type' => 'select', 
      'options' => [
        'Left' => 'left', 
        'Right' => 'right'
      ], 
      'enable' => 'title'
    ], 
    'title_breakpoint' => [
      'label' => 'Breakpoint', 
      'description' => 'Display the section title on the defined screen size and larger.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'title'
    ], 
    'status' => [
      'label' => 'Status', 
      'description' => 'Disable your section and publish it later. It will only be shown to the editor while the customizer is open.', 
      'type' => 'checkbox', 
      'text' => 'Disable section', 
      'attrs' => [
        'true-value' => 'disabled', 
        'false-value' => ''
      ]
    ], 
    'source' => $config->get('builder.source'), 
    'name' => $config->get('builder.name'), 
    'id' => $config->get('builder.id'), 
    'class' => $config->get('builder.cls'), 
    'attributes' => $config->get('builder.attrs'), 
    'css' => [
      'label' => 'CSS', 
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-section</code>', 
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
          'fields' => ['image', 'video', '_media', 'title']
        ], [
          'title' => 'Settings', 
          'fields' => ['style', 'preserve_color', 'overlap', 'text_color', 'width', 'padding_remove_horizontal', 'width_expand', 'height', 'vertical_align', 'padding', 'padding_remove_top', 'padding_remove_bottom', 'header_transparent', 'header_transparent_noplaceholder', 'animation', 'animation_delay', [
              'label' => 'Title', 
              'type' => 'group', 
              'fields' => ['title_position', 'title_rotation', 'title_breakpoint']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ], 
  'panels' => [
    'builder-section-media' => [
      'title' => 'Image/Video', 
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
          ], 
          'show' => 'image && !video'
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
          ], 
          'show' => 'image && !video'
        ], 
        'image_effect' => [
          'label' => 'Image Effect', 
          'description' => 'Add a parallax effect or fix the background with regard to the viewport while scrolling.', 
          'type' => 'select', 
          'options' => [
            'None' => '', 
            'Parallax' => 'parallax', 
            'Fixed' => 'fixed'
          ], 
          'show' => 'image && !video'
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
            'step' => 0.1000000000000000055511151231257827021181583404541015625
          ], 
          'show' => 'image_effect == \'parallax\' && image && !video'
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
          'show' => 'image_effect == \'parallax\' && image && !video'
        ], 
        'video_width' => [
          'label' => 'Width', 
          'default' => ''
        ], 
        'video_height' => [
          'label' => 'Height', 
          'default' => ''
        ], 
        'media_visibility' => [
          'label' => 'Visibility', 
          'description' => 'Display the image or video only on this device width and larger.', 
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
              'show' => 'image && !video', 
              'fields' => ['image_width', 'image_height']
            ], 'image_size', 'image_position', 'image_effect', [
              'name' => '_image_parallax_bgx', 
              'type' => 'grid', 
              'width' => '1-2', 
              'show' => 'image_effect == \'parallax\' && image && !video', 
              'fields' => ['image_parallax_bgx_start', 'image_parallax_bgx_end']
            ], [
              'name' => '_image_parallax_bgy', 
              'type' => 'grid', 
              'width' => '1-2', 
              'show' => 'image_effect == \'parallax\' && image && !video', 
              'fields' => ['image_parallax_bgy_start', 'image_parallax_bgy_end']
            ], 'image_parallax_easing', 'image_parallax_breakpoint', [
              'description' => 'Set the video dimensions.', 
              'name' => '_video_dimension', 
              'type' => 'grid', 
              'width' => '1-2', 
              'show' => 'video && !image', 
              'fields' => ['video_width', 'video_height']
            ], 'media_visibility', 'media_background', 'media_blend_mode', 'media_overlay']
        ]
      ]
    ]
  ]
];
