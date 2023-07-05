<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transbank Pay</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="assets/bootstrap/bootstrap-5.1.3/js/bootstrap.min.js"></script>-->
    
</head>

<body>
    <?php
    $parametro1 = $_GET['parametro1'];

        // CONSTANTE PARA DEFINIR MODO DEBUG
        define("DEBUG", "true");
        // CARGAR SESIÓN
        session_start();

        
    ?>
    <div class="container-sm mt-4">
        <h4 class="my-4">TOTAL A PAGAR</h4>
        <form class="form-control" method="POST" action="">
            <div class="mb-3 row">
                <label for="buy-id" class="col-sm-2 col-form-label">BUY ID</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="buy-order" name="buy-order"
                        value="27391920323244">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="amount" class="col-sm-2 col-form-label">AMOUNT</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $parametro1; ?>">
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button id="btn-send" name="btn-send" class="btn btn-warning mx-4 my-4 col-2"><img
                        src="assets/img/webpay-desktop-logo_color.svg" alt=""></button>
            </div>
        </form>
    </div>
    <?php
    // SE VERIFICA ENVIÓ DE FORMULARIO POR POST
    if (isset($_POST['btn-send'])) {
        $buyOrder = $_POST['buy-order'];
        $amount = $_POST['amount'];
        createTransactionTransbank($buyOrder, $amount);
    }

    // FUNCIÓN PARA IMPRIMIR INFORMACIÓN EN LA CONSOLA DE JAVASCRIPT
    function jsConsole($message)
    {
        try {
            if (DEBUG == "true") {
                echo "<script>console.log('".$message."'); </script>";
            }
        } catch (Exception $e) {
            echo " ";
        }

    }
    // FUNCIÓN PARA CREAR UNA TRANSACCIÓN CON LA API DE TRANSBANK
    function createTransactionTransbank($buyOrder, $amount)
    {
        try {
            jsConsole("buy_order: ".$buyOrder);
            jsConsole("amount: ".$amount);
            $sessionId = 1234567; /*CAMBIAR POR ID DEL USUARIO*/
            $returnUrl = "http://localhost:3000/commit-pay.php"; /*PROGRAMAR PATH PARA RECIBIR DATOS POR POST*/
            jsConsole("session_id: ".$sessionId);
            jsConsole("return_url: ".$returnUrl);
            /*ARRAY QUE SERÁ TRANSFORMADO EN JSON*/
            $data = [
                "buy_order"=>$buyOrder,
                "session_id"=>$sessionId,
                "amount"=>$amount,
                "return_url"=>$returnUrl
            ];
            $url = 'https://webpay3gint.transbank.cl/rswebpaytransaction/api/webpay/v1.2/transactions';
            jsConsole("url: ".$url);
            // Datos para el encabezado
            $headers = [
                'Tbk-Api-Key-Id: 597055555532',
                'Tbk-Api-Key-Secret: 579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C',
                'Content-Type: application/json'
            ];
            // Convertir los datos a JSON
            $jsonData = json_encode($data);

            // Inicializar cURL
            $curl = curl_init();

            // Establecer la URL de destino
            curl_setopt($curl, CURLOPT_URL, $url);

            // Establecer la opción para indicar que se realizará una solicitud POST
            curl_setopt($curl, CURLOPT_POST, true);

            // Establecer los encabezados
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            // Establecer el cuerpo de la solicitud
            curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);

            // Establecer la opción para devolver el resultado como cadena en lugar de imprimirlo directamente
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            // 
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            // Realizar la solicitud POST
            $response = curl_exec($curl);

            // Verificar si hubo algún error
            if (curl_errno($curl)) {
                echo 'Error: ' . curl_error($curl);
            }
            // Cerrar la conexión cURL
            curl_close($curl);
            jsConsole("response: ".$response);            
            // Decodificar la respuesta JSON en un arreglo asociativo
            $jsonResponse = json_decode($response, true);

            // Verificar si la decodificación fue exitosa
            if ($jsonResponse !== null) {
                // Acceder a los valores del JSON
                $token = $jsonResponse['token'];
                $url = $jsonResponse['url'];
                $_SESSION["token_tbk"]=$token;
                $_SESSION["url_tbk"]=$url;
                $_SESSION["amount"]=$amount;
                jsConsole("token_tbk: ".$_SESSION["token_tbk"]);
                jsConsole("url_tbk: ".$_SESSION["url_tbk"]);
                // Redirecciónamiento a sitio de envió de pago a transbank
                $redirectUrl = '/send-pay.php';
                header('Location: ' . $redirectUrl);
                exit;
            } else {
                // Manejar el caso de que la decodificación falle
                jsConsole('Error al decodificar la respuesta JSON');
            }
        } catch (Exception $e) {
            jsConsole('Caught exception: ');
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
	integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
	integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>