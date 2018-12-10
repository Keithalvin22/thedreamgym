<?php
namespace Drupal\hello_world\controller;
class HelloWorldController{
  public function hello(){
    return array(
        '#title' => 'hello world',
        '#markup' => 'this is some content'
  );
}
}


