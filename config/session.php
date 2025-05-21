<?php
return [
    'type'        => 'file',
    'auto_start'  => true,
    'name'        => 'PHPSESSID',
    'secure'      => false, // 强制关闭 https cookie
    'httponly'    => true,
];
