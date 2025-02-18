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
