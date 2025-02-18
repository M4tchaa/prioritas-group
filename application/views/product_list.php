<?php include('layout/header.php'); ?>

<h2>Data Produk</h2>

<!-- Tombol Tambah Produk -->
<a href="<?= base_url('product/add'); ?>" class="btn btn-primary mb-3">Tambah Produk</a>

<!-- Form Pencarian -->
<form method="GET" action="<?= base_url('product'); ?>" class="mb-3">
    <input type="text" name="search" placeholder="Cari Produk..." value="<?= isset($search) ? $search : ''; ?>">
    <button type="submit" class="btn btn-info">Cari</button>
</form>

<!-- Confirm Delete -->
<?php if ($this->session->flashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= $this->session->flashdata("success") ?>',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
<?php elseif ($this->session->flashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '<?= $this->session->flashdata("error") ?>',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
<?php endif; ?>


<!-- Tabel Data Produk -->
<table id="productTable" class="table table-striped">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?= $product['name']; ?></td>
                <td><?= number_format($product['price'], 0, ',', '.'); ?></td>
                <td><?= $product['stock']; ?></td>
                <td><?= $product['is_sell'] ? 'Dijual' : 'Tidak Dijual'; ?></td>
                <td>
                    <a href="<?= base_url('product/edit/' . $product['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm delete-product" data-id="<?= $product['id']; ?>">Hapus</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<!-- Pagination -->
<?= $this->pagination->create_links(); ?>

<!-- Konfirmasi Hapus (Popup) -->
<div id="delete-confirmation" class="modal">
    <div class="modal-content">
        <h4>Konfirmasi Hapus</h4>
        <p>Apakah Anda yakin ingin menghapus produk ini?</p>
        <button id="confirm-delete" class="btn btn-danger">Ya, Hapus</button>
        <button id="cancel-delete" class="btn btn-secondary">Batal</button>
    </div>
</div>
<?php include('layout/footer.php'); ?>