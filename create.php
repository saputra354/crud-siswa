<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $jenis = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
    $jurusan = isset($_POST['jurusan']) ? $_POST['jurusan'] : '';
    $pembimbing = isset($_POST['pembimbing']) ? $_POST['pembimbing'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO tb_agis VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $jenis, $jurusan, $pembimbing]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Tambah Data</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="nama" id="nama">
        <label for="jenis_kelamin">jenis kelamin</label>
        <label for="jurusan">jurusan</label>
        <input type="text" name="jenis_kelamin" id="jenis_kelamin">
        <input type="text" name="jurusan" id="jurusan">
        <label for="pekerjaan">pembimbing</label>
        <input type="text" name="pembimbing" id="pembimbing">
        <input type="submit" value="Tambah">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>