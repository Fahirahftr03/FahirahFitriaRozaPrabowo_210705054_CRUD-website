<?php
$conn = new mysqli('localhost', 'root', '', 'crud_db');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id='$id'");
    $user = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE pendaftar SET name='$name', email='$email', phone='$phone' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
  
       <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <style>

body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(90deg, #7291d8, #c07375); /* Warna gradasi dasar */
    background-size: 300% 300%; /* Ukuran background agar bisa bergerak */
    animation: gradientAnimation 10s ease infinite; /* Animasi untuk pergerakan gradasi */
    margin: 0;
    padding: 0;
    color: #444;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

        
 /* Animasi untuk pergerakan gradasi */
 @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    /* Styling untuk kontainer utama */
    .container {
        background-color: #fff;
        padding: 20px 40px;
        border-radius: 12px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
        width: 400px;
        max-width: 90%;
        position: relative;
    }

    /* Styling untuk kotak judul */
    .title-box {
        position: relative;
        font-family: 'Cursive', sans-serif;
        font-size: 2rem;
        text-align: center;
        color: #fff;
        font-weight: bold;
        margin: 20px auto 30px;
        padding: 10px 20px;
        background: linear-gradient(90deg, #56CCF2, #2F80ED);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .title-box:after {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
    }

    @keyframes shine {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    /* Styling untuk form */
    form label {
        display: block;
        font-weight: bold;
        margin-top: 20px;
        text-align: left;
    }

    form input[type="text"], form input[type="email"] {
        width: 100%;
        padding: 12px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 1rem;
    }

    /* Styling untuk tombol Simpan */
    form button {
        margin-top: 30px;
        width: 100%;
        padding: 14px 26px;
        background: linear-gradient(90deg, #FF6F61, #D84B57);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1.1em;
        cursor: pointer;
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;

    }

    form button:hover {
        transform: translateY(-3px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    </style>
</head>
<body>
    <div class="container">
        <div class="title-box">Edit Pengguna</div>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            <label for="phone">Telepon:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
<?php $conn->close(); ?>