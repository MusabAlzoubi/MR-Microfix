<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/MusabAlzoubi/MR-Microfix.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('188.166.255.95')
    // ->set('remote_user', 'deployer')
    ->set('deploy_path', '/var/www/html/MR-Microfix');
// Hooks

after('deploy:failed', 'deploy:unlock');
