        </main>

        <footer class="main-footer">

            <section class="footer-links">
                <div class="row">
                    <div class="medium-4 columns">
                        <?php dynamic_sidebar('footer-column-1'); ?>
                    </div>
                    <div class="medium-4 columns">
                        <?php dynamic_sidebar('footer-column-2'); ?>
                    </div>
                    <div class="medium-4 columns">
                        <?php dynamic_sidebar('footer-column-3'); ?>
                    </div>
                </div>
            </section>

            <section class="disclaimer-bar">
                <div class="row">
                    <?php wp_nav_menu([
                        'theme_location' => 'footer-nav',
                        'depth' => 1,
                    ]); ?>
                </div>                    
            </section>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>
