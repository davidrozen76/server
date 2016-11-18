<?php

require_once(dirname(__FILE__) . "/inc/load.php");

if (!$LOGIN->isLoggedin()) {
  header("Location: index.php?err=4" . time() . "&fw=" . urlencode($_SERVER['PHP_SELF']));
  die();
}
else if ($LOGIN->getLevel() < 50) {
  $TEMPLATE = new Template("restricted");
  die($TEMPLATE->render($OBJECTS));
}

$TEMPLATE = new Template("users/index");
$MENU->setActive("users_list");
$message = "";

//catch actions here...
if (isset($_POST['action'])) {
  $usersHandler = new UsersHandler();
  $usersHandler->handle($_POST['action']);
}

if(isset($_GET['new'])){
  //TODO: create new user
}
else if (isset($_GET['id'])) {
  $user = $FACTORIES::getUserFactory()->get($_GET['id']);
  if ($user == null) {
    $message = "<div class='alert alert-danger'>Invalid user!</div>";
    $TEMPLATE = new Template("error");
  }
  else {
    $OBJECTS['user'] = $user;
    $OBJECTS['groups'] = $FACTORIES::getRightGroupFactory()->filter(array());
    $TEMPLATE = new Template("users/detail");
  }
}
else {
  $users = array();
  $res = $FACTORIES::getUserFactory()->filter(array());
  foreach ($res as $entry) {
    $set = new DataSet();
    $set->addValue('user', $entry);
    $set->addValue('group', $FACTORIES::getRightGroupFactory()->get($entry->getRightGroupId()));
    $users[] = $set;
  }
  
  $OBJECTS['allUsers'] = $users;
  $OBJECTS['numUsers'] = sizeof($users);
}

echo $TEMPLATE->render($OBJECTS);



