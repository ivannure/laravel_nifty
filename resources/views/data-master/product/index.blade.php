<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themeon.net/nifty/v3.0.1/tables/gridjs/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Jan 2023 07:34:20 GMT -->
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta name="description" content="A table library that works everywhere">
    <title>Product | Nifty - Admin Template</title>

    <!-- STYLESHEETS -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--- -->

    <!-- Fonts [ OPTIONAL ] -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;family=Ubuntu:wght@400;500;700&amp;display=swap" rel="stylesheet">

    <!-- Bootstrap CSS [ REQUIRED ] -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.75a07e3a3100a6fed983b15ad1b297c127a8c2335854b0efc3363731475cbed6.css">

    <!-- Nifty CSS [ REQUIRED ] -->
    <link rel="stylesheet" href="../../assets/css/nifty.min.4d1ebee0c2ac4ed3c2df72b5178fb60181cfff43375388fee0f4af67ecf44050.css">

    <!-- CSS Datatables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- GridJS styles [ OPTIONAL ] -->
    <link rel="stylesheet" href="../../assets/pages/gridjs.e1d3038bb47390cb5f45d445324bacec91d3521551788d5d4898e460eda844a3.css">

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~---

    [ REQUIRED ]
    You must include this category in your project.


    [ OPTIONAL ]
    This is an optional plugin. You may choose to include it in your project.


    [ DEMO ]
    Used for demonstration purposes only. This category should NOT be included in your project.


    [ SAMPLE ]
    Here's a sample script that explains how to initialize plugins and/or components: This category should NOT be included in your project.


    Detailed information and more samples can be found in the documentation.

    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--- -->
</head>

<body class="jumping">

    <!-- PAGE CONTAINER -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div id="root" class="root mn--max hd--expanded">

        <!-- CONTENTS -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <section id="content" class="content">
            <div class="content__header content__boxed overlapping">
                <div class="content__wrap">

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item"><a href="/data-master/product">Product</a></li>
                           
                        </ol>
                    </nav>
                    <!-- END : Breadcrumb -->

                    <h1 class="page-title mb-4 mt-2">Product</h1> 
                </div>

            </div>

            <div class="content__boxed">
                <div class="content__wrap">
                    <div class="card mb-3">
                        <div class="card-body">

                            <div class="mb-3">
                                @if (session('sukses'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('sukses') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                                <h2>Tabel Data Product</h2>
                                <button class="btn btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-plus me-2"></i>Tambah Data Product</button>
                            </div>
                            
                            <table class="table" id="tableproduct">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Product</th>
                                    <th scope="col">Jenis Product</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Action</th>
                             
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($product as $item)
                                  <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->jenis_nama}}</td>
                                    <td>{{$item->deskripsi}}</td>
                                    <td>{{$item->harga}}</td>
                                    <td>{{$item->user_nama}}</td>
                                    <td>{{$item->kode}}</td>
                                   
                                   
                                    <td><a id="button-edit" href="#" type="button" onclick="e({{ json_encode($item)}})" class="btn btn-warning btn-sm" data-id= '{{json_encode($item)}}' data-bs-toggle="modal" data-bs-target="#modal_edit">Edit</a> 
                                        <a id="hapuss" href="" type="button" class="btn btn-danger btn-sm" onclick="del({{$item->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal2">Hapus</a> 
                                      </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                              {{-- <div class="text-center">
                                {{ $product->links() }}
                              </div> --}}
                              
                             
                        </div>
                    </div>

                </div>

                
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Product</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="/data-master/product/tambah" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="Nama" class="form-label">Nama</label>
                          <input type="text" name="nama" class="form-control"  id="" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                          <label for="Deskripsi" class="form-label">Deskripsi</label>
                          <input type="text" name="deskripsi" class="form-control"  id="" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                          <label for="Harga" class="form-label">Harga</label>
                          <input type="text" name="harga" class="form-control"  id="" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                          <label for="JenisProduct" class="form-label">Jenis Product</label>
                          <select name="jenis_product_id" id="tambah_jp" class="form-control">
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="Customer" class="form-label">Customer</label>
                          <select name="user_id" id="tambah_user" class="form-control">
                          </select>
                        </div>
                        {{-- <div class="mb-3">
                          <label for="kode_jenis" class="form-label">Kode</label>
                          <input type="text" name="kode" class="form-control" id="kode_jenis" required>
                        </div>  --}}
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>

       {{-- Modal edit --}}
              <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form id="form_update"  method="post">
                        @csrf
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Product</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama</label>
                          <input type="text" name="nama" class="form-control" id="namaEdit" aria-describedby="emailHelp" >
                        </div>
                        <div class="mb-3">
                            <label for="JenisProduct" class="form-label">Jenis Product</label>
                            <select name="jenis_product_id" class="form-control" id="tambahJp">
                                
                            </select>
                        </div>
                        
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                          <textarea type="text" class="form-control" name="deskripsi" id="deskripsiId" ></textarea>
                        </div> 
                        <div class="mb-3">
                            <label for="Harga" class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control"  id="hargaEdit" aria-describedby="emailHelp" required>
                          </div>
                        <div class="mb-3">
                            <label for="Customer" class="form-label">Customer</label>
                            <select name="user_id" id="tambahUser" class="form-control">
                            </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Kode</label>
                          <input type="text" name="kode" class="form-control" id="kodeEdit" readonly> 
                        </div> 
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    
                      
                    </div>
                  </form>
                  </div>
                </div>
              </div>

              {{-- modal hapus --}}
              <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Product</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     Apakah Anda Yakin ingin Menghapus Data ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <form id="form_hapus" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                      
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            <!-- FOOTER -->
            @include('layouts.footer')
            <!-- END - FOOTER -->

        </section>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - CONTENTS -->

        <!-- HEADER -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        @include('layouts.header')
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - HEADER -->

        @include('layouts.sidebar')
                <!-- MAIN NAVIGATION -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - MAIN NAVIGATION -->

        <!-- SIDEBAR -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <aside class="sidebar">
            <div class="sidebar__inner scrollable-content">

                <!-- This element is only visible when sidebar Stick mode is active. -->
                <div class="sidebar__stuck align-item-center mb-3 px-4">
                    <p class="m-0 text-danger">Close the sidebar =></p>
                    <button type="button" class="sidebar-toggler btn-close btn-lg rounded-circle ms-auto" aria-label="Close"></button>
                </div>

                <!-- Sidebar tabs nav -->
                <div class="sidebar__wrap">
                    <nav class="px-3">
                        <div class="nav nav-callout nav-fill flex-nowrap" id="nav-tab" role="tablist">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-chat" type="button" role="tab" aria-controls="nav-chat" aria-selected="true">
                                <i class="d-block demo-pli-speech-bubble-5 fs-3 mb-2"></i>
                                <span>Chat</span>
                            </button>

                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-reports" type="button" role="tab" aria-controls="nav-reports" aria-selected="false">
                                <i class="d-block demo-pli-information fs-3 mb-2"></i>
                                <span>Reports</span>
                            </button>

                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-settings" type="button" role="tab" aria-controls="nav-settings" aria-selected="false">
                                <i class="d-block demo-pli-wrench fs-3 mb-2"></i>
                                <span>Settings</span>
                            </button>
                        </div>
                    </nav>
                </div>
                <!-- End - Sidebar tabs nav -->

                <!-- Sideabar tabs content -->
                <div class="tab-content sidebar__wrap" id="nav-tabContent">

                    <!-- Chat tab Content -->
                    <div id="nav-chat" class="tab-pane fade py-4 show active" role="tabpanel" aria-labelledby="nav-chat-tab">

                        <!-- Family list group -->
                        <h5 class="px-3">Family</h5>
                        <div class="list-group list-group-borderless">

                            <div class="list-group-item list-group-item-action d-flex align-items-start mb-2">
                                <div class="flex-shrink-0 me-3">
                                    <img class="img-xs rounded-circle" src="../../assets/img/profile-photos/2.png" alt="Profile Picture" loading="lazy">
                                </div>
                                <div class="flex-grow-1 ">
                                    <a href="#" class="h6 d-block mb-0 stretched-link text-decoration-none">Stephen Tran</a>
                                    <small class="text-muted">Available</small>
                                </div>
                            </div>

                            <div class="list-group-item list-group-item-action d-flex align-items-start mb-2">
                                <div class="flex-shrink-0 me-3">
                                    <img class="img-xs rounded-circle" src="../../assets/img/profile-photos/8.png" alt="Profile Picture" loading="lazy">
                                </div>
                                <div class="flex-grow-1 ">
                                    <a href="#" class="h6 d-block mb-0 stretched-link text-decoration-none">Betty Murphy</a>
                                    <small class="text-muted">Iddle</small>
                                </div>
                            </div>

                            <div class="list-group-item list-group-item-action d-flex align-items-start mb-2">
                                <div class="flex-shrink-0 me-3">
                                    <img class="img-xs rounded-circle" src="../../assets/img/profile-photos/7.png" alt="Profile Picture" loading="lazy">
                                </div>
                                <div class="flex-grow-1 ">
                                    <a href="#" class="h6 d-block mb-0 stretched-link text-decoration-none">Brittany Meyer</a>
                                    <small class="text-muted">I think so!</small>
                                </div>
                            </div>

                            <div class="list-group-item list-group-item-action d-flex align-items-start mb-2">
                                <div class="flex-shrink-0 me-3">
                                    <img class="img-xs rounded-circle" src="../../assets/img/profile-photos/4.png" alt="Profile Picture" loading="lazy">
                                </div>
                                <div class="flex-grow-1 ">
                                    <a href="#" class="h6 d-block mb-0 stretched-link text-decoration-none">Jack George</a>
                                    <small class="text-muted">Last seen 2 hours ago</small>
                                </div>
                            </div>

                        </div>
                        <!-- End - Family list group -->

                        <!-- Friends Group -->
                        <h5 class="d-flex mt-5 px-3">Friends <span class="badge bg-success ms-auto">587 +</span></h5>
                        <div class="list-group list-group-borderless">
                            <a href="#" class="list-group-item list-group-item-action">
                                <span class="d-inline-block bg-success rounded-circle p-1"></span>
                                Joey K. Greyson
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <span class="d-inline-block bg-info rounded-circle p-1"></span>
                                Andrea Branden
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <span class="d-inline-block bg-warning rounded-circle p-1"></span>
                                Johny Juan
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <span class="d-inline-block bg-secondary rounded-circle p-1"></span>
                                Susan Sun
                            </a>
                        </div>
                        <!-- End - Friends Group -->

                        <!-- Simple news widget -->
                        <div class="px-3">
                            <h5 class="mt-5">News</h5>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui consequatur ipsum porro a repellat eaque exercitationem necessitatibus esse voluptate corporis.</p>
                            <small class="fst-italic">Last Update : Today 13:54</small>
                        </div>
                        <!-- End - Simple news widget -->

                    </div>
                    <!-- End - Chat tab content -->

                    <!-- Reports tab content -->
                    <div id="nav-reports" class="tab-pane fade py-4" role="tabpanel" aria-labelledby="nav-reports-tab">

                        <!-- Billing and Resports -->
                        <div class="px-3">
                            <h5 class="mb-3">Billing &amp Reports</h5>
                            <p>Get <span class="badge bg-danger">$15.00 off</span> your next bill by making sure your full payment reaches us before August 5th.</p>

                            <h5 class="mt-5 mb-0">Amount Due On</h5>
                            <p>August 17, 2028</p>
                            <p class="h1">$83.09</p>

                            <div class="d-grid">
                                <button class="btn btn-success" type="button">Pay now</button>
                            </div>
                        </div>
                        <!-- End - Billing and Resports -->

                        <!-- Additional actions nav -->
                        <h5 class="mt-5 px-3">Additional Actions</h5>
                        <div class="list-group list-group-borderless">
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="demo-pli-information me-2 fs-5"></i>
                                Services Information
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="demo-pli-mine me-2 fs-5"></i>
                                Usage
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="demo-pli-credit-card-2 me-2 fs-5"></i>
                                Payment Options
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="demo-pli-support me-2 fs-5"></i>
                                Messages Center
                            </a>
                        </div>
                        <!-- End - Additional actions nav -->

                        <!-- Contact widget -->
                        <div class="px-3 mt-5 text-center">
                            <div class="mb-3">
                                <i class="demo-pli-old-telephone display-4 text-primary"></i>
                            </div>
                            <p>Have a question ?</p>
                            <p class="h5 mb-0"> (415) 234-53454 </p>
                            <small><em>We are here 24/7</em></small>
                        </div>
                        <!-- End - Contact widget -->

                    </div>
                    <!-- End - Reports tab content -->

                    <!-- Settings content -->
                    <div id="nav-settings" class="tab-pane fade py-4" role="tabpanel" aria-labelledby="nav-settings-tab">

                        <!-- Account settings -->
                        <h5 class="px-3">Account Settings</h5>
                        <div class="list-group list-group-borderless">

                            <div class="list-group-item mb-1">
                                <div class="d-flex justify-content-between mb-1">
                                    <label class="form-check-label" for="_dm-sbPersonalStatus">Show my personal status</label>
                                    <div class="form-check form-switch">
                                        <input id="_dm-sbPersonalStatus" class="form-check-input" type="checkbox" checked>
                                    </div>
                                </div>
                                <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
                            </div>

                            <div class="list-group-item mb-1">
                                <div class="d-flex justify-content-between mb-1">
                                    <label class="form-check-label" for="_dm-sbOfflineContact">Show offline contact</label>
                                    <div class="form-check form-switch">
                                        <input id="_dm-sbOfflineContact" class="form-check-input" type="checkbox">
                                    </div>
                                </div>
                                <small class="text-muted">Aenean commodo ligula eget dolor. Aenean massa.</small>
                            </div>

                            <div class="list-group-item mb-1">
                                <div class="d-flex justify-content-between mb-1">
                                    <label class="form-check-label" for="_dm-sbInvisibleMode">Invisible Mode</label>
                                    <div class="form-check form-switch">
                                        <input id="_dm-sbInvisibleMode" class="form-check-input" type="checkbox">
                                    </div>
                                </div>
                                <small class="text-muted">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</small>
                            </div>

                        </div>
                        <!-- End - Account settings -->

                        <!-- Public Settings -->
                        <h5 class="mt-5 px-3">Public Settings</h5>
                        <div class="list-group list-group-borderless">

                            <div class="list-group-item d-flex justify-content-between mb-1">
                                <label class="form-check-label" for="_dm-sbOnlineStatus">Online Status</label>
                                <div class="form-check form-switch">
                                    <input id="_dm-sbOnlineStatus" class="form-check-input" type="checkbox" checked>
                                </div>
                            </div>

                            <div class="list-group-item d-flex justify-content-between mb-1">
                                <label class="form-check-label" for="_dm-sbMuteNotifications">Mute Notifications</label>
                                <div class="form-check form-switch">
                                    <input id="_dm-sbMuteNotifications" class="form-check-input" type="checkbox" checked>
                                </div>
                            </div>

                            <div class="list-group-item d-flex justify-content-between mb-1">
                                <label class="form-check-label" for="_dm-sbMyDevicesName">Show my device name</label>
                                <div class="form-check form-switch">
                                    <input id="_dm-sbMyDevicesName" class="form-check-input" type="checkbox" checked>
                                </div>
                            </div>

                        </div>
                        <!-- End - Public Settings -->

                    </div>
                    <!-- End - Settings content -->

                </div>
                <!-- End - Sidebar tabs content -->

            </div>
        </aside>
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - SIDEBAR -->

    </div>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- END - PAGE CONTAINER -->

    <!-- SCROLL TO TOP BUTTON -->
    <div class="scroll-container">
        <a href="#root" class="scroll-page rounded-circle ratio ratio-1x1" aria-label="Scroll button"></a>
    </div>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- END - SCROLL TO TOP BUTTON -->

    <!-- BOXED LAYOUT : BACKGROUND IMAGES CONTENT [ DEMO ] -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div id="_dm-boxedBgContent" class="_dm-boxbg offcanvas offcanvas-bottom" data-bs-backdrop="false" data-bs-scroll="true" tabindex="-1">
        <div class="offcanvas-body p-4">

            <!-- Content Header -->
            <div class="offcanvas-header border-bottom p-0 pb-3">
                <div>
                    <h4 class="offcanvas-title">Background Images</h4>
                    <span class="text-muted">Add an image to replace the solid background color</span>
                </div>
                <button type="button" class="btn-close btn-lg text-reset shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!-- End - Content header -->

            <!-- Collection Of Images -->
            <div id="_dm-boxedBgContainer" class="row mt-3">

                <!-- Blurred Background Images -->
                <div class="col-lg-4">
                    <h5 class="mb-4">Blurred</h5>
                    <div class="_dm-boxbg__img-container d-flex flex-wrap">
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/1.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/2.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/3.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/4.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/5.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/6.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/7.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/8.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/9.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/10.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/11.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/12.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/13.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/14.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/15.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/blurred/thumbs/16.jpg" alt="Background Image" loading="lazy">
                        </a>
                    </div>
                </div>
                <!-- End - Blurred Background Images -->

                <!-- Polygon Background Images -->
                <div class="col-lg-4">
                    <h5 class="mb-4">Polygon &amp; Geometric</h5>
                    <div class="_dm-boxbg__img-container d-flex flex-wrap">
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/1.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/2.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/3.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/4.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/5.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/6.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/7.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/8.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/9.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/10.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/11.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/12.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/13.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/14.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/15.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/polygon/thumbs/16.jpg" alt="Background Image" loading="lazy">
                        </a>
                    </div>
                </div>
                <!-- End - Polygon Background Images -->

                <!-- Abstract Background Images -->
                <div class="col-lg-4">
                    <h5 class="mb-4">Abstract</h5>
                    <div class="_dm-boxbg__img-container d-flex flex-wrap">
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/1.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/2.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/3.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/4.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/5.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/6.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/7.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/8.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/9.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/10.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/11.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/12.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/13.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/14.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/15.jpg" alt="Background Image" loading="lazy">
                        </a>
                        <a href="#" class="_dm-boxbg__thumb ratio ratio-16x9">
                            <img class="img-responsive" src="../../assets/premium/boxed-bg/abstract/thumbs/16.jpg" alt="Background Image" loading="lazy">
                        </a>
                    </div>
                </div>
                <!-- End - Abstract Background Images -->

            </div>
            <!-- End - Collection Of Images -->

        </div>
    </div>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- END - BOXED LAYOUT : BACKGROUND IMAGES CONTENT [ DEMO ] -->

    <!-- SETTINGS CONTAINER [ DEMO ] -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div id="_dm-settingsContainer" class="_dm-setting-container offcanvas offcanvas-end rounded-start" tabindex="-1">
        <button id="_dm-settingsToggler" class="_dm-btn-settings btn btn-sm btn-dark p-2 rounded-0 rounded-start shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#_dm-settingsContainer" aria-label="Customization button" aria-controls="_dm-settingsContainer">
            <i class="demo-psi-gear fs-1"></i>
        </button>

        <div class="offcanvas-body py-0">
            <div class="_dm-setting-container__content row">
                <div class="col-lg-3 p-4">

                    <h5 class="fw-bold pb-3 mb-2">Layouts</h5>

                    <!-- OPTION : Centered Layout -->
                    <h6 class="mb-2 pb-1">Layouts</h6>
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-fluidLayoutRadio">Fluid Layout</label>
                        <div class="form-check form-switch">
                            <input id="_dm-fluidLayoutRadio" class="form-check-input ms-0" type="radio" name="settingLayouts" autocomplete="off" checked>
                        </div>
                    </div>

                    <!-- OPTION : Boxed layout -->
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-boxedLayoutRadio">Boxed Layout</label>
                        <div class="form-check form-switch">
                            <input id="_dm-boxedLayoutRadio" class="form-check-input ms-0" type="radio" name="settingLayouts" autocomplete="off">
                        </div>
                    </div>

                    <!-- OPTION : Boxed layout with background images -->
                    <div id="_dm-boxedBgOption" class="opacity-50 d-flex align-items-center pt-1 mb-2">
                        <label class="form-label flex-fill mb-0">Background for boxed</label>
                        <button id="_dm-boxedBgBtn" class="btn btn-icon btn-primary btn-xs" type="button" data-bs-toggle="offcanvas" data-bs-target="#_dm-boxedBgContent" disabled>
                            <i class="demo-psi-dot-horizontal"></i>
                        </button>
                    </div>

                    <!-- OPTION : Centered Layout -->
                    <div class="d-flex align-items-start pt-1 mb-2">
                        <label class="form-check-label flex-fill text-nowrap" for="_dm-centeredLayoutRadio">Centered Layout <br><span class="badge bg-danger">New in v.3.0</span></label>
                        <div class="form-check form-switch">
                            <input id="_dm-centeredLayoutRadio" class="form-check-input ms-0" type="radio" name="settingLayouts" autocomplete="off">
                        </div>
                    </div>

                    <!-- OPTION : Transition timing -->
                    <h6 class="mt-4 mb-2 py-1">Transitions</h6>
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <select id="_dm-transtiionSelect" class="form-select" aria-label="select transition timing">
                            <option value="in-quart">In Quart</option>
                            <option value="out-quart">Out Quart</option>
                            <option value="in-back">In Back</option>
                            <option value="out-back">Out Back</option>
                            <option value="in-out-back" selected="true">In Out Back</option>
                            <option value="steps">Steps</option>
                            <option value="jumping">Jumping</option>
                            <option value="rubber">Rubber</option>
                        </select>
                    </div>

                    <!-- OPTION : Sticky Header -->
                    <h6 class="mt-4 mb-2 py-1">Header</h6>
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-stickyHeaderCheckbox">Sticky header</label>
                        <div class="form-check form-switch">
                            <input id="_dm-stickyHeaderCheckbox" class="form-check-input ms-0" type="checkbox" autocomplete="off">
                        </div>
                    </div>

                    <!-- OPTION : Additional Offcanvas -->
                    <h6 class="mt-4 mb-2 py-1">Additional Offcanvas <span class="badge bg-danger">New in BS v.5.0</span></h6>
                    <p>Select the offcanvas placement.</p>
                    <div class="text-nowrap">
                        <button type="button" class="_dm-offcanvasBtn btn btn-sm btn-primary" value="offcanvas-top">Top</button>
                        <button type="button" class="_dm-offcanvasBtn btn btn-sm btn-primary" value="offcanvas-end">Right</button>
                        <button type="button" class="_dm-offcanvasBtn btn btn-sm btn-primary" value="offcanvas-bottom">Btm</button>
                        <button type="button" class="_dm-offcanvasBtn btn btn-sm btn-primary" value="offcanvas-start">Left</button>
                    </div>

                </div>
                <div class="col-lg-3 p-4 bg-gray-300">

                    <h5 class="fw-bold pb-3 mb-2">Sidebars</h5>

                    <!-- OPTION : Sticky Navigation -->
                    <h6 class="mb-2 pb-1">Navigation</h6>
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-stickyNavCheckbox">Sticky navigation</label>
                        <div class="form-check form-switch">
                            <input id="_dm-stickyNavCheckbox" class="form-check-input ms-0" type="checkbox" autocomplete="off">
                        </div>
                    </div>

                    <!-- OPTION : Navigation Profile Widget -->
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-profileWidgetCheckbox">Widget Profile</label>
                        <div class="form-check form-switch">
                            <input id="_dm-profileWidgetCheckbox" class="form-check-input ms-0" type="checkbox" autocomplete="off" checked>
                        </div>
                    </div>

                    <!-- OPTION : Mini navigation mode -->
                    <div class="d-flex align-items-center pt-3 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-miniNavRadio">Min / Collapsed Mode</label>
                        <div class="form-check form-switch">
                            <input id="_dm-miniNavRadio" class="form-check-input ms-0" type="radio" name="navigation-mode" autocomplete="off">
                        </div>
                    </div>

                    <!-- OPTION : Maxi navigation mode -->
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-maxiNavRadio">Max / Expanded Mode</label>
                        <div class="form-check form-switch">
                            <input id="_dm-maxiNavRadio" class="form-check-input ms-0" type="radio" name="navigation-mode" autocomplete="off" checked>
                        </div>
                    </div>

                    <!-- OPTION : Push navigation mode -->
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-pushNavRadio">Push Mode</label>
                        <div class="form-check form-switch">
                            <input id="_dm-pushNavRadio" class="form-check-input ms-0" type="radio" name="navigation-mode" autocomplete="off">
                        </div>
                    </div>

                    <!-- OPTION : Slide on top navigation mode -->
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-slideNavRadio">Slide on top (default)</label>
                        <div class="form-check form-switch">
                            <input id="_dm-slideNavRadio" class="form-check-input ms-0" type="radio" name="navigation-mode" autocomplete="off">
                        </div>
                    </div>

                    <!-- OPTION : Slide on top navigation mode -->
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-revealNavRadio">Reveal Mode</label>
                        <div class="form-check form-switch">
                            <input id="_dm-revealNavRadio" class="form-check-input ms-0" type="radio" name="navigation-mode" autocomplete="off">
                        </div>
                    </div>

                    <h6 class="mt-4 mb-2 py-1">Right sidebar</h6>

                    <!-- OPTION : Disable sidebar backdrop -->
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-disableBackdropCheckbox">Disable backdrop</label>
                        <div class="form-check form-switch">
                            <input id="_dm-disableBackdropCheckbox" class="form-check-input ms-0" type="checkbox" autocomplete="off">
                        </div>
                    </div>

                    <!-- OPTION : Static position -->
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-staticSidebarCheckbox">Static position</label>
                        <div class="form-check form-switch">
                            <input id="_dm-staticSidebarCheckbox" class="form-check-input ms-0" type="checkbox" autocomplete="off">
                        </div>
                    </div>

                    <!-- OPTION : Stuck sidebar -->
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-stuckSidebarCheckbox">Stuck Sidebar </label>
                        <div class="form-check form-switch">
                            <input id="_dm-stuckSidebarCheckbox" class="form-check-input ms-0" type="checkbox" autocomplete="off">
                        </div>
                    </div>

                    <!-- OPTION : Unite Sidebar -->
                    <div class="d-flex align-items-center pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-uniteSidebarCheckbox">Unite Sidebar</label>
                        <div class="form-check form-switch">
                            <input id="_dm-uniteSidebarCheckbox" class="form-check-input ms-0" type="checkbox" autocomplete="off">
                        </div>
                    </div>

                    <!-- OPTION : Pinned Sidebar -->
                    <div class="d-flex align-items-start pt-1 mb-2">
                        <label class="form-check-label flex-fill" for="_dm-pinnedSidebarCheckbox">Pinned Sidebar <span class="badge bg-danger">New in v3.0</span></label>
                        <div class="form-check form-switch">
                            <input id="_dm-pinnedSidebarCheckbox" class="form-check-input ms-0" type="checkbox" autocomplete="off">
                        </div>
                    </div>

                </div>
                <div id="dm_colorSchemesContainer" class="col-lg-6 p-4">
                    <h5 class="fw-bold pb-3 mb-2">Color Schemes</h5>

                    <div class="row mb-3 pb-3">
                        <div class="col-md-6">

                            <div class="d-flex align-items-start position-relative">
                                <div class="flex-shrink-0 me-3">
                                    <div class="_dm-color-box bg-light"></div>
                                </div>
                                <div class="flex-grow-1 ">
                                    <a href="#" data-dir="light" data-single="true" class="_dm-themeColors schemes-btn h6 d-block mb-0 stretched-link text-decoration-none">Light</a>
                                    <small class="text-muted">Completely bright color themes.</small>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="d-flex align-items-start position-relative">
                                <div class="flex-shrink-0 me-3">
                                    <div class="_dm-color-box bg-dark"></div>
                                </div>
                                <div class="flex-grow-1 ">
                                    <a href="#" data-dir="dark" data-hd="expanded" class="_dm-themeColors schemes-btn h6 d-block mb-0 stretched-link text-decoration-none">Dark</a>
                                    <small class="text-muted">Completely dark color themes.</small>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row text-center my-3">

                        <!-- Expanded Header -->
                        <div class="col-md-4">
                            <h6 class="m-0">Expanded Header</h6>
                            <div class="_dm-colorShcemesMode">

                                <!-- Scheme Button -->
                                <button type="button" class="btn shadow-none">
                                    <img src="../../assets/img/color-schemes/expanded-header.png" alt="color scheme illusttration" loading="lazy">
                                </button>

                                <!-- Scheme Colors -->
                                <div class="_dm-colorSchemesMode__colors">
                                    <div class="d-flex flex-wrap justify-content-center">
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-gray" type="button" data-dir="all-headers/gray" data-hd="expanded"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-navy active" type="button" data-dir="all-headers/navy" data-hd="expanded"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-ocean" type="button" data-dir="all-headers/ocean" data-hd="expanded"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-lime" type="button" data-dir="all-headers/lime" data-hd="expanded"></button>

                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-violet" type="button" data-dir="all-headers/violet" data-hd="expanded"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-orange" type="button" data-dir="all-headers/orange" data-hd="expanded"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-teal" type="button" data-dir="all-headers/teal" data-hd="expanded"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-corn" type="button" data-dir="all-headers/corn" data-hd="expanded"></button>

                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-cherry" type="button" data-dir="all-headers/cherry" data-hd="expanded"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-coffee" type="button" data-dir="all-headers/coffee" data-hd="expanded"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-pear" type="button" data-dir="all-headers/pear" data-hd="expanded"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-night" type="button" data-dir="all-headers/night" data-hd="expanded"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Fair Header -->
                        <div class="col-md-4">
                            <h6 class="m-0">Fair Header</h6>
                            <div class="_dm-colorShcemesMode">

                                <!-- Scheme Button -->
                                <button type="button" class="btn shadow-none">
                                    <img src="../../assets/img/color-schemes/fair-header.png" alt="color scheme illusttration" loading="lazy">
                                </button>

                                <!-- Scheme Colors -->
                                <div class="_dm-colorSchemesMode__colors">
                                    <div class="d-flex flex-wrap justify-content-center">
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-gray" type="button" data-dir="all-headers/gray" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-navy" type="button" data-dir="" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-ocean" type="button" data-dir="all-headers/ocean" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-lime" type="button" data-dir="all-headers/lime" data-hd="fair"></button>

                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-violet" type="button" data-dir="all-headers/violet" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-orange" type="button" data-dir="all-headers/orange" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-teal" type="button" data-dir="all-headers/teal" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-corn" type="button" data-dir="all-headers/corn" data-hd="fair"></button>

                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-cherry" type="button" data-dir="all-headers/cherry" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-coffee" type="button" data-dir="all-headers/coffee" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-pear" type="button" data-dir="all-headers/pear" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-night" type="button" data-dir="all-headers/night" data-hd="fair"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h6 class="m-0">Full Header</h6>

                            <div class="_dm-colorShcemesMode">

                                <!-- Scheme Button -->
                                <button type="button" class="btn shadow-none">
                                    <img src="../../assets/img/color-schemes/full-header.png" alt="color scheme illusttration" loading="lazy">
                                </button>

                                <!-- Scheme Colors -->
                                <div class="_dm-colorSchemesMode__colors">
                                    <div class="d-flex flex-wrap justify-content-center">
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-gray" type="button" data-dir="all-headers/gray"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-navy" type="button" data-dir=""></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-ocean" type="button" data-dir="all-headers/ocean"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-lime" type="button" data-dir="all-headers/lime"></button>

                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-violet" type="button" data-dir="all-headers/violet"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-orange" type="button" data-dir="all-headers/orange"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-teal" type="button" data-dir="all-headers/teal"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-corn" type="button" data-dir="all-headers/corn"></button>

                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-cherry" type="button" data-dir="all-headers/cherry"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-coffee" type="button" data-dir="all-headers/coffee"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-pear" type="button" data-dir="all-headers/pear"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-night" type="button" data-dir="all-headers/night"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row text-center mb-3">
                        <div class="col-md-4">
                            <h6 class="m-0">Primary Nav</h6>

                            <div class="_dm-colorShcemesMode">

                                <!-- Scheme Button -->
                                <button type="button" class="btn shadow-none">
                                    <img src="../../assets/img/color-schemes/navigation.png" alt="color scheme illusttration" loading="lazy">
                                </button>

                                <!-- Scheme Colors -->
                                <div class="_dm-colorSchemesMode__colors">
                                    <div class="d-flex flex-wrap justify-content-center">
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-gray" type="button" data-dir="primary-nav/gray" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-navy" type="button" data-dir="primary-nav/navy" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-ocean" type="button" data-dir="primary-nav/ocean" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-lime" type="button" data-dir="primary-nav/lime" data-hd="fair"></button>

                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-violet" type="button" data-dir="primary-nav/violet" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-orange" type="button" data-dir="primary-nav/orange" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-teal" type="button" data-dir="primary-nav/teal" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-corn" type="button" data-dir="primary-nav/corn" data-hd="fair"></button>

                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-cherry" type="button" data-dir="primary-nav/cherry" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-coffee" type="button" data-dir="primary-nav/coffee" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-pear" type="button" data-dir="primary-nav/pear" data-hd="fair"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-night" type="button" data-dir="primary-nav/night" data-hd="fair"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h6 class="m-0">Brand</h6>

                            <div class="_dm-colorShcemesMode">

                                <!-- Scheme Button -->
                                <button type="button" class="btn shadow-none">
                                    <img src="../../assets/img/color-schemes/brand.png" alt="color scheme illusttration" loading="lazy">
                                </button>

                                <!-- Scheme Colors -->
                                <div class="_dm-colorSchemesMode__colors">
                                    <div class="d-flex flex-wrap justify-content-center">
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-gray" type="button" data-dir="brand/gray"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-navy" type="button" data-dir="brand/navy"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-ocean" type="button" data-dir="brand/ocean"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-lime" type="button" data-dir="brand/lime"></button>

                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-violet" type="button" data-dir="brand/violet"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-orange" type="button" data-dir="brand/orange"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-teal" type="button" data-dir="brand/teal"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-corn" type="button" data-dir="brand/corn"></button>

                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-cherry" type="button" data-dir="brand/cherry"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-coffee" type="button" data-dir="brand/coffee"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-pear" type="button" data-dir="brand/pear"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-night" type="button" data-dir="brand/night"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h6 class="m-0">Tall Header <span class="badge bg-danger">New in v3.0</span></h6>
                            <div class="_dm-colorShcemesMode">

                                <!-- Scheme Button -->
                                <button type="button" class="btn shadow-none">
                                    <img src="../../assets/img/color-schemes/tall-header.png" alt="color scheme illusttration" loading="lazy">
                                </button>

                                <!-- Scheme Colors -->
                                <div class="_dm-colorSchemesMode__colors">
                                    <div class="d-flex flex-wrap justify-content-center">
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-gray" type="button" data-dir="all-headers/gray" data-hd="fair,expanded,border"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-navy" type="button" data-dir="" data-hd="fair,expanded,border"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-ocean" type="button" data-dir="all-headers/ocean" data-hd="fair,expanded,border"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-lime" type="button" data-dir="all-headers/lime" data-hd="fair,expanded,border"></button>

                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-violet" type="button" data-dir="all-headers/violet" data-hd="fair,expanded,border"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-orange" type="button" data-dir="all-headers/orange" data-hd="fair,expanded,border"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-teal" type="button" data-dir="all-headers/teal" data-hd="fair,expanded,border"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-corn" type="button" data-dir="all-headers/corn" data-hd="fair,expanded,border"></button>

                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-cherry" type="button" data-dir="all-headers/cherry" data-hd="fair,expanded,border"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-coffee" type="button" data-dir="all-headers/coffee" data-hd="fair,expanded,border"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-pear" type="button" data-dir="all-headers/pear" data-hd="fair,expanded,border"></button>
                                        <button class="_dm-themeColors _dm-box-xs _dm-bg-night" type="button" data-dir="all-headers/night" data-hd="fair,expanded,border"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <h5 class="mt-5 fw-bold">Scrollbars</h5>
                    <p>Hides native scrollbars and creates custom styleable overlay scrollbars.</p>
                    <div class="row">
                        <div class="col-5">

                            <!-- OPTION : Apply the OverlayScrollBar to the body. -->
                            <div class="d-flex align-items-center pt-1 mb-2">
                                <label class="form-check-label flex-fill" for="_dm-bodyScrollbarCheckbox">Body scrollbar</label>
                                <div class="form-check form-switch">
                                    <input id="_dm-bodyScrollbarCheckbox" class="form-check-input ms-0" type="checkbox" autocomplete="off">
                                </div>
                            </div>

                            <!-- OPTION : Apply the OverlayScrollBar to content containing class .scrollable-content. -->
                            <div class="d-flex align-items-center pt-1 mb-2">
                                <label class="form-check-label flex-fill" for="_dm-sidebarsScrollbarCheckbox">Navigation and Sidebar</label>
                                <div class="form-check form-switch">
                                    <input id="_dm-sidebarsScrollbarCheckbox" class="form-check-input ms-0" type="checkbox" autocomplete="off">
                                </div>
                            </div>

                        </div>
                        <div class="col-7">

                            <div class="alert alert-warning" role="alert">
                                Please consider the performance impact of using any scrollbar plugin.
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- END - SETTINGS CONTAINER [ DEMO ] -->

    <!-- OFFCANVAS [ DEMO ] -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div id="_dm-offcanvas" class="offcanvas" tabindex="-1">

        <!-- Offcanvas header -->
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Offcanvas Header</h5>
            <button type="button" class="btn-close btn-lg text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <!-- Offcanvas content -->
        <div class="offcanvas-body">
            <h5>Content Here</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente eos nihil earum aliquam quod in dolor, aspernatur obcaecati et at. Dicta, ipsum aut, fugit nam dolore porro non est totam sapiente animi recusandae obcaecati dolorum, rem ullam cumque. Illum quidem reiciendis autem neque excepturi odit est accusantium, facilis provident molestias, dicta obcaecati itaque ducimus fuga iure in distinctio voluptate nesciunt dignissimos rem error a. Expedita officiis nam dolore dolores ea. Soluta repellendus delectus culpa quo. Ea tenetur impedit error quod exercitationem ut ad provident quisquam omnis! Nostrum quasi ex delectus vero, facilis aut recusandae deleniti beatae. Qui velit commodi inventore.</p>
        </div>

    </div>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- END - OFFCANVAS [ DEMO ] -->

    <!-- JAVASCRIPTS -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    {{-- font awasome --}}
    <script src="https://kit.fontawesome.com/1042f724b4.js" crossorigin="anonymous"></script>

    {{-- Datatables --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#tableproduct',{
            processing : true,
            serverside : true,

        });
    </script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: '/data-master/product/data',
                method: 'GET',
                dataType: 'json',
                
                success: function (response) {
                    var select = $('#tambah_user'); //tambah data
                    var jp = $('#tambah_jp'); //tambah data
                    var user = $('#tambahUser'); //update data
                    var jenis = $('#tambahJp');  //update data
                    select.empty();
                    jp.empty();
                    user.empty();
                    $.each(response.users, function(key, value) {
                        select.append('<option value="' + value.id + '">' + value.username + '</option>');
                    })
                    $.each(response.jenisProducts, function(key, value) {
                        jp.append('<option value="' + value.id + '">' + value.nama + '</option>');
                    });
                    $.each(response.users, function(key, value) {
                        user.append('<option value="' + value.id + '">' + value.username + '</option>');
                    });
                    $.each(response.jenisProducts, function(key, value) {
                        jenis.append('<option value="' + value.id + '">' + value.nama + '</option>');
                    });
                    
                }
               
            });
        });
    </script>
    
    <!-- Bootstrap JS [ OPTIONAL ] -->
    <script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../../assets/js/bootstrap.min.bdf649e4bf3fa0261445f7c2ed3517c3f300c9bb44cb991c504bdc130a6ead19.js" defer></script>

    <!-- Nifty JS [ OPTIONAL ] -->
    <script src="../../assets/js/nifty.min.b53472f123acc27ffd0c586e4ca3dc5d83c0670a3a5e120f766f88a92240f57b.js" defer></script>

    <!-- Plugin scripts [ OPTIONAL ] -->
    <script src="../../assets/pages/gridjs.min.d520dabe68d38340f7a56fda29a0b5ac8216fcbdc172a524cffb890c7a13db0d.js" defer></script>
    <script>
        let button_edit= document.getElementById('form_update');
        let button_hapus= document.getElementById('form_hapus');
        let deskripsiEdit= document.getElementById('deskripsiId');
        button_edit.addEventListener('click', function(){
            let id = JSON.parse(button_edit.getAttribute('data-id')) 
            // deskripsiEdit.value = id.nama
            // keterangan_edit.value = id.keterangan
            
            console.log(id);
        })

        function e(item){
            // let deskripsiEdit= document.getElementById('deskripsiId');
            // let parsedata = JSON.parse(button_edit.getAttribute('data-id'));
        //    console.log(item.jenis_nama)
            namaEdit.value = item.nama
            deskripsiEdit.value = item.deskripsi
            tambahJp.value = item.jenis_nama
            kodeEdit.value = item.kode
            hargaEdit.value = item.harga
            tambahUser.value = item.user_nama
            console.log(tambah_jp.value)
            // keterangan_edit.value = data.keterangan
            // kode_edit.value = data.kode
            button_edit.setAttribute('action',"{{url('/data-master/product/update')}}"+"/"+ item.id)
            
        }
        function del(id){
            // console.log(izd);
           
            button_hapus.setAttribute('action',"{{url('/data-master/product/hapus')}}"+"/"+ id)
            
        }
    </script>
</body>


<!-- Mirrored from themeon.net/nifty/v3.0.1/tables/gridjs/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Jan 2023 07:34:22 GMT -->
</html>