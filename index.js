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
  const phoneNumber = "6285711416024";

  // Temukan container produk terdekat dari tombol yang diklik
  const categoryContent = element.closest(".product-text");

  // Ambil elemen nama produk
  const productName = categoryContent.querySelector(".product-title").innerText;

  // Ambil input jumlah dari dalam container
  const qtyInput = categoryContent.querySelector(".qty-input");
  const jumlah = qtyInput.value;

  // Buat pesan WhatsApp
  const waMessage = `Hi, Jarepel. Bisa bantu saya? %0A Saya ingin memesan ${productName} dengan jumlah ${jumlah}`;

  // Buat URL dan buka WhatsApp
  const waUrl = `https://wa.me/${phoneNumber}?text=${waMessage}`;
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

function toggleKeranjang() {
        const keranjang = document.getElementById("keranjang");
        keranjang.style.display = keranjang.style.display === "none" ? "block" : "none";
        renderKeranjang();
    }

    function addToCart(id, nama, harga, buttonElement) {
        const qtyInput = buttonElement.previousElementSibling;
        const jumlah = parseInt(qtyInput.value);

        if (jumlah <= 0) {
            alert("Jumlah harus lebih dari 0");
            return;
        }

        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        // Cek apakah item sudah ada di cart
        const existingItem = cart.find(item => item.id === id);
        if (existingItem) {
            existingItem.jumlah += jumlah;
        } else {
            cart.push({ id, nama, harga, jumlah });
        }

        localStorage.setItem("cart", JSON.stringify(cart));
        alert("Produk ditambahkan ke keranjang!");
        renderKeranjang();
    }

    function renderKeranjang() {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        const keranjangDiv = document.getElementById("keranjang");

        if (cart.length === 0) {
            keranjangDiv.innerHTML = "<p>Keranjang kosong.</p>";
            return;
        }

        let total = 0;
        let html = "<h3>Keranjang Anda</h3><ul>";
        cart.forEach((item, index) => {
            const subtotal = item.harga * item.jumlah;
            total += subtotal;
            html += `
                <li>
                    ${item.nama} (${item.jumlah}) - Rp ${subtotal.toLocaleString()}
                    <button onclick="hapusItem(${index})">❌</button>
                </li>
            `;
        });
        html += `</ul><p><strong>Total: Rp ${total.toLocaleString()}</strong></p>`;
        html += `<button onclick="checkout()">Checkout</button>`;

        keranjangDiv.innerHTML = html;
    }

    function hapusItem(index) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        cart.splice(index, 1);
        localStorage.setItem("cart", JSON.stringify(cart));
        renderKeranjang();
    }

    function checkout() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    if (cart.length === 0) {
        alert("Keranjang kosong!");
        return;
    }

    // Simpan cart ke sessionStorage dan redirect
    sessionStorage.setItem("cart", JSON.stringify(cart));
    window.location.href = "bayar.php";
}
    // Render keranjang saat halaman dimuat
    document.addEventListener("DOMContentLoaded", renderKeranjang); 