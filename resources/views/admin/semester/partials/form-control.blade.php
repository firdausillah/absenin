                                    <div class="mb-3">
                                        <label class="form-label">Tahun Pelajaran</label>
                                        <input type="text" name="tahun_pelajaran" class="form-control" placeholder="contoh: 2021-2022" value="{{ old('tahun_pelajaran ') ?? $semester->tahun_pelajaran }}">
                                        @error('tahun_pelajaran')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Semester</label>
                                        <select name="semester" id="semester" class="form-control" >
                                            <option value="Ganjil" <?= old('semester') ?? $semester->semester == 'Ganjil' ? 'selected' : '' ?> >Ganjil</option>
                                            <option value="Genap" <?= old('semester') ?? $semester->semester == 'Genap' ? 'selected' : '' ?> >Genap</option>
                                        </select>
                                        @error('semester')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ $submit }}</button>
                                    <a href="{{ route('admin.semester') }}" class="btn btn-success">Kembali</a>