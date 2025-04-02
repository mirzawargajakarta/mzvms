<html>
	<head>
	<link rel="icon" href="<?= base_url('assets/img/24506d8768900869e2f21fc018cc1a5e.png'); ?>">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<title><?php echo $title;?></title>
</head>



<body>
	<br />
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header">
	<a href="<?= base_url('frontmenu');?>" class="float-right btn btn-outline-primary mt-1">Back</a>
	<h4 class="card-title mt-2">Scan QRCode</h4>
</header>
<article class="card-body">
<div class="form-row">
    <div id="qr-reader" style="width:600px"></div>
    <div id="qr-reader-results"></div>
	</div>	
</article> <!-- card-body end .// -->

<div class="border-top card-body text-center">[<div id="hasilresult"></div>]</div>
</div> <!-- card.// -->
</div> <!-- col.//-->
	</div>
</div>
</body>





<script src="https://unpkg.com/html5-qrcode"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                // Handle on success condition with the decoded message.
                console.log(`Scan result ${decodedText}`, decodedResult);
            }
			$("#hasilresult").html(decodedText);
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    });
</script>
</head>
</html>
