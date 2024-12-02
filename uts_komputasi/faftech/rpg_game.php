<?php
session_start();

// Inisialisasi permainan jika belum dimulai
if (!isset($_SESSION['game_started'])) {
    $_SESSION['game_started'] = false;
}

// Inisialisasi role dan trait jika baru memulai
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['role']) && !$_SESSION['game_started']) {
    $role = $_POST['role'];
    $trait = $_POST['trait'];
    $_SESSION['player_role'] = $role;
    $_SESSION['player_trait'] = $trait;
    $_SESSION['game_started'] = true;

    // Inisialisasi atribut berdasarkan role
    switch ($role) {
        case 'assassin':
            $_SESSION['player_hp'] = 80;
            $_SESSION['player_attack'] = 30;
            break;
        case 'mage':
            $_SESSION['player_hp'] = 100;
            $_SESSION['player_attack'] = 20;
            break;
        case 'defender':
            $_SESSION['player_hp'] = 120;
            $_SESSION['player_attack'] = 15;
            break;
    }

    // Inisialisasi atribut lawan
    $_SESSION['enemy_hp'] = 50;
    $_SESSION['enemy_attack'] = 20;
    $_SESSION['message'] = "Kamu memilih role $role dengan trait $trait. Pertempuran dimulai!";
    $_SESSION['start_time'] = time(); // Menyimpan waktu mulai
}

// Logic pertarungan dan suit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['game_started'] && isset($_POST['choice'])) {
    $choices = ['batu', 'gunting', 'kertas', 'fuck', 'woles'];
    $player_choice = $_POST['choice'];
    $enemy_choice = $choices[array_rand($choices)];

    $_SESSION['message'] = "Kamu memilih $player_choice, lawan memilih $enemy_choice.";

    // Logika suit dengan tambahan "Fuck" dan "Woles"
    if (
        ($player_choice == 'batu' && $enemy_choice == 'gunting') ||
        ($player_choice == 'gunting' && $enemy_choice == 'kertas') ||
        ($player_choice == 'kertas' && $enemy_choice == 'batu') ||
        ($player_choice == 'fuck' && in_array($enemy_choice, ['batu', 'gunting', 'kertas'])) ||
        ($player_choice == 'woles' && $enemy_choice == 'fuck')
    ) {
        // Pemain menang
        if ($player_choice == 'fuck') {
            $_SESSION['player_attack'] += 5;
            $_SESSION['message'] .= " Kamu menang dengan 'Fuck'! ATK bertambah 5.";
        } elseif ($player_choice == 'woles' && $enemy_choice == 'fuck') {
            $_SESSION['player_hp'] += 10;
            $_SESSION['message'] .= " Kamu menang dengan 'Woles'! HP bertambah 10.";
        } else {
            $damage = $_SESSION['player_attack'];
            $_SESSION['enemy_hp'] -= $damage;
            $_SESSION['message'] .= " Kamu menang! Lawan terkena $damage damage.";
        }
    } elseif ($player_choice == $enemy_choice) {
        $_SESSION['message'] .= " Seri! Tidak ada perubahan HP.";
    } else {
        // Pemain kalah
        if ($player_choice == 'fuck' && $enemy_choice == 'woles') {
            $_SESSION['player_hp'] -= 10;
            $_SESSION['message'] .= " Kamu kalah! 'Fuck' dikalahkan oleh 'Woles'. HP berkurang 10.";
        } elseif ($player_choice == 'woles' && in_array($enemy_choice, ['batu', 'gunting', 'kertas'])) {
            $_SESSION['player_attack'] -= 5;
            $_SESSION['message'] .= " Kamu kalah! 'Woles' dikalahkan. ATK berkurang 5.";
        } else {
            $damage = 10;
            $_SESSION['player_hp'] -= $damage;
            $_SESSION['message'] .= " Kamu kalah dan terkena $damage damage.";
        }
    }

    // Cek kondisi menang atau kalah
    if ($_SESSION['player_attack'] <= 0 || $_SESSION['enemy_attack'] <= 0) {
        if ($_SESSION['player_attack'] <= 0 && $_SESSION['enemy_attack'] <= 0) {
            $_SESSION['message'] = "Game Seri!";
        } elseif ($_SESSION['player_attack'] <= 0) {
            $_SESSION['message'] = "Kamu kalah! ATK pemain habis.";
        } else {
            $_SESSION['message'] = "Selamat, kamu menang! ATK lawan habis.";
        }
        session_destroy();
    } elseif ($_SESSION['player_hp'] <= 0) {
        $_SESSION['message'] = "Kamu kalah! Coba lagi.";
        session_destroy();
    } elseif ($_SESSION['enemy_hp'] <= 0) {
        $_SESSION['message'] = "Selamat, kamu menang!";
        session_destroy();
    }
}

// Perhitungan persentase
function calculatePercentage($hp, $attack) {
    $max_hp = 120; // Asumsi HP maksimal
    $max_attack = 30; // Asumsi ATK maksimal
    $hp_percentage = ($hp / $max_hp) * 100;
    $attack_percentage = ($attack / $max_attack) * 100;
    return ($hp_percentage + $attack_percentage) / 2;
}

$player_percentage = calculatePercentage($_SESSION['player_hp'] ?? 0, $_SESSION['player_attack'] ?? 0);
$enemy_percentage = calculatePercentage($_SESSION['enemy_hp'] ?? 0, $_SESSION['enemy_attack'] ?? 0);

// Cek timer 3 menit
$time_limit = 180; // 3 menit
$time_remaining = $_SESSION['time_remaining'] ?? $time_limit;

if ($time_remaining <= 0) {
    if ($player_percentage > $enemy_percentage) {
        $_SESSION['message'] = "Waktu habis! Kamu menang berdasarkan persentase tertinggi.";
    } elseif ($enemy_percentage > $player_percentage) {
        $_SESSION['message'] = "Waktu habis! Kamu kalah berdasarkan persentase.";
    } else {
        $_SESSION['message'] = "Waktu habis! Game seri.";
    }
    session_destroy();
} else {
    $_SESSION['time_remaining'] = $time_remaining - (time() - ($_SESSION['start_time'] ?? time())); // Hitung waktu tersisa
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Suit RPG dengan Role</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            padding: 20px;
        }
        h2 {
            color: #007BFF;
        }
        button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        let countdown = <?php echo $time_remaining; ?>; // Ambil waktu tersisa dari PHP
        const timerElement = document.getElementById('timer');

        function updateTimer() {
            if (countdown <= 0) {
                clearInterval(timerInterval);
                timerElement.innerText = "Waktu habis!";
                return;
            }

            const minutes = Math.floor(countdown / 60);
            const seconds = countdown % 60;
            timerElement.innerText = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            countdown--;
        }

        const timerInterval = setInterval(updateTimer, 1000); // Update timer setiap detik
    </script>
</head>
<body>
    <h2>Game Suit RPG dengan Role</h2>

    <?php if (!$_SESSION['game_started']): ?>
        <form method="post">
            <h3>Pilih Role:</h3>
            <label><input type="radio" name="role" value="assassin" required> Assassin</label><br>
            <label><input type="radio" name="role" value="mage"> Mage</label><br>
            <label><input type="radio" name="role" value="defender"> Defender</label><br>
            
            <h3>Pilih Trait Support:</h3>
            <label><input type="radio" name="trait" value="kekuatan" required> Kekuatan Lebih</label><br>
            <label><input type="radio" name="trait" value="ketahanan"> Ketahanan</label><br>
            <label><input type="radio" name="trait" value="regenerasi"> Regenerasi</label><br>
            <label><input type="radio" name="trait" value="serangan"> Serangan Menyengat</label><br>
            <label><input type="radio" name="trait" value="aura kebal"> Aura Kebal</label><br>
            
            <button type="submit">Mulai Permainan</button>
        </form>
    <?php else: ?>
        <p><?php echo $_SESSION['message']; ?></p>
        <p>HP Kamu: <?php echo $_SESSION['player_hp']; ?></p>
        <p>HP Lawan: <?php echo $_SESSION['enemy_hp']; ?></p>
        <p>ATK Kamu: <?php echo $_SESSION['player_attack']; ?></p>
        <p>ATK Lawan: <?php echo $_SESSION['enemy_attack']; ?></p>
        <p>Persentase Kamu: <?php echo round($player_percentage, 2); ?>%</p>
        <p>Persentase Lawan: <?php echo round($enemy_percentage, 2); ?>%</p>
        <p>Waktu Tersisa: <span id="timer"><?php echo gmdate("i:s", $time_remaining); ?></span></p>

        <?php if ($_SESSION['player_hp'] > 0 && $_SESSION['enemy_hp'] > 0 && $time_remaining > 0): ?>
            <form method="post">
                <button type="submit" name="choice" value="batu">Batu</button>
                <button type="submit" name="choice" value="gunting">Gunting</button>
                <button type="submit" name="choice" value="kertas">Kertas</button>
                <button type="submit" name="choice" value="fuck">Fuck</button>
                <button type="submit" name="choice" value="woles">Woles</button>
            </form>
        <?php else: ?>
            <a href="rpg_game.php">Mulai Lagi</a>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
