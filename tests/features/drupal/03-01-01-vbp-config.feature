@varbase_bootstrap_paragraphs @config
Feature: Varbase Bootstrap Paragraphs - configuration
  As a site administrator
  I want to manage the paragraph types and the module settings

  Background:
    Given I am a logged in user with the "Webmaster" user

  Scenario: The Accordion paragraph type can be managed
    When I go to "/admin/structure/paragraphs_type/bp_accordion"
    Then I should see "Accordion"

  Scenario: The Rich Text paragraph type can be managed
    When I go to "/admin/structure/paragraphs_type/bp_simple"
    Then I should see "Rich Text"

  Scenario: The module settings form provides the CSS styles options
    When I go to "/admin/config/varbase/varbase-bootstrap-paragraphs"
    Then I should see "Varbase Bootstrap Paragraphs settings"
    And I should see "Available CSS styles (classes) for Varbase Bootstrap Paragraphs"
