(function ($) {
  "user strict";
  // wow
  if ($('.wow').length) {
    var wow = new WOW({
      boxClass: 'wow',
      // animated element css class (default is wow)
      animateClass: 'animated',
      // animation css class (default is animated)
      offset: 0,
      // distance to the element when triggering the animation (default is 0)
      mobile: false,
      // trigger animations on mobile devices (default is true)
      live: true // act on asynchronously loaded content (default is true)
    });
    wow.init();
  }
  // select-2 init
  $('.select2-basic').select2();
  $('.select2-multi-select').select2();
  $(".select2-auto-tokenize").select2({
    tags: true,
    tokenSeparators: [',']
  });
  //Create Background Image
  (function background() {
    let img = $('.bg_img');
    img.css('background-image', function () {
      var bg = ('url(' + $(this).data('background') + ')');
      return bg;
    });
  })();

  // sidebar
  $(".sidebar-menu-item > a").on("click", function () {
    var element = $(this).parent("li");
    if (element.hasClass("active")) {
      element.removeClass("active");
      element.children("ul").slideUp(500);
    } else {
      element.siblings("li").removeClass('active');
      element.addClass("active");
      element.siblings("li").find("ul").slideUp(500);
      element.children('ul').slideDown(500);
    }
  });

  //sidebar Menu
  $(document).on('click', '.navbar__expand', function () {
    $('.sidebar').toggleClass('active');
    $('.navbar-wrapper').toggleClass('active');
    $('.body-wrapper').toggleClass('active');
  });

  //dark version
  $(document).on('click', '.version-btn', function () {
    // $('body').toggleClass('dark-version');
    $('.page-wrapper').toggleClass('dark-version');
  });


  // notification
  $(".notification-btn").click(function () {
    $(".notification-wrapper").slideToggle();
  });

  // Switch toggle
  $(document).on('click', '.switch', function () {
    $(this).toggleClass('active');
  });

  // Input toggle
  $(document).on('click', '.switch', function () {
    $('.input-toggle').toggleClass('show');
  });

  // responsive sidebar expand js 
  $('.navbar__mobile_expand').on('click', function () {
    $('.sidebar').addClass('open');
  });

  $('.res-sidebar-close-btn').on('click', function () {
    $('.sidebar').removeClass('open');
  });

  // color version change
  $(document).on('click', '.version-btn', function () {
    setVersion(localStorage.getItem('page-wrapper'));
  });


  if (localStorage.getItem('page-wrapper') == 'dark-version') {
    localStorage.setItem('page-wrapper', 'light-version');
  } else {
    localStorage.setItem('page-wrapper', 'dark-version');
  }

  setVersion(localStorage.getItem('page-wrapper'));

  function setVersion(version) {


    if (version == 'dark-version') {
      localStorage.setItem('page-wrapper', 'light-version');
      $('.page-wrapper').addClass(version);
      $('.sidebar__main-logo img').attr('src', $('.sidebar__main-logo img').attr('dark-img'));
      $('.version-btn').html('<i class="las la-sun"></i>');

    } else {
      //  console.log('light')
      localStorage.setItem('page-wrapper', 'dark-version');
      $('.page-wrapper').removeClass('dark-version');
      $('.sidebar__main-logo img').attr('src', $('.sidebar__main-logo img').attr('white-img'));
      $('.version-btn').html('<i class="las la-moon"></i>');
    }

  }

  $('.iconPicker').iconpicker().on('change', function (e) {
    $(this).parent().siblings('.icon').val(`<i class="${e.icon}"></i>`);
  });

  // input-field-generator
  $('.input-field-generator').on('click', '.add-row-btn', function () {
    var source = $('.input-field-generator').attr("data-source");
    $(this).closest('.input-field-generator').find('.results').children().removeClass("last-add");
    $(this).closest('.input-field-generator').find('.results').prepend(storedHtmlMarkup[source]);
    var lastAddedElement = $(this).closest('.input-field-generator').find('.results').children().first();
    lastAddedElement.addClass("last-add");
    var inputTypeField = lastAddedElement.find(".field-input-type");
    if (inputTypeField.length > 0) {
      inputFieldValidationRuleFieldsShow(inputTypeField);
    }
  });

  $(document).on('click', '.row-cross-btn', function (e) {
    e.preventDefault();
    $(this).parent().parent().hide(300);
    setTimeout(timeOutFunc, 300, $(this));

    function timeOutFunc(element) {
      $(element).parent().parent().remove();
    }
  });


  $(document).ready(function () {
    var elements = $(".add-row-btn").closest('.input-field-generator').find('.results').children();
    $.each(elements, function (index, item) {
      if ($(item).find(".field-input-type").length > 0) {
        inputFieldValidationRuleFieldsShow($(item).find(".field-input-type"));
      }
    });
  });
  $(document).on("change", ".field-input-type", function () {
    inputFieldValidationRuleFieldsShow($(this));
  });
})(jQuery);

// Stroded HTML Markup
var storedHtmlMarkup = {
  add_money_automatic_gateway_credentials_field: `<div class="row align-items-end">
  <div class="col-xl-3 col-lg-3 form-group">
      <label>Title*</label>
      <input type="text" class="form--control" placeholder="Type Here..." name="title[]">
  </div>
  <div class="col-xl-3 col-lg-3 form-group">
      <label>Name*</label>
      <input type="text" class="form--control" placeholder="Type Here..." name="name[]">
  </div>
  <div class="col-xl-5 col-lg-5 form-group">
      <label>Value</label>
      <input type="text" class="form--control" placeholder="Type Here..." name="value[]">
  </div>
  <div class="col-xl-1 col-lg-1 form-group">
      <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
  </div>
</div>`,
  payment_gateway_currency_block: `<div class="custom-card mt-15 gateway-currency" style="display:none;">
<div class="card-header">
    <h6 class="currency-title"></h6>
</div>
<div class="card-body">
  <div class="row align-items-center">
      <div class="col-xl-2 col-lg-2 form-group">
          <label>Gateway Image</label>
          <input type="file" class="file-holder image" name="" accept="image/*">
      </div>
      <div class="col-xl-3 col-lg-3 mb-10">
          <div class="custom-inner-card">
              <div class="card-inner-header">
                  <h5 class="title">Amount Limit*</h5>
              </div>
              <div class="card-inner-body">
                  <div class="row">
                      <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                          <div class="form-group">
                              <label>Minimum</label>
                              <div class="input-group">
                                  <input type="number" class="form--control min-limit" value="0" name="">
                                  <span class="input-group-text currency"></span>
                              </div>
                          </div>
                      </div>
                      <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                          <div class="form-group">
                              <label>Maximum</label>
                              <div class="input-group">
                                  <input type="number" class="form--control max-limit" value="0" name="">
                                  <span class="input-group-text currency"></span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-lg-3 mb-10">
          <div class="custom-inner-card">
              <div class="card-inner-header">
                  <h5 class="title">Charge*</h5>
              </div>
              <div class="card-inner-body">
                  <div class="row">
                      <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                          <div class="form-group">
                              <label>Fixed*</label>
                              <div class="input-group">
                                  <input type="number" class="form--control fixed-charge" value="0" name="">
                                  <span class="input-group-text currency"></span>
                              </div>
                          </div>
                      </div>
                      <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                          <div class="form-group">
                              <label>Percent*</label>
                              <div class="input-group">
                                  <input type="number" class="form--control percent-charge" value="0" name="">
                                  <span class="input-group-text">%</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-4 col-lg-4 mb-10">
          <div class="custom-inner-card">
              <div class="card-inner-header">
                  <h5 class="title">Rate*</h5>
              </div>
              <div class="card-inner-body">
                  <div class="row">
                      <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                          <div class="form-group">
                              <label>Rate*</label>
                              <div class="input-group">
                                  <span class="input-group-text append ">1 &nbsp; <span class="default-currency"></span> = </span>
                                  <input type="number" class="form--control rate" value="" name="">
                                  <span class="input-group-text currency"></span>
                              </div>
                          </div>
                      </div>
                      <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                          <div class="form-group">
                              <label>Symbol</label>
                              <div class="input-group">
                                  <input type="text" class="form--control symbol" value="" name="" placeholder="Symbol">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>`,
  payment_gateway_currencies_wrapper: `<div class="payment-gateway-currencies-wrapper"></div>`,
  manual_gateway_input_fields: `<div class="row add-row-wrapper align-items-end">
  <input type="hidden" name="editable[]" value="1">
<div class="col-xl-3 col-lg-3 form-group">
  <label>Field Name*</label>
  <input type="text" class="form--control" placeholder="Type Here..." name="label[]" value="" required>
</div>
<div class="col-xl-2 col-lg-2 form-group">
    <label>Field Types*</label>
    <select class="form--control nice-select field-input-type" name="input_type[]">
        <option value="text" selected>Text</option>
        <option value="select">Select</option>
        <option value="file">File</option>
        <option value="textarea">Textarea</option>
        <option value="checkbox">Checkbox</option>
    </select>
</div>
<div class="field_type_input col-lg-4 col-xl-4">
</div>
<div class="col-xl-2 col-lg-2 form-group">
  <label for="fieldnecessity">Is required*</label>
  <select name="field_necessity[]" class="form--control">
      <option value="1" selected>Yes</option>
      <option value="0" selected>No</option>
  </select>
</div>
<div class="col-xl-1 col-lg-1 form-group">
    <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
</div>
</div>
`,
  kyc_input_fields: `<div class="row add-row-wrapper align-items-end">
<div class="col-xl-3 col-lg-3 form-group">
  <label>Field Name*</label>
  <input type="text" class="form--control" placeholder="Type Here..." name="label[]" value="" required>
</div>
<div class="col-xl-2 col-lg-2 form-group">
    <label>Field Types*</label>
    <select class="form--control nice-select field-input-type" name="input_type[]">
        <option value="text" selected>Input Text</option>
        <option value="file">File</option>
        <option value="select">Select</option>
        <option value="textarea">Textarea</option>
        <option value="checkbox">Checkbox</option>
    </select>
</div>
<div class="field_type_input col-lg-4 col-xl-4">
</div>
<div class="col-xl-2 col-lg-2 form-group">
  <label for="fieldnecessity">Field Necessity*</label>
  <div class="toggle-container">
    <div data-clickable="true" class="switch-toggles default two active">
      <input type="hidden" name="field_necessity[]" value="1">
      <span class="switch " data-value="1">Required</span>
      <span class="switch " data-value="0">Optional</span>
    </div>
  </div>
</div>
<div class="col-xl-1 col-lg-1 form-group">
    <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
</div>
</div>
`,
  manual_gateway_input_text_validation_field: `<div class="row">
<div class="col-xl-6 col-lg-6 form-group">
    <label>Min Character*</label>
    <input type="number" class="form--control" placeholder="ex: 6" name="min_char[]" value="0" required>
</div>
<div class="col-xl-6 col-lg-6 form-group">
    <label>Max Character*</label>
    <input type="number" class="form--control" placeholder="ex: 16" name="max_char[]" value="30" required>
</div>
</div>`,
  manual_gateway_input_file_validation_field: `<div class="row">
<div class="col-xl-6 col-lg-6 form-group">
  <label>Max File Size (mb)*</label>
  <input type="number" class="form--control" placeholder="ex: 10" name="file_max_size[]" value="10" required>
</div>
<div class="col-xl-6 col-lg-6 form-group">
  <label>File Extension*</label>
  <input type="text" class="form--control" placeholder="ex: jpg, png" name="file_extensions[]" value="" required>
</div>
</div>`,
  manual_gateway_select_validation_field: `<div class="row">
<div class="col-xl-12 col-lg-12 form-group">
<label>Options*</label>
<input type="text" class="form--control" placeholder="Type Here..." name="select_options[]" required>
</div>
</div>`,
  manual_gateway_checkbox_validation_field: `<div class="row">
<div class="col-xl-12 col-lg-12 form-group">
<label>Options*</label>
<input type="text" class="form--control" placeholder="Type Here..." name="checkboxes[]" required>
</div>
</div>`,
};

/**
 * Function for help to add new input field in manual payment gateway
 */
function inputFieldValidationRuleFieldsShow(element) {
  if ($(element).attr("data-show-db") != undefined) {
    return false;
  }
  var value = element.val();
  var validationFieldsPlaceElement = $(element).parents(".add-row-wrapper").find(".field_type_input");
  if (value == "text" || value == "textarea") {
    var textValidationFields = getHtmlMarkup().manual_gateway_input_text_validation_field;
    validationFieldsPlaceElement.html(textValidationFields);
  } else if (value == "file") {
    var textValidationFields = getHtmlMarkup().manual_gateway_input_file_validation_field;
    validationFieldsPlaceElement.html(textValidationFields);
    var select2Input = validationFieldsPlaceElement.find(".select2-auto-tokenize");
    $(select2Input).select2();
  } else if (value == "select") {
    var textValidationFields = getHtmlMarkup().manual_gateway_select_validation_field;
    validationFieldsPlaceElement.html(textValidationFields);
  }else if (value == "checkbox") {
    var textValidationFields = getHtmlMarkup().manual_gateway_checkbox_validation_field;
    validationFieldsPlaceElement.html(textValidationFields);
  }
  // Refresh all file extension input name
  var fileExtenionSelect = $(element).parents(".results").find(".add-row-wrapper").find(".file-ext-select");
  $.each(fileExtenionSelect, function (index, item) {
    var fileExtSelectFieldName = "file_extensions[" + index + "][]";
    $(item).attr("name", fileExtSelectFieldName);
  });
}

function getHtmlMarkup() {
  return storedHtmlMarkup;
}