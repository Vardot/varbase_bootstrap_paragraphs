<?php

namespace Drupal\Tests\varbase_bootstrap_paragraphs\Functional;

use Drupal\Tests\BrowserTestBase;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Varbase Bootstrap Paragraphs tests.
 *
 * @group varbase_bootstrap_paragraphs
 */
class VarbaseBootstrapParagraphsTests extends BrowserTestBase {

  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  protected $profile = 'standard';

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'vartheme_bs4';

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'varbase_core',
    'varbase_media',
    'varbase_editor',
    'varbase_admin',
    'varbase_seo',
    'varbase_workflow',
    'varbase_bootstrap_paragraphs',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    // Insall the Claro admin theme.
    $this->container->get('theme_installer')->install(['claro']);

    // Set the Claro theme as the default admin theme.
    $this->config('system.theme')->set('admin', 'claro')->save();
  }

  /**
   * Check Varbase Bootstrap Paragraphs default paragraphs Types.
   */
  public function testCheckVarbaseBootstrapParagraphsCheckParagraphTypesPage() {

    // Given that the root super user was logged in to the site.
    $this->drupalLogin($this->rootUser);

    $this->drupalGet('admin/structure/paragraphs_type');

    $this->assertSession()->pageTextContains($this->t('Paragraphs types'));
    $this->assertSession()->pageTextContains($this->t('Accordion'));
    $this->assertSession()->pageTextContains($this->t('Accordion Section'));
    $this->assertSession()->pageTextContains($this->t('Carousel'));
    $this->assertSession()->pageTextContains($this->t('Columns (Equal)'));
    $this->assertSession()->pageTextContains($this->t('Columns (Three Uneven)'));
    $this->assertSession()->pageTextContains($this->t('Columns (Two Uneven)'));
    $this->assertSession()->pageTextContains($this->t('Column Wrapper'));
    $this->assertSession()->pageTextContains($this->t('Drupal Block'));
    $this->assertSession()->pageTextContains($this->t('Image'));
    $this->assertSession()->pageTextContains($this->t('Modal'));
    $this->assertSession()->pageTextContains($this->t('Rich Text'));
    $this->assertSession()->pageTextContains($this->t('Tabs'));
    $this->assertSession()->pageTextContains($this->t('Tab Section'));
    $this->assertSession()->pageTextContains($this->t('View'));
    $this->assertSession()->pageTextContains($this->t('Webform'));

  }

  /**
   * Check Varbase Bootstrap Paragraphs settings.
   */
  public function testCheckVarbaseBootstrapParagraphsSettings() {

    // Given that the root super user was logged in to the site.
    $this->drupalLogin($this->rootUser);

    $this->drupalGet('/admin/config/varbase/varbase-bootstrap-paragraphs');
    $this->assertSession()->pageTextContains($this->t('Varbase Bootstrap Paragraphs settings'));
    $this->assertSession()->pageTextContains($this->t('Available CSS styles (classes) for Varbase Bootstrap Paragraphs'));
  }

}
