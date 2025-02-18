<?php include('layout/header.php'); ?>

<h2>Edit Produk</h2>

<form method="POST" action="<?= base_url('product/update/'.$product['id']); ?>">
    <div class="form-group">
        <label for="name">Nama Produk</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $product['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="price">Harga Produk</label>
        <input type="number" name="price" id="price" class="form-control" value="<?= $product['price']; ?>" required>
    </div>
    <div class="form-group">
        <label for="stock">Jumlah Stok</label>
        <input type="number" name="stock" id="stock" class="form-control" value="<?= $product['stock']; ?>" required>
    </div>
    <div class="form-group">
        <label for="status">Status Produk</label>
        <select name="is_sell" id="status" class="form-control">
            <option value="1" <?= $product['is_sell'] == 1 ? 'selected' : ''; ?>>Dijual</option>
            <option value="0" <?= $product['is_sell'] == 0 ? 'selected' : ''; ?>>Tidak Dijual</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    <a href="<?= base_url('product'); ?>" class="btn btn-secondary">Batal</a>
    <a href="<?= base_url('product/delete/'.$product['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus Produk</a>
</form>
<?php include('layout/footer.php'); ?>