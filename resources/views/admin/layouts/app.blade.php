@php
    $adminBrandName = \App\Support\AdminWeb::siteName();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@isset($pageTitle){{ $pageTitle }} — @endisset{{ $adminBrandName }}</title>
    
    <!-- Google Fonts for futuristic Space-Tech look -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    
    <script src="{{ asset('js/tailwindcss.play-cdn.js') }}"></script>
    <script src="{{ asset('js/lucide.min.js') }}"></script>
    
    <style>
        /* Base cosmic dark theme styling */
        body {
            background-color: #060913 !important;
            background-image: 
                radial-gradient(at 10% 15%, rgba(127, 0, 255, 0.09) 0px, transparent 40%),
                radial-gradient(at 90% 85%, rgba(0, 242, 254, 0.09) 0px, transparent 40%),
                radial-gradient(at 50% 50%, rgba(11, 18, 35, 0.2) 0px, transparent 70%) !important;
            background-attachment: fixed !important;
            color: #f1f5f9 !important;
            font-family: 'Space Grotesk', sans-serif !important;
            overflow-x: hidden;
        }

        .font-tech {
            font-family: 'Orbitron', sans-serif !important;
        }

        /* Dark Mode Scrollbars */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #060913;
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.12);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 242, 254, 0.45);
            box-shadow: 0 0 10px rgba(0, 242, 254, 0.3);
        }

        /* Dynamic Glassmorphic Panel Overrides for all subviews */
        main .bg-white, 
        main .bg-slate-50, 
        main .bg-gray-50,
        main .admin-card {
            background: rgba(11, 18, 35, 0.6) !important;
            backdrop-filter: blur(14px) !important;
            -webkit-backdrop-filter: blur(14px) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.35) !important;
            color: #f1f5f9 !important;
            border-radius: 1rem !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        main .bg-white:hover, 
        main .bg-slate-50:hover, 
        main .admin-card:hover {
            border-color: rgba(0, 242, 254, 0.25) !important;
            box-shadow: 0 8px 32px 0 rgba(0, 242, 254, 0.05) !important;
        }

        /* Text color adaptations */
        main .text-gray-900, 
        main .text-slate-900, 
        main .text-gray-800,
        main .text-slate-800 {
            color: #f8fafc !important;
        }

        main .text-gray-500, 
        main .text-gray-600, 
        main .text-slate-500,
        main .text-slate-600 {
            color: #94a3b8 !important;
        }

        main .border-gray-200, 
        main .border-gray-100, 
        main .border-slate-200,
        main .border-slate-100 {
            border-color: rgba(255, 255, 255, 0.08) !important;
        }

        main .bg-gray-50, 
        main .bg-gray-100, 
        main .bg-slate-50,
        main .bg-slate-100 {
            background: rgba(6, 9, 19, 0.45) !important;
            border: 1px solid rgba(255, 255, 255, 0.05) !important;
        }

        /* Form Inputs adaptation to dark cyber style */
        main input[type="text"], 
        main input[type="number"], 
        main input[type="password"], 
        main input[type="email"], 
        main select, 
        main textarea {
            background: rgba(6, 9, 19, 0.6) !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            color: #f8fafc !important;
            border-radius: 0.5rem !important;
            outline: none !important;
            transition: all 0.2s ease;
        }

        main input:focus, 
        main select:focus, 
        main textarea:focus {
            border-color: #00f2fe !important;
            box-shadow: 0 0 10px rgba(0, 242, 254, 0.25) !important;
        }

        /* Cyber Buttons overrides - Vibrant gradient with neon glow */
        main button.bg-blue-600, 
        main a.bg-blue-600,
        main .btn-primary {
            background: linear-gradient(135deg, #7f00ff 0%, #00f2fe 100%) !important;
            border: none !important;
            color: #ffffff !important;
            font-weight: 600 !important;
            box-shadow: 0 4px 15px rgba(0, 242, 254, 0.25) !important;
            transition: all 0.3s ease !important;
            border-radius: 0.5rem !important;
        }

        main button.bg-blue-600:hover, 
        main a.bg-blue-600:hover,
        main .btn-primary:hover {
            box-shadow: 0 4px 25px rgba(0, 242, 254, 0.45) !important;
            transform: translateY(-1px);
        }

        /* Secondary buttons adaptation */
        main button.bg-gray-100, 
        main a.bg-gray-100,
        main .bg-gray-100 {
            background: rgba(255, 255, 255, 0.06) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            color: #e2e8f0 !important;
            transition: all 0.2s ease !important;
        }
        main button.bg-gray-100:hover, 
        main a.bg-gray-100:hover {
            background: rgba(255, 255, 255, 0.12) !important;
            border-color: rgba(255, 255, 255, 0.2) !important;
        }

        /* Custom alert styles override */
        .admin-flash-alert {
            background: rgba(11, 18, 35, 0.8) !important;
            backdrop-filter: blur(10px) !important;
            border-radius: 0.75rem !important;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.35) !important;
        }
        .admin-flash-alert.bg-green-100 {
            border: 1px solid rgba(57, 255, 20, 0.3) !important;
            color: #39ff14 !important;
        }
        .admin-flash-alert.bg-red-100 {
            border: 1px solid rgba(255, 59, 0, 0.3) !important;
            color: #ff3b00 !important;
        }

        /* Lucide icon cyan tech adjustment */
        [data-lucide] {
            stroke-width: 1.8;
        }
    </style>
    @stack('styles')
</head>
<body>
@include('admin.partials.header', [
    'adminBrandName' => $adminBrandName,
    'adminSiteName' => $adminSiteName ?? $adminBrandName,
    'pageTitle' => $pageTitle ?? '',
    'activeMenu' => $activeMenu ?? '',
])
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 px-4">
        @if (session('message'))
            <div class="admin-flash-alert mb-6 bg-green-100 border px-4 py-3 rounded-xl relative">
                <span class="block sm:inline font-semibold">{{ session('message') }}</span>
            </div>
        @endif
        @if ($errors->any())
            <div class="admin-flash-alert mb-6 bg-red-100 border px-4 py-3 rounded-xl relative">
                @foreach ($errors->all() as $err)
                    <div class="font-semibold">{{ $err }}</div>
                @endforeach
            </div>
        @endif
        @yield('content')
    </main>
@include('admin.partials.footer')
@include('admin.partials.welcome-modal')
@stack('scripts')
</body>
</html>

