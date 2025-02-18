var base_url = "localhost/prioritas/";

// Confirm Delete
document.addEventListener("DOMContentLoaded", function () {
    document.body.addEventListener("click", function (event) {
        let button = event.target.closest(".delete-product, .delete-edit-product");
        if (!button) return;

        event.preventDefault();

        let url = button.classList.contains("delete-product")
            ? "product/delete/" + button.getAttribute("data-id")
            : button.getAttribute("href"); 

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Produk yang dihapus tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
});

//Ajax Status Update di Tabvle
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".status-dropdown").forEach(select => {
        select.addEventListener("change", function() {
            let productId = this.getAttribute("data-id");
            let newStatus = this.value;

            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin mengubah status produk?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Ubah!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("product/update_status", {
                        method: "POST",
                        headers: { "Content-Type": "application/x-www-form-urlencoded" },
                        body: "id=" + productId + "&status=" + newStatus
                    })
                    .then(response => response.json())
                    .then(data => {
                        // console.log(data);
                        if (data.success) {
                            Swal.fire("Berhasil!", "Status produk telah diperbarui.", "success");
                        } else {
                            Swal.fire("Gagal!", "Terjadi kesalahan saat memperbarui status.", "error");
                        }
                    });
                } else {
                    this.value = this.getAttribute("data-prev-value");
                }
            });

            this.setAttribute("data-prev-value", newStatus);
        });
    });
});