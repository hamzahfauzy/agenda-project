<!doctype html>
<html lang="id">
<head>
    <title>Login - E-Agenda Pemkab Asahan</title>
    <meta name="description" content="Sistem Informasi E-Agenda Kabupaten Asahan" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Favicon Placeholder -->
    <link rel="icon" type="image/x-icon" href="https://via.placeholder.com/32" />

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <style>
        :root {
            --bs-body-font-family: 'Inter', sans-serif;
            --primary-blue: #2563eb;
            --primary-blue-hover: #1d4ed8;
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-500: #64748b;
            --slate-800: #1e293b;
            --sidebar-bg: #0f172a;
        }

        body {
            background-color: var(--slate-50);
            font-family: var(--bs-body-font-family);
            color: var(--slate-800);
        }

        .login-container {
            min-height: 100vh;
        }

        /* --- Sisi Visual Kiri --- */
        .login-visual {
            background: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), 
                        url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=1200');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4rem;
            color: white;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            background-color: #059669; /* Emerald */
            border: 2px solid #ffc107; /* Kuning Warning */
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        /* --- Sisi Form Kanan --- */
        .login-form-section {
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .form-card {
            width: 100%;
            max-width: 400px;
        }

        .form-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--slate-500);
            margin-bottom: 0.5rem;
        }

        .form-control {
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            border-color: #e2e8f0;
            border-radius: 0.5rem;
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .btn-login {
            background-color: var(--primary-blue);
            border: none;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.2s;
            color: white;
        }

        .btn-login:hover {
            background-color: var(--primary-blue-hover);
            transform: translateY(-1px);
            color: white;
        }

        .form-check-input:checked {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .text-primary-custom {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 500;
        }

        .text-primary-custom:hover {
            text-decoration: underline;
        }

        .alert {
            font-size: 0.875rem;
            border-radius: 0.5rem;
            border: none;
        }

        @media (max-width: 767.98px) {
            .login-visual {
                padding: 2rem;
                min-height: 200px;
            }
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
        <div class="row g-0 login-container">
            
            <!-- Sisi Kiri: Visual & Brand (Hanya muncul di MD ke atas) -->
            <div class="col-md-6 col-lg-7 login-visual d-none d-md-flex">
                <img src="<?=asset('theme/assets/logo_kab_asahan.png')?>" class="object-fit-cover" style="width: 48px; height: 60px;">

                <h1 class="display-5 fw-bold mb-3">Sistem Informasi <br>E-Agenda</h1>
                <p class="fs-5 text-white-50 max-w-md">
                    Pemerintah Kabupaten Asahan. <br>
                    Kelola agenda kedinasan dengan lebih efisien, transparan, dan terorganisir dalam satu platform terpadu.
                </p>
                <div class="mt-auto">
                    <p class="small text-white-50 mb-0">© 2025 Pemerintah Kabupaten Asahan. All rights reserved.</p>
                </div>
            </div>

            <!-- Sisi Kanan: Form Login -->
            <div class="col-md-6 col-lg-5 login-form-section">
                <div class="form-card">
                    
                    <!-- Header Mobile (Hanya muncul di layar kecil) -->
                    <div class="d-md-none text-center mb-5">
                        <div class="brand-icon mx-auto">
                            <i class="ph-fill ph-shield-check fs-3 text-white"></i>
                        </div>
                        <h2 class="fw-bold h4">E-Agenda Login</h2>
                        <p class="text-slate-500 small">Pemkab Asahan</p>
                    </div>

                    <div class="mb-4">
                        <h2 class="fw-bold h3 text-slate-800 mb-2">Masuk</h2>
                        <p class="text-slate-500">Silakan masukkan akun Anda untuk melanjutkan ke dashboard.</p>
                    </div>

                    <?php if($success_msg): ?>
                    <div class="alert alert-success"><?=$success_msg?></div>
                    <?php endif ?>

                    <?php if($error_msg): ?>
                    <div class="alert alert-danger"><?=$error_msg?></div>
                    <?php endif ?>

                    <!-- Contoh Pesan Error (Statik) -->
                    <!-- 
                    <div class="alert alert-danger d-flex align-items-center gap-2 mb-4">
                        <i class="ph-bold ph-warning-circle fs-5"></i>
                        <div>Username atau password salah.</div>
                    </div> 
                    -->

                    <form action="#" method="POST">
                        <?= csrf_field() ?>
                        <!-- Input Username -->
                        <div class="mb-3">
                            <label class="form-label" for="username">Nama Pengguna</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 text-slate-500">
                                    <i class="ph ph-user"></i>
                                </span>
                                <input type="text" name="username" id="username" 
                                       class="form-control border-start-0 ps-0" 
                                       placeholder="Masukkan username" 
                                       required>
                            </div>
                        </div>

                        <!-- Input Password -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label" for="password">Kata Sandi</label>
                                <a href="#" class="small text-primary-custom mb-2">Lupa kata sandi?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 text-slate-500">
                                    <i class="ph ph-lock"></i>
                                </span>
                                <input type="password" name="password" id="password" 
                                       class="form-control border-start-0 ps-0" 
                                       placeholder="••••••••" 
                                       required>
                            </div>
                        </div>

                        <!-- Opsi Ingat Saya & Tombol Masuk -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="rememberMe" checked>
                            <label class="form-check-label small text-slate-500" for="rememberMe">
                                Ingat saya di perangkat ini
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-login w-100 mb-4">
                            Masuk ke Dashboard
                        </button>
                    </form>

                    <!-- Footer -->
                    <p class="text-center small text-slate-500">
                        Belum punya akun? 
                        <a href="#" class="text-primary-custom">Hubungi Admin</a>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>