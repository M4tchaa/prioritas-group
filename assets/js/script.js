document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".delete-product").forEach(button => {
        button.addEventListener("click", function() {
            let productId = this.getAttribute("data-id");

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
                    window.location.href = "product/delete/" + productId;
                }
            });
        });
    });
});