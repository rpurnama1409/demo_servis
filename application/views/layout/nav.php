 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li <?php if($head == 'Dashboard'){ echo "class='active'";} ?>>
          <a href="<?php echo base_url('home') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php if ($akses['kon'] == 'Y'): ?>
        <li class="treeview <?php if($head == 'Konfigurasi'){ echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Konfigurasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($akses['konkp'] == 'Y'): ?>
            <li <?php if($head2 == 'Kategori Produk'){ echo "class='active'";} ?>><a href="<?php echo base_url('kategori_produk') ?>"><i class="fa fa-circle-o"></i>Kategori Produk</a></li>
            <?php endif ?>
            <?php if ($akses['konjp'] == 'Y'): ?>
            <li <?php if($head2 == 'Jenis Produk'){ echo "class='active'";} ?>><a href="<?php echo base_url('jenis_produk') ?>"><i class="fa fa-circle-o"></i>Jenis Produk</a></li>
            <?php endif ?>
            <?php if ($akses['konks'] == 'Y'): ?>
            <li <?php if($head2 == 'Kategori Servis'){ echo "class='active'";} ?>><a href="<?php echo base_url('kategori_servis') ?>"><i class="fa fa-circle-o"></i>Kategori Servis</a></li>
            <?php endif ?>
            <?php if ($akses['konss'] == 'Y'): ?>
            <li <?php if($head2 == 'Status Servis'){ echo "class='active'";} ?>><a href="<?php echo base_url('status_servis') ?>"><i class="fa fa-circle-o"></i>Status Servis</a></li>
            <?php endif ?>
            <?php if ($akses['konkoa'] == 'Y'): ?>
            <li <?php if($head2 == 'Kode Akuntansi'){ echo "class='active'";} ?>><a href="<?php echo base_url('kode_akuntansi') ?>"><i class="fa fa-circle-o"></i>Kode Akuntansi</a></li>
            <?php endif ?>
            <?php if ($akses['konop'] == 'Y'): ?>
            <li class="treeview <?php if($head2 == 'Operator'){ echo 'active';} ?>">
              <a href="#"><i class="fa fa-circle-o"></i>Operator
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if ($akses['konopdo'] == 'Y'): ?>
                <li <?php if($head3 == 'Data Operator'){ echo "class='active'";} ?>><a href="<?php echo base_url('data_operator') ?>"><i class="fa fa-circle-o"></i> Data Operator</a></li>
                <?php endif ?>
                <?php if ($akses['konoplo'] == 'Y'): ?>
                <li <?php if($head3 == 'Level Operator'){ echo "class='active'";} ?>><a href="<?php echo base_url('level_operator') ?>"><i class="fa fa-circle-o"></i> Level Operator</a></li>
                <?php endif ?>
              </ul>
            </li>
            <?php endif ?>
          </ul>
        </li>
        <?php endif ?>
        <?php if ($akses['pr'] == 'Y'): ?>
        <li <?php if($head == 'Produk'){ echo "class='active'";} ?>>
          <a href="<?php echo base_url('produk') ?>">
            <i class="fa fa-bitbucket"></i> <span>Produk</span>
          </a>
        </li>
        <?php endif ?>
        <?php if ($akses['s'] == 'Y'): ?>
        <li <?php if($head == 'Servis'){ echo "class='active'";} ?>>
          <a href="<?php echo base_url('servis') ?>">
            <i class="fa fa-steam"></i> <span>Servis</span>
          </a>          
        </li>
        <?php endif ?>
        <?php if ($akses['p'] == 'Y'): ?>
        <li <?php if($head == 'Penjualan'){ echo "class='active'";} ?>>
          <a href="<?php echo base_url('penjualan') ?>">
            <i class="fa fa-opencart"></i> <span>Penjualan</span>
          </a>
        </li>
        <?php endif ?>
        <?php if ($akses['pem'] == 'Y'): ?>
        <li <?php if($head == 'Pembelian'){ echo "class='active'";} ?>>
          <a href="<?php echo base_url('pembelian') ?>">
            <i class="fa fa-money"></i> <span>Pembelian</span>
          </a>
        </li>
        <?php endif ?>
        <?php if ($akses['pem'] == 'Y'): ?>
        <li <?php if($head == 'Retur'){ echo "class='active'";} ?>>
          <a href="<?php echo base_url('retur') ?>">
            <i class="fa fa-retweet"></i> <span>Retur barang</span>
          </a>
        </li>
        <?php endif ?>
        <?php if ($akses['ak'] == 'Y'): ?>
          <li class="treeview <?php if($head == 'Akuntansi'){ echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-balance-scale"></i>
            <span>Akuntansi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($akses['akkake'] == 'Y'): ?>
            <li <?php if($head2 == 'Pelanggan'){ echo "class='active'";} ?>><a href="<?php echo base_url('kas_keluar') ?>"><i class="fa fa-circle-o"></i> Kas keluar</a></li>
            <?php endif ?>
            <?php if ($akses['akpeng'] == 'Y'): ?>
            <li <?php if($head2 == 'Pegawai'){ echo "class='active'";} ?>><a href="<?php echo base_url('penggajian') ?>"><i class="fa fa-circle-o"></i> Penggajian</a></li>
            <?php endif ?>
          </ul>
        </li>
        <?php endif ?>
        <?php if ($akses['mem'] == 'Y'): ?>
        <li class="treeview <?php if($head == 'Member'){ echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Member</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($akses['mempel'] == 'Y'): ?>
            <li <?php if($head2 == 'Pelanggan'){ echo "class='active'";} ?>><a href="<?php echo base_url('pelanggan') ?>"><i class="fa fa-circle-o"></i>Pelanggan</a></li>
            <?php endif ?>
            <?php if ($akses['mempeg'] == 'Y'): ?>
            <li <?php if($head2 == 'Pegawai'){ echo "class='active'";} ?>><a href="<?php echo base_url('pegawai') ?>"><i class="fa fa-circle-o"></i> Pegawai</a></li>
            <?php endif ?>
            <?php if ($akses['memsup'] == 'Y'): ?>
            <li <?php if($head2 == 'Supplier'){ echo "class='active'";} ?>><a  href="<?php echo base_url('supplier') ?>"><i class="fa fa-circle-o"></i> Supplier</a></li>
            <?php endif ?>
          </ul>
        </li>
        <?php endif ?>
        <?php if ($akses['lap'] == 'Y'): ?>
        <li class="treeview <?php if($head == 'Laporan'){ echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-file-text-o"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($akses['lapp'] == 'Y'): ?>
            <li <?php if($head2 == 'Laporan Penjualan'){ echo "class='active'";} ?>><a href="<?php echo base_url('laporan_penjualan') ?>"><i class="fa fa-circle-o"></i>Penjualan</a></li>
            <?php endif ?>
            <?php if ($akses['lappem'] == 'Y'): ?>
            <li <?php if($head2 == 'Laporan Pembelian'){ echo "class='active'";} ?>><a href="<?php echo base_url('laporan_pembelian') ?>"><i class="fa fa-circle-o"></i>Pembelian</a></li>
            <?php endif ?>
            <?php if ($akses['lappro'] == 'Y'): ?>
            <li <?php if($head2 == 'Laporan Produk'){ echo "class='active'";} ?>><a href="<?php echo base_url('laporan_produk') ?>"><i class="fa fa-circle-o"></i>Produk</a></li>
            <?php endif ?>
            <?php if ($akses['laphis'] == 'Y'): ?>
            <li <?php if($head2 == 'Laporan Servis'){ echo "class='active'";} ?>><a href="<?php echo base_url('laporan_servis') ?>"><i class="fa fa-circle-o"></i>Servis</a></li>
            <?php endif ?>
            <?php if ($akses['laphis'] == 'Y'): ?>
            <li <?php if($head2 == 'Laporan Laba Rugi'){ echo "class='active'";} ?>><a href="<?php echo base_url('laporan_laba_rugi') ?>"><i class="fa fa-circle-o"></i>Laba Rugi</a></li>
            <?php endif ?>
          </ul>
        </li>
        <?php endif ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div style="min-height: 650px;">