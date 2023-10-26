<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/daviddprtma/sistemmonitoringgudang.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('production')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/');

// Hooks

after('deploy:failed', 'deploy:unlock');
