<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );

add_filter( 'wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2 );
function add_extra_item_to_nav_menu( $items, $args ) {
    
	if (is_user_logged_in ()) {
       
        $itemsToArray = explode("</li>", $items);
       $arrayElements = count($itemsToArray);
        array_splice($itemsToArray, $arrayElements - 2, 0, '<li id="menu-item-412" class="menu-admin-class"><a href=' . admin_url() . '>Admin</a></li>');
          
        $items = implode("</li>", $itemsToArray);
    }

    return $items;
}

/* SHORTCODES */


// Je dis à wordpress que j'ajoute un shortcode 'banniere-titre'
add_shortcode('banniere-titre', 'banniere_titre_func');
// Je génère le html retourné par mon shortcode
function banniere_titre_func($atts)
{
    //Je récupère les attributs mis sur le shortcode
    $atts = shortcode_atts(array(
        'src' => '',
        'titre' => 'Titre'
    ), $atts, 'banniere-titre');

    //Je commence à récupéré le flux d'information
    ob_start();

    if ($atts['src'] != "") {
        ?>

        <div class="banniere-titre" style="background-image: url(<?= $atts['src'] ?>)">
            <h2 class="titre"><?= $atts['titre'] ?></h2>
        </div>

        <?php
    }

    //J'arrête de récupérer le flux d'information et le stock dans la fonction $output
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
} 

function hstngr_register_widget() {
    register_widget( 'hstngr_widget' );
    }
    
    add_action( 'widgets_init', 'hstngr_register_widget' );
    
    class hstngr_widget extends WP_Widget {
    
    function __construct() {
    parent::__construct(
    // widget ID
    'hstngr_widget',
    // widget name
    __('Hostinger Sample Widget', ' hstngr_widget_domain'),
    // widget description
    array( 'description' => __( 'Hostinger Widget Tutorial', 'hstngr_widget_domain' ), )
    );
    }
    public function widget( $args, $instance ) {
        // var_dump(get_posts());
        ?> 
        <form class="form_main" method="post" action="mail.php">
            <h1 class="big_title">COMMANDER</h1>
                <hr class="separateur_title">
            <h3 class="small_title">Votre commande</h3>  
            <?php $allposts = get_posts(); ?> 
            <div id="products">        
            <?php foreach ($allposts as $post ) :?>
                <div>
                    <div class="container">              
                        <?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>
                        <div class="test">
                            <h4><?php echo $post->post_title; ?></h4>  
                        </div> 
                    </div>                
                    <!-- Input de type nombre -->           
                    <input name="<?php echo $post->post_name; ?>" class="quantity" type="number" placeholder="0">
                </div>
            <?php endforeach; ?> 
            </div>           
                <hr class="separateur_form">  
                <div id="form_info">                                 
                    <div class="form_left">
                        <h3 class="small_title">Vos informations</h3>
                        <label for="nom">Nom:</label>
                        <input type="text" id="nom" name="nom" required><br><br>

                        <label for="prenom">Prénom:</label>
                        <input type="text" id="prenom" name="prenom" required><br><br>

                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" required><br><br>
                    </div>
                        <hr class="colonne">
                    <div class="form_right">
                        <h3 class="small_title">Livraisons</h3>
                        <label for="adresse">Adresse de livraison:</label>
                        <input type="text" id="adresse" name="adresse" required><br><br>

                        <label for="code_postal">Code postal:</label>
                        <input type="text" id="code_postal" name="code_postal" required><br><br>

                        <label for="ville">Ville:</label>
                        <input type="text" id="ville" name="ville" required><br><br>   
                    </div>        
                          
                </div>  
                    <input class="bouton_cmd" type="submit" value="Commander">  
        </form>        
        <?php
     
    }
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
    }
    
    }
     