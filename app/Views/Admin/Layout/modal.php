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

<!-- Add this modal for editing user information -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn btn-secondary btn-danger" id="userEditCloseBtn" style="float: right">Close</button>
            </div>
            <form id="editUserForm">
              <div class="modal-body">
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="editUserId" name="editUserId">
                    <label for="editUsername">Username</label>
                    <input type="text" class="form-control" id="editUsername" name="editUsername" placeholder="Masukkan username" required>
                  </div>
                  <div class="form-group">
                    <label for="editFullName">Full Name</label>
                      <input placeholder="Masukkan nama lengkap" type="text" class="form-control" id="editFullName" name="editFullName">
                    </div>
                    <div class="form-group">
                      <label for="editTTL">TTL</label>
                      <input type="date" placeholder="Masukkan tanggal lahir" class="form-control" id="editTTL" name="editTTL">
                    </div>
                    <div class="form-group">
                      <label for="editNIS">NIS/NIP</label>
                      <input type="text" class="form-control" placeholder="Masukkan NIS/ NIP" id="editNIS" name="editNIS">
                    </div>
                    <div class="form-group">
                      <label for="editBapak">Bapak</label>
                      <input type="text" placeholder="Masukkan nama bapak" class="form-control" id="editBapak" name="editBapak">
                    </div>
                    <div class="form-group">
                      <label for="editIbu">Ibu</label>
                      <input type="text" class="form-control" placeholder="Masukkan nama ibu" id="editIbu" name="editIbu">
                    </div>
                    <div class="form-group">
                      <label for="editKelas">Kelas</label>
                      <select class="form-control" id="editKelas" name="editKelas">
                        <option value="null">--Pilih Kelas--</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="editRole">Status</label>
                      <select class="form-control" id="editRole" name="editRole" required>
                        <option value="">--Pilih Status Pengguna--</option>
                        <option value="0">Siswa</option>
                        <option value="1">Guru</option>
                      </select>
                    </div>
                  </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="editUserButton">Edit User</button>
                </div>
            </form>
        </div>
    </div>
</div>
