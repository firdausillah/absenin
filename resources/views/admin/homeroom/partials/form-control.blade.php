                                    <div class="mb-3">
                                        <label class="form-label">Semester</label>
                                            @if ($submit == 'update')
                                            <select name="semester_id" class="form-control">
                                                <option value="">-- Pilih Disini --</option>
                                                @foreach ($semesters as $semester)
                                                <option value="<?= $semester->id ?>" <?= $semester->id == $homeroom->semester_id ? 'selected ' : '' ?> ><?= $semester->semester.' tahun pelajaran '.$semester->tahun_pelajaran ?></option>
                                                {{-- <option value="" selected >selected</option> --}}
                                                @endforeach
                                            </select>
                                            @else
                                            <select name="semester_id" disabled class="form-control">
                                                <option value="<?= $semester->id ?>" selected><?= $semester->semester.' tahun pelajaran '.$semester->tahun_pelajaran ?></option>
                                            </select>
                                            @endif
                                        @error('semester')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kelas</label>
                                        <select name="grade_id" class="form-control">
                                            <option value="">-- Pilih Disini --</option>
                                            @foreach ($grades as $grade)
                                            <option value="<?= $grade->id ?>" <?= $grade->id == $homeroom->grade_id ? 'selected ' : '' ?> ><?= $grade->nama_kelas ?></option>
                                            @endforeach
                                        </select>
                                        @error('grade')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Wali Kelas</label>
                                        <select name="user_id" class="form-control">
                                            <option value="">-- Pilih Disini --</option>
                                            @foreach ($users as $user)
                                            <option value="<?= $user->id ?>" <?= $user->id == $homeroom->user_id ? 'selected ' : '' ?> ><?= $user->name ?></option>
                                            @endforeach
                                        </select>
                                        @error('user')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ $submit }}</button>
                                    <a href="{{ route('admin.data.homeroom') }}" class="btn btn-success">Kembali</a>