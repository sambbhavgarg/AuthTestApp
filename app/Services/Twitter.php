<?php

namespace AuthTestApp\Services;

class Twitter{
  
  protected $apiKey;

  public function __construct($apiKey){

    $this->apiKey = $apiKey;

  }

}
