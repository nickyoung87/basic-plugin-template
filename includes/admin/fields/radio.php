<?php

namespace PluginName\Admin\Fields;

use PluginName\Abstracts\Field;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Radio input field.
 *
 * Outputs a fieldset of radio inputs for multiple choices.
 *
 * @since 1.0.0
 */
class Radio extends Field {

	/**
	 * Inline radios.
	 *
	 * @access private
	 * @var bool
	 */
	private $inline = false;

	/**
	 * Construct.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field
	 */
	public function __construct( $field ) {

		$this->type_class = 'pslug-field-radios';
		$this->inline     = isset( $field['inline'] ) ? ( 'inline' == $field['inline'] ? true : false ) : false;

		parent::__construct( $field );
	}

	/**
	 * Outputs the field markup.
	 *
	 * @since 1.0.0
	 */
	public function html() {

		if ( ! empty( $this->options ) && is_array( $this->options ) && count( $this->options ) > 0 ) {
			?>

			<fieldset id="<?php echo $this->id; ?>"
			          class="<?php echo $this->class; ?>"
				<?php echo $this->style ? 'style="' . $this->style . '"' : ''; ?>>
				<?php

				if ( ! empty( $this->title ) ) :

					?>
					<legend class="screen-reader-text">
						<span><?php echo $this->title; ?></span>
					</legend>
					<?php

				endif;

				?>

				<ul <?php echo $this->inline === true ? 'class="pslug-field-radios-inline"' : ''; ?>>
					<?php foreach ( $this->options as $option => $name ) : ?>
						<li>
							<label for="<?php echo $this->id . '-' . trim( strval( $option ) ); ?>">
								<input name="<?php echo $this->name; ?>"
								       id="<?php echo $this->id . '-' . trim( strval( $option ) ); ?>"
								       class="pslug-field pslug-field-radio"
								       type="radio"
								       value="<?php echo trim( strval( $option ) ); ?>"
									<?php echo $this->attributes; ?>
									<?php checked( $option, $this->value, true ); ?>
								/>
								<?php echo $name; ?>
							</label>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php echo $this->description ? '<p class="description">' . wp_kses_post( $this->description ) . '</p>' : ''; ?>

			</fieldset>
			<?php
		}
	}

}
