<?php


/* Compability Old PHP Versions */
if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

if (! function_exists('str_ends_with')) {
    function str_ends_with(string $haystack, string $needle): bool
    {
        $needle_len = strlen($needle);
        return ($needle_len === 0 || 0 === substr_compare($haystack, $needle, - $needle_len));
    }
}

if ( ! function_exists( 'get_the_crumbs' ) ) {

    /**
     * Retrieve the crumbs.
     *
     * @since 1.0.0
     *
     * @return Array Crumbs array.
     */
    function get_the_crumbs(): array
    {

        $flour = $_SERVER['REQUEST_URI'];

        if ( str_contains( $flour, '?' ) ) $flour = substr( $flour, 0, strpos( $flour, '?' ) );
        if ( str_contains( $flour, 'page' ) ) $flour = substr( $flour, 0, strpos( $flour, 'page' ) );

        $flour = ( str_ends_with( $flour, '/' ) ? explode( '/', substr( $flour, 1, -1 ) ) : explode( '/', substr( $flour, 1 ) ) );

        $crumbs = array();

        foreach ( $flour as $crumb ) {

            $slug = esc_html( $crumb );

            $url = esc_url( $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . substr( implode( '/', $flour ), 0, strpos( implode( '/', $flour ), $crumb ) ) . $crumb. '/' );

            $crumbs[] = array(
                $slug => $url,
            );

        };

        $crumbs = array_merge(...$crumbs);

        $banned_slugs = array();

        $post_types = get_post_types(
            array(
                'public' => true,
            ),
            'objects'
        );

        foreach ( $post_types as $post_type ) {

            $banned_slugs[] = $post_type->name;

            if ( isset( $post_type->rewrite['slug'] ) ) array_push( $banned_slugs, $post_type->rewrite['slug'] );

        };

        $taxonomies = get_taxonomies(
            array(
                'public' => true,
            ),
            'objects'
        );

        foreach ( $taxonomies as $taxonomy ) {

            array_push( $banned_slugs, $taxonomy->name );

            if ( isset( $taxonomy->rewrite['slug'] ) ) array_push( $banned_slugs, $taxonomy->rewrite['slug'] );

        };

        $banned_crumbs = array();

        foreach ( $banned_slugs as $banned_slug ) {

            $slug = esc_html( $banned_slug );

            $url = esc_url( $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . substr( implode( '/', $flour ), 0, strpos( implode( '/', $flour ), $banned_slug ) ) . $banned_slug. '/' );

            $banned_crumbs[] = array(
                $slug => $url,
            );

        };

        $banned_crumbs = call_user_func_array( 'array_merge', $banned_crumbs );

        return array_diff_key( $crumbs, $banned_crumbs );
    }

}

if ( ! function_exists( 'the_bread' ) ) {

    /**
     * Display the bread, a formatted crumbs list.
     *
     * @param Array $ingredients[separator] The crumb's separator. Default to ">".
     * @param Array $ingredients[offset] Crumbs offset. Accept positive/negative Integer. Default to "0". Refer to array_slice, https://www.php.net/manual/en/function.array-slice.php.
     * @param Array $ingredients[length] Crumbs length. Accept positive/negative Integer. Default to "null". Refer to array_slice, https://www.php.net/manual/en/function.array-slice.php.
     *
     * @return Array The formatted crumbs list.
     *@since 1.0.0
     *
     */
    function the_bread(
        array $ingredients = array(
            'separator' => '>',
            'offset' => 0,
            'length' => null,
        )
    ) {

        $offset = ( empty( $ingredients['offset'] ) ? 0 : $ingredients['offset'] );

        $length = ( empty( $ingredients['length'] ) ? null : $ingredients['length'] );

        $crumbs = array_slice( get_the_crumbs(), $offset, $length );

        if ( ! empty( $crumbs ) ) {
            $site = get_site_url();
            echo '<ol class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">';
            echo '<li class="crumb" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="' . $site . '">
                        <span itemprop="name">Home'.'</span>
                    </a>
                    <meta itemprop="position" content="' . 1 . '">
                </li>';

            echo "<span class='separator'>".$ingredients['separator']."</span>";
            $i = 0;


            foreach ( $crumbs as $slug => $url ) {

                $i++;

                echo '<li class="crumb last:font-bold" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="' . $url . '">
                        <span itemprop="name">' . ( url_to_postid( $url ) ? get_the_title( url_to_postid( $url ) ) : ( get_page_by_path( $slug ) ? get_the_title( get_page_by_path( $slug ) ) : ucfirst( str_replace( '-', ' ', $slug ) ) ) ) . '</span>
                    </a>
                    <meta itemprop="position" content="' . $i . '">
                </li>';

                if ( $i !== count( $crumbs ) && ! empty( $ingredients['separator'] ) ) {
                    echo "<span class='separator'>".$ingredients['separator']."</span>";
                }

            }

            echo '</ol>';

        };

    };

};
