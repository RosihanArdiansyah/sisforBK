<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
        <button type="button" class="btn btn-secondary btn-danger" id="userCloseBtn" style="float: right">Close</button>
      </div>
      <form id="createUserForm">
        <div class="modal-body">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
          </div>
          <div class="form-group">
            <label for="fullName">Full Name</label>
            <input placeholder="Masukkan nama lengkap" type="text" class="form-control" id="fullName" name="fullName">
          </div>
          <div class="form-group">
            <label for="TTL">TTL</label>
            <input type="date" placeholder="Masukkan tanggal lahir" class="form-control" id="TTL" name="TTL">
          </div>
          <div class="form-group">
            <label for="NIS">NIS/NIP</label>
            <input type="text" class="form-control" placeholder="Masukkan NIS/ NIP" id="NIS" name="NIS">
          </div>
          <div class="form-group">
            <label for="Bapak">Bapak</label>
            <input type="text" placeholder="Masukkan nama bapak" class="form-control" id="Bapak" name="Bapak">
          </div>
          <div class="form-group">
            <label for="Ibu">Ibu</label>
            <input type="text" class="form-control" placeholder="Masukkan nama ibu" id="Ibu" name="Ibu">
          </div>
          <div class="form-group">
            <label for="Kelas">Kelas</label>
            <select class="form-control" id="Kelas" name="Kelas">
              <option value="null">--Pilih Kelas--</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Role">Status</label>
            <select class="form-control" id="Role" name="Role" required>
              <option value="">--Pilih Status Pengguna--</option>
              <option value="0">Siswa</option>
              <option value="1">Guru</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="createUserButton">Create User</button>
        </div>
      </form>
    </div>
  </div>
</div>
