<?php
/**
 * HTML dropdown select control.
 *
 * @package xts
 */

namespace XTS\Admin\Modules\Options\Controls;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

use XTS\Admin\Modules\Options\Field;

/**
 * Switcher field control.
 */
class Buttons extends Field {

	/**
	 * Options array from arguments.
	 *
	 * @var array
	 */
	private $_options;

	/**
	 * Is it images buttons set.
	 *
	 * @var boolean
	 */
	private $_is_images_set;

	/**
	 * Contruct the object.
	 *
	 * @since 1.0.0
	 *
	 * @param array  $args Field args array.
	 * @param arary  $options Options from the database.
	 * @param string $type Field type.
	 * @param string $object Field object.
	 */
	public function __construct( $args, $options, $type = 'options', $object = 'post' ) {
		parent::__construct( $args, $options, $type, $object );

		$this->_options = $this->get_field_options();

		if ( empty( $this->_options ) ) {
			echo 'Options for this field are not provided in the map function.';
			return;
		}

		$first_option = reset( $this->_options );

		$this->_is_images_set = isset( $first_option['image'] );

		if ( $this->_is_images_set ) {
			$this->extra_css_class .= ' xts-images-set';
		}
	}

	/**
	 * Displays the field control HTML.
	 *
	 * @since 1.0.0
	 *
	 * @return void.
	 */
	public function render_control() {
		if ( empty( $this->_options ) ) {
			echo esc_html__( 'Options for this field are not provided in the map function.', 'woodmart' );
			return;
		}

		$wrapper_class = '';
		$btn_class = '';

		if ( ! isset( $this->args['tabs'] ) ) {
			$btn_class .= $this->_is_images_set ? 'xts-set-btn-img' : 'xts-set-btn';
		}

		if ( ! empty( $this->args['is_deselect'] ) ) {
			$wrapper_class .= ' xts-with-deselect';
		}

		$value = isset( $this->args['tabs'] ) ? $this->args['default'] : $this->get_field_value();
		$name  = isset( $this->args['tabs'] ) ? '' : $this->get_input_name();
		?>
			<div class="xts-btns-set<?php echo esc_attr( $wrapper_class ); ?>">
				<?php foreach ( $this->_options as $key => $option ) : ?>
					<div class="xts-set-item <?php echo esc_attr( $btn_class . ( $value == $key ? ' xts-active' : '' ) ); ?>" data-value="<?php echo esc_attr( $key ); ?>"<?php echo ! empty( $option['onclick'] ) ? ' onclick="' . esc_js( $option['onclick'] ) . '"' : ''; ?>>
						<?php if ( $this->_is_images_set ) : ?>
							<img src="<?php echo esc_url( $option['image'] ); ?>" title="<?php echo esc_attr( $option['name'] ); ?>" alt="<?php echo esc_attr( $option['name'] ); ?>">
							<span class="xts-images-set-lable"><?php echo esc_html( $option['name'] ); ?></span>
						<?php else : ?>
							<span><?php echo esc_html( $option['name'] ); ?></span>
						<?php endif ?>

						<?php if ( ! empty( $option['hint'] ) && woodmart_get_opt( 'white_label_theme_hints', true ) ) : ?>
							<div class="xts-hint">
								<div class="xts-tooltip xts-top"><div class="xts-tooltip-inner"><?php echo $option['hint']; // phpcs:ignore ?></div></div>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach ?>
			</div>
			<input type="hidden" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>"/>
		<?php
	}
}
