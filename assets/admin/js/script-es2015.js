"use strict";

(function ($) {
  $(function () {
    if (typeof $.fn.tooltip !== 'undefined') {
      $('[data-toggle="tooltip"]').tooltip();
    }

    if (typeof $.fn.wpColorPicker !== 'undefined') {
      $('.flexible-input-color-picker').wpColorPicker();
    }
  });
})(jQuery);

document.addEventListener('DOMContentLoaded', function () {
  var formEl = document.querySelector('.flexizoom-admin form');
  var flexiZoomEl = document.querySelector('.flexi-zoom');
  var flexiZoomHTML = JSON.parse(JSON.stringify(flexiZoomEl.innerHTML));
  var flexiZoom;

  var buildZoomSettings = function buildZoomSettings(formData) {
    return {
      type: formData.get('flexizoom_options[zoom_type]') === 'right' ? 'left' : formData.get('flexizoom_options[zoom_type]'),
      hoverDelay: parseFloat(formData.get('flexizoom_options[hover_delay]')),
      hoverOverlay: formData.get('flexizoom_options[is_hover_overlay]') === 'on',
      isLightbox: formData.get('flexizoom_options[is_lightbox]') === 'on',
      previewOffsetX: parseFloat(formData.get('flexizoom_options[preview_offset_x]')),
      previewOffsetY: parseFloat(formData.get('flexizoom_options[preview_offset_y]')),
      innerMaxWidth: parseFloat(formData.get('flexizoom_options[inner_max_width]')),
      previewWidth: parseFloat(formData.get('flexizoom_options[zoom_window_width]')),
      previewHeight: parseFloat(formData.get('flexizoom_options[zoom_window_height]'))
    };
  };

  flexiZoom = new FlexiZoom(buildZoomSettings(new FormData(formEl)));
  formEl.addEventListener('change', function (event) {
    var changedText = document.querySelector('.flexizoom-admin-save-button-changed');
    if (changedText) changedText.style.opacity = 1;
    var button = document.querySelector('.flexizoom-admin-save-button button');
    if (button) button.disabled = false;
    var formData = new FormData(event.currentTarget);
    flexiZoomEl.innerHTML = flexiZoomHTML;
    setTimeout(function () {
      flexiZoom = new FlexiZoom(buildZoomSettings(formData));
    }, 500);
  });
});
