<?php // $file = /home/esteveza/public_html/mrv/wp-content/themes/yootheme/vendor/yootheme/builder-templates/config/customizer.json

return [
  'sections' => [
    'builder-templates' => [
      'title' => 'Templates', 
      'priority' => 25, 
      'views' => $config->get('theme.views'), 
      'fieldset' => [
        'default' => [
          'fields' => [
            'name' => [
              'label' => 'Name', 
              'description' => 'Define a name to easily identify the template.', 
              'attrs' => [
                'required' => true, 
                'autofocus' => true
              ]
            ], 
            'status' => [
              'label' => 'Status', 
              'description' => 'Disable your template and publish it later. It will only be shown to the editor while the customizer is open.', 
              'type' => 'checkbox', 
              'text' => 'Disable template', 
              'attrs' => [
                'true-value' => 'disabled', 
                'false-value' => ''
              ]
            ], 
            'type' => [
              'label' => 'Page', 
              'description' => 'Choose the page to which the template is assigned.', 
              'type' => 'select', 
              'default' => '', 
              'options' => [
                'None' => ''
              ]
            ]
          ]
        ]
      ]
    ]
  ]
];
