<?php
add_action( 'after_setup_theme', '_setup' );
function _setup() {
	register_nav_menu( 'menu-id', __( 'Primary Menu', 'white-paper'  ) );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(223, 167, TRUE);
	global $content_width;
	if ( ! isset( $content_width ) )
	$content_width = 960;
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	add_action( 'wp_enqueue_scripts', '_frontend' );	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );
	add_image_size( 'white-paper-logo-size', 960, 1000, true );
    add_theme_support( 'site-logo', array( 'size' => 'white-paper-logo-size' ) );    load_theme_textdomain( 'white-paper', get_template_directory() . '/languages' );}
function _styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', '_styles' );
function _widgets() 
{
	register_sidebar( 
		array(
    'name' => __( 'Sidebar Header', 'white-paper' ),        'id'   => 'sidebar-head1',
	) 
	);
	register_sidebar( 
		array(
    'name' => __( 'Sidebar Footer 1', 'white-paper' ),    'id'   => 'sidebar-footer1',
	) 
	);
	register_sidebar( array(
    'name' => __( 'Sidebar Footer 2', 'white-paper' ),    'id'   => 'sidebar-footer2',
	) 
	);
	register_sidebar( array(
    'name' => __( 'Sidebar Footer 3', 'white-paper' ),    'id'   => 'sidebar-footer3',	
    )     
    );
	register_sidebar( array(
    'name' => __( 'Sidebar Footer 4', 'white-paper' ),    'id'   => 'sidebar-footer4',	    
    ) 
    );
	register_sidebar( array(
    'name' => __( 'Sidebar Footer 5', 'white-paper' ),    'id'   => 'sidebar-footer5',	
    ) 
    );
}
add_action( 'widgets_init', '_widgets' );
add_filter('loop_shop_per_page', create_function('$cols', 'return 12;'));
add_filter('loop_shop_columns', '_loop_columns');
if (!function_exists('_loop_columns')) {
	function _loop_columns() {
		return 3;
	}
}
function woocommerce_output_related_products() {
    $args = array('posts_per_page' => 3, 'columns' => 3,'orderby' => 'rand' );
    woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );}
function _frontend() {
 	wp_enqueue_style( '-style', get_stylesheet_uri() );
}
function _wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	if ( $paged >= 3 || $page >= 3 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'white-paper' ), max( $paged, $page ) );
	return $title;
}
add_filter( 'wp_title', '_wp_title', 10, 3 );

function _comment() {	if ( is_singular() ) wp_enqueue_script( "comment-reply" );}    add_action( 'wp_enqueue_scripts', '_comment' );
add_action( 'wp_enqueue_scripts', '_tag_cloud' );
function _tag_cloud( $tags ){
    return preg_replace(
        "~ style='font-size: (\d+)pt;'~",
        ' class="tag-cloud-size-\10"',
        $tags
    );
}
add_filter('add_to_cart_fragments', '_fragment');
function _fragment( $fragments ) 
{
    global $woocommerce;
    ob_start(); ?>
    <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'white-paper'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, ''), $woocommerce->cart->cart_contents_count);?> <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}
function _menu() {
	add_theme_page('white Paper Setup', 'Free vs PRO', 'edit_theme_options', 'white-paper', '_menu_page');
}
add_action('admin_menu', '_menu');
function _menu_page() {
echo '
<br>
<center><h1 style="font-size:79px;">' . __( 'Theme white Paper free', 'white-paper' ) . '</h1></ceter>
<br><br><br>
	<center><h1>' . __( '6 Sidebar for theme White Paper', 'white-paper' ) . '</h1></ceter>
<br>
<center><img src="' . get_template_directory_uri() . '/images/white-paper-sidebar.jpg"></center>
<br><br><br>
<h1><center>' . __( 'Site ', 'white-paper' ) . '<a href="http://justpx.com/white-paper-free-documentation/">' . __( 'White Paper free ', 'white-paper' ) . '</a>' . __( ' -  documentation (Logo, favicon, font, ...).', 'white-paper' ) . '</center></h1><br><br>
<br><br>
<center><img src="' . get_template_directory_uri() . '/images/pro-vs-free.png"></center><br><br>
<center><b>' . __( 'Localization Ready:', 'white-paper' ) . '</b> ' . __( 'Chinese, Czech, Dutch, English, French, German, Greek, Hungarian, Indonesian, Italian, Japanese, Polish, Romana, Russian, Spanish, ... and other.  Add ', 'white-paper' ) . '<a href="http://justpx.com/your-language">' . __( 'Your language', 'white-paper' ) . '</a>. </center><br/><br/>
<br><br>
<center><h1 style="font-size:79px;">' . __( 'Theme white Paper PRO', 'white-paper' ) . '</h1></ceter><br><br>
<h1><center>' . __( ' Page ', 'white-paper' ) . ' <a href="http://justpx.com/product/white-paper-pro" target="_blank">' . __( ' White Paper PRO ', 'white-paper' ) . '</a>' . __( ' - theme, demo, documentation.', 'white-paper' ) . '</center></h1><br><br>
<h1><center>' . __( 'White Paper PRO width: 1280px - ', 'white-paper' ) . '<a href="http://white-paper-pro.justpx.com/" target="_blank">' . __( ' Demo', 'white-paper' ) . '</a></center></h1><br>
<h1><center>' . __( 'White Paper Bonus width: 960px - ', 'white-paper' ) . '<a href="http://white-paper-bonus.justpx.com/" target="_blank">' . __( ' Demo', 'white-paper' ) . '</a></center></h1><br>
<center><h1><font color="#dd3f56">10%</font>' . __( ' Discount - Code: ', 'white-paper' ) . '<font color="#dd3f56">justpx10</font></h1></ceter>
<br/><br/><br/><br/>
<center><h1>' . __( 'White Paper PRO 32 Sidebar', 'white-paper' ) . '</h1></ceter>
<center><img src="' . get_template_directory_uri() . '/images/white-paper-pro-sidebar.jpg"></center>
<br/><br/>
<center><img src="' . get_template_directory_uri() . '/images/admin1.jpg"></center>
<br/><br/>
<center><img src="' . get_template_directory_uri() . '/images/admin2.jpg"></center>
<br/><br/>
<center><img src="' . get_template_directory_uri() . '/images/admin3.jpg"></center>
<br/><br/>
<center><img src="' . get_template_directory_uri() . '/images/admin4.jpg"></center>
<br/><br/>
<br>
<h1><center>' . __( 'Buy theme', 'white-paper' ) . '  <a href="http://justpx.com/product/white-paper-pro/">' . __( 'White Paper PRO', 'white-paper' ) . '</a></center></h1><br><br>
';
}


function my_scripts_method() {
	wp_enqueue_script(
		'scripts',
		get_stylesheet_directory_uri() . '/scripts.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
?>