<?php

/**
 * @file
 * Contains vbp_text_and_image_update_8###(s) hook updates.
 */

use Symfony\Component\Yaml\Yaml;
use Drupal\Core\Config\InstallStorage;

/**
 * Issue #2904173: Changed [Background Color] in the Styling Settings to use.
 *
 * Use a set of Color set to choose with [Color boxes] with a general
 * color settings.
 */
function vbp_text_and_image_update_8001() {

  $module_path = Drupal::service('module_handler')->getModule('vbp_text_and_image')->getPath();
  $optional_install_path = $module_path . '/' . InstallStorage::CONFIG_OPTIONAL_DIRECTORY;

  $configs['core.entity_form_display.paragraph.text_and_image.default'] = $optional_install_path . 'core.entity_form_display.paragraph.text_and_image.default.yml';

  foreach ($configs as $name => $config_path) {
    $data = (array) Yaml::parse($config_path);
    $config = \Drupal::configFactory()->getEditable($name);
    $config->setData($data)->save(TRUE);
  }
}

/**
 * Issue #3025036: Add target bundle [text and image] to landing page.
 *
 * Landing page components (landing page paragraphs field) without changing old
 * configurations.
 */
function vbp_text_and_image_update_8602() {
  vbp_text_and_image__add_target_bundle_text_and_image_to_landing_page_components();
}
