<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
  function __construct()
  {
    // code...
  }

  public function login()
  {
    echo view('users/login');
  }

  public function verifyLogin()
  {
    // echo $_POST['username'];
    // echo $_POST['password'];
    $model = new UserModel();
    // echo "<pre>";
    // print_r($model->getUser());
    if (!empty($credential = $model->verifyUsername($_POST['username'])))
    {
      if ($_POST['password'] == $credential[0]['password']) {
        $_SESSION['id'] = $credential[0]['id'];
        $_SESSION['username'] = $credential[0]['username'];
        $_SESSION['firstname'] = $credential[0]['firstName'];
        $_SESSION['lastname'] = $credential[0]['lastName'];
        $_SESSION['isLoggedIn'] = 1;
        return redirect()->to(base_url().'/home');
        echo "Login success!";
      }
      else {
        return redirect()->to(base_url().'/login');
      }
    }
    else {
      return redirect()->to(base_url().'/login');
    }
  }

  public function register()
  {
    // code...
  }
}
