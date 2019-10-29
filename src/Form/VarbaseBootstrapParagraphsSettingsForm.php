<?php

namespace Drupal\varbase_bootstrap_paragraphs\Form;

use Drupal\field\Entity\FieldStorageConfig;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\Exception\FieldStorageDefinitionUpdateForbiddenException;

/**
 * Provides form for managing module settings.
 */
class VarbaseBootstrapParagraphsSettingsForm extends ConfigFormBase {

  /**
   * Get the from ID.
   */
  public function getFormId() {
    return 'varbase_bootstrap_paragraphs_settings';
  }

  /**
   * Get the editable config names.
   */
  protected function getEditableConfigNames() {
    return ['varbase_bootstrap_paragraphs.settings'];
  }

  /**
   * Build the form.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('varbase_bootstrap_paragraphs.settings');
    $form['settings']['background_colors'] = [
      '#type' => 'textarea',
      '#default_value' => $config->get('background_colors'),
      '#title' => $this->t('Available CSS styles (classes) for Varbase Bootstrap Paragraphs'),
      '#description' => $this->t('
<p>The list of CSS classes available as background styles for Varbase Bootstrap Pargaraphs. Enter one value per line, in the format <b>key|label</b> where <em>key</em> is the CSS class name (without the .), and <em>label</em> is the human readable name of the style in administration forms.</p><p>These styles are defined and can be customized in <code>vbp-colors</code> library that is defined in <code>varbase_bootstrap_paragraphs/varbase_bootstrap_paragraphs.libraries.yml</code>.</p><p>To customize the styles to fit your brand with your own theme, do the following:
  <ol>
    <li>Copy the SCSS (<code>varbase_bootstrap_paragraphs/scss/theme/vbp-colors.theme.scss</code>) and CSS (<code>varbase_bootstrap_paragraphs/css/theme/vbp-colors.theme.css</code>) files to your own theme.</li>
    <li>Override or replace the <code>vbp-colors</code> library in your own frontend theme. You will need to edit <code>YOURTHEME.libraries.yml</code> and <code>YOURTHEME.info.yml</code>. Refer to <a href="@link">the documentation manual for overriding libraries in your theme</a> for more details.</li>
    <li>Edit the SCSS/CSS files in your own theme to customize the styles as you wish. You will notice that the admin form will load your styles in the available "Background color" options for Paragraphs.</li>
  </ol>
</p>', ['@link' => ' https://www.drupal.org/docs/8/theming-drupal-8/adding-stylesheets-css-and-javascript-js-to-a-drupal-8-theme#override-extend']),
      '#cols' => 60,
      '#rows' => 10,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * Submit Form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    try {
      // Update the Allowed list text values.
      $newAllowedListTextValues = self::optionsExtractAllowedListTextValues($form_state->getValue('background_colors'));
      $fieldStorage = FieldStorageConfig::loadByName('paragraph', 'bp_background');
      $fieldStorage->setSetting('allowed_values', $newAllowedListTextValues);
      $fieldStorage->save();
    }
    catch (FieldStorageDefinitionUpdateForbiddenException $e) {
      $this->messenger()->addError($e->getMessage());
      $form_state->setRebuild();
      return;
    }
    catch (Exception $e) {
      $this->messenger()->addError($e->getMessage());
      $form_state->setRebuild();
      return;
    }

    $config = $this->config('varbase_bootstrap_paragraphs.settings');
    $config->set('background_colors', $form_state->getValue('background_colors'));
    $config->save();

    parent::submitForm($form, $form_state);
  }

  /**
   * Validate Form.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);

    $values = self::optionsExtractAllowedListTextValues($form_state->getValue('background_colors'));

    if (!is_array($values)) {
      $form_state->setErrorByName('background_colors', $this->t('Allowed values list: invalid input.'));
    }
    else {
      // Check that keys are valid for the field type.
      foreach ($values as $key => $value) {
        if (mb_strlen($key) > 255) {
          $form_state->setErrorByName('background_colors', $this->t('Allowed values list: each key must be a string at most 255 characters long.'));
          break;
        }
      }
    }
  }

  /**
   * Parses a string of 'allowed values' into an array.
   *
   * @param string $string
   *   The list of allowed values in string format described in
   *   optionsExtractAllowedValues().
   *
   * @return arraynull
   *   The array of extracted key/value pairs, or NULL if the string is invalid.
   *
   * @see optionsExtractAllowedListTextValues()
   */
  public function optionsExtractAllowedListTextValues($string) {
    $values = [];

    $list = explode("\n", $string);
    $list = array_map('trim', $list);
    $list = array_filter($list, 'strlen');

    foreach ($list as $text) {
      $value = $key = FALSE;

      // Check for an explicit key.
      $matches = [];
      if (preg_match('/(.*)\|(.*)/', $text, $matches)) {
        // Trim key and value to avoid unwanted spaces issues.
        $key = trim($matches[1]);
        $value = trim($matches[2]);
        $values[$key] = $value;
      }
      else {
        return NULL;
      }
    }

    return $values;
  }

}
