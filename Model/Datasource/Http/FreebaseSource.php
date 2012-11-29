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

    /**
     * After request callback
     * Filter data by fields, emulate limit, offset, order etc.
     * Override this method for your DataSource.
     *
     * @param Model $model
     * @param array $result
     * @param string $request_method Create, update, read or delete
     * @return array
     */
    public function afterRequest(Model $model, array $result, $request_method) {
        if ($request_method === HttpSource::METHOD_READ) {
            $data = Hash::get($result, 'result');
            $this->numRows = count($data);

            return parent::afterRequest($model, $data, $request_method);
        }

        return parent::afterRequest($model, $result, $request_method);
    }
}