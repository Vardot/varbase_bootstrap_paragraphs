<?php

/**
 * @file
 * Contains vbp_text_and_image_update_9###(s) hook updates.
 */

use Vardot\Installer\ModuleInstallerFactory;

/**
 * Issue #3272278: Switch to use the Module Installer Factory.
 *
 * In the Varbase Bootstrap Paragraphs Text and Image module.
 */
function vbp_text_and_image_update_90001() {
  // Set the weight of the module after installation of list of modules.
  // To make sure that any hook or event subscriber worker
  // after all used modules.
  ModuleInstallerFactory::setModuleWeightAfterInstallation('vbp_text_and_image');
}
