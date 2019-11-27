<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'Viaggio',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'viaggio-option',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'Viaggio <small>Options</small>',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();
// ----------------------------------------
// a option section for options header    -
// ----------------------------------------
$options[]      = array(
  'name'        => 'general',
  'title'       => 'General',
  'icon'        => 'fa fa-ge',

  // begin: fields
  'fields'      => array(
    array(
      'type'    => 'image',
      'id'      => 'favicon_url',
      'title'   => esc_html__('Favicon', 'viaggio'),
      'desc'    => esc_html__('Insert the favicon you want for your site.', 'viaggio'),
      ),
    array(
      'id'        => 'logo_url',
      'type'      => 'image',
      'title'     => esc_html__('Logo' , 'viaggio'),
      'desc'      => esc_html__('Insert the logo of your brand.' , 'viaggio')
    ),
    array(
      'id'        => 'slider_option',
      'type'      => 'switcher',
      'title'     => esc_html__('Slider' , 'viaggio'),
      'desc'      => esc_html__('Turn the slider on or off.' , 'viaggio')
    ),

  ), // end: fields
);




// ----------------------------------------
// a option section for options header    -
// ----------------------------------------
$options[]      = array(
  'name'        => 'header',
  'title'       => esc_html__('Header' , 'viaggio'),
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

    array(
      'id'        => 'header_section_selector',
      'type'      => 'image_select',
      'title'     => esc_html__('Image Select' , 'viaggio'),
      'options'   => array(
        'value-1' => get_template_directory_uri(). '/assets/images/01_home_v1.png',
        'value-2' => get_template_directory_uri(). '/assets/images/02_home_v2.png',
      ),
      'default'   => 'value-1',
    ),

    array(
      'id'        => 'header_top_bar',
      'type'      => 'switcher',
      'title'     => esc_html__('Top Bar' , 'viaggio'),
      'default'   => true,
    ),

    array(
      'id'        => 'header_top_social',
      'type'      => 'switcher',
      'title'     => esc_html__('Social Icons' , 'viaggio'),
      'default'   => true,
    ),

    array(
      'id'        => 'header_top_search',
      'type'      => 'switcher',
      'title'     => esc_html__('Header Search' , 'viaggio'),
      'default'   => true,
    ),

    array(
      'id'        => 'header_off_canvas_menu',
      'type'      => 'switcher',
      'title'     => esc_html__('Off Canvas Menu' , 'viaggio'),
      'default'   => true,
    ),

  ), // end: fields
);

// ----------------------------------------
// a option section for options social    -
// ----------------------------------------
$options[]      = array(
  'name'        => 'slider',
  'id'          => 'slider',
  'title'       => esc_html__('Slider', 'viaggio'),
  'icon'        => 'fa fa-sliders',
  'fields'      => array(
      array(
        'id'    => 'slider_main',
        'title' => esc_html__('Slider Category', 'viaggio'),
        'type'  => 'select',
        'options'=> 'categories',
        'default_option'=> esc_html__('Select A Category For Slider' , 'viaggio')
        ),
      array(
        'id'    => 'slider_style',
        'title' => esc_html__('Slider Style', 'viaggio'),
        'type'  => 'select',
        'options'  => array(
          'slider_default'  => esc_html__('SLider Style 1' , 'viaggio'),
          'slider_alter'   => esc_html__('Slier Style 2' , 'viaggio'),
        ),
        'default_option'=> esc_html__('Select A Design For Slider' , 'viaggio')
        ),
    )
  );


// ----------------------------------------
// a option section for options Single    -
// ----------------------------------------

$options[]      = array(
  'name'        => 'single',
  'title'       => esc_html__('Single' , 'viaggio'),
  'icon'        => 'fa fa-laptop',

  //Single Options
  'fields'      => array(
    array(
      'id'        => 'full_wide',
      'title'     => esc_html__('Width' , 'viaggio'),
      'desc'      => esc_html__('Select The Width of The Single Page' , 'viaggio'),
      'type'  => 'select',
        'options'  => array(
          'full'  => esc_html__('Full Width Blog Content' , 'viaggio'),
          'regular'   => esc_html__('Regular Width Blog Content' , 'viaggio'),
        ),
        'default'=> 'regular'
        ),

      array(
      'id'        => 'cover_image',
      'title'     => esc_html__('Select A Cover Image' , 'viaggio'),
      'desc'      => esc_html__('Select The Cover Image If No Image Selected For The Content' , 'viaggio'),
      'type'  => 'image',
      ),

      array(
        'id'      => 'related_post_info',
        'type'    => 'switcher',
        'default' => true,
        'title'   => esc_html__('Related Content','viaggio'),
        'desc'    => esc_html__('Turn On/Off Your Related Posts Details','viaggio')
        ),

      array(
        'id'      => 'author_info',
        'type'    => 'switcher',
        'default' => true,
        'title'   => esc_html__('Author Info', 'viaggio'),
        'desc'    => esc_html__('Turn On/Off Your Info About Author', 'viaggio')
        ),
      array(
        'id'      => 'share_info',
        'type'    => 'switcher',
        'default' => true,
        'title'   => esc_html__('Share Content', 'viaggio'),
        'desc'    => esc_html__('Turn On/Off Your Share Details', 'viaggio')
        ),
      
    )
  );
// ----------------------------------------
// a option section for options social    -
// ----------------------------------------


$options[]      = array(
  'name'        => 'contact',
  'title'       => esc_html__('Contact','viaggio'),
  'icon'        => 'fa fa-envelope',
  'fields'      => array(
      array(
        'id'    => 'contact-description',
        'type'  => 'textarea',
        'title' => esc_html__('Contact Description', 'viaggio'),
        'desc'  => esc_html__('Insert Your Contact Description.', 'viaggio'),
        'default'=> esc_html__('Thank you for your interest in contacting our blog. We hope this information was useful. You are welcome to use this form to contact us with comments, requests, questions or corrections. Just leave us a note and we’ll respond as soon as possible.', 'viaggio')
        ),
      array(
        'id'    => 'contact-google-lat',
        'title' => esc_html__('Latitude' , 'viaggio'),
        'type'  => 'text',
        'desc'  => esc_html__('Insert You Position' , 'viaggio'),
        'default' => '22.8129398'
        ),
      array(
        'id'    => 'contact-google-lng',
        'title' => esc_html__('Longitude', 'viaggio'),
        'type'  => 'text',
        'desc'  => esc_html__('Insert You Position', 'viaggio'),
        'default' => '89.5312499'
        ),
      array(
        'id'    => 'contact-google-api',
        'title' => esc_html__('Google Map API', 'viaggio'),
        'type'  => 'text',
        'desc'  => esc_html__('Insert Your Google Map API', 'viaggio'),
        ),
      array(
        'id'    => 'contact-google-icon',
        'title' => esc_html__('Google Map Icon', 'viaggio'),
        'type'  => 'image',
        'desc'  => esc_html__('Insert You Google Map Icon', 'viaggio'),
        ),
      array(
        'id'    => 'contact-google-map',
        'type'  => 'wysiwyg',
        'title' => esc_html__('Google Map Iframe', 'viaggio'),
        'desc'  => esc_html__('Insert Map Iframe.', 'viaggio'),
        ),
      array(
        'id'    => 'contact-email',
        'title' => esc_html__('Contact Email', 'viaggio'),
        'type'  => 'text',
        'desc'  => esc_html__('Insert Your Contact Email', 'viaggio'),
        'default' => 'your@mail.com'
        ),
      array(
        'id'    => 'contact-phone',
        'title' => esc_html__('Contact Phone', 'viaggio'),
        'type'  => 'text',
        'desc'  => esc_html__('Insert Your Contact Phone', 'viaggio'),
        'default' => '+009 411001'
        ),
      array(
        'id'    => 'contact-address',
        'title' => esc_html__('Contact Address', 'viaggio'),
        'type'  => 'text',
        'desc'  => esc_html__('Insert Your Contact Address.', 'viaggio'),
        'default' => esc_html__('132 Jordan Road Avenue, Suite 22, RedWood City, CA94872, USA', 'viaggio')
        ),
    ),
  );


// ----------------------------------------
// 
// ----------------------------------------
$options[]      = array(
  'name'        => 'OffCanvas',
  'title'       => esc_html__('Off Canvas', 'viaggio'),
  'icon'        => 'fa fa-bars',
  'fields'      => array(
      
        array(
          'id'  => 'menu_off_canvas',
          'title' => esc_html__('Off Canvas Menu' , 'viaggio'),
          'desc'  => esc_html__("Include Off Canvas Menu" , 'viaggio'),
          'type'  => 'switcher',
          'default' => true
          ),
        array(
          'id'  => 'author_off_canvas_show',
          'title' => esc_html__('Off Canvas Author' , 'viaggio'),
          'desc'  => esc_html__("Show Off Canvas Author Or Not" , 'viaggio'),
          'type'  => 'switcher',
          'default' => false
          ),
        array(
          'id'  => 'off_canvas_author_image',
          'title' => esc_html__('AUthor Image' , 'viaggio'),
          'desc'  => esc_html__('Upload The Image You Want' , 'viaggio'),
          'type'  => 'image',
          ),
        array(
          'id'  => 'off_canvas_author_desc',
          'title' => esc_html__('AUthor Description' , 'viaggio'),
          'desc'  => esc_html__('Author Description will be in this text area.' , 'viaggio'),
          'type'  => 'textarea',
          'default' => esc_html__('A personal diary of wanderlust and an overflowing wardrobe. Live with passion.' , 'viaggio')
          ),
        array(
          'id'  => 'author_off_canvas_social',
          'title' => esc_html__('Off Canvas Author Social' , 'viaggio'),
          'desc'  => esc_html__("Show Off Canvas Social" , 'viaggio'),
          'type'  => 'switcher',
          'default' => false
          ),

    )
);
// ----------------------------------------
// a option section for options social    -
// ----------------------------------------
$options[]      = array(
  'name'        => 'notfound',
  'title'       => esc_html__('404','viaggio'),
  'icon'        => 'fa fa-exclamation-triangle',
  'fields'      => array(
      array(
        'id'    => '404_title',
        'title' => esc_html__('404 Titlte' , 'viaggio'),
        'type'  => 'text',
        'desc'  => esc_html__('Insert You 4040' , 'viaggio'),
        'default' => esc_html__('ERROR 404' , 'viaggio')
        ),
      array(
        'id'    => '404-description',
        'type'  => 'textarea',
        'title' => esc_html__('404 Description' , 'viaggio'),
        'desc'  => esc_html__('Insert Your Contact Description.' , 'viaggio'),
        'default'=> esc_html__('Thank you for your interest in contacting our blog. We hope this information was useful. You are welcome to use this form to contact us with comments, requests, questions or corrections. Just leave us a note and we’ll respond as soon as possible.' , 'viaggio')
        ),
      array(
        'id'    => '404-lost-text',
        'title' => esc_html__('Lost Text' , 'viaggio'),
        'type'  => 'text',
        'desc'  => esc_html__('Insert You Lost Text' , 'viaggio'),
        'default' => esc_html__('Lost?. You can go back to the homepage.' , 'viaggio')
        ),
    ),
  );

$options[]      = array(
  'name'        => 'social',
  'title'       => esc_html__('Social', 'viaggio'),
  'icon'        => 'fa fa-group',

  // begin: fields
  'fields'      => array(

    array(
      'id'        => 'viaggio_socila_facebook',
      'type'      => 'text',
      'title'     => esc_html__('Facebook', 'viaggio')
    ),

    array(
      'id'        => 'viaggio_socila_twitter',
      'type'      => 'text',
      'title'     => esc_html__('Twitter', 'viaggio')
    ),

    array(
      'id'        => 'viaggio_socila_google-plus',
      'type'      => 'text',
      'title'     => esc_html__('Google Plus', 'viaggio')
    ),

    array(
      'id'        => 'viaggio_socila_digg',
      'type'      => 'text',
      'title'     => esc_html__('Digg', 'viaggio')
    ),

    array(
      'id'        => 'viaggio_socila_pinterest',
      'type'      => 'text',
      'title'     => esc_html__('Pinterest', 'viaggio')
    ),

  ), // end: fields
);



// ------------------------------
// license                      -
// ------------------------------
$options[]   = array(
  'name'     => 'license_section',
  'title'    => 'License',
  'icon'     => 'fa fa-info-circle',
  'fields'   => array(

    array(
      'type'    => 'heading',
      'content' => '100% GPL License, Yes it is free!'
    ),
    array(
      'type'    => 'content',
      'content' => 'Codestar Framework is <strong>free</strong> to use both personal and commercial. If you used commercial, <strong>please credit</strong>. Read more about <a href="http://www.gnu.org/licenses/gpl-2.0.txt" target="_blank">GNU License</a>',
    ),

  )
);

CSFramework::instance( $settings, $options );
