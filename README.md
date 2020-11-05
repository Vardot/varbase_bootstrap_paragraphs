# Varbase Bootstrap Paragraphs

A suite of Paragraph bundles to be used for
[Varbase](https://www.drupal.org/project/varbase) distribution.
Made with the Bootstrap framework, based on a fork of Bootstrap Paragraph module
[bootstrap_paragraphs](https://www.drupal.org/project/bootstrap_paragraphs)

For content creators, attempts to use wysiwyg editors to create structured
layouts typically lead to frustration and compromise. With this module you
can easily position chunks of content (Paragraph bundles) within a structured 
layout of your own design.

This suite of [Paragraphs](https://www.drupal.org/project/paragraphs) bundles
 works within the [Bootstrap](http://getbootstrap.com) framework.

This module is built on the premise that all good things in Drupal 8 are
entities, and we can use Paragraphs and Reference fields to allow our content
creators to harness the power of the Bootstrap framework for functionality
and layout.

**Bundle Types:**

  * Rich Text
  * Image
  * Accordion
  * Carousel
  * Columns (Equal, up to 6)
  * Columns (Three Uneven)
  * Columns (Two Uneven)
  * Column Wrapper
  * Drupal Block
  * Modal
  * Tabs
  * View
  * Webform
  # Text and Image

**Backgrounds:**

Each Paragraph has styling settings, including width, Backgournd image, and
background color options.

**Widths:**

  * Tiny : col-md-4 offset-md-4 col-sm-8 offset-sm-2
  * Narrow : col-md-6 offset-md-3 col-sm-10 offset-sm-1
  * Medium : col-md-8 offset-md-2
  * Wide : col-md-10 offset-md-1
  * Full : col-12
  * Edge to Edge : bg-edge2edge col-12 p-0

**Installation:**

  * Install the module as you normally would.
  * Verify installation by visiting /admin/structure/paragraphs_type and seeing
    your new Paragraph bundles.
  * On the Simple bundle, click Manage fields and choose which Text formats
    to use.  We recommend a *Rich Text* text format for the Rich Text paragraph
    type.
  * Go to your content type and add a new field to type Entity revisions,
    Paragraphs.
  * Allow unlimited so creators can add more that one Paragraph to the node.
  * On the field edit screen, you can add instructions, and choose which bundles
    you want to allow for this field. Check all but Accordion Section and Tab
     Section. Those should only be used inside Accordions and Tabs.
  * Arrange them as you see fit. I prefer Simple, Image, at the top, then the
    rest in Alphabetical order. Click Save Settings.
  * Adjust your form display, placing the field where you want it.
  * Add the field into the Manage display tab.
  * Start creating content!

**Requirements:**

  * [Entity Reference Revisions](https://www.drupal.org/project/entity_reference_revisions)
  * Field
  * File
  * Filter
  * Image
  * Options
  * [Paragraphs](https://www.drupal.org/project/paragraphs)
  * System
  * Text
  * User
  * Views
  * [Views Reference Field](https://www.drupal.org/project/viewsreference)
  * Bootstrap framework's CSS and JS included in your theme
  * [Webform](https://www.drupal.org/project/webform)
