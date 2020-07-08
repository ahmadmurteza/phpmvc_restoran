

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Daftar Menu</h1>
      <div class="section-header-breadcrumb">
        <a href="<?= BASEURL ?>Customer/index" class="btn btn-danger">
          <i class="fas fa-long-arrow-alt-left"></i>&nbsp;&nbsp;
          Kembali
        </a>
      </div>
    </div>
    
    <!-- content menu -->
    <div class="section-body">
      <div id="menuAlert"></div>
      <div class="row">
        <?php foreach ($data['menu'] as $row) : ?>
          <div class="card" style="width: 18rem;">
            <img src="<?= BASEURL; ?>assets/uploads/<?= $row['photo'] ?>" class="card-img-top" alt="<?= $row['name_menu'] ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $row['name_menu'] ?></h5>
              <span class="price-new text-danger"><?= "Rp " . number_format($row['harga'], 2, ',', '.') ?></span>
              <hr>
              <form id="orderForm">
                <input type="number" name="jumlah" value="1">
                <input type="hidden" name="mejaId" value="<?= $data['customer']['id'] ?>">
                <input type="hidden" name="menuKd" value="<?= $row['kd_menu'] ?>">
                <input type="submit" id="orderBtn" value="Order" class="btn btn-primary">
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    
    <!-- end content menu -->
  </section>
</div>

