<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('sneat') }}/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>PPDB</title>

    <meta name="description" content="" />
    

    {{-- style --}}
    @stack('before-style')
    @include('layouts.style')
    @stack('after-style')

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        {{-- sidebar --}}
        @include('layouts.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

            @include('layouts.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              @if ($errors->any())
<div class="alert alert-danger" role="alert">
          {!! implode('', $errors->all('<div>:message</div>')) !!}

              </div>
@endif
                 @yield('content')
             
            </div>
            <!-- / Content -->

            <!-- Footer -->
                @include('layouts.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div>

   {{-- script --}}
   @stack('before-script')
   @include('layouts.script')
   @stack('after-script')
   
  </body>
</html>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
