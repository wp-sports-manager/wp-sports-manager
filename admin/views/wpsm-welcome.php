<?php

	$availableTypologics = WP_Sports_Manager::get_typologics();
	
	if( isset($_POST['typologics']) ){
		update_option( '_' . WPSM_PREFIX . 'typology' , sanitize_text_field( $_POST['typologics'] ) );
		update_option( '_' . WPSM_PREFIX . 'club' , sanitize_text_field( $_POST['club'] ) );
		update_option( '_' . WPSM_PREFIX . 'installed' , 'true' );
	}

	$typology = get_option( '_' . WPSM_PREFIX . 'typology' , 'football' );
	$club = get_option( '_' . WPSM_PREFIX . 'club' );


?>
<div class="wrap">
	<h2><?php _e('WordPress Sports Manager Welcome!', 'wp-sports-manager'); ?></h2>
	
	<form name="typology" action="<?=$_SERVER['PHP_SELF']?>?page=sports-manager-welcome" method="post">

		<label for="club">
			<?php _e('Club Name', 'wp-sports-manager'); ?>
			<input type="text" name="club" id="club" value="<?php echo $club; ?>">
		</label>

		<select name="typologics" id="">
		<?php

			foreach ($availableTypologics as $key => $value) {
				?>
				<option value="<?php echo $value; ?>"><?php echo ucfirst($value); ?></option>
				<?php
			}

		?>
		</select>
		<button type="submit"><?php _e('Save'); ?></button>

	</form>

</div>