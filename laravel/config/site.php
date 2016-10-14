<?php
/*
 * As per the seed file, the roles should be as follow:
 */
define('ROLE_ADMIN', 1);
define('ROLE_MEMBER', 2);
define('ROLE_PHOTOGRAPH', 3);
define('DEFAULT_PROFILE_PIC', 'default.jpg');
define('DEFAULT_PROFILE_PICS_FOLDER', 'images/profils/');
define('DEFAULT_ORIGINAL_PIC_FOLDER', 'images/originals/');
define('DEFAULT_SAVED_PIC_FOLDER', 'images/uploads');

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
