<?php // $file = /home/esteveza/public_html/mrv/wp-content/themes/yootheme/vendor/yootheme/builder-source/config/customizer.json

return [
  '@extend' => [$filter->apply('path', '../../builder-templates/config/customizer.json', $file)], 
  'sources' => [
    'filters' => [
      'before' => [
        'label' => 'Before', 
        'description' => 'Add text before the content field.'
      ], 
      'after' => [
        'label' => 'After', 
        'description' => 'Add text after the content field.'
      ], 
      'search' => [
        'label' => 'Search', 
        'description' => 'Select a predefined search pattern or enter a custom string or regular expression to search for. The regular expression has to be enclosed between slashes. For example `my-string` or `/ab+c/`.', 
        'type' => 'data-list', 
        'default' => '', 
        'options' => [
          'URL Protocol' => '/https?:\\/\\//', 
          'Hyphen and Underscore' => '/[\\-_]/'
        ]
      ], 
      'replace' => [
        'label' => 'Replace', 
        'description' => 'Enter the replacement string which may contain references. If left empty, the search matches will be removed.'
      ], 
      'limit' => [
        'label' => 'Content Length', 
        'description' => 'Limit the content length to a number of characters. All HTML elements will be stripped.', 
        'type' => 'number', 
        'attrs' => [
          'placeholder' => 'No limit.'
        ]
      ], 
      'date' => [
        'label' => 'Date Format', 
        'description' => 'Select a predefined date format or enter a custom format.', 
        'type' => 'data-list', 
        'default' => '', 
        'options' => [
          'Aug 6, 1999 (M j, Y)' => 'M j, Y', 
          'August 06, 1999 (F d, Y)' => 'F d, Y', 
          '08/06/1999 (m/d/Y)' => 'm/d/Y', 
          '08.06.1999 (m.d.Y)' => 'm.d.Y', 
          '6 Aug, 1999 (j M, Y)' => 'j M, Y', 
          'Tuesday, Aug 06 (l, M d)' => 'l, M d', 
          '15:00 (G:i)' => 'G:i', 
          '3:00 pm (g:i A)' => 'g:i a'
        ], 
        'attrs' => [
          'placeholder' => 'Default'
        ]
      ]
    ]
  ]
];
