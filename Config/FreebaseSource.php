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
            )
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
            )
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
            )
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