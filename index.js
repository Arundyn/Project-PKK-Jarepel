const scrollToTopButton = document.getElementById("scrollToTop");

if (scrollToTopButton) {
  window.addEventListener("scroll", () => {
    scrollToTopButton.classList.toggle("show", window.scrollY > 100);
  });

  scrollToTopButton.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
}

function sendToWhatsApp(element) {
  let phoneNumber = "6285711416024";

  let categoryContent = element.closest(".product-text");
  let productName = categoryContent.querySelector(".product-title").innerText;
  let waMessage = `Hi, Jarepel. Bisa bantu saya? %0A Saya ingin memesan ${productName}`;
  let waUrl = `https://wa.me/${phoneNumber}?text=${waMessage}`;

  window.open(waUrl, "_blank");
}

// Observer dengan logika ulangi animasi ketika elemen keluar lalu masuk lagi
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    } else {
      entry.target.classList.remove('visible');
    }
  });
}, {
  threshold: 0.3
});

// Terapkan ke semua item dengan animasi
document.querySelectorAll('.slide-in').forEach(el => observer.observe(el));

//comment section
document.addEventListener("DOMContentLoaded", function() {
  loadComments();

  document.getElementById("commentForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const username = document.getElementById("username").value.trim();
    const comment = document.getElementById("comment").value.trim();

    if (username && comment) {
      fetch("save_comment.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `username=${encodeURIComponent(username)}&comment=${encodeURIComponent(comment)}`
      })
      .then(res => res.text())
      .then(() => {
        document.getElementById("commentForm").reset();
        loadComments();
      });
    }
  });

  function loadComments() {
    fetch("get_comments.php")
      .then(res => res.json())
      .then(data => {
        const container = document.getElementById("commentsContainer");
        container.innerHTML = "";
        data.forEach(item => {
          container.innerHTML += `
            <div class="testimonial-item">
              <p>"${item.comment}"</p>
              <span>- ${item.username}</span><br>
              <small>${item.created_at}</small>
            </div>
          `;
        });
      });
  }
});

//komen animasi
function animateCommentsOnScroll() {
  const items = document.querySelectorAll(".testimonial-item");
  const triggerBottom = window.innerHeight * 0.9;

  items.forEach(item => {
    const boxTop = item.getBoundingClientRect().top;
    if (boxTop < triggerBottom) {
      item.classList.add("animate");
    } else {
      item.classList.remove("animate");
    }
  });
}

window.addEventListener("scroll", animateCommentsOnScroll);
window.addEventListener("load", animateCommentsOnScroll);