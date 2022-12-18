<?php

return [
  // debug
  'debug'  => false,                                      // false in production
  'url' => 'https://api.99percent.gallery/',

  // password reset
  'auth' => [
    'methods' => ['password', 'password-reset']
  ],

  // https://getkirby.com/docs/guide/api/authentication
  'api' => [
    'basicAuth' => true
  ],

  'home' => 'exhibitions',

  // 'panel' => [
  //   'install' => true
  // ],

  'markdown' => [
    'extra' => true
  ],
  'smartypants' => true,

  // Srcsets
  'thumbs' => [                                             // https://getkirby.com/docs/cookbook/performance/responsive-images
    'driver' => 'im',                                       // https://getkirby.com/docs/guide/troubleshooting/thumbnails
    // 'bin' => '/usr/local/bin/convert',                   // https://getkirby.com/docs/guide/troubleshooting/thumbnails
    'srcsets' => [
      'default' => [
        '300w'  => ['width' => 300],
        '600w'  => ['width' => 600],
        '900w'  => ['width' => 900],
        '1200w' => ['width' => 1200],
        '1800w' => ['width' => 1800]
      ],
      'avif' => [
        '300w'  => ['width' => 300, 'format' => 'avif'],
        '600w'  => ['width' => 600, 'format' => 'avif'],
        '900w'  => ['width' => 900, 'format' => 'avif'],
        '1200w' => ['width' => 1200, 'format' => 'avif'],
        '1800w' => ['width' => 1800, 'format' => 'avif']
      ],
      'webp' => [
        '300w'  => ['width' => 300, 'format' => 'webp'],
        '600w'  => ['width' => 600, 'format' => 'webp'],
        '900w'  => ['width' => 900, 'format' => 'webp'],
        '1200w' => ['width' => 1200, 'format' => 'webp'],
        '1800w' => ['width' => 1800, 'format' => 'webp'],
      ],
    ]
  ]

];
