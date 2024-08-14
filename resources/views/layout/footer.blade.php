<footer class="footer mt-auto py-3 bg-body-tertiary">
    <div class="container">
        <span class="text-body-secondary">ini footer</span>
    </div>
</footer>

<!-- resources/views/layouts/footer.blade.php -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('search-form');
        const currentPath = window.location.pathname;

        // Set form action based on current path
        if (currentPath.includes('/berita')) {
            form.action = '{{ route('berita.index') }}';
        } else if (currentPath.includes('/dosen')) {
            form.action = '{{ route('dosen.index') }}';
        } else if (currentPath.includes('/mahasiswa')) {
            form.action = '{{ route('mahasiswa.index') }}';
        } else if (currentPath.includes('/prodi')) {
            form.action = '{{ route('prodi.index') }}';
        } else {
            form.action = '/'; // Default action if not on a specific page
        }
    });
</script>
</body>
</html>
