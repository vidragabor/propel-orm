<?php

use Propel\Runtime\ActiveQuery\Criteria;
use PropelSample\User;
use PropelSample\UserQuery;
use source\util\Action;

require_once "../vendor/autoload.php";
require_once "config.php";
require_once "util/Action.php";
require_once "util/Input.php";

$action = new Action($_REQUEST["param"]);

if ($action->getOperation() == Action::LIST) {
    displayUserList($smarty);
} else if ($action->getOperation() == Action::CREATE) {
    createUser();
} else if ($action->getOperation() == Action::EDIT) {

} else if ($action->getOperation() == Action::DELETE) {

} else if ($action->getOperation() == Action::SEARCH) {

} else {
    header("location: 404");
}

function displayUserList(Smarty $smarty)
{
    $allUsers = UserQuery::create()->find();
    $smarty->assign("allUsers", $allUsers);

    $allAnnaUsers = UserQuery::create()->filterByFirstName("Anna")->find();
    $smarty->assign("allAnnaUsers", $allAnnaUsers);

    $vidragaborEmailUsers = UserQuery::create()->filterByEmail("%@vidragabor.hu%", Criteria::LIKE)->find();
    $smarty->assign("vidragaborEmailUsers", $vidragaborEmailUsers);

    $minMaxIdUsers = UserQuery::create()->filterById(array('min' => 2, 'max' => 4))->find();
    $smarty->assign("minMaxIdUsers", $minMaxIdUsers);

    $allUsersOrderByLoginCounter = UserQuery::create()->orderByLoginCounter()->find();
    $smarty->assign("allUsersOrderByLoginCounter", $allUsersOrderByLoginCounter);

    $smarty->display("user.tpl");
}

function createUser()
{
    try {
        source\util\Input::check(['first_name', 'last_name', 'email', 'password'], $_POST);

        $password = source\util\Input::str($_POST['password']);
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $user = new User();
        $user->setFirstName(source\util\Input::str($_POST['first_name']));
        $user->setLastName(source\util\Input::str($_POST['last_name']));
        $user->setEmail(source\util\Input::email($_POST['email']));
        $user->setPassword($hash);
        $user->setBlocked(false);
        $user->save();

        header("location: list");
    } catch (Exception $e) {
        error_log($e);
    }


}
