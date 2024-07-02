// hover giỏ hàng
$(document).ready(function () {
  const cartIcon = $(".container-cart");
  const miniCart = $(".mini-cart");

  cartIcon.mouseenter(function () {
    miniCart.css("display", "block");
  });

  cartIcon.mouseleave(function () {
    miniCart.css("display", "none");
  });

  miniCart.mouseenter(function () {
    miniCart.css("display", "block");
  });

  miniCart.mouseleave(function () {
    miniCart.css("display", "none");
  });
});

// slick slideshow
$(document).ready(function () {
  $(".slick-slider").slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: "linear",
  });
  $(".vanphongpham").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 700,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $(".slick-partner").slick({
    infinite: false,
    slidesToShow: 5,
    slidesToScroll: 5,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
        },
      },
      {
        breakpoint: 700,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
    ],
  });
});

// giỏ hàng
$(document).ready(function () {
  // Update product quantity in the session via AJAX
  function updateQuantity(input) {
    var quantity = input.val();
    var productId = input.data("id");
    $.ajax({
      url: "", // Send request to the current file
      method: "POST",
      data: {
        id: productId,
        quantity: quantity,
      },
      success: function (response) {
        console.log("Session updated successfully for product " + productId);
      },
      error: function () {
        console.log("Error updating session for product " + productId);
      },
    });
  }

  // Calculate and format number with thousands separator
  function formatNumber(amount) {
    let parts = amount.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(".");
  }

  // Calculate total price of selected products
  function calculateTotal() {
    let total = 0;
    $(".product_check:checked").each(function () {
      let productRow = $(this).closest(".row");
      let quantity = parseInt(productRow.find(".quantity-input").val());
      let price = parseFloat(
        productRow.find(".price span.fw-bold").text().replace(/\D/g, "")
      );
      total += quantity * price;
    });
    $("#total-amount").text(formatNumber(total) + " đ");
    $("#total-amount-before").text(formatNumber(total) + " đ");
  }

  // Update product total price based on quantity
  function updateProductTotal(productRow) {
    let quantity = parseInt(productRow.find(".quantity-input").val());
    let price = parseFloat(
      productRow.find(".price span.fw-bold").text().replace(/\D/g, "")
    );
    let totalPrice = quantity * price;
    productRow
      .find(".fw-bold.text-danger")
      .text(formatNumber(totalPrice) + " đ");
  }

  // Check trạng thái của các checkbox và cập nhật nút "Thanh toán"
  function updateCheckoutButton() {
    if ($(".product_check:checked").length > 0) {
      $("#checkout-btn").prop("disabled", false);
    } else {
      $("#checkout-btn").prop("disabled", true);
    }
  }

  // Checkbox event handler
  $('input[name="checkAll"]').change(function () {
    $(".product_check").prop("checked", $(this).prop("checked"));
    calculateTotal();
    updateCheckoutButton();
  });

  $(".product_check").change(function () {
    calculateTotal();
    updateCheckoutButton();
  });

  // Quantity input event handler
  $('input[type="number"]').on("input", function () {
    let productRow = $(this).closest(".row");
    updateQuantity($(this));
    updateProductTotal(productRow);
    calculateTotal();
    updateCheckoutButton();
  });

  // Increase and decrease buttons event handler
  $(".quantity-controls button").on("click", function () {
    let input = $(this).siblings('input[type="number"]');
    let currentVal = parseInt(input.val());
    if ($(this).hasClass("increase")) {
      input.val(currentVal + 1).trigger("input");
    } else if ($(this).hasClass("decrease") && currentVal > 1) {
      input.val(currentVal - 1).trigger("input");
    }
  });

  // Xoá sản phẩm khỏi giỏ hàng
  $(".btn-delete").click(function () {
    let productId = $(this).data("id");
    $.post(
      "",
      {
        action: "delete",
        id: productId,
      },
      function (response) {
        let result = JSON.parse(response);
        if (result.status === "success") {
          location.reload();
        } else {
          alert(result.message);
        }
      }
    );
  });

  // Initialize total amount to 0
  $("#total-amount").text("0 đ");
  $("#total-amount-before").text("0 đ");
  updateCheckoutButton();
});

// trang thanh toán
$(document).ready(function () {
  $("#ghichu").change(function () {
    if ($(this).is(":checked")) {
      $("#nhapghichu").prop("required", true);
      $("#ghichuContainer").removeClass("d-none");
    } else {
      $("#nhapghichu").prop("required", false);
      $("#ghichuContainer").addClass("d-none");
    }
  });

  $("#gtgt").change(function () {
    if ($(this).is(":checked")) {
      $("#nhaphoten").prop("required", true);
      $("#nhaptencongty").prop("required", true);
      $("#nhapdiachi").prop("required", true);
      $("#nhaphomasothue").prop("required", true);
      $("#emailnhanhoadon").prop("required", true);
      $("#xuathoadon").removeClass("d-none");
    } else {
      $("#nhaphoten").prop("required", false);
      $("#nhaptencongty").prop("required", false);
      $("#nhapdiachi").prop("required", false);
      $("#nhaphomasothue").prop("required", false);
      $("#emailnhanhoadon").prop("required", false);
      $("#xuathoadon").addClass("d-none");
    }
  });
});

$(document).ready(function () {
  $("#tinh").select2({
    placeholder: {
      id: "-1", // the value of the option
      text: "Chọn tỉnh, thành phố",
    },
  });
  $("#huyen").select2({
    placeholder: {
      id: "-1", // the value of the option
      text: "Chọn quận, huyện",
    },
  });
  $("#xa").select2({
    placeholder: {
      id: "-1", // the value of the option
      text: "Chọn xã, phường, thị trấn",
    },
  });
});
