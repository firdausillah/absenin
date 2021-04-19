                                    <div class="mb-3">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? $dayOff->tanggal }}">
                                        @error('tanggal')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="{{ old('keterangan') ?? $dayOff->keterangan }}">
                                        @error('keterangan')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ $submit }}</button>
                                    <a href="{{ route('admin.dayOff') }}" class="btn btn-success">Kembali</a>