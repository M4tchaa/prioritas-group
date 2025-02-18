<!-- Success or Error Alerts -->
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