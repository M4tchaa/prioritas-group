<?php include('layout/header.php'); ?>

<h2>Tambah Produk</h2>

<form method="POST" action="<?= base_url('product/save'); ?>">
    <div class="form-group">
        <label for="name">Nama Produk</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="price">Harga Produk</label>
        <input type="number" name="price" id="price" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="stock">Jumlah Stok</label>
        <input type="number" name="stock" id="stock" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="status">Status Produk</label>
        <select name="is_sell" id="status" class="form-control">
            <option value="1">Dijual</option>
            <option value="0">Tidak Dijual</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('product'); ?>" class="btn btn-secondary">Batal</a>
</form>

<?php include('layout/footer.php'); ?>