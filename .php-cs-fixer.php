<?php

$config = new PhpCsFixer\Config();

return $config->setRules([
    'no_unused_imports' => true,
	'echo_tag_syntax' => [
		'format' => 'short',
		'shorten_simple_statements_only' => true,
	],
	'no_alternative_syntax' => [
		'fix_non_monolithic_code' => false,
	]
]);
