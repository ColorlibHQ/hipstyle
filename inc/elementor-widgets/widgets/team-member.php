<?php
namespace Hipstyleelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Hipstyle elementor Team Member section widget.
 *
 * @since 1.0
 */
class Hipstyle_Team_Member extends Widget_Base {

	public function get_name() {
		return 'hipstyle-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'hipstyle' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'hipstyle-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Team Section ------------------------------
        $this->start_controls_section(
            'team_heading',
            [
                'label' => __( 'Team Heading', 'hipstyle' ),
            ]
        );

        $this->add_control(
			'sec_img',
			[
				'label'         => esc_html__( 'Section Image', 'hipstyle' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
		);
        $this->add_control(
            'sec_header',
            [
                'label'         => esc_html__( 'Section Header', 'hipstyle' ),
                'description'   => esc_html__('Use <br> tag for line break', 'hipstyle'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h2>Meet Our Artist</h2><p>Good morning forth gathering doesn\'t god gathering man and had moveth there dry sixth dominion rule divided behold after had he did not move .</p>', 'hipstyle' )
            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Teams content ------------------------------
		$this->start_controls_section(
			'teams_block',
			[
				'label' => __( 'Teams', 'hipstyle' ),
			]
		);
		$this->add_control(
            'teams_content', [
                'label' => __( 'Create Team', 'hipstyle' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ name }}}',
                'fields' => [
                    [
                        'name'  => 'image',
                        'label' => __( 'Member Image', 'hipstyle' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'name',
                        'label' => __( 'Name', 'hipstyle' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Adam Billiard', 'hipstyle' )
                    ],
                    [
                        'name'      => 'desg',
                        'label'     => __( 'Designation', 'hipstyle' ),
                        'type'      => Controls_Manager::TEXT,
                        'default'   => __( 'Hair Stylist', 'hipstyle' )
                    ],
                    [
                        'name'      => 'fb',
                        'label'     => __( 'Facebook URL', 'hipstyle' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'tw',
                        'label'     => __( 'Twitter URL', 'hipstyle' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'ins',
                        'label'     => __( 'Instagram URL', 'hipstyle' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'skp',
                        'label'     => __( 'Skype URL', 'hipstyle' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Teams content

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Team Heading', 'hipstyle' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Big Title Color', 'hipstyle' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#30383b',
                'selectors' => [
                    '{{WRAPPER}} .artist_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'color_sec_sub_title', [
                'label'     => __( 'Sub Title Color', 'hipstyle' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .artist_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'other_styles',
            [
                'label'     => __( 'Other Styles', 'hipstyle' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'art_name', [
                'label'     => __( 'Artist Name Color', 'hipstyle' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#30383b',
                'selectors' => [
                    '{{WRAPPER}} .artist_part .single_blog_item h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'art_desg', [
                'label'     => __( 'Artist Designation Color', 'hipstyle' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .artist_part .single_blog_item p' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    $sec_img         = !empty( $settings['sec_img']['id'] ) ? wp_get_attachment_image( $settings['sec_img']['id'], 'hipstyle_section_img_29x53', '', array( 'alt' => 'team section image' ) ) : '';
    $sec_header      = !empty( $settings['sec_header'] ) ? $settings['sec_header'] : '';
    $teams           = !empty( $settings['teams_content'] ) ? $settings['teams_content'] : '';
    $dynamic_class   = ! is_front_page() && count( $teams ) > 3 ? ' single_page_artist' : '';
    ?>

    <!--::chefs_part start::-->
    <section class="artist_part<?php echo esc_attr( $dynamic_class )?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-lg-6 col-sm-10">
                    <div class="section_tittle">
                        <?php
                            // Section image
                            if( $sec_img ){
                                echo wp_kses_post( $sec_img );
                            }

                            // Team Header =============
                            if( $sec_header ){
                                echo wp_kses_post( wpautop( $sec_header ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if( is_array( $teams ) && count( $teams ) > 0 ){
                    foreach ( $teams as $team ) {
                        $team_img   = !empty( $team['image']['id'] ) ? wp_get_attachment_image( $team['image']['id'], 'hipstyle_artist_thumb_360x434', false, array( 'alt' => $team['name'] ) ) : '';
                        $name        = !empty( $team['name'] ) ? $team['name'] : '';
                        $designation = !empty( $team['desg'] ) ? $team['desg'] : '';
                        $fb          = !empty( $team['fb']['url'] ) ? $team['fb']['url'] : '';
                        $tw          = !empty( $team['tw']['url'] ) ? $team['tw']['url'] : '';
                        $ins         = !empty( $team['ins']['url'] ) ? $team['ins']['url'] : '';
                        $skp         = !empty( $team['skp']['url'] ) ? $team['skp']['url'] : '';
                ?>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <?php
                                // Team image
                                if( $team_img ){
                                    echo wp_kses_post( $team_img );
                                }
                            ?>
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text text-center">
                                <h3><?php echo esc_html( $name );?></h3>
                                <p><?php echo esc_html( $designation );?></p>
                                <div class="social_icon">
                                    <a href="<?php echo esc_url( $fb );?>"> <i class="ti-facebook"></i> </a>
                                    <a href="<?php echo esc_url( $tw );?>"> <i class="ti-twitter-alt"></i> </a>
                                    <a href="<?php echo esc_url( $ins );?>"> <i class="ti-instagram"></i> </a>
                                    <a href="<?php echo esc_url( $skp );?>"> <i class="ti-skype"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!--::chefs_part end::-->
    <?php
    }
}
