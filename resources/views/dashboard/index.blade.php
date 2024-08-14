@extends('dashboard.layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Dashboard</h2>
            <div class="row mt-5">
                <div class="col-md-4">
                    <canvas id="mahasiswaPerProdiChart"></canvas>
                </div>
                <div class="col-md-4">
                    <canvas id="dosenChart"></canvas>
                </div>
                <div class="col-md-4">
                    <canvas id="prodiChart"></canvas>
                </div>
            </div>

            <div class="row text-center mt-5">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Kategori</h5>
                            <p class="card-text">{{ $kategoriCount }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Berita</h5>
                            <p class="card-text">{{ $beritaCount }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total User</h5>
                            <p class="card-text">{{ $userCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Grafik Mahasiswa Per Prodi
    var ctx3 = document.getElementById('mahasiswaPerProdiChart');
    if (ctx3) {
        var mahasiswaPerProdiChart = new Chart(ctx3.getContext('2d'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($mahasiswaPerProdi->pluck('prodi_id')) !!},
                datasets: [{
                    label: 'Jumlah Mahasiswa per Prodi',
                    data: {!! json_encode($mahasiswaPerProdi->pluck('total')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Grafik Dosen
    var ctx2 = document.getElementById('dosenChart');
    if (ctx2) {
        var dosenChart = new Chart(ctx2.getContext('2d'), {
            type: 'pie',
            data: {
                labels: ['Total Dosen'],
                datasets: [{
                    label: 'Jumlah Dosen',
                    data: [{{ $dosenCount }}],
                    backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            },
        });
    }

    // Grafik Prodi (Placeholder)
    var ctx4 = document.getElementById('prodiChart');
    if (ctx4) {
        var prodiChart = new Chart(ctx4.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Prodi 1', 'Prodi 2', 'Prodi 3'], // Sesuaikan dengan data dari controller
                datasets: [{
                    label: 'Jumlah Prodi',
                    data: [{{ $prodiCount }}, 5, 10], // Sesuaikan dengan data dari controller
                    backgroundColor: ['rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    borderColor: ['rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(54, 162, 235, 1)'],
                    borderWidth: 1
                }]
            },
        });
    }
</script>

@endsection
