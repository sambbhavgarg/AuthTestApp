<?php

namespace App\Repositories;

class DbUserRepository implements UserRepository{
  public function create($attribute){
    dd('creating user');
  }
}
