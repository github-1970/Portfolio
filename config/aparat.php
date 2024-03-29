<?php

return [
    'login' => 'https://www.aparat.com/etc/api/login/luser/{user}/lpass/{pass}',
    'upload_​form' => 'https://www.aparat.com/etc/api/upload​form/luser/{user}/ltoken/{token}',
    'video' => 'https://www.aparat.com/etc/api/video/videohash/{uid}',
    'deletevideolink' => 'https://www.aparat.com/etc/api/deletevideolink/videohash/{uid}/luser/{user}/ltoken/{token}',
    'tech_category_id' => 10,
    'username' => env('APARAT_USERNAME', ''),
    'password' => env('APARAT_PASSWORD', ''),
];
