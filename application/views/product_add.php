<?php 
    include('layout/header.php');
    include('errors/flash_session.php');
?>

<h2 class="my-4">Tambah Produk</h2>

<form method="POST" action="<?= base_url('product/save'); ?>" class="container">
    <!-- Nama Produk -->
    <div class="row mb-3">
        <label for="name" class="col-sm-3 col-form-label">Nama Produk</label>
        <div class="col-sm-9">
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
    </div>

    <!-- Harga Produk -->
    <div class="row mb-3">
        <label for="price" class="col-sm-3 col-form-label">Harga Produk</label>
        <div class="col-sm-9">
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
    </div>

    <!-- Jumlah Stok -->
    <div class="row mb-3">
        <label for="stock" class="col-sm-3 col-form-label">Jumlah Stok</label>
        <div class="col-sm-9">
            <input type="number" name="stock" id="stock" class="form-control" required>
        </div>
    </div>

    <!-- Status Produk -->
    <div class="row mb-3">
        <label for="status" class="col-sm-3 col-form-label">Status Produk</label>
        <div class="col-sm-9">
            <select name="is_sell" id="status" class="form-select">
                <option value="1">Dijual</option>
                <option value="0">Tidak Dijual</option>
            </select>
        </div>
    </div>

    <!-- Tombol di Kiri -->
    <div class="row">
        <div class="col-sm-9 offset-sm-3">
            <button type="submit" class="btn btn-success me-2">Simpan</button>
            <a href="<?= base_url('product'); ?>" class="btn btn-secondary me-2">Batal</a>
        </div>
    </div>
</form>

<?php include('layout/footer.php'); ?>
