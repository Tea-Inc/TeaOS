<?php
include('../include/json/bdd.php');
session_start();

if (isset($_SESSION['id'])) {
    $reqabcd = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $reqabcd->execute(array($_SESSION['id']));
    $userinfo = $reqabcd->fetch();
    if ($userinfo['perm'] == 1) { 
        include('pages/bars.php');
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {
                case 'index':
                    default:
                    include('pages/index.php');
                    break;
                case 'register':
                    include('pages/register.php');
                    break;
            }
        } else {
            include('pages/index.php');
        }
        include('pages/footer.html');
    } else {
        echo 'You\'re not allowed to display this page';
    }
}