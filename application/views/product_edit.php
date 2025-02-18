<?php 
    include('layout/header.php');
    include('errors/flash_session.php');
?>
<!-- Page Title -->
<h2 class="my-4 text-center">Edit Produk</h2>

<!-- Edit Product Form -->
<form method="POST" action="<?= base_url('product/update/'.$product['id']); ?>" class="container">
    <div class="row mb-3">
        <label for="name" class="col-sm-3 col-form-label">Nama Produk</label>
        <div class="col-sm-9">
            <input type="text" name="name" id="name" class="form-control" value="<?= $product['name']; ?>" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="price" class="col-sm-3 col-form-label">Harga Produk</label>
        <div class="col-sm-9">
            <input type="number" name="price" id="price" class="form-control" value="<?= $product['price']; ?>" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="stock" class="col-sm-3 col-form-label">Jumlah Stok</label>
        <div class="col-sm-9">
            <input type="number" name="stock" id="stock" class="form-control" value="<?= $product['stock']; ?>" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="status" class="col-sm-3 col-form-label">Status Produk</label>
        <div class="col-sm-9">
            <select name="is_sell" id="status" class="form-select">
                <option value="1" <?= $product['is_sell'] == 1 ? 'selected' : ''; ?>>Dijual</option>
                <option value="0" <?= $product['is_sell'] == 0 ? 'selected' : ''; ?>>Tidak Dijual</option>
            </select>
        </div>
    </div>

    <!-- Button Group -->
    <div class="row">
        <div class="col-sm-9 offset-sm-3">
            <button type="submit" class="btn btn-success me-2">Simpan Perubahan</button>
            <a href="<?= base_url('product'); ?>" class="btn btn-secondary me-2">Batal</a>
            <a href="<?= base_url('product/delete/'.$product['id']); ?>" class="btn btn-danger delete-edit-product" data-id="<?= $product['id']; ?>">Hapus Produk</a>
        </div>
    </div>
</form>

<?php include('layout/footer.php'); ?>
