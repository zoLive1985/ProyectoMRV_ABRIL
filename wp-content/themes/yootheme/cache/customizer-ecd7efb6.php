<?php // $file = C:/xampp/htdocs/esteveza/wp-content/themes/yootheme/vendor/yootheme/theme-settings/config/customizer.json

return [
  'sections' => [
    'settings' => [
      'title' => 'Settings', 
      'priority' => 60, 
      'fields' => [
        'settings' => [
          'type' => 'menu', 
          'items' => [
            'favicon' => 'Favicon', 
            'cookie' => 'Cookie Banner', 
            'custom-code' => 'Custom Code', 
            'api-key' => 'API Key', 
            'advanced' => 'Advanced', 
            'external-services' => 'External Services', 
            'systemcheck' => 'System Check', 
            'about' => 'About'
          ]
        ]
      ]
    ]
  ], 
  'panels' => [
    'favicon' => [
      'title' => 'Favicon', 
      'width' => 400, 
      'fields' => [
        'favicon' => [
          'label' => 'Favicon', 
          'description' => 'Upload your browser URL icon. It\'s recommended to apply a size of 96x96 pixels to the favicon.png.', 
          'type' => 'image', 
          'mediapicker' => [
            'unsplash' => false
          ]
        ], 
        'touchicon' => [
          'label' => 'Touch Icon', 
          'description' => 'Upload your iOS icon. It\'s recommended to apply a size of 180x180 pixels to the apple-touch-icon.png.', 
          'type' => 'image', 
          'mediapicker' => [
            'unsplash' => false
          ]
        ]
      ]
    ], 
    'custom-code' => [
      'title' => 'Custom Code', 
      'width' => 500, 
      'fields' => [
        'custom_js' => [
          'label' => 'Script', 
          'description' => 'Add custom JavaScript to your site. The &lt;script&gt; tag is not needed.', 
          'type' => 'editor', 
          'editor' => 'code', 
          'mode' => 'javascript'
        ], 
        'custom_less' => [
          'label' => 'CSS/LESS', 
          'description' => 'Add custom CSS or LESS to your site. All LESS theme variables and mixins are available. The &lt;style&gt; tag is not needed.', 
          'type' => 'editor', 
          'editor' => 'code', 
          'mode' => 'text/x-less', 
          'attrs' => [
            'id' => 'custom_less', 
            'debounce' => 1000
          ]
        ]
      ]
    ], 
    'api-key' => [
      'title' => 'API Key', 
      'width' => 400, 
      'fields' => [
        'yootheme_apikey' => [
          'label' => 'YOOtheme API Key', 
          'description' => 'Enter the API key to enable 1-click updates for YOOtheme Pro and to access the layout library as well as the Unsplash image library. You can create an API Key for this website in your <a href="https://yootheme.com/account#Websites" target="_blank">Account settings</a>.', 
          'type' => 'text', 
          'show' => 'yootheme_apikey !== false'
        ], 
        'yootheme_apikey_warning' => [
          'label' => 'YOOtheme API Key', 
          'description' => 'Please install/enable the <a href="index.php?option=com_plugins&view=plugins&filter_search=installer%20yootheme">installer plugin</a> to enable this feature.', 
          'type' => 'description', 
          'show' => 'yootheme_apikey === false'
        ]
      ]
    ], 
    'advanced' => [
      'title' => 'Advanced', 
      'width' => 400, 
      'fields' => [
        'lazyload' => [
          'label' => 'Lazy Loading', 
          'description' => 'Speed up page loading times and decrease traffic by only loading images as they enter the viewport.', 
          'text' => 'Lazy load images', 
          'type' => 'checkbox'
        ], 
        'webp' => [
          'label' => 'Next-Gen Images', 
          'description' => 'Serve optimized images in WebP format with better compression and quality than JPEG and PNG.', 
          'text' => 'Serve WebP images', 
          'type' => 'checkbox'
        ], 
        'jquery' => [
          'label' => 'jQuery', 
          'description' => 'Enable this option to write custom code based on the jQuery JavaScript library.', 
          'text' => 'Load jQuery', 
          'type' => 'checkbox'
        ], 
        'highlight' => [
          'label' => 'Syntax Highlighting', 
          'description' => 'Select the style for the code syntax highlighting. Use GitHub for light and Monokai for dark backgrounds.', 
          'type' => 'select', 
          'options' => [
            'None' => '', 
            'GitHub (Light)' => 'github', 
            'Monokai (Dark)' => 'monokai'
          ]
        ], 
        'clear_cache' => [
          'label' => 'Cache', 
          'description' => 'Clear cached images and assets. Images that need to be resized are stored in the theme\'s cache folder. After reuploading an image with the same name, you\'ll have to clear the cache.', 
          'type' => 'cache'
        ], 
        '_config' => [
          'label' => 'Theme Settings', 
          'description' => 'Export all theme settings and import them into another installation. This doesn\'t include content from the layout, style and element libraries or the template builder.', 
          'type' => 'config'
        ]
      ]
    ], 
    'external-services' => [
      'title' => 'External Services', 
      'width' => 400, 
      'fields' => [
        'google_maps' => [
          'label' => 'Google Maps', 
          'description' => 'Enter your <a href="https://developers.google.com/maps/web/" target="_blank">Google Maps</a> API key to use Google Maps instead of OpenStreetMap. It also enables additional options to style the colors of your maps.'
        ], 
        'google_analytics' => [
          'label' => 'Google Analytics', 
          'attrs' => [
            'placeholder' => 'UA-XXXXXXX-X'
          ]
        ], 
        'google_analytics_anonymize' => [
          'description' => 'Enter your <a href="https://developers.google.com/analytics/" target="_blank">Google Analytics</a> ID to enable tracking. <a href="https://support.google.com/analytics/answer/2763052" target="_blank">IP anonymization</a> may reduce tracking accuracy.', 
          'type' => 'checkbox', 
          'text' => 'IP Anonymization'
        ], 
        'mailchimp_api' => [
          'label' => 'Mailchimp API Token', 
          'description' => 'Enter your <a href="http://kb.mailchimp.com/integrations/api-integrations/about-api-keys" target="_blank">Mailchimp</a> API key for using it with the Newsletter element.'
        ], 
        'cmonitor_api' => [
          'label' => 'Campaign Monitor API Token', 
          'description' => 'Enter your <a href="https://help.campaignmonitor.com/topic.aspx?t=206" target="_blank">Campaign Monitor</a> API key for using it with the Newsletter element.'
        ]
      ]
    ], 
    'systemcheck' => [
      'title' => 'System Check', 
      'width' => 400
    ], 
    'about' => [
      'title' => 'About', 
      'width' => 400
    ]
  ]
];
