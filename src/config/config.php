<?php

session_start();

$settings = require __DIR__ . '/settings.php';

// Charset
mb_internal_encoding($settings['settings']['app']['charset']);
mb_http_output($settings['settings']['app']['charset']);

// Timezone
date_default_timezone_set($settings['settings']['app']['timezone']);
