<?php

return [
  // DEBUG OPTIONS
  'debug'  => true,

  'home' => 'subscribe',

  'panel' =>[
    'install' => true
  ],

  // 'd4l' => [
  //   'static_site_generator' => [
  //     'endpoint' => 'generate-static-site', # set to any string like 'generate-static-site' to use the built-in endpoint (necessary when using the blueprint field)
  //     'output_folder' => '../ninetyninepercent-static', # you can specify an absolute or relative path
  //     'preserve' => [], # preserve individual files / folders in the root level of the output folder (anything starting with "." is always preserved)
  //     'base_url' => '/', # if the static site is not mounted to the root folder of your domain, change accordingly here
  //     'skip_media' => false, # set to true to skip copying media files, e.g. when they are already on a CDN; combinable with 'preserve' => ['media']
  //     'skip_templates' => [], # ignore pages with given templates (home is always rendered)
  //     'custom_routes' => [] # see below for more information on custom routes
  //   ]
  // ],

  // Srcsets
  'thumbs' => [
    'srcsets' => [
      'default' => [
        '320w' => ['width' => 320, 'quality' => 80],
        '614w' => ['width' => 614, 'quality' => 80],
        '820w' => ['width' => 820, 'quality' => 80],
        '960w' => ['width' => 960, 'quality' => 80],
        '1152w' => ['width' => 1152, 'quality' => 80],
        '1280w' => ['width' => 1280, 'quality' => 80],
        '1536w' => ['width' => 1536, 'quality' => 80],
        '2048w' => ['width' => 2048, 'quality' => 80],
        '2304w' => ['width' => 2304, 'quality' => 80],
        // 'breakpoints' => [480, 768, 992],
        // 'interlace' => true,
      ]
    ]
  ],
];
