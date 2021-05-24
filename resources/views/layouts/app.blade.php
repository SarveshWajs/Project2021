@php
if($_SERVER['REMOTE_ADDR'] != '127.0.0.1'){
    if(Request::secure()){
    }else{
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;   
    }    
}
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @if(!empty($data['website_logo']))
    <link rel="shortcut icon" href="{{ url($data['website_logo']) }}">
    @else
    <!-- <link rel="shortcut icon" href="{{ url('images/system/Vesson_Enterprise_Trans_Gold.png') }}"> -->
    @endif
    @if(!empty($data['admin']->website_name))
    <title>{{ $data['admin']->website_name }}</title>
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/ps-icon/style.css') }}">
    <!-- CSS Library-->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/Magnific-Popup/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/revolution/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/revolution/css/navigation.css') }}">
    <!-- Custom-->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
@toastr_css
</head>
<style type="text/css">
body{
    font-size: 12px;
}
h1, h2, h3, h4, h5, h6, b, div {
    color: #000;
}
.pt-80 {
     padding-top:0px; 
}
.form-control {
    outline: none;
    height: 40px;
    background-color: white;
    border-color: #e4e4e4;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -ms-box-shadow: none;
    /* box-shadow: none; */
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    border-radius: 0;
    padding: 0 20px;
}
.ps-product__columns .ps-product__column {
    float: left;
}

.ps-section__title:before {
    content: attr(data-mask);
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    left: -4px;
    z-index: -1;
    font-family:;
    font-weight: 700;
    font-size: 65px;
    line-height: 1em;
    color: #f4f4f4;
    letter-spacing: .08em;
}
.row {
    margin-right: 0px;
    margin-left: 0px;
}
.justify-content-center{
    display: flex; 
    justify-content: center;
}

.has-sub-category{
    cursor: pointer;
}

.sub-category-child{
    display: none;
    margin-left: 20px;
    margin-top : 10px;
}

.ps-list--checked li a.current:before {
    background-color: #2AC37D;
    border-color: #2AC37D;
}

.ps-list--checked li a.current:after {
    visibility: visible;
    opacity: 1;
}

.ps-footer{
 background-color: #c73e1d;
background-image: linear-gradient(315deg, #c73e1d 0%, #a23b72 37%, #2e86ab 100%);



}
.container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
     background-color: #c73e1d;
background-image: linear-gradient(315deg, #c73e1d 0%, #a23b72 37%, #2e86ab 100%);
}
.ps-footer:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 10;
background-color: #c73e1d;
background-image: linear-gradient(315deg, #c73e1d 0%, #a23b72 37%, #2e86ab 100%);



    z-index: 0;
}

.single_post_text img, #policy img{
    max-width: 100% !important;
    height: auto !important;
}

.top-nav-tabs>li.active>a, .top-nav-tabs>li.active>a:focus, .top-nav-tabs>li.active>a:hover {
    color: #fff !important;
    border-top: 2px solid #25c37d !important;
    background-color: #313645 !important;
}

.top-nav-tabs>li>a, .top-nav-tabs>li>a:focus {
    background-color: #313645 !important;
    color: #fff !important;
}

.top-nav-tabs>li{
    width: 50%;
    text-align: center;
}

.top-nav-tabs>li>a{
    border-top: none;
    border-bottom: 1px solid;
}

.nav-tabs{
    border-bottom: none !important;
}

.menu > li > a.active:before{
    visibility: visible;
    opacity: 1;
    -webkit-transform: translate(-50%, -50%) scale(1, 1);
    -moz-transform: translate(-50%, -50%) scale(1, 1);
    -ms-transform: translate(-50%, -50%) scale(1, 1);
    -o-transform: translate(-50%, -50%) scale(1, 1);
    transform: translate(-50%, -50%) scale(1, 1);
    
}

.menu > li > a.active{
    color: #000;
}

.badge-danger{
    background-color: red;
}

.badge-success{
    background-color: green;
}

.ps-product--detail .ps-product__style ul li a{
    width: unset;
}

.ps-pagination .pagination li.active span {
    color: #fff;

}

.ps-pagination .pagination li > span:before {
    width: 50px;
    height: 50px;
    background-color: #e4e4e4;
}

.btn{
    transition: all 0.4s ease;
}

.btn:hover{
    background-color: #2AC37D !important;
}

.ps-pagination .pagination li > span:before, .ps-pagination .pagination li > span:after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    z-index: -2;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.ps-pagination .pagination li.active span:after {
    visibility: visible;
    opacity: 1;
}

.ps-pagination .pagination li > span:after {
    width: 45px;
    height: 45px;
    background-color: #2AC37D;
    z-index: -1;
    visibility: hidden;
    opacity: 0;
}

.ps-pagination .pagination li > span:before, .ps-pagination .pagination li > span:after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    z-index: -2;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover, .pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover{
    background-color: unset; 
    border-color: unset;
}

.pagination>li>a, .pagination>li>span{
    float: unset;
    border: none;
    padding: 6px 16px;
}

.ps-shoe .ps-shoe__price{
    bottom: 0px;
    top: unset;
    position: unset;
}

.ps-shoe .ps-shoe__variants{
    top: 40px;
}


.header__menu ul li .header__menu__dropdown li a{
    color: #fff !important;
}

.header__menu ul li.active a{
    color: #84d8b6 !important;
}

.breadcrumb-section{
    padding: 70px 0 70px;
}

.listing-video{
    height: 265px;
    width: 100%;
}

.variation_option{
    border: 1px solid #ddd; 
    padding: 10px; 
    text-align: center;
    cursor: pointer;
}

.variation_option{
    padding: 10px; 
    text-align: center;
    cursor: pointer;
    min-width: 5rem;
    min-height: 2.125rem;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: .25rem .75rem;
    margin: 0 8px 8px 0;
    color: rgba(0,0,0,.8);
    text-align: left;
    border-radius: 2px;
    border: 1px solid rgba(0,0,0,.09);
    position: relative;
    background: #fff;
    outline: 0;
    word-break: break-word;
    display: -webkit-inline-box;
    display: -webkit-inline-flex;
    display: -moz-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -moz-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
}

.variation_option.active{
    border: 3px solid #2AC37D !important;
}

.variation_option.out-of-stock{
    border: 2px solid #eee; 
    background-color: #eee;
    cursor: not-allowed;
    pointer-events:none;
}

.button-inside{
    position: relative;
}

.button-inside input{
    padding-right: 85px;
}

.button-inside a{
    position:absolute;
    right: 10px;
    top: 8px;
    outline:none;
    text-align:center;
    font-weight:bold;
    color: #fff;
    font-size: 10px;
    padding: 2px 8px;
}

.bg-color{
    background-color: #84d8b6 !important;
    border-color: #84d8b6 !important;
}

.modal-open .modal{
    overflow-y: hidden;
}

.word-in-line {
   width: 100%; 
   text-align: center; 
   border-bottom: 1px solid #000; 
   line-height: 0.1em;
   margin: 10px 0 20px; 
} 

.word-in-line span { 
    background:#fff; 
    padding:0 5px; 
    font-size: 15px;
}

.bw-brg{
    background-color: #fff;
}

.f-15{
    font-size: 15px !important;
}

.product-description img{
    max-width: 100% !important;
}

.packages_badges{
    background: #dd2222;
    font-size: 12px;
    color: #ffffff;
    text-align: center;
    position: absolute;
    left: 15px;
    top: 15px;
    padding: 10px;
}

.footer{
    padding-bottom: 40px;
}

.product__discount__item, .featured__item{
    box-shadow: 0px 6px 10px -6px rgb(132, 216, 182);
    padding-bottom: 10px;
    margin-top: 20px;
}

.product__discount__item__text h6, .featured__item__text h6{
    height: 50px;
    overflow: hidden;
}

.product__discount__item__text h5{
    height: 50px;
    overflow: hidden;
}

.details-box li{
    margin-left: 17px;
}

.price-range-wrap .range-slider .price-input input{
    max-width: 40%;
}


.nice-select{
    width: 100% !important;
}

.cat_menu li a i{
    display: block;
}

#toast-container *{
    color: #fff;
}

.container-box{
    box-shadow: 0 0 10px 0 #eee;
    padding: 15px;
    color: #fff;
    font-size: 12px;
    background-color: #fff;
}

.important-text{
    color: red;
}

label {
    font-weight: 400;
    font-size: 14px;
}

label input[type=checkbox].ace, label input[type=radio].ace {
    z-index: -100!important;
    width: 1px!important;
    height: 1px!important;
    clip: rect(1px,1px,1px,1px);
    position: absolute;
}


input[type=checkbox].ace+.lbl, input[type=radio].ace+.lbl {
    position: relative;
    display: inline-block;
    margin: 0;
    line-height: 20px;
    min-height: 18px;
    min-width: 18px;
    font-weight: 400;
    cursor: pointer;
}

input[type=checkbox].ace+.lbl::before, input[type=radio].ace+.lbl::before {
    cursor: pointer;
    font-family: fontAwesome;
    font-weight: 400;
    font-size: 12px;
    color: #FFF;
    content: "\a0";
    background-color: #FAFAFA;
    border: 1px solid #c59868;
    box-shadow: 0 1px 2px rgba(0,0,0,.05);
    border-radius: 0;
    display: inline-block;
    text-align: center;
    height: 16px;
    line-height: 14px;
    min-width: 16px;
    margin-right: 1px;
    position: relative;
    top: -1px;
}

input[type=checkbox].ace:checked+.lbl::before, input[type=radio].ace:checked+.lbl::before {
    display: inline-block;
    content: '\f00c';
    color: #000;
    background-color: #F5F8FC;
    border-color: #ADB8C0;
    box-shadow: 0 1px 2px rgba(0,0,0,.05),inset 0 -15px 10px -12px rgba(0,0,0,.05),inset 15px 10px -12px rgba(255,255,255,.1);
}


.cart-header-list, .cart-details-list, .cart-checkout{
  padding: 10px;
  box-shadow: 0 1px 4px 0 rgba(0,0,0,.26);
  background-color: #fff;
}

.cart-header-list ul, .cart-details-list ul, .cart-checkout ul{
  list-style-type: none;
  margin: 0px;
  width: 100%;

}

.cart-details-list ul{
  border-bottom: 1px solid #d3d3d3;
}

.cart-header-list ul li, .cart-details-list ul li, .cart-checkout ul li{
  display: inline-block;
  vertical-align: top;
}

ul .select-cart{
  width: 5%;
}

ul .product-name{
  width: 45%;
}

ul .unit-price, ul .product-quantity, ul .product-total-price, ul .list-action{
  width: 12%;
  text-align: center;
}

.product-name img{
  width: 70px;
  display: inline-flex;

}

.product-all-details{
  height: 100px;
}

.product-details-name{
  width: 200px;
  display: inline-flex;
  word-wrap: break-word;
  vertical-align: top;
}

.product-details{
    padding-top: 0px;
}

.quantity-setting{
  display: inline-flex;
}

.quantity-setting .deduct-qty-button, .quantity-setting .add-qty-button{
  font-size: 8px;
  padding: 6px 10px;
  background-color: #fff !important;
  border-color: #fff !important;
  border: 1px solid #d3d3d3 !important;
  color: #000 !important;
}

.quantity-setting input{
  width: 70px;
  text-align: center;
}

.list-action i{
  font-size: 20px;
}

.mobile-cart{
  display: none;
}

.checkout-total {
    width: 93%;
}

.checkout-total b.total-amount, .checkout-total b.east-total-amount{
    font-size: 20px;
    margin-right: 10px;
    color: #717fe0;
}

.details-page .details-box{
    padding: 10px;
    box-shadow: 0 1px 4px 0 rgba(0,0,0,.26);
}

.quantity-balance{
    font-size: 10px;
    color: #928c8c;
}

input[name="bank_id"], input[name="sub_category_id"] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

input[name="bank_id"] + img {
  cursor: pointer;
  width: 100px;
}

input[name="bank_id"]:checked + img {
  /*border: 2px solid #211c1c;*/
}

.widget-box.transparent {
    border-width: 0;
}

.widget-box {
    padding: 0;
    box-shadow: none;
    margin: 3px 0;
    border: 1px solid #CCC;
}

.progress, .widget-box {
    -webkit-box-shadow: none;
}

.widget-box.transparent>.widget-header {
    background: 0 0;
    border-width: 0;
    border-bottom: 1px solid #DCE8F1;
    color: #4383B4;
    padding-left: 3px;
}

.widget-box.transparent>.widget-header, .widget-header-flat {
    filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
}

.widget-header {
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    position: relative;
    min-height: 38px;
    background: repeat-x #f7f7f7;
    background-image: -webkit-linear-gradient(top,#FFF 0,#EEE 100%);
    background-image: -o-linear-gradient(top,#FFF 0,#EEE 100%);
    background-image: linear-gradient(to bottom,#FFF 0,#EEE 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffeeeeee', GradientType=0);
    color: #669FC7;
    border-bottom: 1px solid #DDD;
    padding-left: 12px;
}

.widget-header:after, .widget-header:before {
    content: "";
    display: table;
    line-height: 0;
}

.widget-header:after {
    clear: right;
}

.widget-header>.widget-title {
    line-height: 36px;
    padding: 0;
    margin: 0;
    display: inline;
}

.widget-header>.widget-title>.ace-icon {
    margin-right: 5px;
    font-weight: 400;
    display: inline-block;
}

h4.smaller {
    font-size: 17px;
}

.lighter {
    font-weight: lighter;
}

.widget-toolbar {
    display: inline-block;
    padding: 0 10px;
    line-height: 37px;
    float: right;
    position: relative;
}

.no-border {
    border-width: 0;
}

.widget-toolbar>.nav-tabs {
    border-bottom-width: 0;
    margin-bottom: 0;
    top: auto;
    margin-top: 3px!important;
}

.nav-tabs {
    border-color: #C5D0DC;
    margin-bottom: 0!important;
    position: relative;
    top: 1px;
}

.nav-tabs, .nav-tabs>li:first-child>a {
    margin-left: 0;
}

.btn-group-vertical>.btn-group:after, .btn-toolbar:after, .clearfix:after, .container-fluid:after, .container:after, .dl-horizontal dd:after, .form-horizontal .form-group:after, .modal-footer:after, .modal-header:after, .nav:after, .navbar-collapse:after, .navbar-header:after, .navbar:after, .pager:after, .panel-body:after, .row:after {
    clear: both;
}

.btn-group-vertical>.btn-group:after, .btn-group-vertical>.btn-group:before, .btn-toolbar:after, .btn-toolbar:before, .clearfix:after, .clearfix:before, .container-fluid:after, .container-fluid:before, .container:after, .container:before, .dl-horizontal dd:after, .dl-horizontal dd:before, .form-horizontal .form-group:after, .form-horizontal .form-group:before, .modal-footer:after, .modal-footer:before, .modal-header:after, .modal-header:before, .nav:after, .nav:before, .navbar-collapse:after, .navbar-collapse:before, .navbar-header:after, .navbar-header:before, .navbar:after, .navbar:before, .pager:after, .pager:before, .panel-body:after, .panel-body:before, .row:after, .row:before {
    content: " ";
    display: table;
}

.btn-group-vertical>.btn-group:after, .btn-group-vertical>.btn-group:before, .btn-toolbar:after, .btn-toolbar:before, .clearfix:after, .clearfix:before, .container-fluid:after, .container-fluid:before, .container:after, .container:before, .dl-horizontal dd:after, .dl-horizontal dd:before, .form-horizontal .form-group:after, .form-horizontal .form-group:before, .modal-footer:after, .modal-footer:before, .modal-header:after, .modal-header:before, .nav:after, .nav:before, .navbar-collapse:after, .navbar-collapse:before, .navbar-header:after, .navbar-header:before, .navbar:after, .navbar:before, .pager:after, .pager:before, .panel-body:after, .panel-body:before, .row:after, .row:before {
    content: " ";
    display: table;
}

.widget-toolbar>.nav-tabs>li {
    margin-bottom: auto;
}

.nav-tabs>li {
    float: left;
    margin-bottom: -1px;
}

.nav>li, .nav>li>a {
    display: block;
    position: relative;
}

.transparent>.widget-header>.widget-toolbar>.nav-tabs>li.active>a {
    border-top-color: #4C8FBD;
    border-right: 1px solid #C5D0DC;
    border-left: 1px solid #C5D0DC;
    background-color: #FFF;
    box-shadow: none;
}

.transparent>.widget-header>.widget-toolbar>.nav-tabs>li>a {
    color: #555;
    background-color: transparent;
    border-right: 1px solid transparent;
    border-left: 1px solid transparent;
}

.widget-toolbar>.nav-tabs>li.active>a {
    background-color: #FFF;
    border-bottom-color: transparent;
    box-shadow: none;
    margin-top: auto;
}

.widget-toolbar>.nav-tabs>li>a {
    box-shadow: none;
    position: relative;
    top: 1px;
    margin-top: 1px;
}

.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #576373;
    border-color: #C5D0DC #C5D0DC transparent;
    border-top: 2px solid #4C8FBD;
    background-color: #FFF;
    z-index: 1;
    line-height: 18px;
    margin-top: -1px;
    box-shadow: 0 -2px 3px 0 rgba(0,0,0,.15);
}

.nav-tabs, .nav-tabs>li:first-child>a {
    margin-left: 0;
}

.nav-tabs>li>a, .nav-tabs>li>a:focus {
    border-radius: 0!important;
    border-color: #C5D0DC;
    background-color: #F9F9F9;
    color: #999;
    margin-right: -1px;
    line-height: 18px;
    position: relative;
}
.nav-tabs>li>a {
    padding: 7px 12px 8px;
}

.widget-box.transparent>.widget-body {
    border-width: 0;
    background-color: transparent;
}

.widget-body {
    background-color: #FFF;
}

.widget-main.padding-4 {
    padding: 4px;
}

.widget-main {
    /*overflow: auto;*/
}

.widget-main {
    padding: 12px;
}

.widget-main .tab-content {
    border-width: 0;
}

.tab-content.padding-8 {
    padding: 8px 6px;
}

.tab-content {
    border: 1px solid #C5D0DC;
    padding: 16px 12px;
    position: relative;
}

.tab-content>.tab-pane {
    display: none;
}

.tab-content>.active {
    display: block;
}

select{
    margin-left: 0px;
}

.btn{
    background-color: #fff !important;
    border-color: #84d8b6 !important;
    color: #000;
}

.profile-own-bg {
background-color: #c73e1d;
background-image: linear-gradient(315deg, #c73e1d 0%, #a23b72 37%, #2e86ab 100%);
    padding: 50px 0 120px 0;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    position: relative;
}

.personal-header-info {
    position: absolute;
    top: 5%;
    width: 100%;
    color: white;
}

.profile-content {
    margin-top: 50px;
}

.profile-logo{
    border-radius: 100%;
}

.header-title, .setting-btn, .profile-name, .profile-code, .profile-level{
    color: #fff;
}

.profile-setting-list li {
    list-style-type: none;
    border-bottom: 1px solid #eee;
    padding: 10px 0;
}

.profile-setting-list li a {
    width: 100%;
    display: block;
}

.pull-right {
    float: right;
}

.pull-left {
    float: left;
}

.profile-word{
    color: #000;
    margin-top : 5px;
    display: block;
}

.bottom-menu-bar {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 10px 10px;
    box-shadow: 0 0 7px #eee;
    z-index: 100000;
    background-color: #fff;
    display: none;
    font-size: 11px;
}

.wallet-desc {
    border-top: 1px solid #eee;
    display: block;
    width: 100%;
    font-size: 10px;
    padding-top: 5px;
}

.wallet-balance-amount {
    color: #4F99C6;
    font-size: 20px;
}



.loading-gif{
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    z-index: 1000;
    background-size: 2%;
    background-repeat: no-repeat;
    background-position: center center;
    width: 100%;
    height: 100%;
    background-color: rgba(255,255,255, 0.5);
    display: none;
    z-index: 10000;
}

.banner-images{
    background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    height: 378px;
}

.header__logo__box__mobile{
    display: none;
}

.featured__item__text h6{
    font-size: 14px;
    color: #b2b2b2;
    display: block;
    margin-bottom: 4px;
}

.product__discount__item__text span{
    color: #000 !important;
    
}

@media (min-width: 1600px){
    .container {
        max-width: 1500px !important;
    }
}

@media (min-width: 1400px){
    .container {
        max-width: 1400px;
    }
}

@media only screen and (max-width: 992px) {
    .mobile-cart {
        display: block;
    }

    .web-cart {
        display: none;
    }

    ul .select-cart {
        width: 35px;
    }

    ul .unit-price {
        width: auto;
        text-align: left;
        font-size: 11px;
    }

    ul .product-name {
        width: 120px;
    }
}

@media only screen and (max-width: 768px) {
    .profile-word{
        font-size: 10px;
    }

    .bottom-menu-bar {
        display: block;
    }

    .banner-images{
        height: 200px;
    }

    .header__cart__box{
        display: none;
    }

    .header__cart{
        margin-top: 13px;
    }

    .header__cart ul li a i{
        font-size: 25px;
    }

    .header__cart ul li a span{
        top: -10px;
    }

    .header__logo__box__mobile{
        display: block;
    }

    .header__logo__box{
        display: none;
    }

    .f-15{
        font-size: 12px !important;
    }

    .listing-video{
        height: 150px;
    }
}

@media only screen and (max-width: 480px) {
    .profile-word{
        font-size: 9px;
    }

    ul .select-cart {
        width: 20px;
    }

    .product-name img, ul .product-name {
        width: 50px;
    }

    .product__discount__item__pic, .featured__item__pic{
        height: 150px;
    }
}

@media only screen and (max-width: 360px) {
    .profile-word{
        font-size: 8px;
    }
}
</style>
@yield('css')

<body class="ps-loading">
    <div class="header--sidebar"></div>
    <div class="loading-gif" style="background-image: url({{ url('images/loading/09b24e31234507.564a1d23c07b4.gif') }}); "></div>
    <div id="app">
        <div class="super_container">
            @include('partial.frontend.header')
            @yield('content')
            @include('partial.frontend.footer')
        </div>
    </div>


     <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v8.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="286824757996871">
      </div>


        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=526021854803985&autoLogAppEvents=1" nonce="DP0nPzUM"></script>

<script type="text/javascript" src="{{ asset('frontend/plugins/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/gmap3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/imagesloaded.pkgd.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/isotope.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/jquery.matchHeight-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/slick/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<!-- Custom scripts-->
<script type="text/javascript" src="{{ asset('frontend/js/main.js') }}"></script>
</body>

@toastr_js
@toastr_render
@yield('js')
<script type="text/javascript">
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    

    function isNumberKey(evt)
    {
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
         return false;

      return true;
    }


    $('.ps-cart__listing').on('click', '.delete-cart', function(e){
        e.preventDefault();
        var ele = $(this);
        var cart_id = ele.data('id');

        deleteCart(cart_id, ele);
        
    });

    function deleteCart(cart_id, ele){

        var fd = new FormData();
        fd.append('cart_id', cart_id);

        

        if(confirm("Item(s) will be removed from Cart") == true){
            $('.loading-gif').show();
            $.ajax({
               url: '{{ route("deleteCart") }}',
               type: 'post',
               data: fd,
               contentType: false,
               processData: false,
               success: function(response){
                    location.reload();
                    $('.loading-gif').hide();
                    $.ajax({
                        url: '{{ route("CountCart") }}',
                        type: 'get',
                        success: function(response){
                            $('.ps-cart .ps-cart__toggle span i').html(response[0]);
                        }
                      });

                      $.ajax({
                        url: '{{ route("SelectHeaderCart") }}',
                        type: 'get',
                        success: function(response){
                          $('.ps-cart__listing').html(response);
                        }
                      });
               },
            });         
        }else{
            return false;
        }
    }
</script>
</html>
