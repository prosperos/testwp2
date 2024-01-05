<?php return array(
    'root' => array(
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => NULL,
        'name' => 'vendor/our-team-addon',
        'dev' => true,
    ),
    'versions' => array(
        'composer/installers' => array(
            'pretty_version' => 'v1.12.0',
            'version' => '1.12.0.0',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/./installers',
            'aliases' => array(),
            'reference' => 'd20a64ed3c94748397ff5973488761b22f6d3f19',
            'dev_requirement' => false,
        ),
        'johnpbloch/wordpress' => array(
            'pretty_version' => '6.4.2',
            'version' => '6.4.2.0',
            'type' => 'package',
            'install_path' => __DIR__ . '/../johnpbloch/wordpress',
            'aliases' => array(),
            'reference' => 'cea8e15d973a3dc55ea336cb0ceb7aeee4ebd286',
            'dev_requirement' => false,
        ),
        'johnpbloch/wordpress-core' => array(
            'pretty_version' => '6.4.2',
            'version' => '6.4.2.0',
            'type' => 'wordpress-core',
            'install_path' => __DIR__ . '/../../wordpress',
            'aliases' => array(),
            'reference' => '00ea636cf89fd17daacbc3862f368a2782267825',
            'dev_requirement' => false,
        ),
        'johnpbloch/wordpress-core-installer' => array(
            'pretty_version' => '2.0.0',
            'version' => '2.0.0.0',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/../johnpbloch/wordpress-core-installer',
            'aliases' => array(),
            'reference' => '237faae9a60a4a2e1d45dce1a5836ffa616de63e',
            'dev_requirement' => false,
        ),
        'roundcube/plugin-installer' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'shama/baton' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'vendor/our-team-addon' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => NULL,
            'dev_requirement' => false,
        ),
        'wordpress/core-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '6.4.2',
            ),
        ),
    ),
);
