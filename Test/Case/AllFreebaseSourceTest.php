<?php

class AllFreebaseSourceTest extends PHPUnit_Framework_TestSuite {

	/**
	 * Suite define the tests for this suite
	 *
	 * @return void
	 */
	public static function suite() {
		$suite = new CakeTestSuite('All Freebase Tests');

		$path = App::pluginPath('FreebaseSource') . 'Test' . DS . 'Case' . DS;
		$suite->addTestDirectoryRecursive($path);
		return $suite;
	}

}
