<?php

namespace AuthTestApp\Repositories;

class DbUserRepository implements UserRepository{
  public function create($attribute){
    dd('creating user');
  }
}
