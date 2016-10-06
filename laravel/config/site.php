<?php
/*
 * As per the seed file, the roles should be as follow:
 */
define('ROLE_ADMIN', 1);
define('ROLE_MEMBER', 2);
define('ROLE_PHOTOGRAPH', 3);
define('DEFAULT_PROFILE_PIC', 'default.jpg');

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
