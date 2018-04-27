<?php

namespace PluginName\Admin\Fields;

use PluginName\Abstracts\Field;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Select
 *
 * Handles functionality of the select (<select>) field type
 *
 * @since   1.0.0
 */
class Select extends Field {

	/**
	 * CSS class string
	 *
	 * @var string
	 * @since 1.0.0
	 */
	public $class = '';

	public $page_select = false;

	/**
	 * Select constructor.
	 *
	 * @param Field $field
	 *
	 * @since 1.0.0
	 */
	public function __construct( $field ) {

		$class = 'pslug-field-select';

		$classes = isset( $field['class'] ) ? $field['class'] : '';
		if ( ! empty( $classes ) ) {
			if ( is_array( $classes ) ) {
				foreach ( $classes as $class ) {
					$class .= ' ' . $class;
				}
			}
		}

		if ( isset( $field['default'] ) ) {
			$this->default = $field['default'];
		}

		$page_select = isset( $field['page_select'] ) ? $field['page_select'] : '';
		if ( 'page_select' == $page_select ) {
			$this->page_select = true;
		}

		$this->class = $class;


		parent::__construct( $field );
	}

	/**
	 * Handles the HTML output of the select field
	 *
	 * @since 1.0.0
	 */
	public function html() {

		if ( $this->page_select ) {
			$this->page_select_html();

			return;
		}

		if ( $this->default ) {
			if ( empty( $this->value ) || $this->value == '' ) {
				$this->value = $this->default;
			}
		}

		?>
		<select name="<?php echo $this->name; ?>"
		        id="<?php echo $this->id; ?>"
		        style="<?php echo $this->style; ?>"
		        class="<?php echo $this->class; ?>"
			<?php echo $this->attributes; ?>>
			<?php

			if ( ! empty( $this->options ) && is_array( $this->options ) ) {
				foreach ( $this->options as $option => $name ) {
					if ( is_array( $this->value ) ) {
						$selected = selected( in_array( $option, $this->value ), true, false );
					} else {
						$selected = selected( $this->value, trim( strval( esc_html( $option ) ) ), false );
					}
					echo '<option value="' . $option . '" ' . $selected . '>' . esc_attr( $name ) . '</option>';
				}
			}

			?>
		</select>
		<?php

		if ( ! empty( $this->description ) ) {
			echo '<p class="description">' . wp_kses_post( $this->description ) . '</p>';
		}
	}

	public function page_select_html() {

		$args = array(
			'depth'                 => 0,
			'child_of'              => 0,
			'selected'              => absint( $this->value ),
			'echo'                  => 1,
			'name'                  => $this->name,
			'id'                    => $this->id,
			'show_option_none'      => null, // string
			'show_option_no_change' => null, // string
			'option_none_value'     => null, // string
		);

		wp_dropdown_pages( $args );

		echo '<p class="description">' . $this->description . '</p>';
	}
}
