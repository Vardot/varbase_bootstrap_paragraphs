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
   * Modules to install.
   *
   * @var array
   */
  public static $modules = [
    'varbase_media',
    'varbase_bootstrap_paragraphs',
  ];

  /**
   * Specify the theme to be used in testing.
   *
   * @var string
   */
  protected $defaultTheme = 'bartik';

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->drupalLogin($this->rootUser);
  }

  /**
   * Check Varbase Bootstrap Paragraphs default paragraphs Types.
   */
  public function testCheckVarbaseBootstrapParagraphsCheckParagraphTypesPage() {
    $assert_session = $this->assertSession();

    $this->drupalGet('admin/structure/paragraphs_type');

    $assert_session->pageTextContains($this->t('Paragraphs types'));
    $assert_session->pageTextContains($this->t('Accordion'));
    $assert_session->pageTextContains($this->t('Accordion Section'));
    $assert_session->pageTextContains($this->t('Carousel'));
    $assert_session->pageTextContains($this->t('Columns (Equal)'));
    $assert_session->pageTextContains($this->t('Columns (Three Uneven)'));
    $assert_session->pageTextContains($this->t('Columns (Two Uneven)'));
    $assert_session->pageTextContains($this->t('Column Wrapper'));
    $assert_session->pageTextContains($this->t('Drupal Block'));
    $assert_session->pageTextContains($this->t('Image'));
    $assert_session->pageTextContains($this->t('Modal'));
    $assert_session->pageTextContains($this->t('Rich Text'));
    $assert_session->pageTextContains($this->t('Tabs'));
    $assert_session->pageTextContains($this->t('Tab Section'));
    $assert_session->pageTextContains($this->t('View'));
    $assert_session->pageTextContains($this->t('Webform'));

  }

  /**
   * Check Varbase Bootstrap Paragraphs settings.
   */
  public function testCheckVarbaseBootstrapParagraphsSettings() {
    $assert_session = $this->assertSession();

    $this->drupalGet('/admin/config/varbase/varbase-bootstrap-paragraphs');
    $assert_session->pageTextContains($this->t('Varbase Bootstrap Paragraphs settings'));
    $assert_session->pageTextConteins($this->t('Available CSS styles (classes) for Varbase Bootstrap Paragraphs'));

  }

}
