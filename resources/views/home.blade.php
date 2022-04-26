@extends("layouts.app")
@section("css")
    <style>
        td {
            vertical-align: middle !important;
        }
    </style>
@endsection
@section("contents")

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Form Pemilihan Kriteria Calon Dosen Pembimbing
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h4><strong>Data Mahasiswa</strong></h4>
                        <div class="col-md-3">
                            <label>Nama</label>
                            <p>{{ Auth::user()->nama }}</p>
                        </div>
                        <div class="col-md-3">
                            <label>NIM</label>
                            <p>{{ Auth::user()->nim }}</p>
                        </div>
                        <div class="col-md-3">
                            <label>Email</label>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                        <div class="col-md-3">
                            <label>Program Studi</label>
                            <p>{{ Auth::user()->prodi }}</p>
                        </div>
                    </div>
                    @if(!Auth::user()->dospem_id)
                    {{-- <form action="/submit-bobot" method="POST"> --}}
                        @csrf
                        <div class="row">
                            <h4 class="mt-5"><strong>Pilih Bobot Kriteria Dosen Pembimbing</strong></h4>

                            {{-- table bootstrap --}}
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kriteria</th>
                                        <th>Sub Kriteria</th>
                                        <th>Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-primary">
                                        <td style="vertical-align: middle; text-align: center" rowspan="5">1</td>
                                        <td style="vertical-align: middle; text-align: center" rowspan="5">BIDANG KOMPETENSI</td>
                                        <td>Big Data: Data Scientist, Data Engineer, Data Analyst, Artificial Intelligence, Machine Learning, Basis Data</td>
                                        <td>Sangat Tinggi</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td>Cloud Computing, Computer Networking, Network Security, Client Server, Kriptografi</td>
                                        <td>Tinggi</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td>Programmer: Software Developer, Web Developer, Mobile Developer, Software Engineering, RPL, Sistem Pendukung Keputusan, Kecerdasan Buatan, Sistem Informasi</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td>Business Process Management, Enterprise Resource Planning, Knowledge Management, Information System Audit, IT Service Management</td>
                                        <td>Rendah</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td>UI/UX Research, Human Computer Interaction, User Behavior</td>
                                        <td>Sangat Rendah</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle; text-align: center" rowspan="4">2</td>
                                        <td style="vertical-align: middle; text-align: center" rowspan="4">FUNGSIONAL</td>
                                        <td>Profesor</td>
                                        <td>Sangat Tinggi</td>
                                    </tr>
                                    <tr>
                                        <td>Lektor Ketua</td>
                                        <td>Tinggi</td>
                                    </tr>
                                    <tr>
                                        <td>Lektor</td>
                                        <td>Rendah</td>
                                    </tr>
                                    <tr>
                                        <td>Asisten Ahli</td>
                                        <td>Sangat Rendah</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td style="vertical-align: middle; text-align: center" rowspan="2">3</td>
                                        <td style="vertical-align: middle; text-align: center" rowspan="2">PENDIDIKAN TERAKHIR</td>
                                        <td>S3</td>
                                        <td>Tinggi</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td>S2</td>
                                        <td>Rendah</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle; text-align: center" rowspan="5">4</td>
                                        <td style="vertical-align: middle; text-align: center" rowspan="5">KUOTA MAHASISWA</td>
                                        <td>1 - 6</td>
                                        <td>Sangat Tinggi</td>
                                    </tr>
                                    <tr>
                                        <td>7 - 12</td>
                                        <td>Tinggi</td>
                                    </tr>
                                    <tr>
                                        <td>13 - 18</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td>19 - 24</td>
                                        <td>Rendah</td>
                                    </tr>
                                    <tr>
                                        <td>25 - 30</td>
                                        <td>Sangat Rendah</td>
                                    </tr>
                                </tbody>
                            </table>
                        
                            <div class="col-md-12">
                                {{-- input judul tugas akhir --}}
                                <div class="form-group">
                                    <label for="judul_ta">Judul Tugas Akhir</label>
                                    <input type="text" class="form-control" id="judul_ta" name="judul_ta" placeholder="Judul Tugas Akhir" required>
                                </div>
                            </div>

                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <label>
                                        Kompetensi Dosen
                                    </label><br>
                                    <div class="form-check form-check-inline">
                                        <small class="mr-3">Sangat Rendah</small>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bidang_kompetensi" id="inlineRadio1" value="2">
                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bidang_kompetensi" id="inlineRadio2" value="4">
                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bidang_kompetensi" id="inlineRadio3" value="6">
                                            <label class="form-check-label" for="inlineRadio3">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bidang_kompetensi" id="inlineRadio4" value="8">
                                            <label class="form-check-label" for="inlineRadio4">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bidang_kompetensi" id="inlineRadio5" value="10">
                                            <label class="form-check-label" for="inlineRadio5">5</label>
                                        </div>
                                        <small class="ml-1">Sangat Tinggi</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <label>
                                        Fungsional Dosen
                                    </label><br>
                                    <div class="form-check form-check-inline">
                                        <small class="mr-3">Sangat Rendah</small>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="fungsional" id="fungsional1" value="2">
                                            <label class="form-check-label" for="fungsional1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="fungsional" id="fungsional2" value="4">
                                            <label class="form-check-label" for="fungsional2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="fungsional" id="fungsional3" value="6">
                                            <label class="form-check-label" for="fungsional3">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="fungsional" id="fungsional4" value="8">
                                            <label class="form-check-label" for="fungsional4">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="fungsional" id="fungsional5" value="10">
                                            <label class="form-check-label" for="fungsional5">5</label>
                                        </div>
                                        <small class="ml-1">Sangat Tinggi</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <label>
                                        Pendidikan Terakhir
                                    </label><br>
                                    <div class="form-check form-check-inline">
                                        <small class="mr-3">Sangat Rendah</small>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan_terakhir" id="p_akhir1" value="2">
                                            <label class="form-check-label" for="p_akhir1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan_terakhir" id="p_akhir2" value="4">
                                            <label class="form-check-label" for="p_akhir2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan_terakhir" id="p_akhir3" value="6">
                                            <label class="form-check-label" for="p_akhir3">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan_terakhir" id="p_akhir4" value="8">
                                            <label class="form-check-label" for="p_akhir4">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan_terakhir" id="p_akhir5" value="10">
                                            <label class="form-check-label" for="p_akhir5">5</label>
                                        </div>
                                        <small class="ml-1">Sangat Tinggi</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <label>
                                        Kuota Mahasiswa
                                    </label><br>
                                    <div class="form-check form-check-inline">
                                        <small class="mr-3">Sangat Rendah</small>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kuota_mahasiswa" id="kuota_mhs1" value="2">
                                            <label class="form-check-label" for="kuota_mhs1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kuota_mahasiswa" id="kuota_mhs2" value="4">
                                            <label class="form-check-label" for="kuota_mhs2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kuota_mahasiswa" id="kuota_mhs3" value="6">
                                            <label class="form-check-label" for="kuota_mhs3">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kuota_mahasiswa" id="kuota_mhs4" value="8">
                                            <label class="form-check-label" for="kuota_mhs4">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kuota_mahasiswa" id="kuota_mhs5" value="10">
                                            <label class="form-check-label" for="kuota_mhs5">5</label>
                                        </div>
                                        <small class="ml-1">Sangat Tinggi</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary w-25" id="btn_submit">
                                    Submit
                                </button>
                                <div id="result"></div>
                            </div>
                            @else
                            <div class="col-md-12 text-center">
                                <div class="alert bg-success mt-3 text-left" id="result">
                                    <h5 class="text-center text-bold">
                                        Dosen Pembimbing Tugas Akhir Anda
                                    </h5>
                                    <p>
                                        <b>Judul Tugas Akhir:</b> {{ Auth::user()->judul_ta }}<br>
                                        <b>Nama:</b> {{ Auth::user()->dospem->nama }}<br>
                                        <b>Email:</b> <a href="mailto:{{ Auth::user()->dospem->email }}">{{ Auth::user()->dospem->email }}</a><br>
                                        <b>NIP:</b> {{ Auth::user()->dospem->nip }}<br>
                                    </p>  
                                </div>
                            </div>
                            @endif
                        </div>
                        
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section("script")

<script>
    const result = document.getElementById("result");
    const btn_submit = document.getElementById("btn_submit");
    // get the radio element
    const bidang_kompetensi = document.getElementsByName('bidang_kompetensi');
    const fungsional = document.getElementsByName('fungsional');
    const pendidikan_terakhir = document.getElementsByName('pendidikan_terakhir');
    const kuota_mahasiswa = document.getElementsByName('kuota_mahasiswa');
    const judul_ta = document.getElementsByName('judul_ta');
    // get the value of the radio button when btn_submit is clicked
    btn_submit.addEventListener('click', function() {

        btn_submit.disabled = true;
        btn_submit.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';

        let bidang_kompetensi_value = 0;
        let fungsional_value = 0;
        let pendidikan_terakhir_value = 0;
        let kuota_mahasiswa_value = 0;
        let judul_ta_value = judul_ta[0].value;
        for (let i = 0; i < bidang_kompetensi.length; i++) {
            if (bidang_kompetensi[i].checked) {
                bidang_kompetensi_value = bidang_kompetensi[i].value;
            }
        }
        for (let i = 0; i < fungsional.length; i++) {
            if (fungsional[i].checked) {
                fungsional_value = fungsional[i].value;
            }
        }
        for (let i = 0; i < pendidikan_terakhir.length; i++) {
            if (pendidikan_terakhir[i].checked) {
                pendidikan_terakhir_value = pendidikan_terakhir[i].value;
            }
        }
        for (let i = 0; i < kuota_mahasiswa.length; i++) {
            if (kuota_mahasiswa[i].checked) {
                kuota_mahasiswa_value = kuota_mahasiswa[i].value;
            }
        }

        // fetch data from api
        fetch("/api/get-topsis", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                bidang_kompetensi: bidang_kompetensi_value,
                fungsional: fungsional_value,
                pendidikan_terakhir: pendidikan_terakhir_value,
                kuota_mahasiswa: kuota_mahasiswa_value,
                judul_ta: judul_ta_value
            })
        }).then(function(response) {
            return response.json();
        }).then(function(data) {
            console.log(data);
            result.innerHTML = `
            <div class="alert bg-success mt-3 text-left" id="result">
                <h5 class="text-center text-bold">
                    Dosen Yang Cocok Untuk Topik Tugas Akhir Anda
                </h5>
                <p>
                    <b>Nama:</b> ${data[0].dospem.nama}<br>
                    <b>NIP:</b> ${data[0].dospem.nip}<br>
                    <b>Email:</b> <a href="mailto:${data[0].dospem.email}">${data[0].dospem.email}</a><br>
                    <b>Judul Tugas Akhir:</b> ${judul_ta_value}<br>
                </p>
                <form action="/submit-dospem" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="dospem_id" value="${data[0].dospem.id}">
                    <input type="hidden" name="judul_ta" value="${judul_ta_value}">
                    <button type="submit" class="btn btn-primary w-100">
                        Terima
                    </button>
                    <small>
                        *Apabila dosen telah memenuhi kriteria anda, silahkan klik tombol terima dan menghubungi dosen.
                    </small>
                </form>
                
            </div>
            `

            btn_submit.disabled = false;
            btn_submit.innerHTML = 'Submit';
        }).catch(function(error) {
            // console.log(error);
            result.innerHTML = `
            <div class="alert bg-danger mt-3" id="result">
                Pastikan anda telah mengisi semua kriteria
            </div>
            `
            btn_submit.disabled = false;
            btn_submit.innerHTML = 'Submit';
        });
    });


    
</script>

@endsection
{{-- @section("script")
<!-- DataTables -->
<script src="{{ url("admin") }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url("admin") }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url("admin") }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url("admin") }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection --}}