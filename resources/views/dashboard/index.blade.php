@extends('layouts.dashbord.master')
@section('css')
{{-- <!--  Owl-carousel css-->
<link href="{{URL::asset('assets/admin/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/admin/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet"> --}}
<link href="{{URL::asset('assets/admin/plugins/morris.js/morris.css')}}" rel="stylesheet">

@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">المعهد العربى للتكنولوجيا المتطورة </h2>
						  <p class="mg-b-0">لوحه التحكم</p>
						</div>
					</div>
					{{-- <div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">Customer Ratings</label>
							<div class="main-star">
								<i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
							</div>
						</div>
						<div>
							<label class="tx-13">Online Sales</label>
							<h5>563,275</h5>
						</div>
						<div>
							<label class="tx-13">Offline Sales</label>
							<h5>783,675</h5>
						</div>
					</div> --}}
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->


		<!-- Container closed -->
@endsection


@section('js')
<!--Internal  Chart.bundle js -->

<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/admin/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/admin/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Echart Plugin -->
<script src="{{URL::asset('assets/admin/plugins/echart/echart.js')}}"></script>
{{-- <script src="{{URL::asset('assets/admin/js/echarts.js')}}"></script> --}}


<script>


	/*----Echart6----*/
	var option6 = {
		grid: {
			top: '6',
			right: '10',
			bottom: '17',
			left: '32',
		},
		xAxis: {
			type: 'value',
			axisLine: {
				lineStyle: {
					color: 'rgba(171, 167, 167,0.2)'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#5f6d7a'
			}
		},
		tooltip: {
			trigger: 'axis',
			position: ['35%', '32%'],
		},
		yAxis: {
			type: 'category',
			data: ['2013', '2014', '2015', '2016', '2017', '2018', '2019'],
			splitLine: {
				lineStyle: {
					color: 'rgba(171, 167, 167,0.2)'
				}
			},
			axisLine: {
				lineStyle: {
					color: 'rgba(171, 167, 167,0.2)'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#5f6d7a'
			}
		},
		series: chartdata3,
		color: ['#f7557a', '#285cf7']
	};
	var chart6 = document.getElementById('echart6');
	var barChart6 = echarts.init(chart6);
	barChart6.setOption(option6);


</script>
@endsection
