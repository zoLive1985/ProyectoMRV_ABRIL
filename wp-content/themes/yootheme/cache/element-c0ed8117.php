<?php // $file = /home/geekecua/public_html/singei/wp-content/themes/yootheme/vendor/yootheme/builder/elements/panel-slider/element.json

return [
  'name' => 'panel-slider', 
  'title' => 'Panel Slider', 
  'group' => 'multiple items', 
  'icon' => $filter->apply('url', 'images/icon.svg', $file), 
  'iconSmall' => $filter->apply('url', 'images/iconSmall.svg', $file), 
  'element' => true, 
  'container' => true, 
  'width' => 500, 
  'defaults' => [
    'show_title' => true, 
    'show_meta' => true, 
    'show_content' => true, 
    'show_image' => true, 
    'show_link' => true, 
    'slider_width' => 'fixed', 
    'slider_width_default' => '1-1', 
    'slider_width_medium' => '1-3', 
    'slider_gap' => 'default', 
    'slider_autoplay_pause' => true, 
    'nav' => 'dotnav', 
    'nav_align' => 'center', 
    'nav_breakpoint' => 's', 
    'slidenav' => 'outside', 
    'slidenav_margin' => 'medium', 
    'slidenav_breakpoint' => 'xl', 
    'slidenav_outside_breakpoint' => 'xl', 
    'panel_card_match' => true, 
    'title_hover_style' => 'reset', 
    'title_element' => 'h3', 
    'title_align' => 'top', 
    'title_grid_width' => '1-2', 
    'title_grid_breakpoint' => 'm', 
    'meta_style' => 'meta', 
    'meta_align' => 'below-title', 
    'meta_element' => 'div', 
    'content_column_breakpoint' => 'm', 
    'icon_width' => 80, 
    'image_align' => 'top', 
    'image_grid_width' => '1-2', 
    'image_grid_breakpoint' => 'm', 
    'image_svg_color' => 'emphasis', 
    'link_text' => 'Read more', 
    'link_style' => 'default', 
    'margin' => 'default'
  ], 
  'placeholder' => [
    'children' => [[
        'type' => 'panel-slider_item', 
        'props' => []
      ], [
        'type' => 'panel-slider_item', 
        'props' => []
      ], [
        'type' => 'panel-slider_item', 
        'props' => []
      ], [
        'type' => 'panel-slider_item', 
        'props' => []
      ], [
        'type' => 'panel-slider_item', 
        'props' => []
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
      'item' => 'panel-slider_item', 
      'media' => [
        'type' => 'image', 
        'item' => [
          'title' => 'title', 
          'image' => 'src'
        ]
      ]
    ], 
    'show_title' => [
      'label' => 'Display', 
      'type' => 'checkbox', 
      'text' => 'Show the title'
    ], 
    'show_meta' => [
      'type' => 'checkbox', 
      'text' => 'Show the meta text'
    ], 
    'show_image' => [
      'type' => 'checkbox', 
      'text' => 'Show the image'
    ], 
    'show_content' => [
      'type' => 'checkbox', 
      'text' => 'Show the content'
    ], 
    'show_link' => [
      'description' => 'Show or hide content fields without the need to delete the content itself.', 
      'type' => 'checkbox', 
      'text' => 'Show the link'
    ], 
    'slider_width' => [
      'label' => 'Item Width Mode', 
      'description' => 'Define whether the width of the slider items is fixed or automatically expanded by its content widths.', 
      'type' => 'select', 
      'options' => [
        'Fixed' => 'fixed', 
        'Auto' => ''
      ]
    ], 
    'slider_gap' => [
      'label' => 'Column Gap', 
      'description' => 'Set the size of the gap between the grid columns.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => 'default', 
        'Large' => 'large', 
        'None' => ''
      ]
    ], 
    'slider_divider' => [
      'label' => 'Divider', 
      'description' => 'Show a divider between grid columns.', 
      'type' => 'checkbox', 
      'text' => 'Show dividers', 
      'enable' => 'slider_gap'
    ], 
    'slider_width_default' => [
      'label' => 'Phone Portrait', 
      'description' => 'Set the item width for each breakpoint. <i>Inherit</i> refers to the item width of the next smaller screen size.', 
      'type' => 'select', 
      'options' => [
        '100%' => '1-1', 
        '83%' => '5-6', 
        '80%' => '4-5', 
        '60%' => '3-5', 
        '50%' => '1-2', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        '16%' => '1-6'
      ], 
      'enable' => 'slider_width'
    ], 
    'slider_width_small' => [
      'label' => 'Phone Landscape', 
      'description' => 'Set the item width for each breakpoint. <i>Inherit</i> refers to the item width of the next smaller screen size.', 
      'type' => 'select', 
      'options' => [
        'Inherit' => '', 
        '100%' => '1-1', 
        '83%' => '5-6', 
        '80%' => '4-5', 
        '60%' => '3-5', 
        '50%' => '1-2', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        '16%' => '1-6'
      ], 
      'enable' => 'slider_width'
    ], 
    'slider_width_medium' => [
      'label' => 'Tablet Landscape', 
      'description' => 'Set the item width for each breakpoint. <i>Inherit</i> refers to the item width of the next smaller screen size.', 
      'type' => 'select', 
      'options' => [
        'Inherit' => '', 
        '100%' => '1-1', 
        '83%' => '5-6', 
        '80%' => '4-5', 
        '60%' => '3-5', 
        '50%' => '1-2', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        '16%' => '1-6'
      ], 
      'enable' => 'slider_width'
    ], 
    'slider_width_large' => [
      'label' => 'Desktop', 
      'description' => 'Set the item width for each breakpoint. <i>Inherit</i> refers to the item width of the next smaller screen size.', 
      'type' => 'select', 
      'options' => [
        'Inherit' => '', 
        '100%' => '1-1', 
        '83%' => '5-6', 
        '80%' => '4-5', 
        '60%' => '3-5', 
        '50%' => '1-2', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        '16%' => '1-6'
      ], 
      'enable' => 'slider_width'
    ], 
    'slider_width_xlarge' => [
      'label' => 'Large Screens', 
      'description' => 'Set the item width for each breakpoint. <i>Inherit</i> refers to the item width of the next smaller screen size.', 
      'type' => 'select', 
      'options' => [
        'Inherit' => '', 
        '100%' => '1-1', 
        '83%' => '5-6', 
        '80%' => '4-5', 
        '60%' => '3-5', 
        '50%' => '1-2', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        '16%' => '1-6'
      ], 
      'enable' => 'slider_width'
    ], 
    'slider_sets' => [
      'label' => 'Sets', 
      'description' => 'Group items into sets. The number of items within a set depends on the defined item width, e.g. <i>33%</i> means that each set contains 3 items.', 
      'type' => 'checkbox', 
      'text' => 'Slide all visible items at once'
    ], 
    'slider_center' => [
      'label' => 'Center', 
      'type' => 'checkbox', 
      'text' => 'Center the active slide'
    ], 
    'slider_finite' => [
      'label' => 'Finite', 
      'type' => 'checkbox', 
      'text' => 'Disable infinite scrolling'
    ], 
    'slider_velocity' => [
      'label' => 'Velocity', 
      'description' => 'Set the velocity in pixels per millisecond.', 
      'type' => 'range', 
      'attrs' => [
        'min' => 0.200000000000000011102230246251565404236316680908203125, 
        'max' => 3, 
        'step' => 0.1000000000000000055511151231257827021181583404541015625, 
        'placeholder' => '1'
      ]
    ], 
    'slider_autoplay' => [
      'label' => 'Autoplay', 
      'type' => 'checkbox', 
      'text' => 'Enable autoplay'
    ], 
    'slider_autoplay_pause' => [
      'type' => 'checkbox', 
      'text' => 'Pause autoplay on hover', 
      'enable' => 'slider_autoplay'
    ], 
    'slider_autoplay_interval' => [
      'label' => 'Interval', 
      'description' => 'Set the autoplay interval in seconds.', 
      'type' => 'range', 
      'attrs' => [
        'min' => 5, 
        'max' => 15, 
        'step' => 1, 
        'placeholder' => '7'
      ], 
      'enable' => 'slider_autoplay'
    ], 
    'nav' => [
      'label' => 'Navigation', 
      'description' => 'Select the navigation type.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Dotnav' => 'dotnav'
      ]
    ], 
    'nav_align' => [
      'label' => 'Position', 
      'description' => 'Align the navigation\'s items.', 
      'type' => 'select', 
      'options' => [
        'Left' => 'left', 
        'Center' => 'center', 
        'Right' => 'right'
      ], 
      'enable' => 'nav'
    ], 
    'nav_margin' => [
      'label' => 'Margin', 
      'description' => 'Set the vertical margin.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Default' => '', 
        'Medium' => 'medium'
      ], 
      'enable' => 'nav'
    ], 
    'nav_breakpoint' => [
      'label' => 'Breakpoint', 
      'description' => 'Display the navigation only on this device width and larger.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'nav'
    ], 
    'nav_color' => [
      'label' => 'Color', 
      'description' => 'Set light or dark color mode.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'enable' => 'nav'
    ], 
    'slidenav' => [
      'label' => 'Position', 
      'description' => 'Select the position of the slidenav.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Default' => 'default', 
        'Outside' => 'outside', 
        'Top Left' => 'top-left', 
        'Top Right' => 'top-right', 
        'Center Left' => 'center-left', 
        'Center Right' => 'center-right', 
        'Bottom Left' => 'bottom-left', 
        'Bottom Center' => 'bottom-center', 
        'Bottom Right' => 'bottom-right'
      ]
    ], 
    'slidenav_hover' => [
      'type' => 'checkbox', 
      'text' => 'Show on hover only', 
      'enable' => 'slidenav'
    ], 
    'slidenav_large' => [
      'type' => 'checkbox', 
      'text' => 'Larger style', 
      'enable' => 'slidenav'
    ], 
    'slidenav_margin' => [
      'label' => 'Margin', 
      'description' => 'Apply a margin between the slidenav and the slider container.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large'
      ], 
      'enable' => 'slidenav'
    ], 
    'slidenav_breakpoint' => [
      'label' => 'Breakpoint', 
      'description' => 'Display the slidenav only on this device width and larger.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'slidenav'
    ], 
    'slidenav_color' => [
      'label' => 'Color', 
      'description' => 'Set light or dark color mode.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'enable' => 'slidenav'
    ], 
    'slidenav_outside_breakpoint' => [
      'label' => 'Outside Breakpoint', 
      'description' => 'Display the slidenav outside only on this device width and larger. Otherwise, display it inside.', 
      'type' => 'select', 
      'options' => [
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'slidenav == \'outside\''
    ], 
    'slidenav_outside_color' => [
      'label' => 'Outside Color', 
      'description' => 'Set light or dark color if the slidenav is outside of the slider.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'enable' => 'slidenav == \'outside\''
    ], 
    'panel_style' => [
      'label' => 'Style', 
      'description' => 'Select one of the boxed card styles or a blank panel.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Card Default' => 'card-default', 
        'Card Primary' => 'card-primary', 
        'Card Secondary' => 'card-secondary', 
        'Card Hover' => 'card-hover'
      ]
    ], 
    'panel_card_offset' => [
      'type' => 'checkbox', 
      'text' => 'Add clipping offset', 
      'enable' => 'panel_style'
    ], 
    'panel_card_match' => [
      'type' => 'checkbox', 
      'text' => 'Match height'
    ], 
    'panel_link' => [
      'label' => 'Link', 
      'description' => 'Link the whole panel if a link exists.', 
      'type' => 'checkbox', 
      'text' => 'Link panel', 
      'enable' => 'show_link'
    ], 
    'panel_content_padding' => [
      'label' => 'Padding', 
      'description' => 'Add padding to the content if the image is top, left or right aligned.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Default' => 'default', 
        'Large' => 'large'
      ], 
      'show' => '!panel_style', 
      'enable' => 'show_image && image_align != \'between\''
    ], 
    'panel_size' => [
      'label' => 'Padding', 
      'description' => 'Define the card\'s size by selecting the padding between the card and its content.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Default' => '', 
        'Large' => 'large'
      ], 
      'show' => 'panel_style'
    ], 
    'panel_card_image' => [
      'description' => 'Top, left or right aligned images can be attached to the card\'s edge. If the image is aligned to the left or right, it will also extend to cover the whole space.', 
      'type' => 'checkbox', 
      'text' => 'Align image without padding', 
      'show' => 'panel_style', 
      'enable' => 'show_image && image_align != \'between\''
    ], 
    'title_style' => [
      'label' => 'Style', 
      'description' => 'Title styles differ in font-size but may also come with a predefined color, size and font.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        '2Xlarge' => 'heading-2xlarge', 
        'XLarge' => 'heading-xlarge', 
        'Large' => 'heading-large', 
        'Medium' => 'heading-medium', 
        'Small' => 'heading-small', 
        'H1' => 'h1', 
        'H2' => 'h2', 
        'H3' => 'h3', 
        'H4' => 'h4', 
        'H5' => 'h5', 
        'H6' => 'h6'
      ], 
      'enable' => 'show_title'
    ], 
    'title_link' => [
      'label' => 'Link', 
      'description' => 'Link the title if a link exists.', 
      'type' => 'checkbox', 
      'text' => 'Link title', 
      'enable' => 'show_title && show_link'
    ], 
    'title_hover_style' => [
      'label' => 'Hover Style', 
      'description' => 'Set the hover style for a linked title.', 
      'type' => 'select', 
      'options' => [
        'None' => 'reset', 
        'Heading Link' => 'heading', 
        'Default Link' => ''
      ], 
      'enable' => 'show_title && show_link && (title_link || panel_link)'
    ], 
    'title_decoration' => [
      'label' => 'Decoration', 
      'description' => 'Decorate the title with a divider, bullet or a line that is vertically centered to the heading.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Divider' => 'divider', 
        'Bullet' => 'bullet', 
        'Line' => 'line'
      ], 
      'enable' => 'show_title'
    ], 
    'title_font_family' => [
      'label' => 'Font Family', 
      'description' => 'Select an alternative font family.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Default' => 'default', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary', 
        'Tertiary' => 'tertiary'
      ], 
      'enable' => 'show_title'
    ], 
    'title_color' => [
      'label' => 'Color', 
      'description' => 'Select the text color. If the Background option is selected, styles that don\'t apply a background image use the primary color instead.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Muted' => 'muted', 
        'Emphasis' => 'emphasis', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary', 
        'Success' => 'success', 
        'Warning' => 'warning', 
        'Danger' => 'danger', 
        'Background' => 'background'
      ], 
      'enable' => 'show_title'
    ], 
    'title_element' => [
      'label' => 'HTML Element', 
      'description' => 'Choose one of the HTML elements to fit your semantic structure.', 
      'type' => 'select', 
      'options' => [
        'h1' => 'h1', 
        'h2' => 'h2', 
        'h3' => 'h3', 
        'h4' => 'h4', 
        'h5' => 'h5', 
        'h6' => 'h6', 
        'div' => 'div'
      ], 
      'enable' => 'show_title'
    ], 
    'title_align' => [
      'label' => 'Alignment', 
      'description' => 'Align the title to the top or left in regards to the content.', 
      'type' => 'select', 
      'options' => [
        'Top' => 'top', 
        'Left' => 'left'
      ], 
      'enable' => 'show_title'
    ], 
    'title_grid_width' => [
      'label' => 'Grid Width', 
      'description' => 'Define the width of the title within the grid. Choose between percent and fixed widths or expand columns to the width of their content.', 
      'type' => 'select', 
      'options' => [
        'Auto' => 'auto', 
        '80%' => '4-5', 
        '75%' => '3-4', 
        '66%' => '2-3', 
        '60%' => '3-5', 
        '50%' => '1-2', 
        '40%' => '2-5', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        '2X-Large' => '2xlarge'
      ], 
      'enable' => 'show_title && title_align == \'left\''
    ], 
    'title_grid_column_gap' => [
      'label' => 'Grid Column Gap', 
      'description' => 'Set the size of the gap between the title and the content.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large', 
        'None' => 'collapse'
      ], 
      'enable' => 'show_title && title_align == \'left\''
    ], 
    'title_grid_row_gap' => [
      'label' => 'Grid Row Gap', 
      'description' => 'Set the size of the gap if the grid items stack.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large', 
        'None' => 'collapse'
      ], 
      'enable' => 'show_title && title_align == \'left\''
    ], 
    'title_grid_breakpoint' => [
      'label' => 'Grid Breakpoint', 
      'description' => 'Set the breakpoint from which grid items will stack.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'show_title && title_align == \'left\''
    ], 
    'title_margin' => [
      'label' => 'Margin Top', 
      'description' => 'Set the top margin. Note that the margin will only apply if the content field immediately follows another content field.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Default' => '', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        'None' => 'remove'
      ], 
      'enable' => 'show_title'
    ], 
    'meta_style' => [
      'label' => 'Style', 
      'description' => 'Select a predefined meta text style, including color, size and font-family.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Meta' => 'meta', 
        '2Xlarge' => 'heading-2xlarge', 
        'XLarge' => 'heading-xlarge', 
        'Large' => 'heading-large', 
        'Medium' => 'heading-medium', 
        'Small' => 'heading-small', 
        'H1' => 'h1', 
        'H2' => 'h2', 
        'H3' => 'h3', 
        'H4' => 'h4', 
        'H5' => 'h5', 
        'H6' => 'h6'
      ], 
      'enable' => 'show_meta'
    ], 
    'meta_color' => [
      'label' => 'Color', 
      'description' => 'Select the text color.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Muted' => 'muted', 
        'Emphasis' => 'emphasis', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary', 
        'Success' => 'success', 
        'Warning' => 'warning', 
        'Danger' => 'danger'
      ], 
      'enable' => 'show_meta'
    ], 
    'meta_align' => [
      'label' => 'Alignment', 
      'description' => 'Align the meta text.', 
      'type' => 'select', 
      'options' => [
        'Above Title' => 'above-title', 
        'Below Title' => 'below-title', 
        'Above Content' => 'above-content', 
        'Below Content' => 'below-content'
      ], 
      'enable' => 'show_meta'
    ], 
    'meta_element' => [
      'label' => 'HTML Element', 
      'description' => 'Choose one of the HTML elements to fit your semantic structure.', 
      'type' => 'select', 
      'options' => [
        'h1' => 'h1', 
        'h2' => 'h2', 
        'h3' => 'h3', 
        'h4' => 'h4', 
        'h5' => 'h5', 
        'h6' => 'h6', 
        'div' => 'div'
      ], 
      'enable' => 'show_meta'
    ], 
    'meta_margin' => [
      'label' => 'Margin Top', 
      'description' => 'Set the top margin. Note that the margin will only apply if the content field immediately follows another content field.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Default' => '', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        'None' => 'remove'
      ], 
      'enable' => 'show_meta'
    ], 
    'content_style' => [
      'label' => 'Style', 
      'description' => 'Select a predefined text style, including color, size and font-family.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Lead' => 'lead', 
        'Meta' => 'meta'
      ], 
      'enable' => 'show_content'
    ], 
    'content_align' => [
      'label' => 'Alignment', 
      'type' => 'checkbox', 
      'text' => 'Force left alignment', 
      'enable' => 'show_content'
    ], 
    'content_dropcap' => [
      'label' => 'Drop Cap', 
      'description' => 'Display the first letter of the paragraph as a large initial.', 
      'type' => 'checkbox', 
      'text' => 'Enable drop cap', 
      'enable' => 'show_content'
    ], 
    'content_column' => [
      'label' => 'Columns', 
      'description' => 'Set the number of text columns.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Halves' => '1-2', 
        'Thirds' => '1-3', 
        'Quarters' => '1-4', 
        'Fifths' => '1-5', 
        'Sixths' => '1-6'
      ], 
      'enable' => 'show_content'
    ], 
    'content_column_divider' => [
      'description' => 'Show a divider between text columns.', 
      'type' => 'checkbox', 
      'text' => 'Show dividers', 
      'enable' => 'show_content && content_column'
    ], 
    'content_column_breakpoint' => [
      'label' => 'Columns Breakpoint', 
      'description' => 'Set the device width from which the text columns should apply.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'show_content && content_column'
    ], 
    'content_margin' => [
      'label' => 'Margin Top', 
      'description' => 'Set the top margin. Note that the margin will only apply if the content field immediately follows another content field.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Default' => '', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        'None' => 'remove'
      ], 
      'enable' => 'show_content'
    ], 
    'image_width' => [
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'enable' => 'show_image'
    ], 
    'image_height' => [
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'enable' => 'show_image'
    ], 
    'image_border' => [
      'label' => 'Border', 
      'description' => 'Select the image\'s border style.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Rounded' => 'rounded', 
        'Circle' => 'circle', 
        'Pill' => 'pill'
      ], 
      'enable' => 'show_image && (!panel_style || (panel_style && (!panel_card_image || image_align == \'between\')))'
    ], 
    'image_link' => [
      'label' => 'Link', 
      'description' => 'Link the image if a link exists.', 
      'type' => 'checkbox', 
      'text' => 'Link image', 
      'enable' => 'show_image && show_link'
    ], 
    'image_transition' => [
      'label' => 'Hover Transition', 
      'description' => 'Set the hover transition for a linked image.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Scale Up' => 'scale-up', 
        'Scale Down' => 'scale-down'
      ], 
      'enable' => 'show_image && show_link && (image_link || panel_link)'
    ], 
    'icon_width' => [
      'label' => 'Icon Width', 
      'description' => 'Set the icon width.', 
      'enable' => 'show_image'
    ], 
    'icon_color' => [
      'label' => 'Icon Color', 
      'description' => 'Set the icon color.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Muted' => 'muted', 
        'Emphasis' => 'emphasis', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary', 
        'Success' => 'success', 
        'Warning' => 'warning', 
        'Danger' => 'danger'
      ], 
      'enable' => 'show_image'
    ], 
    'image_align' => [
      'label' => 'Alignment', 
      'description' => 'Align the image to the top, left, right or place it between the title and the content.', 
      'type' => 'select', 
      'options' => [
        'Top' => 'top', 
        'Bottom' => 'bottom', 
        'Left' => 'left', 
        'Right' => 'right', 
        'Between' => 'between'
      ], 
      'enable' => 'show_image'
    ], 
    'image_grid_width' => [
      'label' => 'Grid Width', 
      'description' => 'Define the width of the image within the grid. Choose between percent and fixed widths or expand columns to the width of their content.', 
      'type' => 'select', 
      'options' => [
        'Auto' => 'auto', 
        '80%' => '4-5', 
        '75%' => '3-4', 
        '66%' => '2-3', 
        '60%' => '3-5', 
        '50%' => '1-2', 
        '40%' => '2-5', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        '2X-Large' => '2xlarge'
      ], 
      'enable' => 'show_image && (image_align == \'left\' || image_align == \'right\')'
    ], 
    'image_grid_column_gap' => [
      'label' => 'Grid Column Gap', 
      'description' => 'Set the size of the gap between the image and the content.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large', 
        'None' => 'collapse'
      ], 
      'enable' => 'show_image && (image_align == \'left\' || image_align == \'right\') && !(panel_card_image && panel_style)'
    ], 
    'image_grid_row_gap' => [
      'label' => 'Grid Row Gap', 
      'description' => 'Set the size of the gap if the grid items stack.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large', 
        'None' => 'collapse'
      ], 
      'enable' => 'show_image && (image_align == \'left\' || image_align == \'right\') && !(panel_card_image && panel_style)'
    ], 
    'image_grid_breakpoint' => [
      'label' => 'Grid Breakpoint', 
      'description' => 'Set the breakpoint from which grid items will stack.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'show_image && (image_align == \'left\' || image_align == \'right\')'
    ], 
    'image_vertical_align' => [
      'label' => 'Vertical Alignment', 
      'description' => 'Vertically center grid items.', 
      'type' => 'checkbox', 
      'text' => 'Center', 
      'enable' => 'show_image && (image_align == \'left\' || image_align == \'right\')'
    ], 
    'image_margin' => [
      'label' => 'Margin Top', 
      'description' => 'Set the top margin. Note that the margin will only apply if the content field immediately follows another content field.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Default' => '', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        'None' => 'remove'
      ], 
      'enable' => 'show_image && (image_align == \'between\' || (image_align == \'bottom\' && !(panel_style && panel_card_image)))'
    ], 
    'image_svg_inline' => [
      'label' => 'Inline SVG', 
      'description' => 'Inject SVG images into the page markup so that they can easily be styled with CSS.', 
      'type' => 'checkbox', 
      'text' => 'Make SVG stylable with CSS', 
      'enable' => 'show_image'
    ], 
    'image_svg_animate' => [
      'type' => 'checkbox', 
      'text' => 'Animate strokes', 
      'enable' => 'show_image && image_svg_inline'
    ], 
    'image_svg_color' => [
      'label' => 'SVG Color', 
      'description' => 'Select the SVG color. It will only apply to supported elements defined in the SVG.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Muted' => 'muted', 
        'Emphasis' => 'emphasis', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary', 
        'Success' => 'success', 
        'Warning' => 'warning', 
        'Danger' => 'danger'
      ], 
      'enable' => 'show_image && image_svg_inline'
    ], 
    'link_target' => [
      'label' => 'Target', 
      'type' => 'checkbox', 
      'text' => 'Open in a new window', 
      'enable' => 'show_link'
    ], 
    'link_text' => [
      'label' => 'Text', 
      'description' => 'Enter the text for the link.', 
      'enable' => 'show_link'
    ], 
    'link_style' => [
      'label' => 'Style', 
      'description' => 'Set the link style.', 
      'type' => 'select', 
      'options' => [
        'Button Default' => 'default', 
        'Button Primary' => 'primary', 
        'Button Secondary' => 'secondary', 
        'Button Danger' => 'danger', 
        'Button Text' => 'text', 
        'Link' => '', 
        'Link Muted' => 'link-muted', 
        'Link Text' => 'link-text'
      ], 
      'enable' => 'show_link && link_text'
    ], 
    'link_size' => [
      'label' => 'Button Size', 
      'description' => 'Set the button size.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Default' => '', 
        'Large' => 'large'
      ], 
      'enable' => 'show_link && link_text && link_style && link_style != \'link-muted\' && link_style != \'link-text\''
    ], 
    'link_margin' => [
      'label' => 'Margin Top', 
      'description' => 'Set the top margin. Note that the margin will only apply if the content field immediately follows another content field.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Default' => '', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        'None' => 'remove'
      ], 
      'enable' => 'show_link && link_text'
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
    'text_align' => $config->get('builder.text_align_justify'), 
    'text_align_breakpoint' => $config->get('builder.text_align_breakpoint'), 
    'text_align_fallback' => $config->get('builder.text_align_justify_fallback'), 
    'animation' => $config->get('builder.animation'), 
    '_parallax_button' => $config->get('builder._parallax_button'), 
    'visibility' => $config->get('builder.visibility'), 
    'container_padding_remove' => $config->get('builder.container_padding_remove'), 
    'name' => $config->get('builder.name'), 
    'status' => $config->get('builder.status'), 
    'id' => $config->get('builder.id'), 
    'class' => $config->get('builder.cls'), 
    'attributes' => $config->get('builder.attrs'), 
    'css' => [
      'label' => 'CSS', 
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-item</code>, <code>.el-nav</code>, <code>.el-slidenav</code>, <code>.el-title</code>, <code>.el-meta</code>, <code>.el-content</code>, <code>.el-image</code>, <code>.el-link</code>', 
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
          'fields' => ['content', 'show_title', 'show_meta', 'show_content', 'show_link']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Slider', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['slider_width', 'slider_gap', 'slider_divider']
            ], [
              'label' => 'Item Width', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['slider_width_default', 'slider_width_small', 'slider_width_medium', 'slider_width_large', 'slider_width_xlarge']
            ], [
              'label' => 'Animation', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['slider_sets', 'slider_center', 'slider_finite', 'slider_velocity', 'slider_autoplay', 'slider_autoplay_pause', 'slider_autoplay_interval']
            ], [
              'label' => 'Navigation', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['nav', 'nav_align', 'nav_margin', 'nav_breakpoint', 'nav_color']
            ], [
              'label' => 'Slidenav', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['slidenav', 'slidenav_hover', 'slidenav_large', 'slidenav_margin', 'slidenav_breakpoint', 'slidenav_color', 'slidenav_outside_breakpoint', 'slidenav_outside_color']
            ], [
              'label' => 'Panel', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['panel_style', 'panel_card_offset', 'panel_card_match', 'panel_link', 'panel_content_padding', 'panel_size', 'panel_card_image']
            ], [
              'label' => 'Title', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['title_style', 'title_link', 'title_hover_style', 'title_decoration', 'title_font_family', 'title_color', 'title_element', 'title_align', 'title_grid_width', 'title_grid_column_gap', 'title_grid_row_gap', 'title_grid_breakpoint', 'title_margin']
            ], [
              'label' => 'Meta', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['meta_style', 'meta_color', 'meta_align', 'meta_element', 'meta_margin']
            ], [
              'label' => 'Content', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['content_style', 'content_align', 'content_dropcap', 'content_column', 'content_column_divider', 'content_column_breakpoint', 'content_margin']
            ], [
              'label' => 'Image', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => [[
                  'label' => 'Width/Height', 
                  'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically, and where possible, high resolution images will be auto-generated.', 
                  'type' => 'grid', 
                  'width' => '1-2', 
                  'fields' => ['image_width', 'image_height']
                ], 'image_border', 'image_link', 'image_transition', 'icon_width', 'icon_color', 'image_align', 'image_grid_width', 'image_grid_column_gap', 'image_grid_row_gap', 'image_grid_breakpoint', 'image_vertical_align', 'image_margin', 'image_svg_inline', 'image_svg_animate', 'image_svg_color']
            ], [
              'label' => 'Link', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['link_target', 'link_text', 'link_style', 'link_size', 'link_margin']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', '_parallax_button', 'visibility', 'container_padding_remove']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
