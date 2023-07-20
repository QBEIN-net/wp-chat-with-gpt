<?php
defined( 'ABSPATH' ) || exit;

/* @var array $settings */
/* @var array $models */
/* @var array $errors */

?>
<div class="wrap">
    <h2 id="qbein-chat-gpt-settings"><?php echo __( 'Chat with GPT settings' ) ?></h2>

	<?php if ( is_wp_error( $errors ) ): ?>
        <div class="notice notice-error">
            <p style="color:red; font-weight: bold;"><?php echo $errors->get_error_message(); ?></p>
        </div>
	<?php else: ?>
		<?php do_action( 'qcg_success_msg' ); ?>
	<?php endif; ?>

    <p><?php _e( 'Setting up your account to interact with plugin' ); ?></p>
    <form method="post" name="qcg-settings" id="qcg-settings" class="validate" novalidate="novalidate">
        <input name="action" type="hidden" value="qcg-settings"/>
		<?php wp_nonce_field( 'qcg-settings', '_wpnonce_qcg_nonce' ); ?>
		<?php
		// Load up the passed data, else set to a default.
		$creating = isset( $_POST['qcg-settings'] );

		$api_key     = $creating && isset( $_POST['api_key'] ) ? wp_unslash( $_POST['api_key'] ) : ( $settings['api_key'] ?? '' );
		$req_limit   = $creating && isset( $_POST['req_limit'] ) ? wp_unslash( $_POST['req_limit'] ) : ( $settings['req_limit'] ?? '' );
		$allow_guest = $creating && isset( $_POST['allow_guest'] ) ? $_POST['allow_guest'] : ( $settings['allow_guest'] ?? false );
		$model       = $creating && isset( $_POST['model'] ) ? wp_unslash( $_POST['model'] ) : ( $settings['model'] ?? '' );
		?>

        <table class="form-table" role="presentation">
            <tr class="form-field form-required">
                <th scope="row"><label for="user_login"><?php _e( 'chatGPT Api key' ); ?> <span class="description"><?php _e( '(required)' ); ?></span></label></th>
                <td><input name="api_key" type="text" id="api_key" value="<?php echo esc_attr( $api_key ); ?>" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="60"/></td>
            </tr>
            <tr class="form-field form-required">
                <th scope="row"><label for="user_login"><?php _e( 'Requests limit per user per day' ); ?> <span class="description"><?php _e( '(required)' ); ?></span></label></th>
                <td><input name="req_limit" type="text" id="req_limit" value="<?php echo esc_attr( $req_limit ); ?>" aria-required="true" style="width:55px;"/></td>
            </tr>
            <tr>
                <th scope="row"><?php _e( 'Allow guest customers usage' ); ?></th>
                <td>
                    <input type="checkbox" name="allow_guest" id="allow_guest" value="1" <?php checked( $allow_guest ); ?> />
                    <label for="allow_guest"><?php _e( 'Show chat for guest users' ); ?></label>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row"><label for="model"><?php _e( 'Select model' ); ?></label></th>
                <td>
                    <select name="model" id="model">
						<?php foreach (  $models as $template ) {
							$selected = selected( $model, $template, false );
							echo "\n\t<option value='" . esc_attr( $template ) . "' $selected>" . esc_html( $template ) . '</option>';
						} ?>
                    </select>
                </td>
            </tr>
        </table>
		<?php submit_button( __( 'Save settings' ), 'primary', 'qcg-settings', true, array( 'id' => 'qcg-settings-wrap' ) ); ?>
    </form>
</div> <!-- .wrap -->