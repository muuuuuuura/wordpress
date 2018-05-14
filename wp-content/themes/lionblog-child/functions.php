<?php
//////////////////////////////////////////////////
//親テーマのCSSを読み込む
//////////////////////////////////////////////////
function fit_head_child() {
	if ( get_option('fit_seo_cssLoad') == "value2" && get_option('fit_seo_cssLoad-main')) {
		echo '<link class="css-async" rel href="'.get_template_directory_uri().'/style.css">'."\n";
	}else{
		echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/style.css">'."\n";
	}
	if (is_singular()){
		if ( get_option('fit_seo_cssLoad') == "value2" && get_option('fit_seo_cssLoad-content')) {
			echo '<link class="css-async" rel href="'.get_template_directory_uri().'/css/content.css">'."\n";
		}else{
			echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/content.css">'."\n";
		}
	}
}
add_action('wp_head', 'fit_head_child');



//////////////////////////////////////////////////
//下記ユーザーカスタマイズエリア
//////////////////////////////////////////////////

// サイトURL/?author=1でのアクセスを404ページにリダイレクト。 2018/5/13
add_filter( 'author_rewrite_rules', '__return_empty_array' );
function disable_author_archive() {
	if( $_GET['author'] || preg_match('#/author/.+#', $_SERVER['REQUEST_URI']) ){
		wp_redirect( home_url( '/404.php' ) );
		exit;
	}
}
add_action('init', 'disable_author_archive');
?>