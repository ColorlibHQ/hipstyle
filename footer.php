<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'hipstyle' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( hipstyle_opt( 'hipstyle_footer_copyright_text' ) ) ? hipstyle_opt( 'hipstyle_footer_copyright_text' ) : $copyText;
    $footer_class = hipstyle_opt( 'hipstyle_footer_widget_toggle' ) == 1 ? 'footer-area' : 'no_widget';

    ?>

    <!-- footer part start-->
    
    <footer class="footer-area">
        <?php
            if( hipstyle_opt( 'hipstyle_footer_widget_toggle' ) == 1 ) {
        ?>
        <div class="container">
            <div class="row justify-content-between">
                <?php
                    // Footer Widget 1
                    if ( is_active_sidebar( 'footer-1' ) ) {
                        dynamic_sidebar( 'footer-1' );
                    }

                    // Footer Widget 2
                    if ( is_active_sidebar( 'footer-2' ) ) {
                        dynamic_sidebar( 'footer-2' );
                    }

                    // Footer Widget 3
                    if ( is_active_sidebar( 'footer-3' ) ) {
                        dynamic_sidebar( 'footer-3' );
                    }
                ?>
            </div>
        </div>
        <?php
            } 
        ?>

        <div class="copyright_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="footer-text m-0"><?php echo wp_kses_post( $copyRight ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    </body>
</html>