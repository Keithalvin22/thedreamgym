<?php
  namespace Drupal\candidate_list\controller;
  class candidateList {
  public function page(){
      $items = array(
        array( 'name' => 'keith'),
        array( 'name' => 'alvin'),
        array( 'name' => 'kevina'),
        array( 'name' => 'janice'),
        array( 'name' => 'kevona'),
      );
    
      return array(
        '#theme' => 'candidate_list',
        '#items' => $items,
        '#title' => 'My Candidates bro'
      );
     }
   }
