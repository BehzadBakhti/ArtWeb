
@extends('layouts.dashboard')
@section('dashboadr_subpage')
<div class="container-fluid">
<div class="row rtl">
        <div class="col-md-5 ">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">{{$vendorData->name}}</h3>
              <h5 class="widget-user-desc">Founder &amp; CEO</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$sales}}</h5>
                    <span class="description-text">تعداد فروش</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$productsCount}}</h5>
                    <span class="description-text">تعداد محصولات</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <div class="col-md-7">
        {{$vendorData->description}}
        </div>

</div>
    <div class="row my-4 ">
        
        <div class="col-md-4">
            <div class="small-box bg-green">
                <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>موجودی</p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                <i class="fa fa-arrow-circle-left"></i>
                جزئیات بیشتر 
                </a>
            </div>
            <div class="small-box  rtl sub-data-green">
              <div class="inner">
                <p>کل سفارشات این هفته</p>
                <h4>18</h4>
                <hr>
                <p>سفارشات ارسال شده</p>
                <h4>9</h4>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-orange ">
                <div class="inner">
                <h3>150</h3>

                <p>سفارشات</p>
                </div>
                <div class="icon">
                <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                <i class="fa fa-arrow-circle-left"></i>
                جزئیات بیشتر 
                </a>
            </div>

            <div class="small-box  rtl sub-data-orange">
              <div class="inner">
                <p>کل سفارشات این هفته</p>
                <h4>18</h4>
                <hr>
                <p>سفارشات ارسال شده</p>
                <h4>9</h4>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                <h3>150</h3>

                <p>محموله ها</p>
                </div>
                <div class="icon">
                <i class="fa fa-truck"></i>
                </div>
                <a href="#" class="small-box-footer">
                <i class="fa fa-arrow-circle-left"></i>
                جزئیات بیشتر 
                </a>
            </div>

            <div class="small-box  rtl sub-data-aqua">
              <div class="inner">
                <p>محموله های در راه</p>
                <h4>18</h4>
                <hr>
                <p>دریافت شده</p>
                <h4>9</h4>
              </div>
            </div>
        </div>
        
    </div> 
        
</div>
@endsection
@section('scripts')

@endsection
