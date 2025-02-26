{{-- <script src="{{ asset('vendor/qz/qz-tray.js') }}"></script>
<script src="{{ asset('vendor/qz/promise-polyfill-8.1.3.min.js') }}"></script> --}}

@vite(['resources/js/qz.io/qz-tray.js', 'resources/js/qz.io/promise-polyfill-8.1.3.min.js'])
<script>
    $(function(){
        // qz.security.setCertificatePromise(function(resolve, reject) {
        //     //Preferred method - from server
        //     fetch("{{ asset('digital-certificate.txt') }}", {cache: 'no-store', headers: {'Content-Type': 'text/plain'}})
        //         .then(function(data) { data.ok ? resolve(data.text()) : reject(data.text()); });

        // });
        qz.security.setSignatureAlgorithm("SHA512");
        qz.security.setSignaturePromise(function(toSign) {
            return function(resolve, reject) {
                //Preferred method - from server
                fetch("{{ route('cert-sign.index', ['request' => 'foo']) }}", {cache: 'no-store', headers: {'Content-Type': 'text/plain'}})
                    .then(function(data) { data.ok ? resolve(data.text()) : reject(data.text()); });

                //Alternate method - unsigned
                // resolve(); // remove this line in live environment
            };
        });
    });

    function getUpdatedConfig() {
        if (cfg == null) {
            cfg = qz.configs.create(null);
        }
        updateConfig();
        return cfg
    }

    function updateConfig() {
        var pxlSize = null;
        if ($("#pxlSizeActive").prop('checked')) {
            pxlSize = {
                width: $("#pxlSizeWidth").val(),
                height: $("#pxlSizeHeight").val()
            };
        }
        var pxlMargins = $("#pxlMargins").val();
        if ($("#pxlMarginsActive").prop('checked')) {
            pxlMargins = {
                top: $("#pxlMarginsTop").val(),
                right: $("#pxlMarginsRight").val(),
                bottom: $("#pxlMarginsBottom").val(),
                left: $("#pxlMarginsLeft").val()
            };
        }
        var copies = 1;
        var jobName = null;
        if ($("#rawTab").hasClass("active")) {
            copies = $("#rawCopies").val();
            jobName = $("#rawJobName").val();
        } else {
            copies = $("#pxlCopies").val();
            jobName = $("#pxlJobName").val();
        }
        cfg.reconfigure({
            altPrinting: $("#rawAltPrinting").prop('checked'),
            encoding: $("#rawEncoding").val(),
            endOfDoc: $("#rawEndOfDoc").val(),
            perSpool: $("#rawPerSpool").val(),
            colorType: $("#pxlColorType").val(),
            copies: copies,
            density: $("#pxlDensity").val(),
            duplex: $("#pxlDuplex").prop('checked'),
            interpolation: $("#pxlInterpolation").val(),
            jobName: jobName,
            legacy: $("#pxlLegacy").prop('checked'),
            margins: pxlMargins,
            orientation: $("#pxlOrientation").val(),
            paperThickness: $("#pxlPaperThickness").val(),
            printerTray: $("#pxlPrinterTray").val(),
            rasterize: $("#pxlRasterize").prop('checked'),
            rotation: $("#pxlRotation").val(),
            scaleContent: $("#pxlScale").prop('checked'),
            size: pxlSize,
            units: $("input[name='pxlUnits']:checked").val()
        });
    }
    
    function set_text(text, length) {
        var text = text;
        var length_text = text.length;
        var count_loop = (length - length_text) / 2;
        for (var i = 0; i < count_loop; i++) {
            text = text + ' ';
        }
        for (var z = 0; z < count_loop; z++) {
            text = ' ' + text;
        }
        return text;
    }

    function set_text_right(text, length) {
        var text = text;
        var length_text = text.length;
        var count_loop = length - length_text;
        for (var i = 0; i < count_loop; i++) {
            text = ' ' + text;
        }
        return text;
    }

</script>