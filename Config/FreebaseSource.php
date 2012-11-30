<?php

/**
 * A FreebaseSource API Method Map
 *
 * Refer to the HttpSource plugin for how to build a method map
 *
 * @link https://github.com/imsamurai/cakephp-httpsource-datasource
 */
$config['FreebaseSource']['read'] = array(
    //See http://wiki.freebase.com/wiki/ApiSearch
    'search' => array(
        'search' => array(
            'required' => array(
                'query'
            ),
            'optional' => array(
                'callback',
                'domain',
                'exact',
                'filter',
                'format',
                'encode',
                'indent',
                'limit',
                'mql_output',
                'prefixed',
                'start',
                'type',
                'lang',
            )
        )
    ),
    'mqlread' => array(
        'mqlread' => array(
            'required' => array(
                'query'
            ),
            'optional' => array(
                'as_of_time',
                'callback',
                'cursor',
                'html_escape',
                'indent',
                'lang',
                'cost',
                'uniqueness_failure'
            )
        )
    ),
    'topic' => array(
        'topic:id' => array(
            'required' => array(
                'id'
            ),
            'optional' => array(
                'lang',
                'filter',
                'limit'
            ),
            'map_results' => function ($result) { return array($result); }
        )
    ),
    'text' => array(
        'text:id' => array(
            'required' => array(
                'id'
            ),
            'optional' => array(
                'format',
                'lang',
                'maxlength'
            ),
            'map_results' => function ($result) { return array(array('text' => (string)Hash::get($result, 'result'))); }
        )
    ),
    'image' => array(
        'image:id' => array(
            'required' => array(
                'id'
            ),
            'optional' => array(
                'fallbackid',
                'maxheight',
                'maxwidth',
                'mode',
                'pad'
            ),
            'map_results' => function ($result) { return array(array('image' => Hash::get($result, 'image'))); }
        )
    )
);
$config['FreebaseSource']['create'] = array(
);
$config['FreebaseSource']['update'] = array(
);
$config['FreebaseSource']['delete'] = array(
);

$config['FreebaseSource']['map_read_params'] = array(
    'limit' => 'limit',
    'start' => 'offset'
);

$config['FreebaseSource']['map_results'] = function($result) {
    if (!is_numeric(implode('', array_keys($result['result'])))) {
        return array($result['result']);
    }
    return $result['result'];
};