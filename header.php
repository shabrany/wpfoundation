<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>title</title>
        <?php wp_head(); ?>
    </head>
    <body>
        <header class="main-header">
            <div class="row">
                <div class="medium-3 column">
                    <img src="http://events.mozillakerala.org/wmm/img/tools/foundation-logo.jpg" style="max-width: 100%;">
                </div>
                <div class="medium-9 column">
                    <?php wp_nav_menu([
                        'theme_location' => 'main-navigation',
                        'depth' => 2,
                        'menu_class' => 'menu align-right',
                        'container_class' => 'main-navigation'
                    ]); ?>
                </div>
            </div>
        </header>
        <main class="main-content">
