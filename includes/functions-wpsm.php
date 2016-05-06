<?php

if ( !function_exists( 'wpsm_array_to_value' ) ) {
	function wpsm_array_to_value( $arr = array(), $key = 0, $default = null ) {
		return ( isset( $arr[ $key ] ) ? $arr[ $key ] : $default );
	}
}
