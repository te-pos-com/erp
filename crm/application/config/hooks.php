<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['post_controller_constructor'][] = array(
    'class' => 'Myapp',
    'function' => 'appset',
    'filename' => 'Myapp.php',
    'filepath' => 'hooks'
);
