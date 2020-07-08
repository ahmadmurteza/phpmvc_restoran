

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <!-- header -->
    <div class="hero text-white hero-bg-image hero-bg-parallax " data-background="../assets/img/bg1customer.jpg" style="background-image: url(&quot;../assets/img/bg1customer.jpg&quot;); height: 500px;">
      <div class="hero-inner">
        <h2>Selamat datang, Nama!</h2>
        <p class="lead">Selamat datang di RestoranKu App, Silahkan pilih makanan dan minuman yang anda sukai.</p>
        <div class="mt-4">
          <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left orderDone" data-toggle="modal" data-target="#infoOrderModal" id="<?= $data['customer']['id'] ?>"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Selesai Order</a>
        </div>
      </div>
    </div>
    <!-- end header -->
    <!-- content info -->
    <div class="row m-3">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe width="1038" height="584" src="https://www.youtube.com/embed/8R4fqqCjsz4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h3 class="text-dark">Info RestoranKu</h3>
          </div>
          <div class="card-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget rutrum enim, ac facilisis ex. Proin posuere dignissim magna, sit amet feugiat nisi iaculis sed. Aliquam erat volutpat. Donec aliquet tincidunt auctor. Maecenas eu luctus turpis, quis tincidunt tortor. Duis eros ex, tincidunt vitae sollicitudin ut, accumsan a lectus. Mauris risus magna, tristique ac iaculis viverra, molestie a elit. Curabitur et lectus sed sapien posuere sollicitudin et sed erat. Sed sodales nulla vel elit convallis, nec malesuada purus placerat. In hac habitasse platea dictumst.
          </div>
        </div>
      </div>
    </div>
    <!-- end content info -->
    <!-- content menu -->
    <div class="row">
      <?php foreach ($data['kategori'] as $row) : ?>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
          <article class="article">
            <div class="article-header">
              <div class="article-image" data-background="<?= BASEURL; ?>assets/uploads/<?= $row['photo'] ?>" style="background-image: url(&quot;<?= BASEURL; ?>assets/uploads/<?= $row['photo'] ?>&quot;);">
              </div>
              <div class="article-title">
                <h2><a href="#"><?= $row['name_kategori'] ?></a></h2>
              </div>
            </div>
            <div class="article-details">
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. </p>
              <div class="article-cta">
                <a href="<?= BASEURL; ?>Customer/menu/<?= $row['kd_kategori'] ?>" class="btn btn-primary">Lihat Menu</a>
              </div>
            </div>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- end content menu -->
  </section>
</div>


<!-- Modal -->
<div class="modal fade" id="infoOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Orderan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="orderAlert"></div>
        <table id="orderTable" class="table table-hover">
          <!-- table di ajax -->
        </table>
        <hr>
        <h5 class="float-right mr-2" id="totalInfo"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="orderFinish">Order Sekarang</button>
      </div>
    </div>
  </div>
</div>