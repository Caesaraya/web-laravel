<div id="deleteModal" class="modal" style="display:none;">
    <div class="modal-content">
        <h3>Hapus Data</h3>

        <p>Yakin ingin menghapus data ini?</p>

        <form id="deleteForm" method="POST">
        <!-- Ini adalah formulir yang akan mengirimkan permintaan penghapusan. -->
            @csrf
        <!-- @csrf: Laravel Blade Directive untuk menyertakan token Cross-Site Request Forgery (CSRF) sebagai keamanan. -->
            @method('DELETE')
        <!-- Laravel Blade Directive yang menyamarkan (spoofing) permintaan POST menjadi permintaan -->
            <button type="button" onclick="closeDeleteModal()" class="btn btn-secondary">
                Batal
            </button>

            <button type="submit" class="btn btn-danger">
                Hapus
            </button>
        </form>
    </div>
</div>

<script>
    function openDeleteModal(id) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');

        form.action = "{{ route('admin.student.destroy', ':id') }}".replace(':id', id);
    //  route'admin.student.destroy', ':id : Ini adalah helper Laravel Blade yang menghasilkan URL lengkap untuk rute destroy Anda
    //  .replace(':id', id): Bagian ini menggantikan placeholder :id dengan ID data yang sebenarnya   
        modal.style.display = 'block';
    }   

    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }
</script>