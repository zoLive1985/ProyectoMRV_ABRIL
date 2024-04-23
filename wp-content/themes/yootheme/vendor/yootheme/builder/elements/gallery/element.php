<?php

namespace YOOtheme;

return [

    'transforms' => [

        'render' => function ($node) {

            $node->tags = [];

            // Filter tags
            if (!empty($node->props['filter'])) {

                foreach ($node->children as $child) {

                    $child->tags = [];

                    foreach (explode(',', Arr::get($child->props, 'tags', '')) as $tag) {

                        // Strip tags as precaution if tags are mapped dynamically
                        $tag = strip_tags($tag);

                        if ($key = str_replace(' ', '-', trim($tag))) {
                            $child->tags[$key] = trim($tag);
                        }
                    }

                    $node->tags += $child->tags;
                }

                natsort($node->tags);

                if ($node->props['filter_reverse']) {
                    $node->tags = array_reverse($node->tags, true);
                }
            }

        },

    ],

    'updates' => [

        '2.1.0-beta.0.1' => function ($node) {

            if (Arr::get($node->props, 'item_maxwidth') === 'xxlarge') {
                $node->props['item_maxwidth'] = '2xlarge';
            }

        },

        '2.0.0-beta.8.1' => function ($node) {

            if (isset($node->props['grid_align'])) {
                $node->props['grid_column_align'] = $node->props['grid_align'];
                unset($node->props['grid_align']);
            }

        },

        '2.0.0-beta.5.1' => function ($node) {

            if (Arr::get($node->props, 'link_type') === 'content') {
                $node->props['title_link'] = true;
                $node->props['link_text'] = '';
            } elseif (Arr::get($node->props, 'link_type') === 'element') {
                $node->props['overlay_link'] = true;
                $node->props['link_text'] = '';
            }
            unset($node->props['link_type']);

        },

        '1.22.0-beta.0.1' => function ($node) {

            if (isset($node->props['gutter'])) {
                $node->props['grid_column_gap'] = $node->props['gutter'];
                $node->props['grid_row_gap'] = $node->props['gutter'];
                unset($node->props['gutter']);
            }

            if (isset($node->props['divider'])) {
                $node->props['grid_divider'] = $node->props['divider'];
                unset($node->props['divider']);
            }

            if (isset($node->props['filter_gutter'])) {
                $node->props['filter_grid_column_gap'] = $node->props['filter_gutter'];
                $node->props['filter_grid_row_gap'] = $node->props['filter_gutter'];
                unset($node->props['filter_gutter']);
            }

            if (isset($node->props['filter_breakpoint'])) {
                $node->props['filter_grid_breakpoint'] = $node->props['filter_breakpoint'];
                unset($node->props['filter_breakpoint']);
            }

        },

        '1.20.0-beta.1.1' => function ($node) {

            if (isset($node->props['maxwidth_align'])) {
                $node->props['block_align'] = $node->props['maxwidth_align'];
                unset($node->props['maxwidth_align']);
            }

        },

        '1.20.0-beta.0.1' => function ($node) {

            if (Arr::get($node->props, 'title_style') === 'heading-primary') {
                $node->props['title_style'] = 'heading-medium';
            }

            /**
             * @var Config $config
             */
            $config = app(Config::class);

            list($style) = explode(':', $config('~theme.style'));

            if (in_array($style, ['craft', 'district', 'jack-backer', 'tomsen-brody', 'vision', 'florence', 'max', 'nioh-studio', 'sonic', 'summit', 'trek'])) {

                if (Arr::get($node->props, 'title_style') === 'h1' || (empty($node->props['title_style']) && Arr::get($node->props, 'title_element') === 'h1')) {
                    $node->props['title_style'] = 'heading-small';
                }

            }

            if (in_array($style, ['florence', 'max', 'nioh-studio', 'sonic', 'summit', 'trek'])) {

                if (Arr::get($node->props, 'title_style') === 'h2') {
                    $node->props['title_style'] = Arr::get($node->props, 'title_element') === 'h1' ? '' : 'h1';
                } elseif (empty($node->props['title_style']) && Arr::get($node->props, 'title_element') === 'h2') {
                    $node->props['title_style'] = 'h1';
                }

            }

            if (in_array($style, ['fuse', 'horizon', 'joline', 'juno', 'lilian', 'vibe', 'yard'])) {

                if (Arr::get($node->props, 'title_style') === 'heading-medium') {
                    $node->props['title_style'] = 'heading-small';
                }

            }

            if (in_array($style, ['copper-hill'])) {

                if (Arr::get($node->props, 'title_style') === 'heading-medium') {
                    $node->props['title_style'] = Arr::get($node->props, 'title_element') === 'h1' ? '' : 'h1';
                } elseif (Arr::get($node->props, 'title_style') === 'h1') {
                    $node->props['title_style'] = Arr::get($node->props, 'title_element') === 'h2' ? '' : 'h2';
                } elseif (empty($node->props['title_style']) && Arr::get($node->props, 'title_element') === 'h1') {
                    $node->props['title_style'] = 'h2';
                }

            }

            if (in_array($style, ['trek', 'fjord'])) {

                if (Arr::get($node->props, 'title_style') === 'heading-medium') {
                    $node->props['title_style'] = 'heading-large';
                }

            }

        },

        '1.19.0-beta.0.1' => function ($node) {

            if (Arr::get($node->props, 'meta_align') === 'top') {
                $node->props['meta_align'] = 'above-title';
            }

            if (Arr::get($node->props, 'meta_align') === 'bottom') {
                $node->props['meta_align'] = 'below-title';
            }

            $node->props['link_type'] = 'element';

        },

        '1.18.10.3' => function ($node) {

            if (Arr::get($node->props, 'meta_align') === 'top') {
                if (!empty($node->props['meta_margin'])) {
                    $node->props['title_margin'] = $node->props['meta_margin'];
                }
                $node->props['meta_margin'] = '';
            }

        },

        '1.18.0' => function ($node) {

            if (!isset($node->props['grid_parallax']) && Arr::get($node->props, 'grid_mode') === 'parallax') {
                $node->props['grid_parallax'] = Arr::get($node->props, 'grid_parallax_y');
            }

            if (!isset($node->props['show_hover_image'])) {
                $node->props['show_hover_image'] = Arr::get($node->props, 'show_image2');
            }

            if (!isset($node->props['image_box_decoration']) && Arr::get($node->props, 'image_box_shadow_bottom') === true) {
                $node->props['image_box_decoration'] = 'shadow';
            }

            if (!isset($node->props['meta_color']) && Arr::get($node->props, 'meta_style') === 'muted') {
                $node->props['meta_color'] = 'muted';
                $node->props['meta_style'] = '';
            }

        },

    ],

];
