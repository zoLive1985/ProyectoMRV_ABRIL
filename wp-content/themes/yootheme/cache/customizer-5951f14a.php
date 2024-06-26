<?php // $file = /home/esteveza/public_html/mrv/wp-content/themes/yootheme/vendor/yootheme/builder/config/customizer.json

return [
  '@import' => [$filter->apply('path', '../../builder-source/config/customizer.json', $file), $filter->apply('path', sprintf('../../builder-%s/config/customizer.json', $config->get('app.platform')), $file)], 
  'sections' => [
    'builder' => [
      'title' => 'Builder', 
      'heading' => false, 
      'width' => 500, 
      'priority' => 20, 
      'prefix' => 'page#'
    ]
  ], 
  'panels' => [
    'builder-parallax' => [
      'title' => 'Parallax', 
      'width' => 500, 
      'fields' => [
        'parallax_x' => [
          'type' => 'grid', 
          'width' => '1-2', 
          'fields' => [
            'parallax_x_start' => [
              'label' => 'Horizontal Start', 
              'type' => 'range', 
              'attrs' => [
                'min' => -600, 
                'max' => 600, 
                'step' => 10
              ]
            ], 
            'parallax_x_end' => [
              'label' => 'Horizontal End', 
              'type' => 'range', 
              'attrs' => [
                'min' => -600, 
                'max' => 600, 
                'step' => 10
              ]
            ]
          ]
        ], 
        'parallax_y' => [
          'type' => 'grid', 
          'width' => '1-2', 
          'fields' => [
            'parallax_y_start' => [
              'label' => 'Vertical Start', 
              'type' => 'range', 
              'attrs' => [
                'min' => -600, 
                'max' => 600, 
                'step' => 10
              ]
            ], 
            'parallax_y_end' => [
              'label' => 'Vertical End', 
              'type' => 'range', 
              'attrs' => [
                'min' => -600, 
                'max' => 600, 
                'step' => 10
              ]
            ]
          ]
        ], 
        'parallax_scale' => [
          'type' => 'grid', 
          'width' => '1-2', 
          'fields' => [
            'parallax_scale_start' => [
              'label' => 'Scale Start', 
              'type' => 'range', 
              'attrs' => [
                'min' => 0.5, 
                'max' => 2, 
                'step' => 0.1000000000000000055511151231257827021181583404541015625
              ]
            ], 
            'parallax_scale_end' => [
              'label' => 'Scale End', 
              'type' => 'range', 
              'attrs' => [
                'min' => 0.5, 
                'max' => 2, 
                'step' => 0.1000000000000000055511151231257827021181583404541015625
              ]
            ]
          ]
        ], 
        'parallax_rotate' => [
          'type' => 'grid', 
          'width' => '1-2', 
          'fields' => [
            'parallax_rotate_start' => [
              'label' => 'Rotate Start', 
              'type' => 'range', 
              'attrs' => [
                'min' => 0, 
                'max' => 360, 
                'step' => 10
              ]
            ], 
            'parallax_rotate_end' => [
              'label' => 'Rotate End', 
              'type' => 'range', 
              'attrs' => [
                'min' => 0, 
                'max' => 360, 
                'step' => 10
              ]
            ]
          ]
        ], 
        'parallax_opacity' => [
          'type' => 'grid', 
          'width' => '1-2', 
          'fields' => [
            'parallax_opacity_start' => [
              'label' => 'Opacity Start', 
              'type' => 'range', 
              'attrs' => [
                'min' => 0, 
                'max' => 1, 
                'step' => 0.1000000000000000055511151231257827021181583404541015625
              ]
            ], 
            'parallax_opacity_end' => [
              'label' => 'Opacity End', 
              'type' => 'range', 
              'attrs' => [
                'min' => 0, 
                'max' => 1, 
                'step' => 0.1000000000000000055511151231257827021181583404541015625
              ]
            ]
          ]
        ], 
        'parallax_easing' => [
          'label' => 'Easing', 
          'description' => 'Set the animation easing. Zero transitions at an even speed, a positive value starts off quickly while a negative value starts off slowly.', 
          'type' => 'range', 
          'attrs' => [
            'min' => -2, 
            'max' => 2, 
            'step' => 0.1000000000000000055511151231257827021181583404541015625
          ]
        ], 
        'parallax_viewport' => [
          'label' => 'Viewport', 
          'description' => 'Set the animation end point relative to viewport height, e.g. <code>0.5</code> for 50% of the viewport', 
          'type' => 'range', 
          'attrs' => [
            'min' => 0.1000000000000000055511151231257827021181583404541015625, 
            'max' => 1, 
            'step' => 0.1000000000000000055511151231257827021181583404541015625
          ]
        ], 
        'parallax_target' => [
          'label' => 'Target', 
          'type' => 'checkbox', 
          'text' => 'Animate the element as long as the section is visible'
        ], 
        'parallax_zindex' => [
          'label' => 'Z Index', 
          'type' => 'checkbox', 
          'text' => 'Set a higher stacking order.'
        ], 
        'parallax_breakpoint' => [
          'label' => 'Breakpoint', 
          'description' => 'Display the parallax effect only on this device width and larger.', 
          'type' => 'select', 
          'options' => [
            'Always' => '', 
            'Small (Phone Landscape)' => 's', 
            'Medium (Tablet Landscape)' => 'm', 
            'Large (Desktop)' => 'l', 
            'X-Large (Large Screens)' => 'xl'
          ]
        ]
      ]
    ]
  ]
];
