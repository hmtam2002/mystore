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
