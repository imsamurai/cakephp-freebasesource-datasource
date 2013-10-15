FreebaseSource Plugin [![Build Status](https://travis-ci.org/imsamurai/cakephp-freebasesource-datasource.png?branch=master)](https://travis-ci.org/imsamurai/cakephp-freebasesource-datasource)
=====================


CakePHP FreebaseSource Plugin with DataSource for http://www.freebase.com/

## Installation

### Step 1: Clone or download [HttpSource](https://github.com/imsamurai/cakephp-httpsource-datasource)

### Step 2: Clone or download to `Plugin/FreebaseSource`

  cd my_cake_app/app git://github.com/imsamurai/cakephp-freebasesource-datasource.git Plugin/FreebaseSource

or if you use git add as submodule:

	cd my_cake_app
	git submodule add "git://github.com/imsamurai/cakephp-freebasesource-datasource.git" "app/Plugin/FreebaseSource"

then update submodules:

	git submodule init
	git submodule update
  
### Step 3: Add your configuration to `database.php` and set it to the model

```
:: database.php ::
public $freebase = array(
  'datasource' => 'FreebaseSource.Http/FreebaseSource', 
        'host' => 'www.googleapis.com/freebase/v1',
        'port' => 443
);

Then make model

:: Freebase.php ::
public $useDbConfig = 'freebase';
public $useTable = '<desired api url ending, for ex: "search">';

```

### Step 4: Load plugin

```
:: bootstrap.php ::
CakePlugin::load('HttpSource', array('bootstrap' => true, 'routes' => false));
CakePlugin::load('FreebaseSource');

```

#Documentation

Please read [HttpSource Plugin README](https://github.com/imsamurai/cakephp-httpsource-datasource/blob/master/README.md)
