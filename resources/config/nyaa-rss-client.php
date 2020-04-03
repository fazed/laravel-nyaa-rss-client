<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base RSS URL
    |--------------------------------------------------------------------------
    |
    | This URL is used as the general access point when consuming the
    | RSS feed, additional parameters will be appended to this URL.
    |
    */

    'base_url' => 'https://nyaa.si/',

    /*
    |--------------------------------------------------------------------------
    | Base Queries
    |--------------------------------------------------------------------------
    |
    | This list of queries will be appended to the base URL before
    | sending a request, this should come in handy when needing
    | to send multiple requests with varying search queries.
    |
    | NOTE:
    | The page parameter must always remain at the top entry as
    | it will ensure the request is send to the RSS endpoint.
    |
    */

    'base_queries' => [
        'page' => 'rss',
    ],

];
