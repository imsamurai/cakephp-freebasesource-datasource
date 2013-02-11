<?php

/**
 * MyApiSource DataSource
 *
 * Freebase is an open, Creative Commons licensed graph database
 * with more than 23 million entities.
 *
 * @link http://wiki.freebase.com/wiki/API
 *
 */
App::uses('HttpSource', 'HttpSource.Model/Datasource');

class FreebaseSource extends HttpSource {

    /**
     * The description of this data source
     *
     * @var string
     */
    public $description = 'FreebaseSource DataSource';

    public function __construct($config = array(), HttpSocket $Http = null) {
        parent::__construct($config, $Http);
        $this->setDecoder(array('image/png', 'image/jpeg', 'image/gif'), function(HttpSocketResponse $HttpSocketResponse) {
                    return array('image' => (string) $HttpSocketResponse);
                }, true);
    }

}