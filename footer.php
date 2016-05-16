        </main>

        <footer class="main-footer">

            <section class="footer-links">
                <div class="row">
                    <div class="medium-6">
                        <?php dynamic_sidebar('footer-column-1'); ?>
                    </div>
                    <div class="medium-6">
                        <?php dynamic_sidebar('footer-column-2'); ?>
                    </div>
                    <div class="medium-6">
                        <?php dynamic_sidebar('footer-column-3'); ?>
                    </div>
                </div>
            </section>

            <section class="disclaimer-bar">
                <?php wp_nav_menu([
                    'theme_location' => 'disclaimer-navigation',
                    'depth' => 1,
                ]); ?>
            </section>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>
