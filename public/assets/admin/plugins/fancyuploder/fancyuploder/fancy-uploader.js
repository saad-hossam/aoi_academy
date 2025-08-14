 $(function() {
            $('#demo').FancyFileUpload({
                url:"{{ route('previos_works.store') }}",
                params : {
                    _token: $('formData').find('input[name="_token"]').first().val(),
                },
                edit : false,
                maxfilesize : 1000000,

            });
        });
