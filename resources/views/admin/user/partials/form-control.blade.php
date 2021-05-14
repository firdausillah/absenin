                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nama User</label>
                            <input type="text" name="name" value="{{ old('name') ?? $user->name }}" class="form-control" placeholder="Nama User">
                            @error('name')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Level</label>
                            <select class="form-control" name="role" id="role">
                                <option value="admin"{{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="admin"{{ $user->role == 'admin' ? 'selected' : '' }}>Kepala Sekolah</option>
                                <option value="guru"{{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                                <option value="siswa"{{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                            </select>
                            @error('role')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputUsername">Username</label>
                            <input type="text" name="username" value="{{ old('username') ?? $user->username }}" class="form-control" id="inputUsername" placeholder="Username" pattern="[a-zA-Z0-9]+" required oninvalid="this.setCustomValidity('Input hanya boleh huruf a-z tanpa spasi!')">
                            @error('username')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword">Password</label>
                            <a href="#" onclick="defaultPasword()" class="badge bg-danger" data-toggle="tooltip" data-placement="bottom" title="Default : 123">Default</a>
                            <input type="password" name="password" value="{{ old('password') ?? $user->password }}" class="form-control" id="inputPassword" placeholder="Password">
                            @error('password')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $submit }}</button>
                    <a href="{{ route('admin.data.user') }}" class="btn btn-success">Kembali</a>

                    @push('js')
                        <script>
                            function defaultPasword() {
                            document.getElementById("inputPassword").value = "123";
                            }
                        </script>
                    @endpush