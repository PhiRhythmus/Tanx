<?php 
add_filter( 'the_content', 'remove_first_gallery' );
    function remove_first_gallery( $content ) {
        if(get_post_format($post->ID) == "gallery") {
            $content = preg_replace('/\[gallery.*?\]/','',$content);
        }
        return $content;
    }

    function dropcap_shortcode( $atts, $content ){
        $a = shortcode_atts( array(
            'color' => '#111'
        ), $atts );
        return '<span class="dropcap" style="color:' . $a['color'] .'">' . $content . '</span>';
    }
    add_shortcode( 'dropcap', 'dropcap_shortcode' );

    function quote_shortcode( $atts, $content ){
        $a = shortcode_atts( array(
            'author' => ''
        ), $atts );
        return '<div class="content-quote"><h1 class="quote-content">' . $content . '</h1><p class="quote-author">' . $a['author'] . '</p></div>';
    }
    add_shortcode( 'quote', 'quote_shortcode' );

    function spacer_shortcode( $atts, $content ){
        return '<div class="spacer">' . do_shortcode($content) . '</div>';
    }
    add_shortcode( 'spacer', 'spacer_shortcode' );

    function smallspacer_shortcode( $atts, $content ){
        return '<div class="smallspacer">' . do_shortcode($content) . '</div>';
    }
    add_shortcode( 'smallspacer', 'smallspacer_shortcode' );

    function row_shortcode( $atts, $content ){
        return '<div class="row">' . do_shortcode($content) . '</div>';
    }
    add_shortcode( 'row', 'row_shortcode' );

    function column_shortcode( $atts, $content ){
        $a = shortcode_atts( array(
            'width' => '12'
        ), $atts );
        return '<div class="col-sm-' . $a['width'] . '">' .do_shortcode($content) . '</div>';
    }
    add_shortcode( 'column', 'column_shortcode' );

    function list_title_shortcode( $atts, $content ){
        return '<span class="list-title">' . do_shortcode($content) . '</span>';
    }
    add_shortcode( 'list_title', 'list_title_shortcode' );

    function fullsizemap_shortcode( $atts, $content ){
        return '<div class="map_holder">' . do_shortcode($content) . '</div><div class="map_spacer"></div>';
    }
    add_shortcode( 'fullsizemap', 'fullsizemap_shortcode' ); 
?>