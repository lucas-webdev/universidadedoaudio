// import mentores from "./objects.js";
$(() => {
  [].forEach.call(document.querySelectorAll(".mentor-banner-navlink"), function(el) {
    el.addEventListener("click", function(e) {
      e.preventDefault();
      const anchor = $(this).attr("href");
      console.log(anchor);
      $(".mentor-banner-content").removeClass("active");
      $(anchor).addClass("active");
    });
  });
});
