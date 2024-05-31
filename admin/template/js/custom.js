document
  .getElementById("showPasswordCheckbox")
  .addEventListener("change", function () {
    console.log(this.checked);
    var passwordField = document.getElementById("passwordField");
    passwordField.type = this.checked ? "text" : "password";
  });
document
  .getElementById("showPasswordconfirmCheckbox")
  .addEventListener("change", function () {
    console.log(this.checked);
    var passwordField = document.getElementById("passwordconfirmField");
    passwordField.type = this.checked ? "text" : "password";
  });

document.addEventListener("DOMContentLoaded", function () {
  var selectElement = document.getElementById("mySelect");

  // Xác định lớp cần thêm dựa trên giá trị của tùy chọn và thêm nó khi tùy chọn thay đổi
  selectElement.addEventListener("change", function () {
    var selectedOption = this.options[this.selectedIndex];
    var selectedValue = selectedOption.value;

    // Xóa lớp CSS cũ
    selectElement.className = "";

    // Thêm lớp CSS mới
    if (selectedValue === "0") {
      selectElement.classList.add("form-control");
      selectElement.classList.add("btn-warning");
      selectElement.classList.add("btn");
    } else if (selectedValue === "1") {
      selectElement.classList.add("form-control");
      selectElement.classList.add("btn-success");
      selectElement.classList.add("btn");
    }
  });

  // Kích hoạt sự kiện change ban đầu để áp dụng lớp cho tùy chọn mặc định
  selectElement.dispatchEvent(new Event("change"));
});

document.addEventListener("DOMContentLoaded", function () {
  // Lắng nghe sự kiện change trên input file
  document
    .getElementById("imageUpload")
    .addEventListener("change", function (event) {
      // Kiểm tra xem có file được chọn hay không
      if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          // Cập nhật nguồn ảnh cho thẻ img
          document.getElementById("previewImage").src = e.target.result;
          // Hiển thị thẻ img
          // document.getElementById('previewImage').style.display = 'block';
        };
        // Đọc dữ liệu của file được chọn
        reader.readAsDataURL(this.files[0]);
      }
    });
});

ClassicEditor.create(document.querySelector("#description"), {})
  .then((editor) => {
    window.editor = editor;
  })
  .catch((err) => {
    console.error(err.stack);
  });

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
const labelElement2 = document.getElementById("slugLabel");

document.getElementById("title").addEventListener("input", function () {
  const title = this.value;
  const slug = createSlug(title);
  document.getElementById("slugInput").value = slug;
  labelElement2.textContent = "Đường dẫn mẫu: <?= _HOST ?>" + slug;
});

// Lấy thẻ input và thẻ label bằng ID
const inputElement = document.getElementById("slugInput");
const labelElement = document.getElementById("slugLabel");

// Thêm sự kiện lắng nghe khi có sự thay đổi trong thẻ input
inputElement.addEventListener("input", function () {
  // Lấy giá trị hiện tại của thẻ input
  const inputValue = inputElement.value;

  // Cập nhật nội dung của thẻ label
  labelElement.textContent = "Đường dẫn mẫu: localhost/mystore/" + inputValue;
});
