--TEST--
Test for PHP-680: mongo_read_preference_dtor() will segfault if invoked twice
--SKIPIF--
<?php require_once dirname(__FILE__) ."/skipif.inc"; ?>
--FILE--
<?php require_once dirname(__FILE__) . "/../utils.inc"; ?>
<?php

$m = new_mongo();
var_dump($m->setReadPreference(Mongo::RP_PRIMARY_PREFERRED, array(array('dc' => 'east'))));
var_dump($m->setReadPreference(Mongo::RP_PRIMARY_PREFERRED, array('not_an_array')));

?>
--EXPECTF--
bool(true)

Warning: MongoClient::setReadPreference(): Tagset 1 needs to contain an array of 0 or more tags in %s on line %d
bool(false)
