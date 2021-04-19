                                    <div class="mb-3">
                                        <label class="form-label">Kode Kelas</label>
                                        <input type="text" name="kode_kelas" class="form-control" placeholder="Kode Kelas" value="{{ old('kode_kelas ') ?? $grade->kode_kelas }}">
                                        @error('kode_kelas')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Kelas</label>
                                        <input type="text" name="nama_kelas" class="form-control" placeholder="Kelas Jurusan" value="{{ old('nama_kelas ') ?? $grade->nama_kelas }}">
                                        @error('nama_kelas')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ $submit }}</button>
                                    <a href="{{ route('admin.grade') }}" class="btn btn-success">Kembali</a>