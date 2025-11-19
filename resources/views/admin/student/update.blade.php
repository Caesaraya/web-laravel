<style>
    /* Modal dasar (copy dari modal tambah agar konsisten) */
    #updateModal {
        display: none;
        position: fixed;
        z-index: 999;
        padding-top: 80px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    #updateModal .modal-content {
        background-color: #fff;
        padding: 20px;
        margin: auto;
        width: 40%;
        border-radius: 10px;
    }

    #updateModal .closeUpdate {
        float: right;
        font-size: 28px;
        cursor: pointer;
    }
</style>


<!-- ===================== MODAL UPDATE ===================== -->
<div id="updateModal">
    <div class="modal-content">

        <span class="closeUpdate" onclick="closeUpdateModal()">&times;</span>
    <!-- Tombol silang. onclick memanggil fungsi JavaScript untuk menutup modal. -->
        <h3 style="text-align:center;">Edit Data Student</h3>

        <form id="updateForm" method="POST">
        <!-- Formulir ini akan mengirim data dengan metode POST. ID-nya (updateForm) digunakan JavaScript untuk mengatur URL action secara dinamis. -->
            @csrf
        <!-- Laravel Blade Directive: Menyertakan token keamanan CSRF. -->
            @method('PUT')
        <!-- Ini adalah method spoofing. Ia memberitahu Laravel bahwa meskipun formulir dikirim menggunakan POST, ia harus diperlakukan sebagai permintaan PUT atau PATCH -->
            <label>Nama</label>
            <input type="text" id="update_name" name="name" required>

            <label>Email</label>
            <input type="email" id="update_email" name="email" required>

            <label>Alamat</label>
            <input type="text" id="update_address" name="address" required>

            <label>Tanggal Lahir</label>
            <input type="date" id="update_birthday" name="birthday" required>

            <label>Kelas</label>
            <select id="update_classroom_id" name="classroom_id" required>
                @foreach (\App\Models\Classroom::all() as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
        <!-- Blade Loop: Mengambil semua data kelas dari database secara real-time dan membuat opsi <option> agar Admin dapat memilih kelas baru. -->
            </select>

            <div style="text-align:center; margin-top:15px;">
                <button type="submit" class="btn-simpan">Update</button>
            </div>

        </form>
    </div>
</div>