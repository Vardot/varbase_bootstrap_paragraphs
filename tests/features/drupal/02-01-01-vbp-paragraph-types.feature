@varbase_bootstrap_paragraphs @types
Feature: Varbase Bootstrap Paragraphs - Bootstrap paragraph types
  As a site administrator
  I want the Bootstrap paragraph bundles ready

  Background:
    Given I am a logged in user with the "Webmaster" user

  Scenario: The core content paragraph types are available
    When I go to "/admin/structure/paragraphs_type"
    Then I should see "Accordion"
    And I should see "Carousel"
    And I should see "Rich Text"

  Scenario: The layout paragraph types are available
    When I go to "/admin/structure/paragraphs_type"
    Then I should see "Columns (Equal)"
    And I should see "Tabs"
    And I should see "Modal"

  Scenario: The embed paragraph types are available
    When I go to "/admin/structure/paragraphs_type"
    Then I should see "View"
    And I should see "Webform"
    And I should see "Image"
