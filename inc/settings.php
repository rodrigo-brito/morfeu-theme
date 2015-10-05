<?php 


function destaque_cpt() {
    $slider = new Odin_Post_Type(
        'Slider', // Nome (Singular) do Post Type.
        'slider' // Slug do Post Type.
    );

    $slider->set_labels(
        array(
            'menu_name' => __( 'Slider Home', 'odin' )
        )
    );

    $slider->set_arguments(
        array(
            'supports' => array( 'title', 'thumbnail' ),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-images-alt'
        )
    );
}

add_action( 'init', 'destaque_cpt', 1 );


function minicursos_cpt() {
    $minicurso = new Odin_Post_Type(
        'Minicurso', // Nome (Singular) do Post Type.
        'minicurso' // Slug do Post Type.
    );

    $minicurso->set_labels(
        array(
            'menu_name' => __( 'Minicursos', 'odin' )
        )
    );

    $minicurso->set_arguments(
        array(
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'menu_position' => 6,
            'menu_icon' => 'dashicons-welcome-learn-more'
        )
    );
}

add_action( 'init', 'minicursos_cpt', 1 );


function programacao_cpt() {
    $programacao = new Odin_Post_Type(
        'Evento', // Nome (Singular) do Post Type.
        'evento' // Slug do Post Type.
    );

    $programacao->set_labels(
        array(
            'menu_name' => __( 'Programação', 'odin' )
        )
    );

    $programacao->set_arguments(
        array(
            'supports' => array( 'title', 'thumbnail' ),
            'menu_position' => 7,
            'menu_icon' => 'dashicons-calendar-alt'
        )
    );
}

add_action( 'init', 'programacao_cpt', 1 );


function evento_taxonomy() {
    $taxonomy = new Odin_Taxonomy(
        'Tipo', // Nome (Singular) da nova Taxonomia.
        'tipo', // Slug do Taxonomia.
        'evento' // Nome do tipo de conteúdo que a taxonomia irá fazer parte.
    );

    $taxonomy->set_labels(
        array(
            'menu_name' => __( 'Tipos de eventos', 'odin' )
        )
    );

    $taxonomy->set_arguments(
        array(
            'hierarchical' => true,
        )
    );
}

add_action( 'init', 'evento_taxonomy', 1 );

/**
 *  Advanced Custom Fields - ACF
 */

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/inc/acf/';
    
    // return
    return $path;
    
}
 

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/inc/acf/';
    
    // return
    return $dir;
    
}
 

// 3. Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );

/*
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_eventos-fields',
		'title' => 'Eventos Fields',
		'fields' => array (
			array (
				'key' => 'field_561089250710a',
				'label' => 'Data',
				'name' => 'data_evento',
				'type' => 'date_picker',
				'instructions' => 'Data de acontecimento do evento',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_56108a66d90c2',
				'label' => 'Hora',
				'name' => 'hora_evento',
				'type' => 'text',
				'instructions' => 'Hora de acontecimento do evento (Opcional)',
				'default_value' => '',
				'placeholder' => 'Ex: 12:00',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_56108afb7deb5',
				'label' => 'Descrição do evento',
				'name' => 'descricao_evento',
				'type' => 'textarea',
				'instructions' => 'Breve descrição sobre o evento',
				'default_value' => '',
				'placeholder' => 'Descrever evento...',
				'maxlength' => 254,
				'rows' => '',
				'formatting' => 'none',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'evento',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_slider-fields',
		'title' => 'Slider Fields',
		'fields' => array (
			array (
				'key' => 'field_56108d55ad119',
				'label' => 'Link do Slider',
				'name' => 'slider_link',
				'type' => 'post_object',
				'instructions' => 'Link para página ou conteúdo interno relacionado ao slider',
				'post_type' => array (
					0 => 'all',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_56108e2ce59bb',
				'label' => 'Descrição do Slider',
				'name' => 'slider_descricao',
				'type' => 'textarea',
				'instructions' => 'Breve descrição que será exibida ao passar o Slider',
				'default_value' => '',
				'placeholder' => 'Descrever slider...',
				'maxlength' => 260,
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slider',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
*/