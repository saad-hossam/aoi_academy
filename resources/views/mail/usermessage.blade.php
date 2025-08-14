
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="row row-sm">
        <!-- Col -->

        <!-- /Col -->
        <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Atico<span class="badge badge-primary">inbox</span></h4>
                </div>
                <div class="card-body">
                    <div class="email-media">
                        <div class="mt-0 d-sm-flex">
                            <div class="media-body">
                                <div class="float-left d-none d-md-flex fs-15">
                                    <span class="mr-3">{{ $created_at }}</span>
                                </div>
                                <div class="media-title  font-weight-bold mt-3">{{ $name }} <span class="text-muted">( {{ $email }} )</span></div>

                                <small class="mr-2 d-md-none"><i class="fe fe-star text-muted" data-toggle="tooltip" title="" data-original-title="Rated"></i></small>
                                <small class="mr-2 d-md-none"><i class="fa fa-reply text-muted" data-toggle="tooltip" title="" data-original-title="Reply"></i></small>
                            </div>
                        </div>
                    </div>
                    <div class="eamil-body mt-5">

                        <p>{{ $messages }} </p>
                                                            <hr>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- row closed -->
</div>
<!-- Container closed -->
</div>
</body>
</html>
