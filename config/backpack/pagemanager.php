<?php

return [
    // Change this class if you wish to extend PageCrudController
    //'admin_controller_class' => 'Backpack\PageManager\app\Http\Controllers\Admin\PageCrudController',
    'admin_controller_class' => 'App\Http\Controllers\Admin\ExtendedPageCrudController',

    // Change this class if you wish to extend the Page model
    //'page_model_class'       => 'Backpack\PageManager\app\Models\Page',
    'page_model_class'       => 'App\Models\ExtendedPage',
];
