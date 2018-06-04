        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Reading <?= $post['title']; ?></h2>
            </div>
          </header>
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Post</a></li>
              <li class="breadcrumb-item active" ><?= $post['title']; ?></li>
            </ul>
          </div>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts">
            <div class="container-fluid">
              <div class="row">
                <!-- Item -->
                <div class="col-xl-12 card">
                  <div class="card-body">
                    <div class="item d-flex">
                      <?= $post['content']; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>