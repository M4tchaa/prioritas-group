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
            <th class="<?= ($sort_by == 'name') ? ($order == 'asc' ? 'asc' : 'desc') : 'default'; ?>">
                <a href="<?= base_url('product?sort_by=name&order=' . ($sort_by == 'name' && $order == 'asc' ? 'desc' : 'asc')) ?>">
                    Nama Produk 
                    <?php if ($sort_by == 'name') : ?>
                        <?php if ($order == 'asc') : ?>
                            <i class="fa-solid fa-sort-up"></i>
                        <?php else : ?>
                            <i class="fa-solid fa-sort-down"></i>
                        <?php endif; ?>
                    <?php else : ?>
                        <i class="fa-solid fa-sort"></i>
                    <?php endif; ?>
                </a>
            </th>
            <th class="<?= ($sort_by == 'price') ? ($order == 'asc' ? 'asc' : 'desc') : 'default'; ?>">
                <a href="<?= base_url('product?sort_by=price&order=' . ($sort_by == 'price' && $order == 'asc' ? 'desc' : 'asc')) ?>">
                    Harga
                    <?php if ($sort_by == 'price') : ?>
                        <?php if ($order == 'asc') : ?>
                            <i class="fa-solid fa-sort-up"></i>
                        <?php else : ?>
                            <i class="fa-solid fa-sort-down"></i>
                        <?php endif; ?>
                    <?php else : ?>
                        <i class="fa-solid fa-sort"></i>
                    <?php endif; ?>
                </a>
            </th>
            <th class="<?= ($sort_by == 'stock') ? ($order == 'asc' ? 'asc' : 'desc') : 'default'; ?>">
                <a href="<?= base_url('product?sort_by=stock&order=' . ($sort_by == 'stock' && $order == 'asc' ? 'desc' : 'asc')) ?>">
                    Stok
                    <?php if ($sort_by == 'stock') : ?>
                        <?php if ($order == 'asc') : ?>
                            <i class="fa-solid fa-sort-up"></i>
                        <?php else : ?>
                            <i class="fa-solid fa-sort-down"></i>
                        <?php endif; ?>
                    <?php else : ?>
                        <i class="fa-solid fa-sort"></i>
                    <?php endif; ?>
                </a>
            </th>
            <th class="<?= ($sort_by == 'is_sell') ? ($order == 'asc' ? 'asc' : 'desc') : 'default'; ?>">
                <a href="<?= base_url('product?sort_by=is_sell&order=' . ($sort_by == 'is_sell' && $order == 'asc' ? 'desc' : 'asc')) ?>">
                    Status
                    <?php if ($sort_by == 'is_sell') : ?>
                        <?php if ($order == 'asc') : ?>
                            <i class="fa-solid fa-sort-up"></i>
                        <?php else : ?>
                            <i class="fa-solid fa-sort-down"></i>
                        <?php endif; ?>
                    <?php else : ?>
                        <i class="fa-solid fa-sort"></i>
                    <?php endif; ?>
                </a>
            </th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?= $product['name']; ?></td>
                <td><?= number_format($product['price'], 0, ',', '.'); ?></td>
                <td><?= $product['stock']; ?></td>
                <td>
                    <select class="form-control status-dropdown" data-id="<?= $product['id']; ?>">
                        <option value="1" <?= $product['is_sell'] == 1 ? 'selected' : ''; ?>>Dijual</option>
                        <option value="0" <?= $product['is_sell'] == 0 ? 'selected' : ''; ?>>Tidak Dijual</option>
                    </select>
                </td>
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