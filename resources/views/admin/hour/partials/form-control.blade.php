                                    <div class="mb-3">
                                        <label class="form-label">Absen Dibuka</label>
                                        <input type="time" name="absen_dibuka" class="form-control" value="{{ old('absen_dibuka ') ?? $hour->absen_dibuka }}">
                                        @error('absen_dibuka')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Absen Ditutup</label>
                                        <input type="time" name="absen_ditutup" class="form-control" value="{{ old('absen_ditutup ') ?? $hour->absen_ditutup }}">
                                        @error('absen_ditutup')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Level</label>
                                        <input type="text" class="form-control" value="{{ $level }}" disabled>
                                        <input type="text" name="level" class="form-control" value="{{ $level }}" hidden>
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ $submit }}</button>
                                    @if ($level == 'guru')
                                        <a href="{{ route('admin.hour.guru') }}" class="btn btn-success">Kembali</a>
                                    @else
                                        <a href="{{ route('admin.hour.siswa') }}" class="btn btn-success">Kembali</a>
                                    @endif
                                    
