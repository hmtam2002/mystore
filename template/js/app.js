// $(document).ready(function () {
//   // Lấy phần tử biểu tượng giỏ hàng và mini cart
//   const cartIcon = $(".container-cart");
//   const miniCart = $(".mini-cart");

//   // Sự kiện khi đưa chuột vào biểu tượng giỏ hàng
//   cartIcon.mouseenter(function () {
//     miniCart.css("display", "block");
//   });

//   // Sự kiện khi chuột rời khỏi biểu tượng giỏ hàng
//   cartIcon.mouseleave(function () {
//     miniCart.css("display", "none");
//   });

//   // Sự kiện khi đưa chuột vào mini cart
//   miniCart.mouseenter(function () {
//     miniCart.css("display", "block");
//   });

//   // Sự kiện khi chuột rời khỏi mini cart
//   miniCart.mouseleave(function () {
//     miniCart.css("display", "none");
//   });
// });

$(document).ready(function () {
  // $(".slider").slick({
  //   autoplay: true,
  //   autoplaySpeed: 2000, // Tự động chuyển slide sau mỗi 2 giây
  //   dots: true, // Hiển thị chấm chỉ mục
  //   arrows: true, // Hiển thị mũi tên điều hướng
  // });
  $(".slider").slick();
});
