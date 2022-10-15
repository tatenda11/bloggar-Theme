<?php
/**
 * Sanitization Functions
 *
 * @package bootstap_elements
 * 
 */

function bloggar_sanitize_google_fonts( $input, $setting ) {

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;
  
  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}


function bloggar_sanitize_choices( $input, $setting ) {
  global $wp_customize;

  $control = $wp_customize->get_control( $setting->id );

  if ( array_key_exists( $input, $control->choices ) ) {
      return $input;
  } else {
      return $setting->default;
  }
}

//checkbox sanitization function
function  bloggar_sanitize_checkbox( $input ) {
  //returns true if checkbox is checked
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

function bloggar_sanitize_select( $input, $setting ) {
  
  // Ensure input is a slug.
  $input = sanitize_key( $input );
  
  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;
  
  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

// Sanitize Number Range

function  bloggar_sanitize_float( $input ) {
  return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function bloggar_sanitize_file( $file, $setting ) {
          
  //allowed file types
  $mimes = array(
      'jpg|jpeg|jpe' => 'image/jpeg',
      'gif'          => 'image/gif',
      'png'          => 'image/png'
  );
    
  //check file type from file name
  $file_ext = wp_check_filetype( $file, $mimes );
    
  //if file has a valid mime type return it, otherwise return default
  return ( $file_ext['ext'] ? $file : $setting->default );
}

function  bloggar_sanitize_array( $value ){    
    if ( is_array( $value ) ) {
    foreach ( $value as $key => $subvalue ) {
      $value[ $key ] = esc_attr( $subvalue );
    }
    return $value;
  }
  return esc_attr( $value );    
}