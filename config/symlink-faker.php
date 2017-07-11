<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Symlink Faker Settings
     |--------------------------------------------------------------------------
     |
     | Symlink Faker is not enabled by default, it is recommended to use an environment variable to manage it.
     | You can also enable it based on the current environment.
     |
     */

    'enabled' => env('SYMLINK_FAKER_ENABLED', false),
    'environments' => [
        // Add environments here to enable it only on specific environments
        // If no environments are added it will run on all environments unless disabled
    ],

    /*
     |--------------------------------------------------------------------------
     | Public storage Folder
     |--------------------------------------------------------------------------
     |
     | The public storage folder is where the the regular symlink is linked.
     |
     */

    'folder' => env('SYMLINK_FAKER_FOLDER', 'storage')
];