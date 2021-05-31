(function ($) {
  "use strict";

  /**
   * All of the code for your admin-facing JavaScript source
   * should reside in this file.
   *
   * Note: It has been assumed you will write jQuery code here, so the
   * $ function reference has been prepared for usage within the scope
   * of this function.
   *
   * This enables you to define handlers, for when the DOM is ready:
   *
   * $(function() {
   *
   * });
   *
   * When the window is loaded:
   *
   * $( window ).load(function() {
   *
   * });
   *
   * ...and/or other possibilities.
   *
   * Ideally, it is not considered best practise to attach more than a
   * single DOM-ready or window-load handler for a particular page.
   * Although scripts in the WordPress core, Plugins and Themes may be
   * practising this, we should strive to set a better example in our own work.
   */

  $(window).load(function () {
    var CustomPluginMediaUploader = {
      construct: function () {
        $(".wp-simple-seo-tags-media-button").each(function (index) {
          CustomPluginMediaUploader.initButton($(this));
        });
      },
      initButton: function (_that) {
        _that.click(function (e) {
          // Instantiates the variable that holds the media library frame.
          var metaImageFrame;
          // Get the btn
          var btn = e.target;

          console.log(
            $(btn).attr("data-wp-simple-seo-tags-media-uploader-target")
          );

          // Check if it's the upload button
          if (
            !btn ||
            !$(btn).attr("data-wp-simple-seo-tags-media-uploader-target")
          )
            return;

          // Get the field target
          var field = $(btn).data("wp-simple-seo-tags-media-uploader-target");

          console.log($(field));

          // Prevents the default action from occuring.
          e.preventDefault();

          // Sets up the media library frame
          metaImageFrame = wp.media.frames.metaImageFrame = wp.media({
            title:
              "Choose an image to display when sharing this page/post on social media",
            button: { text: "Select image" },
          });

          // Runs when an image is selected.
          metaImageFrame.on("select", function () {
            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = metaImageFrame
              .state()
              .get("selection")
              .first()
              .toJSON();

            // Sends the attachment URL to our custom image input field.
            $(field).val(media_attachment.url);

            // lets display the preview image
            $(field + "-preview").attr("src", media_attachment.url);
            if ($(field + "-preview").hasClass("preview-visible")) {
              $(field + "-preview").addClass("preview-visible");
            }
          });

          // Opens the media library frame.
          metaImageFrame.open();
        });
      },
    };
    CustomPluginMediaUploader.construct();
  });
})(jQuery);
