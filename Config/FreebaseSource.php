<?php

/**
 * A FreebaseSource API Method Map
 *
 * Refer to the HttpSource plugin for how to build a method map
 *
 * @link https://github.com/imsamurai/cakephp-httpsource-datasource
 */
$config['FreebaseSource']['config_version'] = 2;

$CF = HttpSourceConfigFactory::instance();
$Config = $CF->config();

$Config
        ->add(
                $CF->endpoint()
                ->id(1)
                ->methodRead()
                ->table('search')
                ->addCondition($CF->condition()->name('query')->null(false))
                ->addCondition($CF->condition()->name('callback'))
                ->addCondition($CF->condition()->name('domain'))
                ->addCondition($CF->condition()->name('exact'))
                ->addCondition($CF->condition()->name('filter'))
                ->addCondition($CF->condition()->name('format'))
                ->addCondition($CF->condition()->name('encode'))
                ->addCondition($CF->condition()->name('indent'))
                ->addCondition($CF->condition()->name('limit'))
                ->addCondition($CF->condition()->name('mql_output'))
                ->addCondition($CF->condition()->name('prefixed'))
                ->addCondition($CF->condition()->name('start'))
                ->addCondition($CF->condition()->name('type'))
                ->addCondition($CF->condition()->name('lang'))
        )
        ->add(
                $CF->endpoint()
                ->id(2)
                ->methodRead()
                ->table('mqlread')
                ->addCondition($CF->condition()->name('query')->null(false))
                ->addCondition($CF->condition()->name('as_of_time'))
                ->addCondition($CF->condition()->name('callback'))
                ->addCondition($CF->condition()->name('html_escape'))
                ->addCondition($CF->condition()->name('indent'))
                ->addCondition($CF->condition()->name('lang'))
                ->addCondition($CF->condition()->name('cost'))
                ->addCondition($CF->condition()->name('uniqueness_failure'))
        )
        ->add(
                $CF->endpoint()
                ->id(3)
                ->methodRead()
                ->table('topic')
                ->path('topic:id')
                ->addCondition($CF->condition()->name('id')->null(false))
                ->addCondition($CF->condition()->name('lang'))
                ->addCondition($CF->condition()->name('filter'))
                ->addCondition($CF->condition()->name('limit'))
                ->result(
                        $CF->result()->map(function ($result) {
                                    return array($result);
                                })
                )
        )
        ->add(
                $CF->endpoint()
                ->id(4)
                ->methodRead()
                ->table('text')
                ->path('text:id')
                ->addCondition($CF->condition()->name('id')->null(false))
                ->addCondition($CF->condition()->name('format'))
                ->addCondition($CF->condition()->name('lang'))
                ->addCondition($CF->condition()->name('maxlength'))
                ->result(
                        $CF->result()->map(function ($result) {
                                    return array(array('text' => (string) Hash::get($result, 'result')));
                                })
                )
        )
        ->add(
                $CF->endpoint()
                ->id(5)
                ->methodRead()
                ->table('image')
                ->path('image:id')
                ->addCondition($CF->condition()->name('id')->null(false))
                ->addCondition($CF->condition()->name('fallbackid'))
                ->addCondition($CF->condition()->name('maxheight'))
                ->addCondition($CF->condition()->name('maxwidth'))
                ->addCondition($CF->condition()->name('mode'))
                ->addCondition($CF->condition()->name('pad'))
                ->result(
                        $CF->result()->map(function ($result) {
                                    return array(array('image' => Hash::get($result, 'image')));
                                })
                )
        )
        ->readParams(array(
            'limit' => 'limit',
            'start' => 'offset'
        ))
        ->result($CF->result()->map(function($result) {
                            if (!is_numeric(implode('', array_keys($result['result'])))) {
                                return array($result['result']);
                            }
                            return $result['result'];
                        }))

;

$config['FreebaseSource']['config'] = $Config;