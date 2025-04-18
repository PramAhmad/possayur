<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertSignController extends Controller
{
    public function index(Request $request)
    {
        // Sample key.  Replace with one used for CSR generation
        $KEY = 'key.pem';
        //$PASS = 'S3cur3P@ssw0rd';

        $req = $request->all()['request'];
        $privateKey = openssl_get_privatekey(file_get_contents($KEY) /*, $PASS */);

        $signature = null;
        openssl_sign($req, $signature, $privateKey, "sha512"); // Use "sha1" for QZ Tray 2.0 and older

        /*
        // Or alternately, via phpseclib
        include('Crypt/RSA.php');
        $rsa = new Crypt_RSA();
        $rsa.setHash('sha512'); // Use 'sha1' for QZ Tray 2.0 and older
        $rsa->loadKey(file_get_contents($KEY));
        $rsa->setSignatureMode(CRYPT_RSA_SIGNATURE_PKCS1);
        $signature = $rsa->sign($req);
        */

        if ($signature) {
            header("Content-type: text/plain");
            return base64_encode($signature);
        }
    }
}
