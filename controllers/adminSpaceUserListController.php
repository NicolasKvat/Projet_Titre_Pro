<?php
include_once 'models/User.php';
$User = new User();
$UserList = $User->getAllUsers();
require_once 'views/adminSpaceUserList.php';