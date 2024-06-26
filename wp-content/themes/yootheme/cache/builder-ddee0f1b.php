<?php // $file = C:/xampp/htdocs/esteveza/wp-content/themes/yootheme/vendor/yootheme/builder-source/config/builder.json

return [
  'source' => [
    'type' => 'fields', 
    'fields' => [
      '_source' => [
        'label' => 'Dynamic Content', 
        'type' => 'source-select', 
        'description' => 'Select a content source to make its fields available for mapping. Choose between sources of the current page or query a custom source.'
      ], 
      '_sourceArgs' => [
        'type' => 'source-query-args'
      ], 
      '_sourceField' => [
        'label' => 'Multiple Items Source', 
        'type' => 'source-field-select', 
        'description' => 'By default, fields of related sources with single items are available for mapping. Select a related source which has multiple items to map its fields.', 
        'show' => 'this.Source.getSourceFieldOptions(this.node)'
      ], 
      '_sourceFieldArgs' => [
        'type' => 'source-field-args'
      ], 
      '_sourceSliceDirective' => [
        'type' => 'source-field-directive', 
        'directive' => 'slice', 
        'fields' => [
          '_grid' => [
            'description' => 'Set the starting point and limit the number of items.', 
            'type' => 'grid', 
            'width' => '1-2', 
            'fields' => [
              'offset' => [
                'label' => 'Start', 
                'type' => 'number', 
                'default' => 0, 
                'modifier' => 1, 
                'attrs' => [
                  'min' => 1, 
                  'required' => true
                ]
              ], 
              'limit' => [
                'label' => 'Quantity', 
                'type' => 'limit', 
                'attrs' => [
                  'placeholder' => 'No limit', 
                  'min' => 0
                ]
              ]
            ]
          ]
        ]
      ], 
      '_sourceCondition' => [
        'type' => 'fields', 
        'fields' => [
          '_sourceConditionProp' => [
            'label' => 'Dynamic Condition', 
            'prop' => '_condition', 
            'type' => 'source-prop-select', 
            'description' => 'Set a condition to display the element or its item depending on the content of a field.'
          ], 
          '_sourceConditionArgs' => [
            'type' => 'source-prop-filters', 
            'prop' => '_condition', 
            'fields' => [
              '_grid' => [
                'type' => 'grid', 
                'width' => '1-2', 
                'fields' => [
                  'condition' => [
                    'label' => 'Condition', 
                    'type' => 'select', 
                    'default' => '!!', 
                    'options' => [
                      'Is empty' => '!', 
                      'Is not empty' => '!!', 
                      'Is equal to' => '=', 
                      'Is not equal to' => '!=', 
                      'Contains' => '~=', 
                      'Does not contain' => '!~=', 
                      'Less than' => '<', 
                      'Greater than' => '>', 
                      'Starts with' => '^=', 
                      'Does not start with' => '!^=', 
                      'Ends with' => '$=', 
                      'Does not end with' => '!$='
                    ]
                  ], 
                  'condition_value' => [
                    'label' => 'Value', 
                    'enable' => '$match(condition, \'=|<|>\')'
                  ]
                ]
              ]
            ]
          ]
        ], 
        'show' => 'this.Source.getSourceField(this.node)'
      ]
    ]
  ]
];
