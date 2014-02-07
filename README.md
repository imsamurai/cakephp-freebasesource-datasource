FreebaseSource Plugin
=====================
[![Build Status](https://travis-ci.org/imsamurai/cakephp-freebasesource-datasource.png)](https://travis-ci.org/imsamurai/cakephp-freebasesource-datasource) [![Coverage Status](https://coveralls.io/repos/imsamurai/cakephp-freebasesource-datasource/badge.png?branch=master)](https://coveralls.io/r/imsamurai/cakephp-freebasesource-datasource?branch=master) [![Latest Stable Version](https://poser.pugx.org/imsamurai/freebase-source/v/stable.png)](https://packagist.org/packages/imsamurai/freebase-source) [![Total Downloads](https://poser.pugx.org/imsamurai/freebase-source/downloads.png)](https://packagist.org/packages/imsamurai/freebase-source) [![Latest Unstable Version](https://poser.pugx.org/imsamurai/freebase-source/v/unstable.png)](https://packagist.org/packages/imsamurai/freebase-source) [![License](https://poser.pugx.org/imsamurai/freebase-source/license.png)](https://packagist.org/packages/imsamurai/freebase-source)


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
```
```php
public $freebase = array(
  'datasource' => 'FreebaseSource.Http/FreebaseSource', 
        'host' => 'www.googleapis.com/freebase/v1',
        'port' => 443
);
```
Then make model
```
:: Freebase.php ::
```
```php
public $useDbConfig = 'freebase';
public $useTable = '<desired api url ending, for ex: "search">';

```

### Step 4: Load plugin

```
:: bootstrap.php ::
```
```php
CakePlugin::load('HttpSource', array('bootstrap' => true, 'routes' => false));
CakePlugin::load('FreebaseSource');

```

#Documentation

Please read [HttpSource Plugin README](https://github.com/imsamurai/cakephp-httpsource-datasource/blob/master/README.md)
