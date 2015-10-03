<?php 


function destaque_cpt() {
    $slider = new Odin_Post_Type(
        'Slider', // Nome (Singular) do Post Type.
        'slider' // Slug do Post Type.
    );

    $slider->set_labels(
        array(
            'menu_name' => __( 'Imagens em destaque', 'odin' )
        )
    );

    $slider->set_arguments(
        array(
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-images-alt'
        )
    );
}

add_action( 'init', 'destaque_cpt', 1 );


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
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'menu_position' => 6,
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