<?php

/**
  *@file
  *Contains \Drupal\rsvplist\Form\RSVPForm
  */

namespace Drupal\rsvplist\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
  * Provide an RSVP email form
  */

class RSVPForm extends FormBase{

/**
  *(@inheritdoc)
  */

public function getFormId(){
    return 'rsvplist_email_form';
  }

public function buildForm(array $form, FormStateInterface $form_state){
  $node = \Drupal::routeMatch()->getParameter('node');
  $nid = FALSE;
   if (isset($node->nid)) {
      $nid = $node->nid->value;   
      }
   $form['email'] = array(
      '#title'=> t('Email Address'),
      '#type'=> 'textfield',
      '#size'=> 25,
      '#description' => t("will send update email address you provided"),
      '#required'=> TRUE,
  );
   $form['submit'] = array(
      '#type'=> 'submit',
      '#value' => t('RSVP'), 
  );
   $form['nid'] = array(
      '#type' => 'hidden',
      '#value' => $nid,
   );
   return $form;
}

  /**
   *(@inheritdoc)
   */
public function validateForm(array &$form, FormStateInterface $form_state){
  $value = $form_state('email');
  if($value = !Drupal::service('email.validator')->isValid($value)){
    $form_state->setErrorByName('email', t('this is not a valid email yall', array('%mail'=>$value)));
  }
}

 /**
   *(@inheritdoc)
   */
public function submitForm(array &$form, FormStateInterface $form_state){
    drupal_set_message(t(' the form is working keith'));
  }
}
