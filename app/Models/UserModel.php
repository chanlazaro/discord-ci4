<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'users';

  public function verifyUsername($username)
  {
    return $this->where('username', $username)->findAll();
  }
}
