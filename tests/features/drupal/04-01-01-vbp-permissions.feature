@varbase_bootstrap_paragraphs @permissions
Feature: Varbase Bootstrap Paragraphs - paragraph types admin access
  Scenario: Anonymous users cannot administer paragraph types
    Given I am an anonymous user
    When I am on "/admin/structure/paragraphs_type"
    Then I should see "Access denied"

  Scenario: Authenticated users without permission cannot administer paragraph types
    Given I am a logged in user with the "Normal user" user
    When I am on "/admin/structure/paragraphs_type"
    Then I should see "Access denied"

  Scenario: Administrators can see the Bootstrap paragraph types
    Given I am a logged in user with the "Webmaster" user
    When I go to "/admin/structure/paragraphs_type"
    Then I should see "Accordion"
    And I should see "Carousel"
