<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon">
    <title>POS</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/date-picker.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/datatables.css">
    <!-- App css-->

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url() ?>assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/responsive.css">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.min.css"> -->
    <link href="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
  </head>
  <body style="background-color: #eee;">
    <!-- loader starts-->
    <div class="loader-wrapper">
      <div class="loader-index"> <span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <!-- <div  class="page-wrapper horizontal-wrapper" id="pageWrapper"> -->
    <div id="pageWrapper">
      <!-- Page Header Start-->
      <!-- <div class="page-header">
        <div class="header-wrapper row m-0">
          <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                </div>
                <div class="Typeahead-menu"></div>
              </div>
            </div>
          </form>
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="<?= base_url() ?>">
                POS
            </a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
          </div>
          <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
            <div class="notification-slider">
              <div class="d-flex h-100"> <img src="<?= base_url() ?>assets/images/giftools.gif" alt="gif">
                <h6 class="mb-0 f-w-400">Application POS </h6><i class="icon-arrow-top-right f-light"></i>
              </div>
            </div>
          </div>
          <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
              <li class="onhover-dropdown">
                <div class="notification-box">
                  <svg>
                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#notification"></use>
                  </svg><span class="badge rounded-pill badge-secondary">4 </span>
                </div>
                <div class="onhover-show-div notification-dropdown">
                  <h6 class="f-18 mb-0 dropdown-title">Notitications                               </h6>
                  <ul>
                    <li class="b-l-primary border-4">
                      <p>Delivery processing <span class="font-danger">10 min.</span></p>
                    </li>
                    <li class="b-l-success border-4">
                      <p>Order Complete<span class="font-success">1 hr</span></p>
                    </li>
                    <li class="b-l-secondary border-4">
                      <p>Tickets Generated<span class="font-secondary">3 hr</span></p>
                    </li>
                    <li class="b-l-warning border-4">
                      <p>Delivery Complete<span class="font-warning">6 hr</span></p>
                    </li>
                    <li><a class="f-w-700" href="#">Check all</a></li>
                  </ul>
                </div>
              </li>
              <li class="profile-nav onhover-dropdown pe-0 py-0">
                <div class="media profile-media"><img class="b-r-10" src="<?= base_url() ?>assets/images/dashboard/profile.png" alt="">
                  <div class="media-body"><span><?= $this->session->userdata('nama') ?></span>
                    <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
                  <li><a href="<?= base_url('registrasi/logout') ?>"><i data-feather="log-in"> </i><span>Logout</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
          <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
          <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div> -->
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <!-- <div class="sidebar-wrapper" sidebar-layout="stroke-svg">
          <div>
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="<?= base_url() ?>assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="<?= base_url() ?>assets/images/logo/logo_dark.png" alt=""></a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="<?= base_url() ?>assets/images/logo/logo-icon.png" alt=""></a></div>
            <?php // $this->load->view('body/sidebar') ?>
          </div>
        </div> -->
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>School Management</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                        <svg class="stroke-icon">
                          <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">School Manage</li>
                  </ol>
                </div>
              </div>
            </div>
          </div> -->
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row mt-1">
              <div class="col-xxl-12 box-col-12">
                <div class="row">
                    <div class="col-xxl-9 col-md-7">
                        <div class="card">
                            <div class="card-body pt-0">
                                <div class="row mt-3">
                                    <?php if($this->uri->segment(3) == true) { ?>
                                        <div class="col">
                                        <div class="table-responsive" style="min-height:650px; max-height: 650px;">
                                            <table>
                                            <thead>
                                                <tr>
                                                <th></th>
                                                <th width="400" scope="col">Nama Barang</th>
                                                <th width="80" scope="col">Qty</th>
                                                <th width="180" scope="col">Satuan</th>
                                                <th width="180" scope="col">Harga Satuan</th>
                                                <th width="180" scope="col">Diskon</th>
                                                <th width="280" scope="col">Jumlah</th>
                                                <th width="280" scope="col">Stock</th>
                                                </tr>
                                            </thead>
                                            <tbody id="sampel-wrapper">
                                                <?php foreach($transaksi_item as $x){ ?>
                                                <tr style="background-color: white;">
                                                    <td>
                                                        <!-- <div class="form-check checkbox checkbox-primary mb-0">
                                                        <input class="form-check-input delete_check" value="1" id="checkbox-primary-1" type="checkbox">
                                                        <label class="form-check-label" for="checkbox-primary-1"></label>
                                                        </div> -->
                                                        <button type="button" class="btn btn-danger delete_satuan"><i class="icon-minus"></i></button>
                                                    </td>
                                                        <td class="order">
                                                        <input class="form-control barang1" value="<?= $x->barang ?>">
                                                        <input type="hidden" value="<?= $x->kd_barang ?>" class="form-control id_barang1">
                                                                </td>
                                                        <td>
                                                            <input id="idq1" type="number" <?= $x->qty ?> style="text-align:center;" value="1" class="form-control qty1">
                                                        </td>
                                                        <td>
                                                            <select id="ids1" class="form-control satuan1" style="cursor: text;">
                                                                <option value="">Pilih satuan</option>
                                                            </select>
                                                            <input type="hidden" class="qty_isi1">
                                                        </td>
                                                        <td>
                                                            <input readonly type="text" value="<?= number_format($x->harga_satuan,0,'.','.') ?>" id="idh1" class="form-control harga1">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="idd1" placeholder="0" style="text-align:center;" class="form-control diskon_item1">
                                                        </td>
                                                        <td>
                                                        <input readonly type="text" value="<?= number_format($x->jumlah,0,'.','.') ?>" class="form-control jumlah1">
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <input type="text" class="form-control stock1">
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <input type="text" class="form-control stock-c1">
                                                                    </div>
                                                            </div>
                                                        </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="col">
                                        <div class="table-responsive" style="min-height:650px; max-height: 650px;">
                                            <table>
                                            <thead>
                                                <tr>
                                                <th></th>
                                                <th width="400" scope="col">Nama Barang</th>
                                                <th width="80" scope="col">Qty</th>
                                                <th width="180" scope="col">Satuan</th>
                                                <th width="180" scope="col">Harga Satuan</th>
                                                <th width="180" scope="col">Diskon</th>
                                                <th width="280" scope="col">Jumlah</th>
                                                <th width="280" scope="col">Stock</th>
                                                </tr>
                                            </thead>
                                            <tbody id="sampel-wrapper">
                                                <tr style="background-color: white;">
                                                <td>
                                                    <!-- <div class="form-check checkbox checkbox-primary mb-0">
                                                    <input class="form-check-input delete_check" value="1" id="checkbox-primary-1" type="checkbox">
                                                    <label class="form-check-label" for="checkbox-primary-1"></label>
                                                    </div> -->
                                                    <button type="button" class="btn btn-danger delete_satuan"><i class="icon-minus"></i></button>
                                                </td>
                                                    <td class="order">
                                                    <input class="form-control barang1">
                                                    <input type="hidden" class="form-control id_barang1">
                                                            </td>
                                                    <td>
                                                        <input id="idq1" type="number" style="text-align:center;" value="1" class="form-control qty1">
                                                    </td>
                                                    <td>
                                                        <select id="ids1" class="form-control satuan1" style="cursor: text;">
                                                            <option value="">Pilih satuan</option>
                                                        </select>
                                                        <input type="hidden" class="qty_isi1">
                                                    </td>
                                                    <td>
                                                        <input readonly type="text" id="idh1" class="form-control harga1">
                                                    </td>
                                                    <td>
                                                        <input type="text" id="idd1" placeholder="0" style="text-align:center;" class="form-control diskon_item1">
                                                    </td>
                                                    <td>
                                                    <input readonly type="text" class="form-control jumlah1">
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                                <div class="col-xl-6">
                                                                    <input type="text" class="form-control stock1">
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <input type="text" class="form-control stock-c1">
                                                                </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                    <div class="card widget-hover overflow-hidden">
                                        <div class="card-header card-no-border pb-2">
                                            <!-- <h5>Menu</h5> -->
                                        </div>
                                        <div class="card-body pt-0 count-student">
                                            <div class="row">
                                                <div class="col-xl-2">
                                                    <div class="row">
                                                        CETAK
                                                        <!-- <div class="col"> -->
                                                            <div class="form-check radio radio-primary">
                                                                <input class="form-check-input" id="radio111" type="radio" name="radio3" value="option1" checked="">
                                                                <label class="form-check-label" for="radio111">Struk</label>
                                                            </div>
                                                        <!-- </div> -->
                                                        <!-- <div class="col"> -->
                                                            <div class="form-check radio radio-primary">
                                                                <input class="form-check-input" id="radio112" type="radio" name="radio3" value="option1">
                                                                <label class="form-check-label" for="radio112">Kwitansi</label>
                                                            </div>
                                                        <!-- </div>  -->
                                                    </div>
                                                </div>
                                                <div class="col-xl-2">
                                                    <div class="row">
                                                        <!-- SHORTCUT <br> -->
                                                        <!-- <div class="col"> -->
                                                            [TAB] = Selanjutnya<br>
                                                            [SHIFT + TAB] = Sebelumnya <br>
                                                            F2 = BAYAR
                                                        <!-- </div> -->
                                                        <!-- <div class="col"> -->
                                                            <!-- <div class="form-check radio radio-primary">
                                                                <input class="form-check-input" id="radio112" type="radio" name="radio3" value="option1">
                                                                <label class="form-check-label" for="radio112">Kwitansi</label>
                                                            </div> -->
                                                        <!-- </div>  -->
                                                    </div>
                                                </div>
                                                <div class="col-xl-2">
                                                    [+] : Tambah Transaksi<br>
                                                    [CTRL + R] : Batal Transaksi <br>
                                                    F3 = TAHAN
                                                </div>
                                                <div class="col">
                                                    <button id="bayar333" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">PENJUALAN</button>
                                                </div>
                                                <div class="col">
                                                    <button id="bayar333" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">PELUNASAN</button>
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-square btn-outline-primary col-xl-12" data-bs-toggle="modal" data-original-title="test" data-bs-target="#modaload" style="font-size:20px;">LOAD</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card widget-1">
                                        <div class="card-body">
                                            <div class="widget-content">
                                            <div class="widget-round secondary">
                                                <div class="bg-round">
                                                <svg class="svg-fill">
                                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#cart"> </use>
                                                </svg>
                                                <svg class="half-circle svg-fill">
                                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                                </svg>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="total_pos">Rp.0</h2>
                                            </div>
                                            </div>
                                        </div>
                        </div>
                        <div class="col-md-12 col-sm-6" >
                            <div class="card">
                                    <div class="card-header card-no-border pb-2">
                                        <h5>Informasi</h5>
                                        <span>Toko Ling Ling</span>
                                    </div>
                                <br><br><hr>
                                <div class="card-body pt-0 count-student">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <p>No Struk</p>
                                        </div>
                                        <div class="col-xl-8">
                                            <?php $date = date('d').date('m').date('Y'); $urutan = $this->db->query("SELECT max(urutan) as t FROM transaksi where no_struk like '%".$date."%'")->row_array() ?>
                                            <input type="text" readonly class="form-control no_struk" value="<?= date('d') . date('m') . date('Y') .sprintf('%04d',$urutan['t']+1); ?>">
                                          </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-xl-4">
                                            <p>Pelanggan <?= explode(',',$this->session->userdata('tipe_penjualan'))[0] ?></p>
                                        </div>
                                        <div class="col-xl-8">
                                        <form action="<?= base_url('pos') ?>" method="POST">
                                            <select onchange="this.form.submit()" name="tipe" id="" class="form-control select2x">
                                                    <!-- <option <?= $this->session->userdata('tipe_penjualan') == 'umum' ? 'selected' : '' ?> value="">UMUM</option> -->
                                                    <?php foreach($customers as $x )  {
                                                        ?>
                                                    <option <?= strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == strtolower($x->tipe_penjualan) && explode(',',$this->session->userdata('tipe_penjualan'))[1]  == $x->id_customer ? 'selected' : '' ?> value="<?= strtolower($x->tipe_penjualan).",".$x->id_customer.",".$x->nama_toko ?>"><?= $x->nama_toko ?></option>
                                                    <?php } ?>
                                            </select>
                                        </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <p>Member</p>
                                        </div>
                                        <div class="col-xl-8">
                                            <input type="text" class="form-control member" value="">
                                        </div>
                                    </div>
                                    <!-- <div class="row mt-3">
                                        <div class="col-xl-4">
                                            <p>Diskon</p>
                                        </div>
                                        <div class="col-xl-8">
                                            <input type="text" id="diskon_all" class="form-control diskon_all">
                                        </div>
                                    </div> -->

                                    <div class="row mt-3">
                                        <div class="col-xl-4">
                                            <p>Total Netto</p>
                                        </div>
                                        <div class="col-xl-8">
                                            <input type="text" class="form-control total_netto">
                                        </div>
                                    </div>
                                    <!-- <div class="row mt-3">
                                        <div class="col-xl-4">
                                            <p>Total Bayar</p>
                                        </div>
                                        <div class="col-xl-8">
                                            <input type="text" id="total_bayar" class="form-control total_bayar">
                                        </div>
                                    </div> -->
                                    <div class="row mt-3">
                                        <div class="col-xl-4">
                                            <p>Jumlah Item</p>
                                        </div>
                                        <div class="col-xl-8">
                                            <input type="text" class="form-control total_item" value="0">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-xl-4">
                                            <p>Keterangan</p>
                                        </div>
                                        <div class="col-xl-8">
                                            <input type="text" class="form-control keterangan">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-xl-4">
                                            <p>Pengiriman</p>
                                        </div>
                                        <div class="col-xl-8">
                                            <select name="" id="" class="form-control select2x pengiriman">
                                                <option value="">Pilih Pengiriman</option>
                                               <?php foreach($ekspedisi as $x) { ?>
                                                <option value="<?= $x->id ?>"><?= $x->nama ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <p>Status PPN</p>
                                        </div>
                                        <div class="col-xl">
                                            <!-- <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="radio111" type="radio" name="radio3" value="option1" checked="">
                                                <label class="form-check-label" for="radio111">NonPPN</label>
                                            </div>
                                            <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="radio112" type="radio" name="radio3" value="option1">
                                                <label class="form-check-label" for="radio112">Include PPN</label>
                                            </div>
                                            <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="radio113" type="radio" name="radio3" value="option1">
                                                <label class="form-check-label" for="radio113">Exclude PPN</label>
                                            </div> -->
                                            Non PPN
                                        </div>
                                    </div>
                                    <!-- <div class="row mt-3">
                                        <div class="col">
                                            <input id="BAYAR" class="btn btn-square btn-primary col-xl-12 submit" value="BAYAR" style="font-size:20px;">
                                        </div>
                                        <div class="col">
                                            <input id="TAHAN" class="btn btn-square btn-danger col-xl-12 submit" style="font-size:20px;" value="TAHAN">
                                        </div>
                                    </div> -->
                                    <!-- <hr>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <button id="bayar3332312" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">Cek POIN</button>
                                        </div>
                                        <div class="col">
                                            <button id="tahan" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">POIN CUST</button>
                                        </div>
                                    </div> -->
                                    <!-- <div class="row mt-3">
                                        <div class="col">
                                            <button id="bayar" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">Barang</button>
                                        </div>
                                        <div class="col">
                                            <button id="tahan" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">Penjualan</button>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <button id="bayar" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">Stock</button>
                                        </div>
                                        <div class="col">
                                            <button id="tahan" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">Cek Poin</button>
                                        </div>
                                    </div> -->

                                    <!-- <div class="row mt-2">
                                    <button class="btn btn-square btn-warning" style="font-size:14px;">Stok Barang</button>
                                    </div>
                                    <div class="row mt-2">
                                    <button class="btn btn-square btn-primary" style="font-size:14px;">Data Penjualan</button>
                                    </div> -->
                                </div>
                        </div>
                    </div>

                  </div>
                  </div>
                <!--<div class="col-md-4 col-sm-6">
                    <div class="card widget-hover overflow-hidden">
                      <div class="card-header card-no-border pb-2">
                        <h5>Menu</h5>
                      </div>
                      <div class="card-body pt-0 count-student">
                        <div class="school-wrapper">
                          <div class="school-header align-self">
                            <button class="btn btn-square btn-primary" style="font-size:14px;">Data Penjualan</button>
                            <button class="btn btn-square btn-warning" style="font-size:14px;">Master Barang</button>
                            <button class="btn btn-square btn-primary" style="font-size:14px;">Stok Barang</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="col-md-9 col-sm-6">
                    <div class="card widget-hover overflow-hidden">

                      <div class="card-body pt-0 count-student">
                        <div class="">
                            <div class="row mt-4">
                                <div class="col-xl-2">
                                  <label for="">Jumlah Item</label>
                                        <input readonly type="text" class="form-control">
                                </div>
                                <div class="col-xl-2">
                                  <label for="">Discount</label>
                                        <input type="text" class="form-control">
                                </div>
                                <div class="col-xl-2 text-center">

                                </div>
                                <div class="col-xl-3">
                                  <label for="">Total Bayar</label>
                                  <h2 class="txt-secondary">Rp.121.098.221</h2>
                                </div>
                                <div class="col-xl-3 mt-4 justify-content-between">
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div> -->
                </div>
              </div>
              <!-- <div class="col-xxl-3 d-xxl-block d-none box-col-none">
                <div class="row">
                  <div class="col-xl-12 d-xl-block d-none">
                    <div class="card">
                      <div class="card-header card-no-border pb-4">
                        <h5>Increase your knowledge by Learning!</h5>
                      </div>
                      <div class="card-body pt-0 position-relative pb-0 pe-0 increase-content">
                        <div class="knowledge-wrapper">
                          <div>
                            <p class="f-light">The essential way to learn about anything is by reading quality literature!</p>
                            <button class="btn btn-primary btn-hover-effect f-w-500 knowledge-btn" type="button">Learn More</button>
                          </div>
                          <div class="knowledgebase-wrapper"><img class="knowledge-img img-fluid w-100" src="<?= base_url() ?>assets/images/dashboard-7/knowledge-base.png" alt="knowledge-base"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 notification box-col-6 d-xl-block d-none">
                    <div class="card">
                      <div class="card-header card-no-border">
                        <div class="header-top">
                          <h5>Notice Board</h5>
                          <div class="dropdown icon-dropdown">
                            <button class="btn dropdown-toggle" id="notice_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="notice_dropdown"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday </a></div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0 notice-board">
                        <ul>
                          <li class="d-flex">
                            <div class="activity-dot-primary"></div>
                            <div class="ms-3">
                              <p class="d-flex mb-2"><span class="date-content light-background">16 Feb, 2023</span></p>
                              <h6>We have over 25 years of experience. We've rented more than 250 properties and won awards.<span class="dot-notification"></span></h6>
                              <p class="f-light">Jennyfar Lopez / 5 min ago<span class="badge alert-light-success txt-success ms-2 f-w-600">New</span></p>
                            </div>
                          </li>
                          <li class="d-flex">
                            <div class="activity-dot-secondary"></div>
                            <div class="ms-3">
                              <p class="d-flex mb-2"><span class="date-content light-background">17 Feb, 2023</span></p>
                              <h6>Drawing Competition, Story Telling Competition, Craft and Creativity & Dance Competition<span class="dot-notification"></span></h6>
                              <p class="f-light">Rubi Rao / 10 min ago</p>
                            </div>
                          </li>
                          <li class="d-flex">
                            <div class="activity-dot-success"></div>
                            <div class="ms-3">
                              <p class="d-flex mb-2"><span class="date-content light-background">18 Feb, 2023</span></p>
                              <h6>Announces a series of Parent Education Webinars for connected parents<span class="dot-notification"></span></h6>
                              <p class="f-light">Jenny Wilson / 1 hr ago</p>
                            </div>
                          </li>
                          <li class="d-flex pb-0">
                            <div class="activity-dot-warning"></div>
                            <div class="ms-3">
                              <p class="d-flex mb-2"><span class="date-content light-background">19 Feb, 2023</span></p>
                              <h6>Rakhi Making Competition  & Independence day and Investiture Ceremony<span class="dot-notification"></span></h6>
                              <p class="f-light">Cameron Williamson / 10 min ago</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 d-xl-block d-none">
                    <div class="card">
                      <div class="card-header card-no-border">
                        <div class="header-top">
                          <h5>Student's Leader</h5>
                          <div class="dropdown icon-dropdown">
                            <button class="btn dropdown-toggle" id="students_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="students_dropdown"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday </a></div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                        <div class="student-leader-wrapper">
                          <div class="student-leader-content light-card"><img src="<?= base_url() ?>assets/images/dashboard-7/attendance/student-leader/rank-1.svg" alt="rank-1"><img class="leader-img" src="<?= base_url() ?>assets/images/dashboard-7/attendance/student-leader/user-1.jpg" alt="user 1">
                            <div class="leader-content-height">
                              <h6 class="pb-1">Brooklyn </h6><span class="text-muted">Helping Other</span>
                            </div>
                          </div>
                          <div class="student-leader-content light-card"><img src="<?= base_url() ?>assets/images/dashboard-7/attendance/student-leader/rank-2.svg" alt="rank-2"><img class="leader-img" src="<?= base_url() ?>assets/images/dashboard-7/attendance/student-leader/user-2.jpg" alt="user 2">
                            <div class="leader-content-height">
                              <h6 class="pb-1">Jenny Wilson</h6><span class="text-muted">Game Winner</span>
                            </div>
                          </div>
                          <div class="student-leader-content light-card"><img src="<?= base_url() ?>assets/images/dashboard-7/attendance/student-leader/rank-3.svg" alt="rank-2"><img class="leader-img" src="<?= base_url() ?>assets/images/dashboard-7/attendance/student-leader/user-3.jpg" alt="user 3">
                            <div class="leader-content-height">
                              <h6 class="pb-1">Savannah</h6><span class="text-muted">Great Job!</span>
                            </div>
                          </div>
                          <div class="student-leader-content">
                            <h5>4<sup>th</sup></h5><img class="leader-img" src="<?= base_url() ?>assets/images/dashboard-7/attendance/student-leader/user-4.jpg" alt="user 4">
                            <div class="leader-content-height">
                              <h6 class="pb-1">Esther Howard</h6><span class="text-muted">Best Developer</span>
                            </div>
                          </div>
                          <div class="student-leader-content border-0 pb-0">
                            <h5>5<sup>th</sup></h5><img class="leader-img" src="<?= base_url() ?>assets/images/dashboard-7/attendance/student-leader/user-5.jpg" alt="user 5">
                            <div class="leader-content-height">
                              <h6 class="pb-1">Ralph Edwards</h6><span class="text-muted">Best Designer              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <!-- <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright 2023 © Cuba theme by pixelstrap  </p>
              </div>
            </div>
          </div>
        </footer> -->
      </div>
    </div>
                     <div class="modal fade" id="payment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Pembayaran</h5>
                            <!-- <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button> -->
                          </div>
                          <div class="modal-body mdl-payment">
                            <div class="modal-toggle-wrapper">
                                <!-- <?= $this->session->flashdata('msg') ?> -->
                                <!-- <div class="row justify-content-md-center">
                                    <div class="col-xl-4">
                                       <h6> Informasi POS </h6>
                                    </div>
                                </div> -->
                                <div class="row justify-content-md-center">
                                    <div class="col-xl-4">
                                        <h6> Total Bayar </h6>
                                    </div>
                                    <div class="col-xl-6">
                                        <input type="text" class="form-control total_bayar" id="total_bayar">
                                        <!-- <span style="font-size:20px" class="bayar_show"></span> -->
                                    </div>
                                </div>
                                <div class="row justify-content-md-center mt-2">
                                    <div class="col-xl-4">
                                        <h6> Total Transaksi </h6>
                                    </div>
                                    <div class="col-xl-6">
                                        <input type="text" class="form-control transaksi_show" readonly>
                                        <!-- <span style="font-size:20px" class="transaksi_show"></span> -->
                                    </div>
                                </div>
                                <div class="row justify-content-md-center mt-2">
                                    <div class="col-xl-4">
                                       <h6>Diskon </h6>
                                    </div>
                                    <div class="col-xl-6">
                                      <input type="text" class="form-control diskon_all" id="diskon_all">
                                        <!-- <span style="font-size:20px" class="diskon_show"></span> -->
                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col-xl-4">
                                       <h6> Kembali </h6>
                                    </div>
                                    <div class="col-xl-6">
                                        <span style="font-size:20px" class="kembali">Rp.0</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row justify-content-md-center mt-3">
                                        <div class="col-xl-4">
                                            <span style="font-size:20px;text-align:center;">Metode Pembayaran</span>
                                        </div>
                                </div>
                                    <div class="row justify-content-md-center mt-3">
                                        <div class="col-xl-6">
                                            <div class="form-check radio radio-secondary">
                                                <input class="form-check-input pembayaran" id="radio21" type="radio" name="radio" value="TRANSFER">
                                                <label class="form-check-label" for="radio21">TRANSFER </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-check radio radio-secondary">
                                                <input class="form-check-input pembayaran" id="radio22" type="radio" name="radio" value="CASH">
                                                <label class="form-check-label" for="radio22">CASH </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-check radio radio-secondary">
                                                <input class="form-check-input pembayaran" id="radio24" type="radio" name="radio" value="VOCHER">
                                                <label class="form-check-label" for="radio24">VOCHER </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-xl-8"></div>
                                        <div class="col-xl-2 mr-2">
                                            <!-- <input class="btn btn-square btn-primary submit" value="BAYAR"> -->
                                            <button id="BAYAR" class="btn bg-primary d-flex align-items-center gap-2 text-light ms-auto submit" type="button">BAYAR</button>
                                        </div>
                                        <div class="col-xl-2">
                                            <!-- <input class="btn btn-square btn-primary submit" value="BAYAR"> -->
                                            <button class="btn bg-secondary d-flex align-items-center gap-2 text-light ms-auto" type="button" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                                                    <div class="modal fade bd-example-modal-lg" id="modaload" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Load Data POS</h5>
                                                                <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="modal-toggle-wrapper">
                                                                    <div class="row justify-content-md-center">
                                                                        <div class="col-xl-12">
                                                                        <div class="table-responsive">
                                                                          <table class="display" id="t_barang">
                                                                            <thead>
                                                                                <tr>
                                                                                <th></th>
                                                                                <th width="400" scope="col">No Struk</th>
                                                                                <th width="80" scope="col">Pelanggan</th>
                                                                                <th width="180" scope="col">Total Transaksi</th>
                                                                                <th width="180" scope="col">Load</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach($load as $x) { ?>
                                                                                <tr style="background-color: white;">
                                                                                        <td>
                                                                                            <a type="button" class="delete_satuan badge badge-danger"><i data-feather="trash-2"></i></a>
                                                                                        </td>
                                                                                        <td class="order">
                                                                                        <?= $x->no_struk ?>
                                                                                                </td>
                                                                                        <td>
                                                                                            <?= $x->pelanggan ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $x->pelanggan ?>"
                                                                                        </td>
                                                                                        <td><a class="badge badge-primary" href="<?= base_url('pos/index/'.$x->id) ?>" ><i data-feather="edit-3"></i></a></td>

                                                                                </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="col-xl-3">
                                                                            <span style="font-size:20px" class="bayar_show"></span>
                                                                        </div>
                                                                    </div>                                                                        <div class="row mt-3">
                                                                            <div class="col-xl-8"></div>
                                                                            <div class="col-xl-2">
                                                                                <!-- <input class="btn btn-square btn-primary submit" value="BAYAR"> -->
                                                                                <button id="BAYAR" class="btn bg-primary d-flex align-items-center gap-2 text-light ms-auto submit" type="button">BAYAR</button>
                                                                            </div>
                                                                            <div class="col-xl-2">
                                                                                <!-- <input class="btn btn-square btn-primary submit" value="BAYAR"> -->
                                                                                <button class="btn bg-secondary d-flex align-items-center gap-2 text-light ms-auto" type="button" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
    <!-- latest jquery-->
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>

<script type="text/javascript" src="https://repo.rachmat.id/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script> -->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap js-->
    <script src="<?= base_url() ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="<?= base_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?= base_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="<?= base_url() ?>assets/js/scrollbar/simplebar.js"></script>
    <script src="<?= base_url() ?>assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?= base_url() ?>assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="<?= base_url() ?>assets/js/sidebar-menu.js"></script>
    <script src="<?= base_url() ?>assets/js/slick/slick.min.js"></script>
    <script src="<?= base_url() ?>assets/js/slick/slick.js"></script>
    <script src="<?= base_url() ?>assets/js/header-slick.js"></script>
    <!-- <script src="<?= base_url() ?>assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="<?= base_url() ?>assets/js/chart/apex-chart/stock-prices.js"></script> -->
    <script src="<?= base_url() ?>assets/js/sweet-alert/sweetalert.min.js"></script>
    <script src="<?= base_url() ?>assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="<?= base_url() ?>assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="<?= base_url() ?>assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="<?= base_url() ?>assets/js/dashboard/dashboard_7.js"></script>
    <script src="<?= base_url() ?>assets/js/height-equal.js"></script>
    <script src="<?= base_url() ?>assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/js/datatable/datatables/datatable.custom.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?= base_url() ?>assets/js/script.js"></script>
    <!-- <script src="<?= base_url() ?>assets/js/theme-customizer/customizer.js"></script> -->
    <!-- Plugin used-->
    <script>

        $(function() {
          $('.select2x').select2();

                        $('.stock1').attr('disabled',true)
                        $('.stock-c1').attr('disabled',true)

                        var counter = 1;
                        var data = "<?= base_url('pos/get_barang') ?>";
                        $(".barang1").autocomplete({
                            source: data,
                            select: function (event, ui) {
                                $('.barang1').val(ui.item.label);
                                $('.id_barang1').val(ui.item.description);
                                var i,j;
                                            $('.total_item').val(1)
                                            $.ajax({
                                                url : "<?= site_url('pos/search_barang');?>",
                                                method : "POST",
                                                data : {id: ui.item.description},
                                                async : true,
                                                dataType : 'json',
                                                success: function(data){
                                                        var satuann = ''
                                                        if (data.id_satuan_besar != "") {
                                                            satuann += '<option value=' + data.qty_besar + ","+data.id_satuan_besar+ '>'+ data.id_satuan_besar +' </option>';
                                                        }
                                                        if (data.id_satuan_kecil != "") {
                                                            satuann += '<option value=' + data.qty_kecil + ","+data.id_satuan_kecil+ '>'+ data.id_satuan_kecil +' </option>';
                                                        }
                                                         if (data.id_satuan_kecil_konv != "") {
                                                            satuann += '<option value=' + data.qty_konv + ","+data.id_satuan_kecil_konv+'>'+ data.id_satuan_kecil_konv +' </option>';
                                                        }
                                                        <?php if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'umum') { ?>
                                                            var harga1 = formatRupiah(data.hargajualb_retail)
                                                            if (data.id_satuan_besar != "") {
                                                                var qtyyy = data.qty_besar
                                                            }
                                                            var jumlah = data.hargajualb_retail * qtyyy
                                                        <?php }else if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'retail') { ?>
                                                            var harga1 = formatRupiah(data.hargajualb_retail)
                                                                if (data.id_satuan_besar != "") {
                                                                    var qtyyy = data.qty_besar
                                                                }
                                                            var jumlah = data.hargajualb_retail * qtyyy
                                                        <?php } else if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'grosir'){ ?>
                                                            var harga1 = formatRupiah(data.hargajualb_grosir)
                                                            if (data.id_satuan_kecil != "") {
                                                                    var qtyyy = data.qty_kecil
                                                                }
                                                            var jumlah = data.hargajualk_grosir * qtyyy
                                                        <?php } else if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'partai'){ ?>
                                                            var harga1 = formatRupiah(data.hargajualb_partai)
                                                        <?php } else if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'promo'){ ?>
                                                            var harga1 = formatRupiah(data.hargajualb_promo)
                                                        <?php }?>
                                                        var stok = data.stok
                                                        var min_stok = data.min_stok
                                                    if (stok == min_stok) {
                                                            swal({
                                                            title: "Opss..!",
                                                            text: "Barang "+ data.nama+" sisa "+data.stok,
                                                            icon: "warning",
                                                            dangerMode: true,
                                                            }).then((r) => {
                                                                if (r) {
                                                                location.reload();
                                                                //   $('input[id="idq'+i+'"').val($('p.stock'+i+'').text() - $('p.stock-c'+i+'').text())
                                                                // swal({
                                                                //   text : "oke"
                                                                // })
                                                                }
                                                            });
                                                    }else{
                                                        $("#diskon_item").prop('disabled', false);
                                                        $('.satuan1').html(satuann);
                                                        $('.harga1').val(harga1);
                                                        $('.qty_isi1').val(qtyyy);
                                                        $('.jumlah1').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                        $('.total_pos').html("Rp."+jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                        $('.stock1').val(stok);
                                                          var qty_isi = $(".satuan1")[0].value //qty isi satuan
                                                          var qty = $("input[id='idq1']")[0].value * qty_isi.split(',')[0]
                                                        $('.stock-c1').val(stok - qty);
                                                    // console.log(data.nama)
                                                    }

                                                }
                                            });
                                            return false;
                                        // });
                            }
                        });

                        var qty = $(".qty1")
                        var diskon_item = $(".diskon_item1")
                        var satuan_x = $(".satuan1")
                        qty.keyup(function() {
                            var id=$(this).val();
                            i = this.id.slice(3);
                            j = this.value;
                            var qty_isi = satuan_x[0].value
                            var diskon_item = $("input[id='idd"+i+"']")[0].value
                            var stock_c = $('.stock-c'+i+'').val()
                                                if (stock_c == 0) {
                                                    swal({
                                                        title: "Opss..!",
                                                        text: "Stock sisa 10",
                                                        icon: "warning",
                                                        dangerMode: true,
                                                    }).then((r) => {
                                                        if (r) {
                                                        location.reload();
                                                    //   $('input[id="idq'+i+'"').val($('p.stock'+i+'').text() - $('p.stock-c'+i+'').text())
                                                        // swal({
                                                        //   text : "oke"
                                                    // })
                                                        }
                                                    });

                                                }else{
                                                    var jumlah = $('.harga'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, '') * j * qty_isi.split(',')[0] - diskon_item.replace(/[^a-zA-Z0-9 ]/g, '')
                                                        $('.jumlah'+i+'').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                        $('.stock-c'+i+'').val($('.stock'+i+'').val() - j * qty_isi.split(',')[0]);
                                                        var total_pos_fix = 0;
                                                        for (let t = 1; t <=counter; t++) {
                                                            total_pos_fix += parseInt($(".jumlah"+t+"")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                                        }
                                                        $('.total_pos').html("Rp."+total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

                                            }

                        });

                        diskon_item.keyup(function() {
                                i = this.id.slice(3);
                                j = this.value;
                                var qty = $("input[id='idq"+i+"']")[0].value
                                var qty_isi_satuan = satuan_x[0].value //qty satuan

                                        var jumlah = $('.harga'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, '') * qty * qty_isi_satuan.split(',')[0] - j.replace(/[^a-zA-Z0-9 ]/g, '')
                                        $('.jumlah'+i+'').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                        $('.stock-c'+i+'').val($('.stock'+i+'').val() - qty * qty_isi_satuan.split(',')[0]);
                                        $('.total_pos').html("Rp."+jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                        })
                        satuan_x.change(function(){
                                    var id=$(this).val();
                                    i = this.id.slice(3);
                                    j = this.value; //isi satuan
                                    var qty = $("input[id='idq"+i+"']")[0].value
                                    var diskon_item = $("input[id='idd"+i+"']")[0].value
                                                var jumlah = $('.harga'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, '') * qty * j.split(',')[0] - diskon_item.replace(/[^a-zA-Z0-9 ]/g, '')
                                                console.log(jumlah)
                                                $('.jumlah'+i+'').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                $('.stock-c'+i+'').val($('.stock'+i+'').val() - qty * j.split(',')[0]);
                                                $('.total_pos').html("Rp."+jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

                        })

                //shortcut
                var rupiah = document.getElementById('idd1');
                rupiah.addEventListener('keyup', function(e){
                    rupiah.value = formatRupiah(this.value, '');
                  });
                  function formatRupiah(angka, prefix){
                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split   		= number_string.split(','),
                    sisa     		= split[0].length % 3,
                    rupiah     		= split[0].substr(0, sisa),
                    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
                    if(ribuan){
                      separator = sisa ? '.' : '';
                      rupiah += separator + ribuan.join('.');
                    }

                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
                }
                                var rupiah3 = document.getElementById('diskon_all');
                                // var rupiah = document.getElementsByClassName('diskon_all');
                                rupiah3.addEventListener('keyup', function(e){
                                    rupiah3.value = formatRupiah(this.value, '');
                                });
                                function formatRupiah(angka, prefix){
                                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                    split   		= number_string.split(','),
                                    sisa     		= split[0].length % 3,
                                    rupiah     		= split[0].substr(0, sisa),
                                    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                    if(ribuan){
                                    separator = sisa ? '.' : '';
                                    rupiah += separator + ribuan.join('.');
                                    }

                                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
                                }

                                var rupiah4 = document.getElementById('total_bayar');
                                rupiah4.addEventListener('keyup', function(e){
                                    rupiah4.value = formatRupiah(this.value, '');
                                });
                                function formatRupiah(angka, prefix){
                                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                    split   		= number_string.split(','),
                                    sisa     		= split[0].length % 3,
                                    rupiah     		= split[0].substr(0, sisa),
                                    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                    if(ribuan){
                                    separator = sisa ? '.' : '';
                                    rupiah += separator + ribuan.join('.');
                                    }

                                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
                                }
                document.onkeyup = function(e) {
                    if (e.which == 224) {
                        // location.reload();
                    }else if (e.which == 16) {

                        var max_fields = 100;
                        var wrapper = $("#sampel-wrapper");
                        // var add_kom = $("#add-sampel");
                        if ($(".barang"+counter+"").val() == "") {
                            swal({
                                title: "Opss..!",
                                text: "Barang sebelumnya harus di isi",
                                icon: "warning",
                                dangerMode: true,
                                })
                        }else{
                            if (counter < max_fields) {
                                counter++;
                                $(wrapper).append(
                                    '<tr>'+
                                    '<td>'+
                                    '<div class="form-check checkbox checkbox-primary mb-0">'+
                                                        '<input class="form-check-input delete_check" value="'+counter+'" id="checkbox-primary-'+counter+'" type="checkbox">'+
                                                        '<label class="form-check-label" for="checkbox-primary-'+counter+'"></label>'+
                                                        '</div>'+
                                                        '</td>'+
                                    '<td>'+
                                    '<input class="form-control barang'+counter+'">'+
                                    '<input type="hidden" class="form-control id_barang'+counter+'">'+
                                    '</td>'+
                                    '<td>'+
                                    '<input id="idq'+counter+'" type="number" style="text-align:center;" value="1" class="form-control qty'+counter+'">'+
                                    '</td>'+
                                    '<td>'+
                                    '<select id="ids'+counter+'" class="form-control satuan'+counter+'" style="cursor: text;">'+
                                        '<option value="">Pilih satuan</option>'+
                                    '</select>'+
                                    '</td>'+
                                    '<td>'+
                                    '<input readonly type="text" class="form-control harga'+counter+'">'+
                                    '</td>'+
                                    '<td>'+
                                    '<input type="text" id="idd'+counter+'" placeholder="0" style="text-align:center;" class="form-control diskon_item'+counter+'">'+
                                    '</td>'+
                                    '<td>'+
                                    '<input readonly type="text" class="form-control jumlah'+counter+'">'+
                                    '</td>'+
                                    '<td>'+
                                    '<div class="row">'+
                                            '<div class="col-xl-6">'+
                                                '<input type="text" class="form-control stock">'+
                                            '</div>'+
                                            '<div class="col-xl-6">'+
                                                '<input type="text" class="form-control stock-c">'+
                                            ' </div>'+
                                    '</div>'+
                                    '</td>'+
                                    '</tr>'
                              );
                              $('.select2x').select2();
                            }
                            var data = "<?= base_url('pos/get_barang') ?>";
                            $(".barang"+counter+"").autocomplete({
                                source: data,
                                select: function (event, ui) {
                                    $('.barang'+counter+'').val(ui.item.label);
                                    $('.id_barang'+counter+'').val(ui.item.description);
                                    var i,j;
                                                $.ajax({
                                                    url : "<?= site_url('pos/search_barang');?>",
                                                    method : "POST",
                                                    data : {id: ui.item.description},
                                                    async : true,
                                                    dataType : 'json',
                                                    success: function(data){
                                                            var satuann = ''
                                                            if (data.id_satuan_besar != "") {
                                                            satuann += '<option value=' + data.qty_besar + ","+data.id_satuan_besar+ '>'+ data.id_satuan_besar +' </option>';
                                                            }
                                                            if (data.id_satuan_kecil != "") {
                                                                satuann += '<option value=' + data.qty_kecil + ","+data.id_satuan_kecil+ '>'+ data.id_satuan_kecil +' </option>';
                                                            }
                                                            if (data.id_satuan_kecil_konv != "") {
                                                                satuann += '<option value=' + data.qty_konv + ","+data.id_satuan_kecil_konv+'>'+ data.id_satuan_kecil_konv +' </option>';
                                                            }
                                                            <?php if ($this->session->userdata('tipe_penjualan') == 'umum') { ?>
                                                                var harga1 = formatRupiah(data.hargajualb_retail)
                                                                if (data.id_satuan_besar != "") {
                                                                    var qtyyy = data.qty_besar
                                                                }
                                                                var jumlah = data.hargajualb_retail * qtyyy
                                                            <?php }else if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'retail') { ?>
                                                                var harga1 = formatRupiah(data.hargajualb_retail)
                                                                if (data.id_satuan_besar != "") {
                                                                    var qtyyy = data.qty_besar
                                                                }
                                                                var jumlah = data.hargajualb_retail * qtyyy
                                                            <?php } else if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'grosir'){ ?>
                                                                var harga1 = formatRupiah(data.hargajualb_grosir)
                                                            <?php } else if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'partai'){ ?>
                                                                var harga1 = formatRupiah(data.hargajualb_partai)
                                                            <?php } else if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'promo'){ ?>
                                                                var harga1 = formatRupiah(data.hargajualb_promo)
                                                            <?php } ?>
                                                            var stok = data.stok
                                                            var min_stok = data.min_stok
                                                        if (stok == min_stok) {
                                                                swal({
                                                                title: "Opss..!",
                                                                text: "Barang "+ data.nama+" sisa "+data.stok,
                                                                icon: "warning",
                                                                dangerMode: true,
                                                                }).then((r) => {
                                                                    if (r) {
                                                                    location.reload();
                                                                    //   $('input[id="idq'+i+'"').val($('p.stock'+i+'').text() - $('p.stock-c'+i+'').text())
                                                                    // swal({
                                                                    //   text : "oke"
                                                                    // })
                                                                    }
                                                                });
                                                        }else{
                                                            $("#diskon_item").prop('disabled', false);
                                                            $('.satuan'+counter+'').html(satuann);
                                                            $('.harga'+counter+'').val(harga1);
                                                            $('.qty_isi'+counter+'').val(qtyyy);
                                                            $('.jumlah'+counter+'').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                            var total_pos_fix = 0;
                                                            for (let t = 1; t <=counter; t++) {
                                                              total_pos_fix += parseInt($(".jumlah"+t+"")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                                            }
                                                            $('.total_pos').html("Rp."+total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                            $('.stock'+counter+'').val(stok);
                                                              var qty_isi = $(".satuan"+counter+"")[0].value //qty isi satuan
                                                              var qty = $("input[id='idq"+counter+"']")[0].value * qty_isi.split(',')[0]
                                                            $('.stock-c'+counter+'').val(stok - qty);
                                                        // console.log(data.nama)
                                                             $('.total_item').val(counter)

                                                        }

                                                    }
                                                });
                                                return false;
                                            // });
                                }
                            });

                            var qty = $(".qty"+counter+"")
                            var diskon_item = $(".diskon_item"+counter+"")
                            var satuan_x = $(".satuan"+counter+"")
                            qty.keyup(function() {
                                var id=$(this).val();
                                i = this.id.slice(3);
                                j = this.value;
                                var qty_isi = satuan_x[0].value //isi satuan
                                var diskon_item = $("input[id='idd"+i+"']")[0].value
                                var stock_c = $('.stock-c'+i+'').val()
                                                    if (stock_c == 0) {
                                                        swal({
                                                            title: "Opss..!",
                                                            text: "Stock sisa 10",
                                                            icon: "warning",
                                                            dangerMode: true,
                                                        }).then((r) => {
                                                            if (r) {
                                                            location.reload();
                                                        //   $('input[id="idq'+i+'"').val($('p.stock'+i+'').text() - $('p.stock-c'+i+'').text())
                                                            // swal({
                                                            //   text : "oke"
                                                        // })
                                                            }
                                                        });

                                                    }else{
                                                        var jumlah = $('.harga'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, '') * j * qty_isi.split(',')[0] - diskon_item.replace(/[^a-zA-Z0-9 ]/g, '')
                                                            $('.jumlah'+i+'').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                            $('.stock-c'+i+'').val($('.stock'+i+'').val() - j * qty_isi.split(',')[0]);
                                                            var total_pos_fix = 0;
                                                            for (let t = 1; t <=counter; t++) {
                                                              total_pos_fix += parseInt($(".jumlah"+t+"")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                                            }
                                                            $('.total_pos').html("Rp."+total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));


                                                }

                            });

                            diskon_item.keyup(function() {
                                    i = this.id.slice(3);
                                    j = this.value;
                                    var qty = $("input[id='idq"+i+"']")[0].value
                                    var qty_isi_satuan = satuan_x[0].value //qty satuan

                                            var jumlah = $('.harga'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, '') * qty * qty_isi_satuan.split(',')[0] - j.replace(/[^a-zA-Z0-9 ]/g, '')
                                            $('.jumlah'+i+'').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                            $('.stock-c'+i+'').val($('.stock'+i+'').val() - qty * qty_isi_satuan.split(',')[0]);
                                            var total_pos_fix = 0;
                                             for (let t = 1; t <=counter; t++) {
                                               total_pos_fix += parseInt($(".jumlah"+t+"")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                            }
                                             $('.total_pos').html("Rp."+total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                            })
                            satuan_x.change(function(){
                                        var id=$(this).val();
                                        i = this.id.slice(3);
                                        j = this.value; //isi satuan
                                        var qty = $("input[id='idq"+i+"']")[0].value
                                        var diskon_item = $("input[id='idd"+i+"']")[0].value
                                                    var jumlah = $('.harga'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, '') * qty * j.split(',')[0] - diskon_item.replace(/[^a-zA-Z0-9 ]/g, '')
                                                    console.log(jumlah)
                                                    $('.jumlah'+i+'').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                    $('.stock-c'+i+'').val($('.stock'+i+'').val() - qty * j.split(',')[0]);
                                                    var total_pos_fix = 0;
                                                     for (let t = 1; t <=counter; t++) {
                                                      total_pos_fix += parseInt($(".jumlah"+t+"")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                                    }
                                                    $('.total_pos').html("Rp."+total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

                            })
                            var rupiah = document.getElementById('idd'+counter+'');
                                rupiah.addEventListener('keyup', function(e){
                                    rupiah.value = formatRupiah(this.value, '');
                                });
                                function formatRupiah(angka, prefix){
                                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                    split   		= number_string.split(','),
                                    sisa     		= split[0].length % 3,
                                    rupiah     		= split[0].substr(0, sisa),
                                    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                    if(ribuan){
                                    separator = sisa ? '.' : '';
                                    rupiah += separator + ribuan.join('.');
                                    }

                                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
                                }
                        }
                    }else if (e.which == 112 || e.which == 113) {
                            if (e.which == 112) {
                                var value_ac = "BAYAR"
                            }else if (e.which == 113) {
                                var value_ac = "TAHAN"
                            }

                            if ($(".id_barang"+counter+"").val() == "") {
                                swal({
                                           title: "Opss..!",
                                            text: "Barang tidak boleh kosong",
                                            icon: "warning",
                                      })
                            }else{
                                // if ($('.total_bayar').val() == "") {
                                //     swal({
                                //            title: "Opss..!",
                                //             text: "Total bayar tidak boleh kosong",
                                //             icon: "warning",
                                //       })
                                // }else{
                                //   $('#payment')[0].reset();
                                  $('.value_ac').val(value_ac);
                                  if (value_ac == 'TAHAN') {
                                    $('.submit').attr('id','TAHAN');
                                    $('.submit').html('TAHAN');
                                    $('.submit').attr('class','btn btn-warning submit');
                                  }else if(value_ac == 'BAYAR'){
                                    $('.submit').attr('id','BAYAR');
                                    $('.submit').html('BAYAR');
                                    $('.submit').attr('class','btn btn-primary');
                                  }
                                  // var total_final = $('.total_bayar').val().replace(/[^a-zA-Z0-9 ]/g, '') - $('.total_pos').html().slice(2).replace(/[^a-zA-Z0-9 ]/g, '') + parseInt($('.diskon_all').val() == "" ? 0 : $('.diskon_all').val().replace(/[^a-zA-Z0-9 ]/g, ''))
                                  $('.transaksi_show').val($('.total_pos').html())
                                  // $('.diskon_all').val($('.diskon_all').val() == "" ? 0 : "Rp."+$('.diskon_all').val())
                                  $('.bayar_show').html("Rp."+$('.total_bayar').val().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                                  $('#payment').modal('show');

                                //   - $('.total_bayar').val()
                                // }
                            }
                        // })
                    }else if (e.which == 115) { //load transaksi
                        $('#modaload').modal('show');
                    }
                };
                var bayar = $(".total_bayar")
                var diskon_all2 = $(".diskon_all")
                bayar.keyup(function() {
                  var diskon_al = diskon_all2[0].value.replace(/[^a-zA-Z0-9 ]/g, '')
                    var value_bayar = this.value.replace(/[^a-zA-Z0-9 ]/g, '') - $('.transaksi_show').val().slice(2).replace(/[^a-zA-Z0-9 ]/g, '') + diskon_al
                    $('.kembali').html("Rp."+value_bayar.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") )
                })
                diskon_all2.keyup(function() {
                  var bayar_x = bayar.val().replace(/[^a-zA-Z0-9 ]/g, '')
                  if (this.value == "") {
                    var diskon_cal = 0
                  }else{
                    var diskon_cal = parseInt(this.value.replace(/[^a-zA-Z0-9 ]/g, ''));
                  }
                    var value_bayar2 = bayar_x - $('.transaksi_show').val().slice(2).replace(/[^a-zA-Z0-9 ]/g, '') + diskon_cal
                    $('.kembali').html("Rp."+value_bayar2.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") )
                })
                var action = $(".submit")
                action.on('click',function() {
                    if ($('.pembayaran').val() == false) {
                            swal({
                                           title: "Opss..!",
                                            text: "Pembayaran harus dipilih..!",
                                            icon: "warning",
                                      })
                        }else if($('.total_bayar').val() == ""){
                            swal({
                                           title: "Opss..!",
                                            text: "Total Pembayaran harus diisi..!",
                                            icon: "warning",
                                      })
                        }else{
                            if ($('.total_bayar').val() == 0 &&  ($('.pembayaran:checked').val() == "TRANSFER" || $('.pembayaran:checked').val() == "UTANG" || $('.pembayaran:checked').val() == "VOCHER")) {
                                    swal({
                                                title: "Opss..!",
                                                    text: "Pembayaran 0 hanya boleh cash untuk piutang..!",
                                                    icon: "warning",
                                            })
                            }else{
                                    var value_ac = "BAYAR"
                                    var value_id = this.id
                                    // console.log($('.pembayaran:checked').val())
                                    var barang = ''
                                    var xx = []
                                    for (let i = 1; i <= counter; i++) {
                                        xx.push ({
                                            kd_barang : $('.id_barang'+i+'').val(),
                                            barang : $('.barang'+i+'').val(),
                                            qty : $('.qty'+i+'').val(),
                                            satuan : $('.satuan'+i+'').val(),
                                            harga_satuan : $('.harga'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                                            diskon_item : $('.diskon_item'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                                            jumlah : $('.jumlah'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                                        })
                                    }
                                    var datax = {
                                            cek : value_ac,
                                            no_struk : $('.no_struk').val(),
                                            tipe : $('select[name="tipe"]').val(),
                                            member : $('.member').val(),
                                            diskon_all : $('.diskon_all').val(),
                                            total_netto : $('.total_netto').val(),
                                            total_bayar : $('.total_bayar').val(),
                                            kembali : $('.kembali').html().toString().slice(2).replace(/[^a-zA-Z0-9 ]/g, ''),
                                            jumlah_item : $('.total_item').val(),
                                            keterangan : $('.keterangan').val(),
                                            pengiriman : $('.pengiriman').val(),
                                            tahan : value_ac == "TAHAN" ? 1 : 0,
                                            pembayaran : $('.pembayaran:checked').val(),
                                            piutang : $('.total_bayar').val() == 0 && $('.pembayaran:checked').val() == "CASH" ? 1 : 0 ,
                                            item : xx
                                        }
                                            $.ajax({
                                                    url : "<?= site_url('pos/submit');?>",
                                                    method : "POST",
                                                    data : datax,
                                                    async : true,
                                                    dataType : 'json',
                                                    success: function(data){
                                                        if (data.tahan == '1') {
                                                            swal({
                                                                    title: "Berhasil..!",
                                                                    text: "Transaksi "+data.no_struk+"  berhasil ditahan",
                                                                    icon: "success",
                                                                    })
                                                                    .then((willDelete) => {
                                                                        if (willDelete) {
                                                                        window.location = '<?= base_url() ?>pos/';
                                                                        }
                                                                    });
                                                        }else{
                                                            swal({
                                                                title: "Berhasil..!",
                                                                text: "Transaksi "+data.no_struk+data.tahan+"  berhasil disimpan",
                                                                icon: "success",
                                                                }).then((willDelete) => {
                                                                if (willDelete) {
                                                                window.open('<?= base_url() ?>pos/cetak?id=' + data.id_transaksi,'_blank');
                                                                window.location = '<?= base_url() ?>pos'
                                                                }
                                                            });
                                                        }
                                                    },
                                                    error: function(data){
                                                        console.log(data)
                                                    }
                                            })
                        }
                    }
                })


            // console.log(localStorage.getItem("page-wrapper"))
            // if (localStorage.getItem("page-wrapper") === null) {
                $(".page-wrapper").attr(
                "class",
                "page-wrapper horizontal-wrapper "
                );
                $(".logo-wrapper")
                .find("img")
                .attr("src", "<?= base_url() ?>assets/images/logo/logo.png");
                localStorage.setItem("page-wrapper", "horizontal-wrapper");
            // }
            });



    </script>
  </body>
</html>
