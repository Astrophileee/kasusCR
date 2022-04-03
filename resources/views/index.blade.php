<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="shadow p-3 mb-5 bg-body navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Pendataan Tugas Belajar</a>
    </div>
</nav>
<div class="container py-5">
    <div class="row">
        <div class="col">
            <h1 class="fw-light">Tugas</h1>
        </div>
        <div class="col center">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <span class="fw-bold me-1">&plus;</span> Buat tugas
          </button>
        </div>  
        <div class="row">
            <div class="col mx-auto">
                <table class="table" style="vertical-align: middle;">
                    <tr>
                        <th>
                        </th>
                        <th>
                            Nama Tugas
                        </th>
                        <th>
                            Nama mapel
                        </th>
                        <th>
                            Deskripsi
                        </th>
                        <th>
                        </th>
                        <th>
                            Nilai
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                    @foreach ($data as $namaMapel => $mapel)
                        @foreach ($mapel as $tugas)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="@if ($tugas->status == 0) bg-primary @else bg-secondary @endif text-white
                                            p-2 rounded-circle d-flex justify-content-center align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                                                <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                              </svg>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <b>{{ $tugas->nama_tugas }}</b>
                                    <br>
                                    @if ($tugas->deadline)
                                   <b>Tenggat : </b>{{ date('D/m/Y', strtotime($tugas->deadline)) }}
                                   @endif
                                </td>
                                <td>
                                    <b> {{ $tugas->nama_mapel }} </b>
                                </td>
                                <td>
                                    {{ Str::limit($tugas->deskripsi_tugas,20) }}
                                </td>
                                <td>
                                    <div>
                                        @if ($tugas->status == 0)
                                               <p style="color: #0d6efd">Ditugaskan</p>
                                        @else
                                                <p style="color: green">Diselesaikan</p>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if ($tugas->skor)
                                    <span>{{$tugas->skor}}/100</span>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                    <button type="button" class="btn btn-sm d-block mb-1 @if ($tugas->status == 0) btn-primary @else
                                            btn-secondary @endif" data-bs-toggle="modal"
                                            data-bs-target="#editStatusTugas{{ $tugas->id }}Modal">
                                            @if ($tugas->status == 0)
                                                <span>
                                                    Tandai Selesai
                                                </span>
                                            @else
                                                <span>
                                                    Batalkan Pengiriman
                                                </span>
                                            @endif
                                        </button>
                                        <button type="button" class="btn btn-sm d-block btn-success"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editSkorTugas{{ $tugas->id }}Modal">
                                            @if ($tugas->skor)
                                                Edit Skor
                                            @else
                                                Beri Skor
                                            @endif
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal Dialog -->
                            <div class="modal fade" id="editStatusTugas{{ $tugas->id }}Modal" tabindex="-1"
                                aria-labelledby="editStatusTugas{{ $tugas->id }}ModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if ($tugas->status == 0)
                                                <span>
                                                    Tandai tugas sebagai selesai?
                                                </span>
                                            @else
                                                <span>
                                                    Batalkan pengiriman tugas?
                                                </span>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('tugas.editStatus', $tugas->id) }}" method="POST">
                                                @csrf
                                                @method('patch')
                                                <input type="hidden" name="status"
                                                    value="{{ $tugas->status == 1 ? 0 : 1 }}">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Dialog -->
                            <div class="modal fade" id="editSkorTugas{{ $tugas->id }}Modal" tabindex="-1"
                                aria-labelledby="editSkorTugas{{ $tugas->id }}ModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title border-0"
                                                id="editSkorTugas{{ $tugas->id }}ModalLabel">
                                                Skor
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('tugas.editScore', $tugas->id) }}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <div class="modal-body border-0">
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" max="100" name="skor" value="{{ $tugas->skor }}" class="form-control">
                                                    <span class="input-group-text">/100</span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </table>
            </div>
        </div>
    </div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <form action="{{ route('tugas.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="createTugasModalLabel">Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-start">
                <div class="form-group mb-3">
                  <label for="nis" class="form-label">NIS</label>
                  <input type="text" name="nis" id="nis" class="form-control" placeholder="NIS" value="192010008" readonly>
                </div>
                <div class="form-group mb-3">
                  <label for="mapel" class="form-label">Mata Pelajaran</label>
                  <select name="nama_mapel" id="mapel" class="form-control" required>
                      <option value="Produktif">Produktif</option>
                      <option value="Pendidikan Kewarganegaraan">Pendidikan Kewarganegaraan</option>
                      <option value="Pendidikan Agama dan Budi Pekerti">Pendidikan Agama dan Budi Pekerti</option>
                      <option value="Matematika">Matematika</option>
                      <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                      <option value="Bahasa Inggris">Bahasa Inggris</option>
                      <option value="Bimbingan Konseling">Bimbingan Konseling</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="namaTugas" class="form-label">Nama Tugas</label>
                  <input type="text" name="nama_tugas" id="namaTugas" class="form-control" placeholder="Nama tugas" required>
                </div>
                <div class="form-group mb-3">
                    <label for="namaTugas" class="form-label">Deskripsi Tugas</label>
                    <input type="text" name="deskripsi_tugas" id="namaTugas" class="form-control" placeholder="Deskripsi Tugas(optional)" required>
                  </div>
                <div class="form-group mb-3">
                  <label for="deadlineTime" class="form-label">Deadline</label>
                  <input type="datetime-local" name="deadline" id="deadlineTime" class="form-control" placeholder="Nama tugas">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Buat Tugas</button>
              </div>
        </form>
      </div>
    </div>
  </div>








    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>
</html>