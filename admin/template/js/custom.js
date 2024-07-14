$(document).ready(function () {
  $("#showPasswordCheckbox").on("change", function () {
    console.log(this.checked);
    var passwordField = $("#passwordField");
    passwordField.attr("type", this.checked ? "text" : "password");
  });

  $("#showPasswordconfirmCheckbox").on("change", function () {
    console.log(this.checked);
    var passwordField = $("#passwordconfirmField");
    passwordField.attr("type", this.checked ? "text" : "password");
  });
});

$(document).ready(function () {
  var $selectElement = $("#mySelect");

  // Xác định lớp cần thêm dựa trên giá trị của tùy chọn và thêm nó khi tùy chọn thay đổi
  $selectElement.on("change", function () {
    var selectedValue = $(this).val();

    // Xóa lớp CSS cũ
    $selectElement.removeClass();

    // Thêm lớp CSS mới
    if (selectedValue === "0") {
      $selectElement.addClass("form-control btn-warning btn");
    } else if (selectedValue === "1") {
      $selectElement.addClass("form-control btn-success btn");
    }
  });

  // Kích hoạt sự kiện change ban đầu để áp dụng lớp cho tùy chọn mặc định
  $selectElement.trigger("change");
});

$(document).ready(function () {
  // Lắng nghe sự kiện change trên input file
  $("#imageUpload").on("change", function (event) {
    // Kiểm tra xem có file được chọn hay không
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        // Cập nhật nguồn ảnh cho thẻ img
        $("#previewImage").attr("src", e.target.result);
        // Hiển thị thẻ img
        // $('#previewImage').css('display', 'block');
      };
      // Đọc dữ liệu của file được chọn
      reader.readAsDataURL(this.files[0]);
    }
  });
});

$(document).ready(function () {
  ClassicEditor.create($("#description")[0], {})
    .then((editor) => {
      window.editor = editor;
    })
    .catch((err) => {
      console.error(err.stack);
    });
});
$(document).ready(function () {
  function createSlug(text) {
    const from =
      "ÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬÉÈẺẼẸÊẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴáàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵđĐ";
    const to =
      "AAAAAAAAAAAAAAAAAEEEEEEEEEEEIIIIIOOOOOOOOOOOOOOOOOUUUUUUUUUUUYYYYYaaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyydD";

    const convertVietnamese = (str) => {
      let newStr = "";
      for (let i = 0; i < str.length; i++) {
        const index = from.indexOf(str[i]);
        if (index !== -1) {
          newStr += to[index];
        } else {
          newStr += str[i];
        }
      }
      return newStr;
    };

    let slug = convertVietnamese(text);
    slug = slug.toLowerCase();
    slug = slug
      .replace(/[^a-z0-9\s-]/g, "") // Loại bỏ ký tự không phải là chữ cái, số, khoảng trắng và dấu gạch ngang
      .replace(/\s+/g, "-") // Thay thế khoảng trắng bằng dấu gạch ngang
      .replace(/-+/g, "-") // Thay thế nhiều dấu gạch ngang liên tiếp bằng một dấu gạch ngang
      .replace(/^-+|-+$/g, ""); // Loại bỏ dấu gạch ngang ở đầu và cuối chuỗi

    return slug;
  }

  const labelElement2 = $("#slugLabel");

  $("#title").on("input", function () {
    const title = $(this).val();
    const slug = createSlug(title);
    $("#slugInput").val(slug);
    labelElement2.text("Đường dẫn mẫu: localhost/" + slug);
  });

  // Lấy thẻ input và thẻ label bằng ID
  const inputElement = $("#slugInput");
  const labelElement = $("#slugLabel");

  // Thêm sự kiện lắng nghe khi có sự thay đổi trong thẻ input
  inputElement.on("input", function () {
    // Lấy giá trị hiện tại của thẻ input
    const inputValue = inputElement.val();

    // Cập nhật nội dung của thẻ label
    labelElement.text("Đường dẫn mẫu: localhost/mystore/" + inputValue);
  });
});
