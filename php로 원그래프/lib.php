<?php 

spl_autoload_register(function($f) {
	require_once("{$f}.php");
});

function view($page, $data=[]){
	extract($data);
	require_once("../src/views/{$page}.php");
}

function addDummy($name,$value){
	$dummy = (object)[];
	$dummy->name = $name;
	$dummy->value = $value;
	return $dummy;
}

