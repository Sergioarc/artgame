<?php

return [

	// The default gateway to use
	'default' => 'paypal',

	// Add in each gateway here
	'gateways' => [
		'paypal' => [
			'driver'  => 'PayPal_Express',
			'options' => [
				'username' => 'javier.lavida-facilitator_api1.gmail.com',
				'password' => '387C3XGE3HHDJT9L',
				'signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31ACetFGKY-BrMYt5okan2J4ldBFJ9',
				'testMode'  => true,
				'solutionType'   => '',
				'landingPage'    => '',
			]
		]
	]

];