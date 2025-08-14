 <meta charset="utf-8">
    <title>{{ trans('header.Alakaria') }}</title>
    <link rel="icon" href="{{ URL::asset('images/logo/b8c72a254b2d423f8e19c1b9f9d387fc (1).png') }}" type="image/x-icon" />

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
<style>

/* RTL specific styles */
[dir="rtl"] {
  text-align: right;
}

/* Ensure margins/padding align properly in RTL */
[dir="rtl"] .some-class {
  margin-left: 0;
  margin-right: auto;
}
</style>
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />



    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">



    <!-- Template Stylesheet -->
    @if (app()->getLocale() == 'ar')
    <link href="{{asset('css/rtl.css')}}" rel="stylesheet">
    @else
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    @endif
