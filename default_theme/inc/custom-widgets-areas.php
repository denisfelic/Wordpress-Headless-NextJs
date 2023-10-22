<?php

// How to customize widgets areas
$areas = [
    ['id' => 'example_area_1', 'name' => 'Example Area 1 ', 'description' => 'Example of Widget Area Description'],
];

/* How to implement this ?
 * Use this code in area do you want to display this widget area: <?php dynamic_sidebar( 'example_area_1' ); ?>
 */

$class = new GenerateWidgetArea($areas);
$class->generateWidgetArea();

 class GenerateWidgetArea{

    protected $areas;

    public function __construct($areas)
    {
        $this->areas = $areas;
    }

    public function register_custom_area(){

        foreach($this->areas as $area){
            register_sidebar(
                array(
                'id' => $area['id'],
                'name' => esc_html__( $area['name'], 'theme-domain' ),
                'description' => esc_html__( $area['description'], 'theme-domain' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
                'after_title' => '</h3></div>'
                )
            );
        }
       
    }

     public function generateWidgetArea(){
        add_action( 'widgets_init', array(&$this, 'register_custom_area'));
    }

 }   
?>