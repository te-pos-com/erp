<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['pre_controller'] = array(
    'class' => 'Myapp',
    'function' => 'appset',
    'filename' => 'Myapp.php',
    'filepath' => 'hooks'
);

