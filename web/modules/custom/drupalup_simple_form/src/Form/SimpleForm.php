<?php
namespace Drupal\drupalup_simple_form\Form;

use Drupal\Core\Form\FormBase;

use Drupal\Core\Form\FormStateInterface;

class SimpleForm extends FormBase {

  public function getFormId() {

    return 'drupalup_simple_form';

  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['number_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First name'),
      '#default_value' =>'Harry',
    ];
    $form['number_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Second name'),
      '#default_value' => 'Potter',
    ];
    $form['number_3'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#default_value' => 'lalala@mail.com',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];
    return $form;
  }
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $def1=$form_state->getValue('number_1');
    $def2=$form_state->getValue('number_2');
    $def3=$form_state->getValue('number_3');
    $messenger = \Drupal::messenger();
    $this->messenger()->addMessage($def1);
    $this->messenger()->addMessage($def2);
    $this->messenger()->addMessage($def3);
  }
}
?>
