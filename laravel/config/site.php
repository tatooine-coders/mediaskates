<?php
/*
 * As per the seed file, the roles should be as follow:
 */
define('ROLE_ADMIN', 1);
define('ROLE_MEMBER', 2);
define('ROLE_PHOTOGRAPH', 3);
// Profile pics
define('DEFAULT_PROFILE_PIC', 'default.jpg');
define('PROFILE_PICS_FOLDER', 'images/profils/');
// Uploaded files
define('ORIGINAL_PICS_FOLDER', 'images/originals/');
define('UPLOADS_PIC_FOLDER', 'images/uploads/');
define('UPLOADS_THUMB_FOLDER', 'images/uploads/thumbs/');
// Disciplines covers
define('DISCIPLINES_PIC_FOLDER', 'images/disciplines/');
define('DISCIPLINES_THUMB_FOLDER', 'images/disciplines/thumbs/');
// Watermarks
define('WATERMARKS_FOLDER', 'images/watermarks/');

return[
  'default_prefs'=>[
    'is_taggable'=>[
      'default'=>false,
      'type' => 'checkbox',
      'label' => 'Autoriser à me tagger sur des photos',
      'photograph_only'=>false,
    ],
    'email_notifications' =>[
      'default'=>false,
      'type' => 'checkbox',
      'label' => 'M\'envoyer des notifications par email',
      'photograph_only'=>false,
    ]
  ]
];
