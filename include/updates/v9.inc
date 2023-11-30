<?php

/**
 * @file
 * Contains varbase_bootstrap_paragraphs_update_9###(s) hook updates.
 */

use Vardot\Installer\ModuleInstallerFactory;

/**
 * Issue #3272278: Switch to use the Module Installer Factory.
 *
 * In the Varbase Bootstrap Paragraphs module.
 */
function varbase_bootstrap_paragraphs_update_90001() {
  // Set the weight of the module after installation of list of modules.
  // To make sure that any hook or event subscriber worker
  // after all used modules.
  ModuleInstallerFactory::setModuleWeightAfterInstallation('varbase_bootstrap_paragraphs');
}
