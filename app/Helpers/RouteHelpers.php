<?php

use Illuminate\Support\Facades\Request;


/**
 * To determine the route active on url match
 *
 * @param string $uri
 * @return string
 *
 */
function activeMenu($uri = ''): string
{
    $active = '';

    if (Request::is(Request::segment(1) . '/' . $uri . '/*')) {
        $active = 'active';
    } elseif (Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
        $active = 'active';
    }
    return $active;
}
