<?php

session_start();
if (isset($_SESSION['username'])) {

  include '../koneksi.php';

  $result = $conn->query("SELECT * FROM game");
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
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Users</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button"
              class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
              <svg class="bi" aria-hidden="true">
                <use xlink:href="#calendar3" />
              </svg>
              This week
            </button>
          </div>
        </div>

        <h2>Daftar Users</h2>
        <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Games</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>



            <tbody>

              <div>
                <tr>
                  <td>1</td>
                  <td>Admin</td>
                  <td>
                    <div class="d-grid gap-2 d-md-block">
                      <a href="admin.php">View</a>
                    </div>
                  </td>
                </tr>
              </div>

              <div>
                <tr>
                  <td>2</td>
                  <td>Developers</td>
                  <td>
                    <div class="d-grid gap-2 d-md-block">
                      <a href="pengembang.php?">View</a>
                    </div>
                  </td>
                </tr>
              </div>

              <div>
                <tr>
                  <td>3</td>
                  <td>Players</td>
                  <td>
                    <div class="d-grid gap-2 d-md-block">
                      <a href="users.php?id=<?= $row['id_game']; ?>">View</a>
                    </div>
                  </td>
                </tr>
              </div>



            </tbody>

          </table>
        </div>
      </main>
    </div>
  </div>
  <script defer src="../assets/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"></script>

  <script defer src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
    integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
  <script defer src="dashboard.js"></script>
  </body>

  </html>
  <?php
} else {
  header("Location: ../gagal.php");
}
?>