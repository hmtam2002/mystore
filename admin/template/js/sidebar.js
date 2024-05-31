// phiên bản này lưu cả cuộn nha
document.addEventListener("DOMContentLoaded", function () {
  const arrows = document.querySelectorAll(".arrow");
  const sidebar = document.getElementById("sidebar");

  // Tạm thời vô hiệu hóa chuyển tiếp trên các mũi tên
  arrows.forEach((arrow) => (arrow.style.transition = "none"));

  document.querySelectorAll(".collapse").forEach((collapse) => {
    // Set initial state from localStorage
    const state = localStorage.getItem(collapse.id);
    if (state === "shown") {
      collapse.classList.add("show");
      const arrow = document.querySelector(`a[href="#${collapse.id}"] .arrow`);
      if (arrow) {
        arrow.classList.add("rotated");
      }
    } else {
      collapse.classList.remove("show");
      const arrow = document.querySelector(`a[href="#${collapse.id}"] .arrow`);
      if (arrow) {
        arrow.classList.remove("rotated");
      }
    }

    collapse.addEventListener("shown.bs.collapse", function () {
      const arrow = document.querySelector(`a[href="#${this.id}"] .arrow`);
      if (arrow) {
        arrow.classList.add("rotated");
      }
      localStorage.setItem(this.id, "shown");
    });

    collapse.addEventListener("hidden.bs.collapse", function () {
      const arrow = document.querySelector(`a[href="#${this.id}"] .arrow`);
      if (arrow) {
        arrow.classList.remove("rotated");
      }
      localStorage.setItem(this.id, "hidden");
    });
  });

  // Sau khi thiết lập trạng thái ban đầu, bật lại chuyển tiếp
  setTimeout(() => {
    arrows.forEach((arrow) => (arrow.style.transition = "0.3s"));
  }, 0);

  // Lưu trạng thái cuộn của menu
  sidebar.addEventListener("scroll", function () {
    localStorage.setItem("sidebarScrollPosition", sidebar.scrollTop);
  });

  // Khôi phục trạng thái cuộn của menu
  const scrollPosition = localStorage.getItem("sidebarScrollPosition");
  if (scrollPosition !== null) {
    sidebar.scrollTop = scrollPosition;
  }
});
