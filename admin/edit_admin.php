<?php
session_start();
if(isset($_SESSION['username'])) {

include '../koneksi.php';
 
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id_user = $id");
    $row = $result->fetch_assoc();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];
    
        $sql = "UPDATE users SET 
                username='$username',   
                password='$password', 
                level='$level' 
                WHERE id_user=$id";
    
        if ($conn->query($sql) === TRUE) {
            header('Location: users.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<?php
include "header.php";
?>

<div class="container-fluid">
  <div class="row">
    <?php
  include "menu.php";
  ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi" aria-hidden="true"><use xlink:href="#calendar3"/></svg>
            This week
          </button>
        </div>
      </div>

      <h2> Edit Users</h2>
      <form method="POST" action=""> 
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $row['username']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="text" name="password" class="form-control" id="exampleInputPassword1" value="<?= $row['password']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Level</label>
        <input type="int" name="level" class="form-control" id="exampleInputPassword1" value="<?= $row['level']; ?>" required>
    </div>
    <div class="mb-3">
              <label>Foto</label>
              <input type="file" name="foto" class="form-control" required>
            </div>
    <div class="d-flex">    
                            <a href="admin.php" class="btn btn-secondary me-3"> Kembali</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
    </form>
    </main>
  </div>
</div>
<script defer src="../assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script defer src="dashboard.js"></script></body>
</html>
<?php
    } else { 
        header("Location: ../gagal.php"); 
    } 
?>