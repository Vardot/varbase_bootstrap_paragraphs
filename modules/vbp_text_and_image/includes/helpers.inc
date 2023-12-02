<?php

/**
 * @file
 * Contains List of all vbp_text_and_image helpers.
 *
 * Add custom needed helper functions.
 */

/**
 * Add target bundle [text and image] to landing page components.
 *
 * (landing page paragraphs field) without changing old configurations.
 */
function vbp_text_and_image__add_target_bundle_text_and_image_to_landing_page_components() {
  $site_config = \Drupal::configFactory()->getEditable('field.field.node.landing_page.field_lp_paragraphs');
  $config_data = $site_config->get();

  /* dependencies:
   * config:
   * - paragraphs.paragraphs_type.text_and_image
   */
  if (!isset($config_data['dependencies']['config']['paragraphs.paragraphs_type.text_and_image'])) {
    $config_data['dependencies']['config'][] = 'paragraphs.paragraphs_type.text_and_image';
  }

  /* settings:
   * handler_settings:
   * target_bundles:
   * text_and_image: text_and_image
   */
  if (!isset($config_data['settings']['handler_settings']['target_bundles']['text_and_image'])) {
    $config_data['settings']['handler_settings']['target_bundles']['text_and_image'] = 'text_and_image';
  }

  /* target_bundles_drag_drop
   * text_and_image:
   * enabled: true
   * weight: 32
   */
  if (!isset($config_data['settings']['handler_settings']['target_bundles_drag_drop']['text_and_image'])) {
    $config_data['settings']['handler_settings']['target_bundles_drag_drop']['text_and_image'] = [
      'enabled' => TRUE,
      'weight' => 32,
    ];
  }

  $site_config->setData($config_data)->save(TRUE);

}

/**
 * Populates TWIG variables with VBP related data.
 *
 * E.g.: $variables['VBP']['test'] becomes
 * {{ VBP.test }} in the templates.
 *
 * @param array &$variables
 *   The core $variables passed by reference.
 * @param array $data
 *   New data in array format, which will be passed to the template.
 *
 * @return bool|array
 *   The new data.
 *
 * @internal
 */
function vbp_text_and_image__add_template_variable(array &$variables, array $data = NULL) {

  static $key = 'VBP';

  if (!isset($variables[$key])) {
    $variables[$key] = $data;
  }
  else {
    $variables[$key][] = $data;
  }
  return $data;
}
