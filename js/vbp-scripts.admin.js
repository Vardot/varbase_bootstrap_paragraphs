/**
 * @file
 * Behaviors Varbase hero slider media general scripts.
 */

(function ($, _, Drupal) {
  Drupal.behaviors.varbaseBootstrapParagraphsAdmin = {
    attach() {
      $(
        '.field--name-bp-background.field--widget-options-buttons input:radio',
      ).each(function () {
        $(this).next('label').addClass($(this).val());
      });

      $('.field--name-bp-width.field--widget-options-buttons input:radio').each(
        function () {
          $(this).next('label').addClass($(this).val());
        },
      );

      $(
        '.field--name-bp-gutter.field--widget-options-buttons input:radio',
      ).each(function () {
        $(this)
          .next('label')
          .addClass(`gutter-${$(this).val()}`);
      });

      $(
        '.field--name-bp-column-style-3.field--widget-options-buttons input:radio',
      ).each(function () {
        $(this).next('label').addClass($(this).val());
      });

      $(
        '.field--name-bp-column-style-2.field--widget-options-buttons input:radio',
      ).each(function () {
        $(this).next('label').addClass($(this).val());
      });

      $(
        '.field--name-text-and-image-style.field--widget-options-buttons input:radio',
      ).each(function () {
        $(this).next('label').addClass($(this).val());
      });

      $(
        '.field--name-field-image-position.field--widget-options-buttons input:radio',
      ).each(function () {
        $(this).next('label').addClass($(this).val());
      });

      $('.paragraphs-tabs-wrapper .form-item .clearfix').show();
    },
  };
})(window.jQuery, window._, window.Drupal);
