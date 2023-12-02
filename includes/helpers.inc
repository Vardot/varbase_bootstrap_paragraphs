<?php

/**
 * @file
 * Contains List of all varbase_bootstrap_paragraphs helpers.
 *
 * Add custom needed helper functions.
 */

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
function varbase_bootstrap_paragraphs__add_template_variable(array &$variables, array $data = NULL) {

  static $key = 'VBP';

  if (!isset($variables[$key])) {
    $variables[$key] = $data;
  }
  else {
    $variables[$key][] = $data;
  }
  return $data;
}
