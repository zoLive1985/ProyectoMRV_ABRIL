<?php // $file = /home/esteveza/public_html/mrv/wp-content/themes/yootheme/vendor/yootheme/theme/config/customizer.json

return [
  '@import' => [$filter->apply('path', '../../builder/config/customizer.json', $file), $filter->apply('path', '../../styler/config/customizer.json', $file), $filter->apply('path', '../../theme-cookie/config/customizer.json', $file), $filter->apply('path', '../../theme-settings/config/customizer.json', $file)], 
  'base' => $config->get('theme.url'), 
  'name' => $config->get('theme.name'), 
  'version' => $config->get('theme.version'), 
  'help' => 'https://yootheme.com', 
  'api' => 'https://yootheme.com/api', 
  'sections' => [
    'layout' => [
      'title' => 'Layout', 
      'priority' => 10, 
      'fields' => [
        'layout' => [
          'type' => 'menu', 
          'items' => [
            'site' => 'Site', 
            'header' => 'Header', 
            'mobile' => 'Mobile', 
            'top' => 'Top', 
            'sidebar' => 'Sidebar', 
            'bottom' => 'Bottom', 
            'footer-builder' => 'Footer', 
            'system-blog' => 'Blog', 
            'system-post' => 'Post'
          ]
        ]
      ]
    ]
  ], 
  'panels' => [
    'site' => [
      'title' => 'Site', 
      'width' => 400, 
      'fields' => [
        'logo.text' => [
          'label' => 'Logo Text', 
          'description' => 'The logo text will be used, if no logo image has been picked.'
        ], 
        'logo.image' => [
          'label' => 'Logo Image', 
          'description' => 'Select your logo image.', 
          'type' => 'image'
        ], 
        'logo.image_dimension' => [
          'type' => 'grid', 
          'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically and where possible, high resolution images will be auto-generated.', 
          'fields' => [
            'logo.image_width' => [
              'label' => 'Width', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto'
              ]
            ], 
            'logo.image_height' => [
              'label' => 'Height', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto'
              ]
            ]
          ], 
          'show' => 'logo.image || logo.image_inverse'
        ], 
        'logo.image_inverse' => [
          'label' => 'Inverse Logo (Optional)', 
          'description' => 'Select an alternative logo with inversed color, e.g. white, for better visibility on dark backgrounds. It will be displayed automatically, if needed.', 
          'type' => 'image'
        ], 
        'logo.image_mobile' => [
          'label' => 'Mobile Logo (Optional)', 
          'description' => 'Select an alternative logo, which will be used on small devices.', 
          'type' => 'image'
        ], 
        'logo.image_mobile_dimension' => [
          'type' => 'grid', 
          'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically and where possible, high resolution images will be auto-generated.', 
          'fields' => [
            'logo.image_mobile_width' => [
              'label' => 'Width', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto'
              ]
            ], 
            'logo.image_mobile_height' => [
              'label' => 'Height', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto'
              ]
            ]
          ], 
          'show' => 'logo.image_mobile'
        ], 
        'site.layout' => [
          'label' => 'Layout', 
          'type' => 'select', 
          'options' => [
            'Full Width' => 'full', 
            'Boxed' => 'boxed'
          ]
        ], 
        'site.boxed.alignment' => [
          'type' => 'checkbox', 
          'text' => 'Center', 
          'enable' => 'site.layout == \'boxed\''
        ], 
        'site.boxed.margin_top' => [
          'type' => 'checkbox', 
          'text' => 'Add top margin', 
          'enable' => 'site.layout == \'boxed\''
        ], 
        'site.boxed.margin_bottom' => [
          'type' => 'checkbox', 
          'text' => 'Add bottom margin', 
          'enable' => 'site.layout == \'boxed\''
        ], 
        'site.boxed.header_outside' => [
          'type' => 'checkbox', 
          'text' => 'Display header outside the container', 
          'enable' => 'site.layout == \'boxed\''
        ], 
        'site.boxed.media' => [
          'label' => 'Image', 
          'description' => 'Upload an optional background image that covers the page. It will be fixed while scrolling.', 
          'type' => 'image', 
          'enable' => 'site.layout == \'boxed\''
        ], 
        'site.boxed._media' => [
          'type' => 'button-panel', 
          'panel' => 'site-media', 
          'text' => 'Edit Settings', 
          'show' => 'site.layout == \'boxed\' && site.boxed.media'
        ], 
        'site.boxed.header_transparent' => [
          'label' => 'Transparent Header', 
          'description' => 'Make the header transparent and overlay the page background.', 
          'type' => 'select', 
          'options' => [
            'None' => '', 
            'Overlay (Light)' => 'light', 
            'Overlay (Dark)' => 'dark'
          ], 
          'enable' => 'site.layout == \'boxed\' && site.boxed.header_outside'
        ], 
        'site.toolbar_width' => [
          'label' => 'Toolbar', 
          'type' => 'select', 
          'options' => [
            'Default' => 'default', 
            'Small' => 'small', 
            'Large' => 'large', 
            'XLarge' => 'xlarge', 
            'Expand' => 'expand'
          ]
        ], 
        'site.toolbar_center' => [
          'type' => 'checkbox', 
          'text' => 'Center'
        ], 
        'site.toolbar_transparent' => [
          'type' => 'checkbox', 
          'text' => 'Inherit transparency from header'
        ], 
        'site.breadcrumbs' => [
          'label' => 'Breadcrumbs', 
          'type' => 'checkbox', 
          'text' => 'Display the breadcrumb navigation'
        ], 
        'site.breadcrumbs_show_current' => [
          'text' => 'Show current page', 
          'type' => 'checkbox', 
          'enable' => 'site.breadcrumbs'
        ], 
        'site.breadcrumbs_show_home' => [
          'description' => 'Show or hide the home link as first item as well as the current page as last item in the breadcrumb navigation.', 
          'text' => 'Show home link', 
          'type' => 'checkbox', 
          'enable' => 'site.breadcrumbs'
        ], 
        'site.breadcrumbs_home_text' => [
          'label' => 'Breadcrumbs Home Text', 
          'description' => 'Enter the text for the home link.', 
          'attrs' => [
            'placeholder' => 'Home'
          ], 
          'enable' => 'site.breadcrumbs && site.breadcrumbs_show_home'
        ]
      ]
    ], 
    'site-media' => [
      'title' => 'Image', 
      'width' => 400, 
      'fields' => [
        'site.image_dimension' => [
          'type' => 'grid', 
          'description' => 'Set the width and height in pixels (e.g. 600). Setting just one value preserves the original proportions. The image will be resized and cropped automatically.', 
          'fields' => [
            'site.image_width' => [
              'label' => 'Width', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto'
              ]
            ], 
            'site.image_height' => [
              'label' => 'Height', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto'
              ]
            ]
          ]
        ], 
        'site.image_size' => [
          'label' => 'Image Size', 
          'description' => 'Determine whether the image will fit the page dimensions by clipping it or by filling the empty areas with the background color.', 
          'type' => 'select', 
          'options' => [
            'Auto' => '', 
            'Cover' => 'cover', 
            'Contain' => 'contain'
          ]
        ], 
        'site.image_position' => [
          'label' => 'Image Position', 
          'description' => 'Set the initial background position, relative to the page layer.', 
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
        'site.image_effect' => [
          'label' => 'Image Effect', 
          'description' => 'Add a parallax effect or fix the background with regard to the viewport while scrolling.', 
          'type' => 'select', 
          'options' => [
            'None' => '', 
            'Parallax' => 'parallax', 
            'Fixed' => 'fixed'
          ]
        ], 
        'site._image_parallax_bgx' => [
          'type' => 'grid', 
          'fields' => [
            'site.image_parallax_bgx_start' => [
              'label' => 'Horizontal Start', 
              'type' => 'range', 
              'attrs' => [
                'min' => -600, 
                'max' => 600, 
                'step' => 10
              ]
            ], 
            'site.image_parallax_bgx_end' => [
              'label' => 'Horizontal End', 
              'type' => 'range', 
              'attrs' => [
                'min' => -600, 
                'max' => 600, 
                'step' => 10
              ]
            ]
          ], 
          'show' => 'site.image_effect == \'parallax\''
        ], 
        'site._image_parallax_bgy' => [
          'type' => 'grid', 
          'fields' => [
            'site.image_parallax_bgy_start' => [
              'label' => 'Vertical Start', 
              'type' => 'range', 
              'attrs' => [
                'min' => -600, 
                'max' => 600, 
                'step' => 10
              ]
            ], 
            'site.image_parallax_bgy_end' => [
              'label' => 'Vertical End', 
              'type' => 'range', 
              'attrs' => [
                'min' => -600, 
                'max' => 600, 
                'step' => 10
              ]
            ]
          ], 
          'show' => 'site.image_effect == \'parallax\''
        ], 
        'site.image_parallax_easing' => [
          'label' => 'Parallax Easing', 
          'description' => 'Set the animation easing. Zero transitions at an even speed, a positive value starts off quickly while a negative value starts off slowly.', 
          'type' => 'range', 
          'attrs' => [
            'min' => -2, 
            'max' => 2, 
            'step' => 0.1000000000000000055511151231257827021181583404541015625
          ], 
          'show' => 'site.image_effect == \'parallax\''
        ], 
        'site.image_parallax_breakpoint' => [
          'label' => 'Parallax Breakpoint', 
          'description' => 'Display the parallax effect only on this device width and larger.', 
          'type' => 'select', 
          'options' => [
            'Always' => '', 
            'Small (Phone Landscape)' => 's', 
            'Medium (Tablet Landscape)' => 'm', 
            'Large (Desktop)' => 'l', 
            'X-Large (Large Screens)' => 'x'
          ], 
          'show' => 'site.image_effect == \'parallax\''
        ], 
        'site.image_visibility' => [
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
        'site.media_background' => [
          'label' => 'Background Color', 
          'description' => 'Use the background color in combination with blend modes, a transparent image or to fill the area if the image doesn\'t cover the whole page.', 
          'type' => 'color'
        ], 
        'site.media_blend_mode' => [
          'label' => 'Blend Mode', 
          'description' => 'Determine how the image will blend with the background color.', 
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
        'site.media_overlay' => [
          'label' => 'Overlay Color', 
          'description' => 'Set an additional transparent overlay to soften the image.', 
          'type' => 'color'
        ]
      ]
    ], 
    'header' => [
      'title' => 'Header', 
      'width' => 400, 
      'fields' => [
        'header.layout' => [
          'label' => 'Layout', 
          'title' => 'Select header layout', 
          'type' => 'select-img', 
          'options' => [
            'horizontal-left' => [
              'label' => 'Horizontal Left', 
              'src' => '$ASSETS/images/header/horizontal-left.svg'
            ], 
            'horizontal-center' => [
              'label' => 'Horizontal Center', 
              'src' => '$ASSETS/images/header/horizontal-center.svg'
            ], 
            'horizontal-right' => [
              'label' => 'Horizontal Right', 
              'src' => '$ASSETS/images/header/horizontal-right.svg'
            ], 
            'horizontal-center-logo' => [
              'label' => 'Horizontal Center Logo', 
              'src' => '$ASSETS/images/header/horizontal-center-logo.svg'
            ], 
            'stacked-center-a' => [
              'label' => 'Stacked Center A', 
              'src' => '$ASSETS/images/header/stacked-center-a.svg'
            ], 
            'stacked-center-b' => [
              'label' => 'Stacked Center B', 
              'src' => '$ASSETS/images/header/stacked-center-b.svg'
            ], 
            'stacked-center-c' => [
              'label' => 'Stacked Center C', 
              'src' => '$ASSETS/images/header/stacked-center-c.svg'
            ], 
            'stacked-center-split' => [
              'label' => 'Stacked Center Split', 
              'src' => '$ASSETS/images/header/stacked-center-split.svg'
            ], 
            'stacked-left-a' => [
              'label' => 'Stacked Left A', 
              'src' => '$ASSETS/images/header/stacked-left-a.svg'
            ], 
            'stacked-left-b' => [
              'label' => 'Stacked Left B', 
              'src' => '$ASSETS/images/header/stacked-left-b.svg'
            ], 
            'offcanvas-top-a' => [
              'label' => 'Offcanvas Top A', 
              'src' => '$ASSETS/images/header/offcanvas-top-a.svg'
            ], 
            'offcanvas-top-b' => [
              'label' => 'Offcanvas Top B', 
              'src' => '$ASSETS/images/header/offcanvas-top-b.svg'
            ], 
            'offcanvas-center-a' => [
              'label' => 'Offcanvas Center A', 
              'src' => '$ASSETS/images/header/offcanvas-center-a.svg'
            ], 
            'offcanvas-center-b' => [
              'label' => 'Offcanvas Center B', 
              'src' => '$ASSETS/images/header/offcanvas-center-b.svg'
            ], 
            'modal-top-a' => [
              'label' => 'Modal Top A', 
              'src' => '$ASSETS/images/header/modal-top-a.svg'
            ], 
            'modal-top-b' => [
              'label' => 'Modal Top B', 
              'src' => '$ASSETS/images/header/modal-top-b.svg'
            ], 
            'modal-center-a' => [
              'label' => 'Modal Center A', 
              'src' => '$ASSETS/images/header/modal-center-a.svg'
            ], 
            'modal-center-b' => [
              'label' => 'Modal Center B', 
              'src' => '$ASSETS/images/header/modal-center-b.svg'
            ]
          ]
        ], 
        'header.logo_center' => [
          'type' => 'checkbox', 
          'text' => 'Center logo', 
          'show' => '$match(header.layout, \'^offcanvas\') || $match(header.layout, \'^modal\')'
        ], 
        'header.width' => [
          'label' => 'Max Width', 
          'type' => 'select', 
          'options' => [
            'Default' => 'default', 
            'Small' => 'small', 
            'Large' => 'large', 
            'XLarge' => 'xlarge', 
            'Expand' => 'expand'
          ]
        ], 
        'header.logo_padding_remove' => [
          'description' => 'Set the maximum header width.', 
          'type' => 'checkbox', 
          'text' => 'Remove left logo padding', 
          'enable' => 'header.width == \'expand\' && !$match(header.layout, \'^stacked|^horizontal-center-logo\') && !(header.logo_center && ($match(header.layout, \'^offcanvas|^modal\')))'
        ], 
        'navbar.sticky' => [
          'label' => 'Navbar', 
          'description' => 'Let the navbar stick at the top of the viewport while scrolling or only when scrolling up.', 
          'type' => 'select', 
          'default' => 0, 
          'options' => [
            'Static' => 0, 
            'Sticky' => 1, 
            'Sticky on scroll up' => 2
          ]
        ], 
        'navbar.style' => [
          'label' => 'Navbar Style', 
          'description' => 'Select the navbar style.', 
          'type' => 'select', 
          'options' => [
            'Default' => '', 
            'Primary' => 'primary'
          ]
        ], 
        'navbar.items' => [
          'label' => 'Navbar Items', 
          'description' => 'Enter a subtitle, set the dropdown width and the number of dropdown columns for each navbar item.', 
          'type' => 'button-panel', 
          'text' => 'Edit Items', 
          'panel' => 'navbar-items'
        ], 
        'navbar.dropdown_align' => [
          'label' => 'Dropdown', 
          'type' => 'select', 
          'options' => [
            'Left' => 'left', 
            'Right' => 'right', 
            'Center' => 'center'
          ], 
          'show' => '$match(header.layout, \'^horizontal\') || $match(header.layout, \'^stacked\')'
        ], 
        'navbar.dropdown_boundary' => [
          'type' => 'checkbox', 
          'text' => 'Align to navbar instead of the menu item', 
          'show' => '$match(header.layout, \'^horizontal\') || $match(header.layout, \'^stacked\')'
        ], 
        'navbar.dropdown_click' => [
          'description' => 'Select the dropdown\'s alignment to the menu item or the navbar. If the dropdown sticks out of the viewport, it will be flipped automatically.', 
          'type' => 'checkbox', 
          'text' => 'Enable click mode on text items', 
          'show' => '$match(header.layout, \'^horizontal\') || $match(header.layout, \'^stacked\')'
        ], 
        'navbar.dropbar' => [
          'label' => 'Dropbar', 
          'description' => 'The dropbar converts the classic dropdown to a full-width section. The Push option behaves the same as Slide, if a transparent overlay header is enabled or the navbar is set to sticky.', 
          'type' => 'select', 
          'options' => [
            'None' => '', 
            'Slide' => 'slide', 
            'Push' => 'push'
          ], 
          'show' => '$match(header.layout, \'^horizontal\') || $match(header.layout, \'^stacked\')'
        ], 
        'navbar.toggle_text' => [
          'label' => 'Menu Toggle', 
          'type' => 'checkbox', 
          'text' => 'Show the menu text next to the icon', 
          'show' => '$match(header.layout, \'^offcanvas\') || $match(header.layout, \'^modal\')'
        ], 
        'navbar.toggle_menu_style' => [
          'label' => 'Menu Style', 
          'type' => 'select', 
          'options' => [
            'Default' => 'default', 
            'Primary' => 'primary'
          ], 
          'show' => '$match(header.layout, \'^offcanvas\') || $match(header.layout, \'^modal\')'
        ], 
        'navbar.toggle_menu_center' => [
          'description' => 'Select the style and text alignment for the menu in the offcanvas bar or modal window.', 
          'type' => 'checkbox', 
          'text' => 'Center horizontally', 
          'show' => '$match(header.layout, \'^offcanvas\') || $match(header.layout, \'^modal\')'
        ], 
        'navbar.offcanvas.mode' => [
          'label' => 'Offcanvas Mode', 
          'type' => 'select', 
          'options' => [
            'Slide' => 'slide', 
            'Reveal' => 'reveal', 
            'Push' => 'push'
          ], 
          'show' => '$match(header.layout, \'^offcanvas\')'
        ], 
        'navbar.offcanvas.overlay' => [
          'type' => 'checkbox', 
          'text' => 'Overlay the site', 
          'show' => '$match(header.layout, \'^offcanvas\')'
        ], 
        'header.search' => [
          'label' => 'Search', 
          'description' => 'Select the position that will display the search.', 
          'type' => 'select', 
          'options' => [
            'Hide' => '', 
            'Header' => 'header', 
            'Navbar' => 'navbar'
          ]
        ], 
        'header.search_style' => [
          'label' => 'Search Style', 
          'description' => 'Select the search style.', 
          'type' => 'select', 
          'options' => [
            'Default' => '', 
            'Modal' => 'modal'
          ], 
          'show' => '$match(header.layout, \'^(horizontal|stacked)\')'
        ], 
        'header.social' => [
          'label' => 'Social Icons', 
          'type' => 'select', 
          'options' => [
            'Hide' => '', 
            'Toolbar Left' => 'toolbar-left', 
            'Toolbar Right' => 'toolbar-right', 
            'Header' => 'header', 
            'Navbar' => 'navbar'
          ]
        ], 
        'header.social_links' => [
          'type' => 'button-panel', 
          'text' => 'Edit Links', 
          'panel' => 'social-links'
        ], 
        'header.social_target' => [
          'type' => 'checkbox', 
          'text' => 'Open in a new window'
        ], 
        'header.social_style' => [
          'type' => 'checkbox', 
          'text' => 'Display icons as buttons', 
          'description' => 'Select the position that will display the social icons. Be sure to add your social profile links or no icons can be displayed.'
        ], 
        'header.social_width' => [
          'label' => 'Social Icons Size', 
          'description' => 'Set the icon width.', 
          'attrs' => [
            'placeholder' => '20'
          ], 
          'show' => 'header.social'
        ], 
        'header.social_gap' => [
          'label' => 'Social Icons Gap', 
          'description' => 'Set the size of the gap between the social icons.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Medium' => 'medium', 
            'Default' => '', 
            'Large' => 'large', 
            'None' => 'collapse'
          ], 
          'show' => 'header.social'
        ]
      ]
    ], 
    'navbar-items' => [
      'title' => 'Navbar Items', 
      'width' => 400, 
      'fields' => [
        'items' => [
          'type' => 'menu-items', 
          'position' => 'navbar', 
          'fields' => [
            'subtitle' => [
              'label' => 'Subtitle', 
              'description' => 'Enter a subtitle that will be displayed beneath the nav item.', 
              'type' => 'text'
            ], 
            'columns' => [
              'label' => 'Columns', 
              'description' => 'Split the dropdown into columns.', 
              'type' => 'select', 
              'level' => 0, 
              'default' => 1, 
              'options' => [
                1 => 1, 
                2 => 2, 
                3 => 3, 
                4 => 4, 
                5 => 5
              ], 
              'show' => '$match(header.layout, \'^horizontal\') || $match(header.layout, \'^stacked\')'
            ], 
            'justify' => [
              'label' => 'Width', 
              'description' => 'The justified dropdown expands to the navbar boundary.', 
              'type' => 'checkbox', 
              'text' => 'Justify dropdown', 
              'show' => '$match(header.layout, \'^horizontal\') || $match(header.layout, \'^stacked\')'
            ]
          ]
        ]
      ]
    ], 
    'social-links' => [
      'title' => 'Social Links', 
      'width' => 400, 
      'fields' => [
        'social_links.0' => [
          'label' => 'Links', 
          'attrs' => [
            'placeholder' => 'https://'
          ]
        ], 
        'social_links.1' => [
          'attrs' => [
            'placeholder' => 'https://'
          ]
        ], 
        'social_links.2' => [
          'attrs' => [
            'placeholder' => 'https://'
          ]
        ], 
        'social_links.3' => [
          'attrs' => [
            'placeholder' => 'https://'
          ]
        ], 
        'social_links.4' => [
          'description' => 'Enter up to 5 links to your social profiles. A corresponding <a href="https://getuikit.com/docs/icon" target="_blank">UIkit brand icon</a> will be displayed automatically, if available. Links to email addresses and phone numbers, like mailto:info@example.com or tel:+491570156, are also supported.', 
          'attrs' => [
            'placeholder' => 'https://'
          ]
        ]
      ]
    ], 
    'mobile' => [
      'title' => 'Mobile', 
      'width' => 400, 
      'fields' => [
        'mobile.breakpoint' => [
          'label' => 'Breakpoint', 
          'description' => 'Select the device size that will replace the default header with the mobile header.', 
          'type' => 'select', 
          'options' => [
            'Small' => 's', 
            'Medium' => 'm', 
            'Large' => 'l'
          ]
        ], 
        'mobile.sticky' => [
          'label' => 'Navbar', 
          'description' => 'Let the navbar stick at the top of the viewport while scrolling or only when scrolling up.', 
          'type' => 'select', 
          'default' => 0, 
          'options' => [
            'Static' => 0, 
            'Sticky' => 1, 
            'Sticky on scroll up' => 2
          ]
        ], 
        'mobile.logo' => [
          'label' => 'Logo', 
          'type' => 'select', 
          'options' => [
            'Hide' => '', 
            'Left' => 'left', 
            'Center' => 'center', 
            'Right' => 'right'
          ]
        ], 
        'mobile.logo_padding_remove' => [
          'type' => 'checkbox', 
          'text' => 'Remove logo padding', 
          'show' => 'mobile.logo == \'left\' || mobile.logo == \'right\''
        ], 
        'mobile.logo_description' => [
          'description' => 'Select the alignment of the logo.', 
          'type' => 'description'
        ], 
        'mobile.toggle' => [
          'label' => 'Menu Toggle', 
          'type' => 'select', 
          'options' => [
            'Hide' => '', 
            'Left' => 'left', 
            'Right' => 'right'
          ]
        ], 
        'mobile.toggle_text' => [
          'description' => 'Select the alignment of the menu toggle icon. The toggle will only show up, if content is published in the mobile position.', 
          'type' => 'checkbox', 
          'text' => 'Show the menu text next to the icon', 
          'show' => 'mobile.toggle'
        ], 
        'mobile.menu_style' => [
          'label' => 'Menu Style', 
          'type' => 'select', 
          'options' => [
            'Default' => 'default', 
            'Primary' => 'primary'
          ]
        ], 
        'mobile.menu_center' => [
          'description' => 'Select the navigation style and text alignment.', 
          'type' => 'checkbox', 
          'text' => 'Center horizontally'
        ], 
        'mobile.animation' => [
          'label' => 'Menu Animation', 
          'description' => 'Select the menu type displayed in the mobile position.', 
          'type' => 'select', 
          'options' => [
            'Offcanvas' => 'offcanvas', 
            'Modal' => 'modal', 
            'Dropdown' => 'dropdown'
          ]
        ], 
        'mobile.menu_center_vertical' => [
          'type' => 'checkbox', 
          'text' => 'Center vertically', 
          'show' => 'mobile.animation == \'offcanvas\' || mobile.animation == \'modal\''
        ], 
        'mobile.offcanvas.mode' => [
          'label' => 'Offcanvas Mode', 
          'type' => 'select', 
          'options' => [
            'Slide' => 'slide', 
            'Reveal' => 'reveal', 
            'Push' => 'push'
          ], 
          'show' => 'mobile.animation == \'offcanvas\''
        ], 
        'mobile.offcanvas.flip' => [
          'type' => 'checkbox', 
          'text' => 'Display on the right', 
          'show' => 'mobile.animation == \'offcanvas\''
        ], 
        'mobile.dropdown' => [
          'label' => 'Dropdown Animation', 
          'type' => 'select', 
          'default' => 'slide', 
          'options' => [
            'Slide' => 'slide', 
            'Push' => 'push'
          ], 
          'show' => 'mobile.animation == \'dropdown\''
        ]
      ]
    ], 
    'top' => [
      'title' => 'Top', 
      'width' => 400, 
      'fields' => [
        'top.style' => [
          'label' => 'Style', 
          'type' => 'select', 
          'options' => [
            'Default' => 'default', 
            'Muted' => 'muted', 
            'Primary' => 'primary', 
            'Secondary' => 'secondary'
          ]
        ], 
        'top.overlap' => [
          'type' => 'checkbox', 
          'description' => 'Sections will only overlap each other, if it\'s supported by the style. Otherwise it has no visual effect.', 
          'text' => 'Overlap the following section'
        ], 
        'top.image' => [
          'label' => 'Image', 
          'description' => 'Upload a background image.', 
          'type' => 'image', 
          'show' => '!top.video'
        ], 
        'top.video' => [
          'label' => 'Video', 
          'description' => 'Select a video file or enter a link from <a href="https://www.youtube.com" target="_blank">YouTube</a> or <a href="https://vimeo.com" target="_blank">Vimeo</a>.', 
          'type' => 'video', 
          'show' => '!top.image'
        ], 
        'top.media' => [
          'type' => 'button-panel', 
          'text' => 'Edit Settings', 
          'panel' => 'top-media', 
          'show' => '(top.image || top.video)'
        ], 
        'top.preserve_color' => [
          'label' => 'Text Color', 
          'description' => 'Disable automatic text recoloring, for example when you use cards inside sections.', 
          'type' => 'checkbox', 
          'text' => 'Preserve color', 
          'show' => 'top.style == \'primary\' || top.style == \'secondary\''
        ], 
        'top.text_color' => [
          'label' => 'Text Color', 
          'description' => 'Set light or dark color mode for text, buttons and controls.', 
          'type' => 'select', 
          'options' => [
            'None' => '', 
            'Light' => 'light', 
            'Dark' => 'dark'
          ], 
          'show' => 'top.style != \'primary\' && top.style != \'secondary\' && (top.image || top.video)'
        ], 
        'top.width' => [
          'label' => 'Max Width', 
          'description' => 'Set the maximum content width.', 
          'type' => 'select', 
          'options' => [
            'Default' => 'default', 
            'Small' => 'small', 
            'Large' => 'large', 
            'XLarge' => 'xlarge', 
            'Expand' => 'expand', 
            'None' => ''
          ]
        ], 
        'top.height' => [
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
        'top.padding' => [
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
        'top.padding_remove_top' => [
          'type' => 'checkbox', 
          'text' => 'Remove top padding', 
          'enable' => 'top.padding != \'none\''
        ], 
        'top.padding_remove_bottom' => [
          'type' => 'checkbox', 
          'text' => 'Remove bottom padding', 
          'enable' => 'top.padding != \'none\''
        ], 
        'top.header_transparent' => [
          'label' => 'Transparent Header', 
          'type' => 'select', 
          'options' => [
            'None' => '', 
            'Overlay (Light)' => 'light', 
            'Overlay (Dark)' => 'dark'
          ]
        ], 
        'top.header_transparent_noplaceholder' => [
          'description' => 'Make the header transparent and overlay the section background. Select dark or light text. Note: This only applies, if the section directly follows the header.', 
          'type' => 'checkbox', 
          'text' => 'Pull content beneath navbar', 
          'enable' => 'top.header_transparent'
        ], 
        'top.column_gap' => [
          'label' => 'Column Gap', 
          'description' => 'Set the size of the gap between the grid columns.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Medium' => 'medium', 
            'Default' => '', 
            'Large' => 'large', 
            'None' => 'collapse'
          ]
        ], 
        'top.row_gap' => [
          'label' => 'Row Gap', 
          'description' => 'Set the size of the gap between the grid rows.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Medium' => 'medium', 
            'Default' => '', 
            'Large' => 'large', 
            'None' => 'collapse'
          ]
        ], 
        'top.divider' => [
          'label' => 'Divider', 
          'description' => 'Show a divider between grid columns.', 
          'type' => 'checkbox', 
          'text' => 'Show dividers', 
          'enable' => 'top.column_gap != \'collapse\' && top.row_gap != \'collapse\''
        ], 
        'top.vertical_align' => [
          'label' => 'Vertical Alignment', 
          'description' => 'Align the section content vertically, if the section height is larger than the content itself.', 
          'type' => 'select', 
          'options' => [
            'Top' => '', 
            'Middle' => 'middle', 
            'Bottom' => 'bottom'
          ], 
          'show' => 'top.height == \'full\' || height == \'percent\' || height == \'section\''
        ], 
        'top.match' => [
          'label' => 'Panels', 
          'description' => 'Stretch the panel to match the height of the grid cell.', 
          'type' => 'checkbox', 
          'text' => 'Match height'
        ], 
        'top.breakpoint' => [
          'label' => 'Breakpoint', 
          'description' => 'Set the breakpoint from which grid items will stack.', 
          'type' => 'select', 
          'options' => [
            'Small (Phone Landscape)' => 's', 
            'Medium (Tablet Landscape)' => 'm', 
            'Large (Desktop)' => 'l', 
            'X-Large (Large Screens)' => 'xl'
          ]
        ]
      ]
    ], 
    'top-media' => [
      'title' => 'Image/Video', 
      'width' => 400, 
      'fields' => [
        'top.image_dimension' => [
          'type' => 'grid', 
          'description' => 'Set the width and height in pixels (e.g. 600). Setting just one value preserves the original proportions. The image will be resized and cropped automatically.', 
          'fields' => [
            'top.image_width' => [
              'label' => 'Width', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto'
              ]
            ], 
            'top.image_height' => [
              'label' => 'Height', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto'
              ]
            ]
          ], 
          'show' => 'top.image && !top.video'
        ], 
        'top.image_size' => [
          'label' => 'Image Size', 
          'description' => 'Determine whether the image will fit the section dimensions by clipping it or by filling the empty areas with the background color.', 
          'type' => 'select', 
          'options' => [
            'Auto' => '', 
            'Cover' => 'cover', 
            'Contain' => 'contain'
          ], 
          'show' => 'top.image && !top.video'
        ], 
        'top.image_position' => [
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
          'show' => 'top.image && !top.video'
        ], 
        'top.image_fixed' => [
          'label' => 'Image Attachment', 
          'text' => 'Fix the background with regard to the viewport.', 
          'type' => 'checkbox', 
          'show' => 'top.image && !top.video'
        ], 
        'top.image_visibility' => [
          'label' => 'Visibility', 
          'description' => 'Display the image only on this device width and larger.', 
          'type' => 'select', 
          'options' => [
            'Always' => '', 
            'Small (Phone Landscape)' => 's', 
            'Medium (Tablet Landscape)' => 'm', 
            'Large (Desktop)' => 'l', 
            'X-Large (Large Screens)' => 'xl'
          ], 
          'show' => 'top.image && !top.video'
        ], 
        'top.video_dimension' => [
          'type' => 'grid', 
          'description' => 'Set the video dimensions.', 
          'fields' => [
            'video_width' => [
              'label' => 'Width', 
              'default' => '', 
              'width' => '1-2'
            ], 
            'video_height' => [
              'label' => 'Height', 
              'default' => '', 
              'width' => '1-2'
            ]
          ], 
          'show' => 'top.video && !top.image'
        ], 
        'top.media_background' => [
          'label' => 'Background Color', 
          'description' => 'Use the background color in combination with blend modes, a transparent image or to fill the area, if the image doesn\'t cover the whole section.', 
          'type' => 'color'
        ], 
        'top.media_blend_mode' => [
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
        'top.media_overlay' => [
          'label' => 'Overlay Color', 
          'description' => 'Set an additional transparent overlay to soften the image or video.', 
          'type' => 'color'
        ]
      ]
    ], 
    'sidebar' => [
      'title' => 'Sidebar', 
      'width' => 400, 
      'fields' => [
        'main_sidebar.width' => [
          'label' => 'Width', 
          'description' => 'Set a sidebar width in percent and the content column will adjust accordingly. The width will not go below the Sidebar\'s min-width, which you can set in the Style section.', 
          'type' => 'select', 
          'options' => [
            '20%' => '1-5', 
            '25%' => '1-4', 
            '33%' => '1-3', 
            '40%' => '2-5', 
            '50%' => '1-2'
          ]
        ], 
        'main_sidebar.breakpoint' => [
          'label' => 'Breakpoint', 
          'description' => 'Set the breakpoint from which the sidebar and content will stack.', 
          'type' => 'select', 
          'options' => [
            'Small (Phone Landscape)' => 's', 
            'Medium (Tablet Landscape)' => 'm', 
            'Large (Desktop)' => 'l'
          ]
        ], 
        'main_sidebar.first' => [
          'label' => 'Order', 
          'type' => 'checkbox', 
          'text' => 'Move the sidebar to the left of the content'
        ], 
        'main_sidebar.gutter' => [
          'label' => 'Gap', 
          'description' => 'Set the padding between sidebar and content.', 
          'type' => 'select', 
          'options' => [
            'Default' => '', 
            'Small' => 'small', 
            'Large' => 'large', 
            'None' => 'collapse'
          ]
        ], 
        'main_sidebar.divider' => [
          'label' => 'Divider', 
          'type' => 'checkbox', 
          'text' => 'Display a divider between sidebar and content'
        ]
      ]
    ], 
    'bottom' => [
      'title' => 'Bottom', 
      'width' => 400, 
      'fields' => [
        'bottom.style' => [
          'label' => 'Style', 
          'type' => 'select', 
          'options' => [
            'Default' => 'default', 
            'Muted' => 'muted', 
            'Primary' => 'primary', 
            'Secondary' => 'secondary'
          ]
        ], 
        'bottom.overlap' => [
          'type' => 'checkbox', 
          'description' => 'Sections will only overlap each other, if it\'s supported by the style. Otherwise it has no visual effect.', 
          'text' => 'Overlap the following section'
        ], 
        'bottom.image' => [
          'label' => 'Image', 
          'description' => 'Upload a background image.', 
          'type' => 'image', 
          'show' => '!bottom.video'
        ], 
        'bottom.video' => [
          'label' => 'Video', 
          'description' => 'Select a video file or enter a link from <a href="https://www.youtube.com" target="_blank">YouTube</a> or <a href="https://vimeo.com" target="_blank">Vimeo</a>.', 
          'type' => 'video', 
          'show' => '!bottom.image'
        ], 
        'bottom.media' => [
          'type' => 'button-panel', 
          'text' => 'Edit Settings', 
          'panel' => 'bottom-media', 
          'show' => '(bottom.image || bottom.video)'
        ], 
        'bottom.preserve_color' => [
          'label' => 'Text Color', 
          'description' => 'Disable automatic text recoloring, for example when you use cards inside sections.', 
          'type' => 'checkbox', 
          'text' => 'Preserve color', 
          'show' => 'bottom.style == \'primary\' || bottom.style == \'secondary\''
        ], 
        'bottom.text_color' => [
          'label' => 'Text Color', 
          'description' => 'Set light or dark color mode for text, buttons and controls.', 
          'type' => 'select', 
          'options' => [
            'None' => '', 
            'Light' => 'light', 
            'Dark' => 'dark'
          ], 
          'show' => 'bottom.style != \'primary\' && bottom.style != \'secondary\' && (bottom.image || bottom.video)'
        ], 
        'bottom.width' => [
          'label' => 'Max Width', 
          'description' => 'Set the maximum content width.', 
          'type' => 'select', 
          'options' => [
            'Default' => 'default', 
            'Small' => 'small', 
            'Large' => 'large', 
            'XLarge' => 'xlarge', 
            'Expand' => 'expand', 
            'None' => ''
          ]
        ], 
        'bottom.height' => [
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
        'bottom.padding' => [
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
        'bottom.padding_remove_top' => [
          'type' => 'checkbox', 
          'text' => 'Remove top padding', 
          'enable' => 'bottom.padding != \'none\''
        ], 
        'bottom.padding_remove_bottom' => [
          'type' => 'checkbox', 
          'text' => 'Remove bottom padding', 
          'enable' => 'bottom.padding != \'none\''
        ], 
        'bottom.column_gap' => [
          'label' => 'Column Gap', 
          'description' => 'Set the size of the gap between the grid columns.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Medium' => 'medium', 
            'Default' => '', 
            'Large' => 'large', 
            'None' => 'collapse'
          ]
        ], 
        'bottom.row_gap' => [
          'label' => 'Row Gap', 
          'description' => 'Set the size of the gap between the grid rows.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Medium' => 'medium', 
            'Default' => '', 
            'Large' => 'large', 
            'None' => 'collapse'
          ]
        ], 
        'bottom.divider' => [
          'label' => 'Divider', 
          'description' => 'Show a divider between grid columns.', 
          'type' => 'checkbox', 
          'text' => 'Show dividers', 
          'enable' => 'bottom.column_gap != \'collapse\' && bottom.row_gap != \'collapse\''
        ], 
        'bottom.vertical_align' => [
          'label' => 'Vertical Alignment', 
          'description' => 'Align the section content vertically, if the section height is larger than the content itself.', 
          'type' => 'select', 
          'options' => [
            'Top' => '', 
            'Middle' => 'middle', 
            'Bottom' => 'bottom'
          ], 
          'show' => 'bottom.height == \'full\' || height == \'percent\' || height == \'section\''
        ], 
        'bottom.match' => [
          'label' => 'Panels', 
          'description' => 'Stretch the panel to match the height of the grid cell.', 
          'type' => 'checkbox', 
          'text' => 'Match height'
        ], 
        'bottom.breakpoint' => [
          'label' => 'Breakpoint', 
          'description' => 'Set the breakpoint from which grid items will stack.', 
          'type' => 'select', 
          'options' => [
            'Small (Phone Landscape)' => 's', 
            'Medium (Tablet Landscape)' => 'm', 
            'Large (Desktop)' => 'l', 
            'X-Large (Large Screens)' => 'xl'
          ]
        ]
      ]
    ], 
    'bottom-media' => [
      'title' => 'Image/Video', 
      'width' => 400, 
      'fields' => [
        'bottom.image_dimension' => [
          'type' => 'grid', 
          'description' => 'Set the width and height in pixels (e.g. 600). Setting just one value preserves the original proportions. The image will be resized and cropped automatically.', 
          'fields' => [
            'bottom.image_width' => [
              'label' => 'Width', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto'
              ]
            ], 
            'bottom.image_height' => [
              'label' => 'Height', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto'
              ]
            ]
          ], 
          'show' => 'bottom.image && !bottom.video'
        ], 
        'bottom.image_size' => [
          'label' => 'Image Size', 
          'description' => 'Determine whether the image will fit the section dimensions by clipping it or by filling the empty areas with the background color.', 
          'type' => 'select', 
          'options' => [
            'Auto' => '', 
            'Cover' => 'cover', 
            'Contain' => 'contain'
          ], 
          'show' => 'bottom.image && !bottom.video'
        ], 
        'bottom.image_position' => [
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
          'show' => 'bottom.image && !bottom.video'
        ], 
        'bottom.image_fixed' => [
          'label' => 'Image Attachment', 
          'text' => 'Fix the background with regard to the viewport.', 
          'type' => 'checkbox', 
          'show' => 'bottom.image && !bottom.video'
        ], 
        'bottom.image_visibility' => [
          'label' => 'Visibility', 
          'description' => 'Display the image only on this device width and larger.', 
          'type' => 'select', 
          'options' => [
            'Always' => '', 
            'Small (Phone Landscape)' => 's', 
            'Medium (Tablet Landscape)' => 'm', 
            'Large (Desktop)' => 'l', 
            'X-Large (Large Screens)' => 'xl'
          ], 
          'show' => 'bottom.image && !bottom.video'
        ], 
        'bottom.video_dimension' => [
          'type' => 'grid', 
          'description' => 'Set the video dimensions.', 
          'fields' => [
            'video_width' => [
              'label' => 'Width', 
              'default' => '', 
              'width' => '1-2'
            ], 
            'video_height' => [
              'label' => 'Height', 
              'default' => '', 
              'width' => '1-2'
            ]
          ], 
          'show' => 'bottom.video && !bottom.image'
        ], 
        'bottom.media_background' => [
          'label' => 'Background Color', 
          'description' => 'Use the background color in combination with blend modes, a transparent image or to fill the area, if the image doesn\'t cover the whole section.', 
          'type' => 'color'
        ], 
        'bottom.media_blend_mode' => [
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
        'bottom.media_overlay' => [
          'label' => 'Overlay Color', 
          'description' => 'Set an additional transparent overlay to soften the image or video.', 
          'type' => 'color'
        ]
      ]
    ], 
    'footer-builder' => [
      'title' => 'Footer', 
      'heading' => false, 
      'width' => 500
    ]
  ]
];
