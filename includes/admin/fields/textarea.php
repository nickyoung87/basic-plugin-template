<?php

namespace PluginName\Admin\Fields;

use PluginName\Abstracts\Field;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Standard
 *
 * Handles multiple field types like text, number, etc.
 */
class Textarea extends Field {

	/**
	 * Construct.
	 *
	 * @param array $field
	 *
	 * @since 1.0.0
	 */
	public function __construct( $field ) {

		$this->subtype = isset( $field['subtype'] ) ? esc_attr( $field['subtype'] ) : 'text';

		parent::__construct( $field );
	}

	/**
	 * Outputs the field markup.
	 *
	 * @since 1.0.0
	 */
	public function html() {

		?>
		<textarea type="<?php echo $this->subtype; ?>"
		          name="<?php echo $this->name; ?>"
		          id="<?php echo $this->id; ?>"
		          class="<?php echo $this->class; ?>"<?php
		echo $this->style ? 'style="' . $this->style . '" ' : ' ';
		echo $this->placeholder ? 'placeholder="' . $this->placeholder . '"' : ' ';
		echo $this->attributes; ?>><?php echo $this->value; ?></textarea>
		<?php


		if ( ! empty( $this->description ) ) {
			echo '<p class="description">' . $this->description . '</p>';
		}

		if ( is_string( $this->validation ) && ! empty ( $this->validation ) ) {
			echo $this->validation;
		}

	}
}
