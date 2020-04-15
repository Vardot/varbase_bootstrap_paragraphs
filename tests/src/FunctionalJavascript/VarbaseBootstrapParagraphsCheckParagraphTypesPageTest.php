<?php

namespace Drupal\Tests\varbase_bootstrap_paragraphs\FunctionalJavascript;

use Drupal\FunctionalJavascriptTests\WebDriverTestBase;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Tests the UI for Total Control Dashboard Page.
 *
 * @group varbase_bootstrap_paragraphs
 */
class VarbaseBootstrapParagraphsCheckParagraphTypesPageTest extends WebDriverTestBase {

  use StringTranslationTrait;

  /**
   * Modules to install.
   *
   * @var array
   */
  public static $modules = [
    'user',
    'filter',
    'toolbar',
    'block',
    'views',
    'node',
    'text',
    'options',
    'link',
    'ckeditor',
    'block',
    'advanced_text_formatter',
    'field_group',
    'maxlength',
    'webform',
    'viewsreference',
    'entity_reference_revisions',
    'paragraphs',
    'paragraphs_library',
    'paragraphs_previewer',
    'paragraphs_edit',
    'varbase_media',
    'varbase_bootstrap_paragraphs',
    'vbp_text_and_image',
  ];

  /**
   * A user with the permission.
   *
   * Permission to 'administer varbase bootstrap paragraphs settings' .
   *
   * @var \Drupal\user\UserInterface
   */
  protected $webUser;

  /**
   * Specify the theme to be used in testing.
   *
   * @var string
   */
  protected $defaultTheme = 'stable';

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $permissions = [
      'access toolbar',
      'view the administration theme',
      'administer varbase bootstrap paragraphs settings',
    ];

    $this->webUser = $this->drupalCreateUser($permissions);
    $this->drupalLogin($this->webUser);
  }

  /**
   * Tests Varbase Bootstrap Paragraphs Check Paragraph Types Page.
   */
  public function testVarbaseBootstrapParagraphsCheckParagraphTypesPage() {
    $this->drupalGet('admin/structure/paragraphs_type');
    $this->assertSession()->waitForElementVisible('css', '.block block-system.block-system-main-block');
    $page_title_text = $this->t('Paragraphs types');
    $this->assertSession()->pageTextContains($page_title_text);
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
    $this->assertSession()->pageTextContains($this->t('Text and image'));
    $this->assertSession()->pageTextContains($this->t('View'));
    $this->assertSession()->pageTextContains($this->t('Webform'));

  }

}
