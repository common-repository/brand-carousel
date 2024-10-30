jQuery(document).ready(function ($) {
  $(".responsive-brand-carousel").slick({
    dots: rbcs_option_data.dots === "yes" ? true : false,
    autoplay: rbcs_option_data.auto_slide === "yes" ? true : false,
    speed: 300,
    slidesToShow: rbcs_option_data.how_many_brand,
    slidesToScroll: 1,
    prevArrow:
      rbcs_option_data.activate_arrows === "yes"
        ? "<div class='rbcs-left-arrow'><span>&#8592;</span></div>"
        : "",
    nextArrow:
      rbcs_option_data.activate_arrows === "yes"
        ? "<div class='rbcs-right-arrow'><span>&#8594;</span></div>"
        : "",

    responsive: [
      {
        breakpoint: 1440,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 1,
          dots: rbcs_option_data.dots === "yes" ? true : false,
          autoplay: rbcs_option_data.auto_slide === "yes" ? true : false,
          speed: 300,
          prevArrow:
            rbcs_option_data.activate_arrows === "yes"
              ? "<div class='rbcs-left-arrow'><span>&#8592;</span></div>"
              : "",
          nextArrow:
            rbcs_option_data.activate_arrows === "yes"
              ? "<div class='rbcs-right-arrow'><span>&#8594;</span></div>"
              : "",
        },
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          dots: rbcs_option_data.dots === "yes" ? true : false,
          autoplay: rbcs_option_data.auto_slide === "yes" ? true : false,
          speed: 300,
          prevArrow:
            rbcs_option_data.activate_arrows === "yes"
              ? "<div class='rbcs-left-arrow'><span>&#8592;</span></div>"
              : "",
          nextArrow:
            rbcs_option_data.activate_arrows === "yes"
              ? "<div class='rbcs-right-arrow'><span>&#8594;</span></div>"
              : "",
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          dots: rbcs_option_data.dots === "yes" ? true : false,
          infinite: rbcs_option_data.auto_slide === "yes" ? true : false,
          autoplay: rbcs_option_data.auto_slide === "yes" ? true : false,
          speed: 300,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
          infinite: true,
          autoplay: false,
          speed: 300,
        },
      },
    ],
  });
});
