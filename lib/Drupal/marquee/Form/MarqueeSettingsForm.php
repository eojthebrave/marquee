<?php
/**
 * @file
 * Contains \Drupal\marquee\Form\MarqueeSettingsForm.
 */

namespace Drupal\marquee\Form;

use Drupal\Core\Form\ConfigFormBase;

/**
 * Defines a form to configure maintenance settings for this site.
 */
class MarqueeSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'system_site_maintenance_mode';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, array &$form_state) {
    $config = \Drupal::config('marquee.settings');
    $form['enabled'] = array(
      '#type' => 'checkbox',
      '#title' => t('Make this site even more awesome'),
      '#default_value' => $config->get('enabled'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, array &$form_state) {
    \Drupal::config('marquee.settings')
      ->set('enabled', $form_state['values']['enabled'])
      ->save();

    parent::submitForm($form, $form_state);
  }

}

