<?php


$layout='viewVisitor';

if(isset($_SESSION['user']))
{
    $layout ='viewConnected';

}

if(isset($_SESSION['userAdmin']))
{
    $layout='viewAdmin';
}
$error ='';
require ("{$ROOT}{$DS}model{$DS}modelUser.php");


switch ($action){

    case 'signUp':
        $pagetitle = 'Sign In';
        $view = 'SignIn';
        break;


    case 'signed':

        if (isset($_POST['nom'])) $_SESSION['nom']= $_POST['nom'];
        if (isset($_POST['prenom'])) $_SESSION['prenom']= $_POST['prenom'];
        if (isset($_POST['email'])) $_SESSION['mail']= $_POST['email'];
        if (isset($_POST['numTel'])) $_SESSION['tel']= $_POST['numTel'];

        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['numTel'])
            && isset($_POST['pwd']) && isset($_POST['pwdConf'])) {

            $mail = htmlspecialchars($_POST['email']);

            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                $numTel = htmlspecialchars($_POST['numTel']);
                if (preg_match('/[0-9]+$/', $numTel)){

                        $name = htmlspecialchars($_POST['nom']);
                        $fname = htmlspecialchars($_POST['prenom']);
                        $pwd = htmlspecialchars($_POST['pwd']);
                        $pwd2 = htmlspecialchars($_POST['pwdConf']);
                        $destinationPicProf = 'uploads/profilePicture.png';
                        if ($pwd != $pwd2) {
                            $view = "Error";
                            $error = 'password different';
                        } else {
                            if (!modelUser::existUser('mail', $mail)) {
                                $pwd = sha1($pwd);
                                if (isset($_FILES['picProf'])) {
                                    $picProf = $_FILES['picProf'];
                                    $target_dir = "uploads/";
                                    $allowedExts = array("gif", "jpeg", "jpg", "png");
                                    $temp = explode(".", $_FILES["picProf"]["name"]);
                                    $extension = end($temp);

                                    if ((($_FILES["picProf"]["type"] == "image/gif")
                                            || ($_FILES["picProf"]["type"] == "image/jpeg")
                                            || ($_FILES["picProf"]["type"] == "image/jpg")
                                            || ($_FILES["picProf"]["type"] == "image/pjpeg")
                                            || ($_FILES["picProf"]["type"] == "image/x-png")
                                            || ($_FILES["picProf"]["type"] == "image/png"))
                                        && in_array($extension, $allowedExts)
                                    ) {

                                        $newfilename = round(microtime(true)) . '.' . end($temp);
                                        $destinationPicProf = $target_dir . $newfilename;
                                        move_uploaded_file($_FILES["picProf"]["tmp_name"],$destinationPicProf);
                                    }

                                }

                                $champs = array('nom', 'prenom', 'mail', 'numTel', 'password', 'imgUrl');
                                $values = array($name, $fname, $mail, $numTel, $pwd, ($destinationPicProf == null) ? '' : $destinationPicProf);
                                modelUser::insertUser($champs, $values);

                                $user = modelUser::selectUser('mail', $mail);
                                $_SESSION['user'] = $user;

                                unset($_SESSION['nom']);unset($_SESSION['prenom']);unset($_SESSION['bday']);unset($_SESSION['homme']);
                                unset($_SESSION['femme']);unset($_SESSION['adr']);unset($_SESSION['mail']);unset($_SESSION['tel']);
                                unset($_SESSION['zip']);unset($_SESSION['qst']);unset($_SESSION['answer']);
                                //$_SESSION['user'] = $user;
                                $layout = 'viewConnected';
                                $view = 'remerciment';
                                $error = 'Merci d\'avoir choisi notre platforme pour planifier votre voyage';

                            } else {
                                $view = "Error";
                                $error = 'Compte Existant';
                            }

                        }



                }else{
                    header('Location:  index.php?controller=user&action=signUp&error=3');

                }

            } else{
                header('Location:  index.php?controller=user&action=signUp&error=2');

            }
        }else {
            $view = "NotFound";
        }

        break;

    case 'logIn':
        $pagetitle='Login';
        $view ='Login';
        break;

    case 'logged':
        if (isset($_POST['Email'])) $_SESSION['mail']= $_POST['Email'];
        $pagetitle ='Login';

        if(!isset($_POST['Email'])|!isset($_POST['Password'])){ // s'il n'est pas encore connecté
            $view = 'Login';
            $layout = 'viewVisitor';
        }else{
            $Email =htmlspecialchars($_POST['Email']);
            $pwd = htmlspecialchars($_POST['Password']);
            if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                $usr = ModelUser::selectUser('mail', $Email);
                if ($usr != null) {
                    if ($usr['password'] == sha1($pwd)) {
                        if ($usr['type_user'] == 0) {
                            $_SESSION['user'] = $usr;
                            $layout = 'viewConnected';
                            $view = 'Profile';
                            $pagetitle = "bonjour " . ucfirst($usr['nom']);
                        } else {
                            $_SESSION['userAdmin'] = $usr;
                            $layout = 'viewAdmin';
                            $view = 'Profile';
                            $pagetitle = "bonjour " . ucfirst($usr['nom']);
                        }
                        unset($_SESSION['mail']);
                        header('Location:  index.php');
                    } else {
                        header('Location:  index.php?controller=user&action=logIn&error=1');

                    }
                }
            }else{
                header('Location:  index.php?controller=user&action=logIn&error=2');
            }
        }
        break;


    case 'Logout':
        if(isset($_SESSION['user']) || isset($_SESSION['userAdmin'])){
            $pagetitle='Logged Out';

            if (isset($_SESSION['user']))
                session_unset($_SESSION['user']);
            else
                session_unset($_SESSION['userAdmin']);

            header('Location: index.php');
        }else{
            $pagetitle ='Login';
            $view='Login';
        }
        break;
}

require ("{$ROOT}{$DS}view{$DS}{$layout}.php");