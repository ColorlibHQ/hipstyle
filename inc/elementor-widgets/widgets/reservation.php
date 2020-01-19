<?php
namespace Hipstyleelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Utils;


/**
 *
 * Hipstyle elementor Team Member section widget.
 *
 * @since 1.0
 */
class Hipstyle_Reservation extends Widget_Base {

	public function get_name() {
		return 'hipstyle-reservation';
	}

	public function get_title() {
		return __( 'Reservation', 'hipstyle' );
	}

	public function get_icon() {
		return 'eicon-calendar';
	}

	public function get_categories() {
		return [ 'hipstyle-elements' ];
    }

	protected function _register_controls() {

        // ----------------------------------------  Reservations Section ------------------------------
        $this->start_controls_section(
            'reservation_heading',
            [
                'label' => __( 'Reservation', 'hipstyle' ),
            ]
        );

        $this->add_control(
            'reserv_form',
            [
                'label'         => __( 'Form Shortcode', 'hipstyle' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true
            ]
        );

        $this->end_controls_section(); // End section top content


        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'hipstyle' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'left_bg_img',
            [
                'label'     => __( 'Left Background Image', 'hipstyle' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'hipstyle' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .regervation_part:after',
            ]
        );

        $this->add_control(
            'bg_color_head',
            [
                'label'     => __( 'Background Color', 'hipstyle' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'bg_color', [
                'label'     => __( 'Background Color', 'hipstyle' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#30383b',
                'selectors' => [
                    '{{WRAPPER}} .regervation_part' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $reserv_form = !empty( $settings['reserv_form'] ) ? $settings['reserv_form'] : '';
    ?>

    <!--::regervation_part start::-->
    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-7">
                    <div class="regervation_part_iner">
                        <?php echo do_shortcode( $reserv_form )?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::regervation_part end::-->
    <?php
    }
}
