<?php // $file = C:/xampp/htdocs/esteveza/wp-content/themes/yootheme/vendor/yootheme/builder/elements/overlay/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'overlay', 
  'title' => 'Overlay', 
  'group' => 'basic', 
  'icon' => $filter->apply('url', 'images/icon.svg', $file), 
  'iconSmall' => $filter->apply('url', 'images/iconSmall.svg', $file), 
  'element' => true, 
  'width' => 500, 
  'defaults' => [
    'link_text' => 'Read more', 
    'overlay_mode' => 'cover', 
    'overlay_hover' => true, 
    'overlay_style' => 'overlay-primary', 
    'text_color' => 'light', 
    'overlay_position' => 'center', 
    'overlay_transition' => 'fade', 
    'title_hover_style' => 'reset', 
    'title_element' => 'h3', 
    'meta_style' => 'meta', 
    'meta_align' => 'below-title', 
    'meta_element' => 'div', 
    'link_style' => 'default', 
    'text_align' => 'center', 
    'margin' => 'default'
  ], 
  'placeholder' => [
    'props' => [
      'image' => $filter->apply('url', '~yootheme/theme/assets/images/element-image-placeholder.png', $file), 
      'title' => 'Title', 
      'meta' => '', 
      'content' => '', 
      'hover_image' => ''
    ]
  ], 
  'templates' => [
    'render' => $filter->apply('path', './templates/template.php', $file), 
    'content' => $filter->apply('path', './templates/content.php', $file)
  ], 
  'fields' => [
    'image' => $config->get('builder.image'), 
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
    'image_alt' => [
      'label' => 'Image Alt', 
      'source' => true, 
      'enable' => 'image'
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
    'link_target' => $config->get('builder.link_target'), 
    'link_text' => [
      'label' => 'Link Text', 
      'description' => 'Enter the text for the link.', 
      'source' => true, 
      'enable' => 'link'
    ], 
    'hover_image' => [
      'label' => 'Hover Image', 
      'description' => 'Select an optional image that appears on hover.', 
      'type' => 'image', 
      'source' => true
    ], 
    'overlay_mode' => [
      'label' => 'Mode', 
      'description' => 'When using cover mode, you need to set the text color manually.', 
      'type' => 'select', 
      'options' => [
        'Cover' => 'cover', 
        'Caption' => 'caption'
      ]
    ], 
    'overlay_hover' => [
      'type' => 'checkbox', 
      'text' => 'Display overlay on hover'
    ], 
    'overlay_transition_background' => [
      'type' => 'checkbox', 
      'text' => 'Animate background only', 
      'enable' => 'overlay_hover && overlay_mode == \'cover\''
    ], 
    'overlay_style' => [
      'label' => 'Style', 
      'description' => 'Select a style for the overlay.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Overlay Default' => 'overlay-default', 
        'Overlay Primary' => 'overlay-primary', 
        'Tile Default' => 'tile-default', 
        'Tile Muted' => 'tile-muted', 
        'Tile Primary' => 'tile-primary', 
        'Tile Secondary' => 'tile-secondary'
      ]
    ], 
    'text_color' => [
      'label' => 'Text Color', 
      'description' => 'Set light or dark color mode for text, buttons and controls.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'source' => true, 
      'enable' => '!overlay_style || overlay_style && overlay_mode == \'cover\''
    ], 
    'text_color_hover' => [
      'type' => 'checkbox', 
      'text' => 'Inverse the text color on hover', 
      'enable' => '!overlay_style && hover_image || overlay_style && overlay_mode == \'cover\' && overlay_hover && overlay_transition_background'
    ], 
    'overlay_padding' => [
      'label' => 'Padding', 
      'description' => 'Set the padding between the overlay and its content.', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'Small' => 'small', 
        'Large' => 'large', 
        'None' => 'none'
      ]
    ], 
    'overlay_position' => [
      'label' => 'Position', 
      'description' => 'Select the overlay or content position.', 
      'type' => 'select', 
      'options' => [
        'Top' => 'top', 
        'Bottom' => 'bottom', 
        'Left' => 'left', 
        'Right' => 'right', 
        'Top Left' => 'top-left', 
        'Top Center' => 'top-center', 
        'Top Right' => 'top-right', 
        'Bottom Left' => 'bottom-left', 
        'Bottom Center' => 'bottom-center', 
        'Bottom Right' => 'bottom-right', 
        'Center' => 'center', 
        'Center Left' => 'center-left', 
        'Center Right' => 'center-right'
      ]
    ], 
    'overlay_margin' => [
      'label' => 'Margin', 
      'description' => 'Apply a margin between the overlay and the image container.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large'
      ], 
      'enable' => 'overlay_style'
    ], 
    'overlay_maxwidth' => [
      'label' => 'Max Width', 
      'description' => 'Set the maximum content width.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        '2X-Large' => '2xlarge'
      ], 
      'enable' => '!$match(overlay_position, \'(^top$|^bottom$)\')'
    ], 
    'overlay_transition' => [
      'label' => 'Transition', 
      'description' => 'Select a transition for the overlay when it appears on hover.', 
      'type' => 'select', 
      'options' => [
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
      ], 
      'enable' => 'overlay_hover'
    ], 
    'overlay_link' => [
      'label' => 'Link', 
      'description' => 'Link the whole overlay if a link exists.', 
      'type' => 'checkbox', 
      'text' => 'Link overlay', 
      'enable' => 'link'
    ], 
    'image_transition' => [
      'label' => 'Transition', 
      'description' => 'Select an image transition. If the hover image is set, the transition takes place between the two images. If <i>None</i> is selected, the hover image fades in.', 
      'type' => 'select', 
      'options' => [
        'None (Fade if hover image)' => '', 
        'Scale Up' => 'scale-up', 
        'Scale Down' => 'scale-down'
      ]
    ], 
    'image_min_height' => [
      'label' => 'Min Height', 
      'description' => 'Use an optional minimum height to prevent images from becoming smaller than the content on small devices.', 
      'type' => 'range', 
      'attrs' => [
        'min' => 200, 
        'max' => 500, 
        'step' => 20
      ]
    ], 
    'image_box_shadow' => [
      'label' => 'Box Shadow', 
      'description' => 'Select the image\'s box shadow size.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge'
      ]
    ], 
    'image_hover_box_shadow' => [
      'label' => 'Hover Box Shadow', 
      'description' => 'Select the image\'s box shadow size on hover.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge'
      ]
    ], 
    'image_box_decoration' => [
      'label' => 'Box Decoration', 
      'description' => 'Select the image\'s box decoration style. Note: The Mask option is not supported by all styles and may have no visible effect.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Default' => 'default', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary', 
        'Floating Shadow' => 'shadow', 
        'Mask' => 'mask'
      ]
    ], 
    'image_box_decoration_inverse' => [
      'type' => 'checkbox', 
      'text' => 'Inverse style', 
      'enable' => '$match(image_box_decoration, \'^(default|primary|secondary)$\')'
    ], 
    'title_transition' => [
      'label' => 'Transition', 
      'description' => 'Select a transition for the title when the overlay appears on hover.', 
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
      ], 
      'enable' => 'title && overlay_hover'
    ], 
    'title_style' => [
      'label' => 'Style', 
      'description' => 'Title styles differ in font-size but may also come with a predefined color, size and font.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        '2X-Large' => 'heading-2xlarge', 
        'X-Large' => 'heading-xlarge', 
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
      'enable' => 'title'
    ], 
    'title_link' => [
      'label' => 'Link', 
      'description' => 'Link the title if a link exists.', 
      'type' => 'checkbox', 
      'text' => 'Link title', 
      'enable' => 'title && link'
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
      'enable' => 'title && link && (title_link || overlay_link)'
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
      'enable' => 'title'
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
      'enable' => 'title'
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
      'enable' => 'title'
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
      'enable' => 'title'
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
      'enable' => 'title'
    ], 
    'meta_transition' => [
      'label' => 'Transition', 
      'description' => 'Select a transition for the meta text when the overlay appears on hover.', 
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
      ], 
      'enable' => 'meta && overlay_hover'
    ], 
    'meta_style' => [
      'label' => 'Style', 
      'description' => 'Select a predefined meta text style, including color, size and font-family.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Meta' => 'meta', 
        '2X-Large' => 'heading-2xlarge', 
        'X-Large' => 'heading-xlarge', 
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
      'enable' => 'meta'
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
      'enable' => 'meta'
    ], 
    'meta_align' => [
      'label' => 'Alignment', 
      'description' => 'Align the meta text.', 
      'type' => 'select', 
      'options' => [
        'Above Title' => 'above-title', 
        'Below Title' => 'below-title', 
        'Below Content' => 'below-content'
      ], 
      'enable' => 'meta'
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
      'enable' => 'meta'
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
      'enable' => 'meta'
    ], 
    'content_transition' => [
      'label' => 'Transition', 
      'description' => 'Select a transition for the content when the overlay appears on hover.', 
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
      ], 
      'enable' => 'content && overlay_hover'
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
      'enable' => 'content'
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
      'enable' => 'content'
    ], 
    'link_transition' => [
      'label' => 'Transition', 
      'description' => 'Select a transition for the link when the overlay appears on hover.', 
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
      ], 
      'enable' => 'link && link_text && overlay_hover'
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
      'enable' => 'link && link_text'
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
      'enable' => 'link && link_text && link_style && link_style != \'link-muted\' && link_style != \'link-text\''
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
      'enable' => 'link && link_text'
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
    'text_align' => $config->get('builder.text_align'), 
    'text_align_breakpoint' => $config->get('builder.text_align_breakpoint'), 
    'text_align_fallback' => $config->get('builder.text_align_fallback'), 
    'animation' => $config->get('builder.animation'), 
    '_parallax_button' => $config->get('builder._parallax_button'), 
    'visibility' => $config->get('builder.visibility'), 
    'container_padding_remove' => $config->get('builder.container_padding_remove'), 
    'name' => $config->get('builder.name'), 
    'status' => $config->get('builder.status'), 
    'source' => $config->get('builder.source'), 
    'id' => $config->get('builder.id'), 
    'class' => $config->get('builder.cls'), 
    'attributes' => $config->get('builder.attrs'), 
    'css' => [
      'label' => 'CSS', 
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-image</code>, <code>.el-title</code>, <code>.el-meta</code>, <code>.el-content</code>, <code>.el-hover-image</code>', 
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
          'fields' => ['image', [
              'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically, and where possible, high resolution images will be auto-generated.', 
              'name' => '_image_dimension', 
              'type' => 'grid', 
              'width' => '1-2', 
              'fields' => ['image_width', 'image_height']
            ], 'image_alt', 'title', 'meta', 'content', 'link', 'link_target', 'link_text', 'hover_image']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Overlay', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['overlay_mode', 'overlay_hover', 'overlay_transition_background', 'overlay_style', 'text_color', 'text_color_hover', 'overlay_padding', 'overlay_position', 'overlay_margin', 'overlay_maxwidth', 'overlay_transition', 'overlay_link']
            ], [
              'label' => 'Image', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['image_transition', 'image_min_height', 'image_box_shadow', 'image_hover_box_shadow', 'image_box_decoration', 'image_box_decoration_inverse']
            ], [
              'label' => 'Title', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['title_transition', 'title_style', 'title_link', 'title_hover_style', 'title_decoration', 'title_font_family', 'title_color', 'title_element', 'title_margin']
            ], [
              'label' => 'Meta', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['meta_transition', 'meta_style', 'meta_color', 'meta_align', 'meta_element', 'meta_margin']
            ], [
              'label' => 'Content', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['content_transition', 'content_style', 'content_margin']
            ], [
              'label' => 'Link', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['link_transition', 'link_style', 'link_size', 'link_margin']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', '_parallax_button', 'visibility', 'container_padding_remove']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
