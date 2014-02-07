<?php

/**
 * Author: imsamurai <im.samuray@gmail.com>
 * Date: 18.11.2012
 * Time: 22:03:38
 * Format: http://book.cakephp.org/2.0/en/development/testing.html
 */
require_once dirname(__FILE__) . DS . 'models.php';

class FreebaseTest extends CakeTestCase {

	/**
	 * Freebase Model
	 *
	 * @var Freebase
	 */
	public $Freebase = null;

	public function setUp() {
		parent::setUp();
		$this->_setConfig();
	}

	protected function _setConfig() {
		Configure::delete('FreebaseSource');
		Configure::load('FreebaseSource.FreebaseSource');
	}

	protected function _loadModel($configName = 'freebaseSource') {
		$dbConfigs = ConnectionManager::enumConnectionObjects();

		if (!empty($dbConfigs['freebaseTest'])) {
			$TestDS = ConnectionManager::getDataSource('freebaseTest');
			$config = $TestDS->config;
		} else {
			$config = array(
				'datasource' => 'FreebaseSource.Http/FreebaseSource',
				'host' => 'www.googleapis.com/freebase/v1',
				'port' => 443,
				'timeout' => 5
			);
		}

		ConnectionManager::create($configName, $config);
		$this->Freebase = new Freebase(false, null, $configName);
	}

	public function testSearch() {
		$this->_loadModel();
		$this->Freebase->setSource('search');
		$params = array(
			'fields' => array('mid', 'score'),
			'conditions' => array(
				'query' => 'apple'
			),
			'order' => array(
				'score' => 'asc',
			),
			'limit' => 3
		);

		$result = $this->Freebase->find('all', $params);

		$this->assertCount($params['limit'], $result);
		$this->assertArrayHasKey('0', $result);
		$this->assertArrayHasKey($this->Freebase->name, $result[0]);
		$this->assertCount(0, array_diff(array_keys($result[0][$this->Freebase->name]), $params['fields']));
	}

	public function testMqlread() {
		$this->_loadModel();
		$this->Freebase->setSource('mqlread');
		$params = array(
			'fields' => array('type', 'artist'),
			'conditions' => array(
				'query' => '{"type": "/music/album", "id": "/en/keep_it_turned_on", "artist" : null}'
			)
		);

		$result = $this->Freebase->find('first', $params);
		//debug($result);
		$this->assertArrayHasKey($this->Freebase->name, $result);
		$this->assertCount(0, array_diff(array_keys($result[$this->Freebase->name]), $params['fields']));

		$params = array(
			'fields' => array('type', 'artist'),
			'conditions' => array(
				'query' => '[{"type":"/music/album","name":null,"artist":{"id":"/en/bob_dylan"},"limit":3}]'
			)
		);

		$result = $this->Freebase->find('first', $params);
		$this->assertArrayHasKey($this->Freebase->name, $result);
		$this->assertCount(0, array_diff(array_keys($result[$this->Freebase->name]), $params['fields']));

		$result = $this->Freebase->find('all', $params);
		$this->assertCount(3, $result);
		$this->assertArrayHasKey('0', $result);
		$this->assertArrayHasKey($this->Freebase->name, $result[0]);
		$this->assertCount(0, array_diff(array_keys($result[0][$this->Freebase->name]), $params['fields']));
	}

	public function testTopic() {
		$this->_loadModel();
		$this->Freebase->setSource('topic');
		$params = array(
			'fields' => array('id', 'property'),
			'conditions' => array(
				'id' => '/m/0d6lp',
				'filter' => '/architecture/architectural_structure_owner'
			)
		);

		$result = $this->Freebase->find('first', $params);
		$this->assertArrayHasKey($this->Freebase->name, $result);
		$this->assertCount(0, array_diff(array_keys($result[$this->Freebase->name]), $params['fields']));

		$params = array(
			'fields' => array('id', 'property'),
			'conditions' => array(
				'id' => '/m/0d6lp',
				'filter' => '/architecture/architectural_structure_owner'
			),
			'limit' => 2
		);

		$result = $this->Freebase->find('all', $params);
		$this->assertArrayHasKey('0', $result);
		$this->assertArrayHasKey($this->Freebase->name, $result[0]);
		$this->assertCount(0, array_diff(array_keys($result[0][$this->Freebase->name]), $params['fields']));
	}

	public function testText() {
		$this->_loadModel();
		$this->Freebase->setSource('text');
		$params = array(
			'fields' => array('text'),
			'conditions' => array(
				'id' => '/en/bob_dylan',
			)
		);

		$result = $this->Freebase->find('first', $params);
		$this->assertArrayHasKey($this->Freebase->name, $result);
		$this->assertCount(0, array_diff(array_keys($result[$this->Freebase->name]), $params['fields']));
	}

	public function testImage() {
		$this->_loadModel();
		$this->Freebase->setSource('image');
		$params = array(
			'fields' => array('image'),
			'conditions' => array(
				'id' => '/en/bob_dylan',
			)
		);

		$result = $this->Freebase->find('first', $params);
		$this->assertArrayHasKey($this->Freebase->name, $result);
		$this->assertCount(0, array_diff(array_keys($result[$this->Freebase->name]), $params['fields']));
	}

}
