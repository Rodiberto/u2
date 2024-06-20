<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> RODIBER CRUZ MORALES</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <header class="text-center">
        <h1>
            RODIBER CRUZ MORALES
        </h1>
        <h1>
            9 A
        </h1><br>

    </header>

    <div class="container mt-5 w-50 mx-auto">

        <h1 class="text-center">OPERACIONES BASICAS</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mt-4">
            <div class="form-group">
                <label for="num1">Número 1:</label>
                <input type="text" id="num1" name="num1" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="num2">Número 2:</label>
                <input type="text" id="num2" name="num2" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Operación:</label>
                <div class="btn-group d-flex" role="group">
                    <button type="submit" name="operation" value="sum" class="btn btn-primary w-50">Suma</button>
                    <button type="submit" name="operation" value="sub" class="btn btn-secondary w-50">Resta</button>
                    <button type="submit" name="operation" value="mul" class="btn btn-primary w-50">Multiplicación</button>
                    <button type="submit" name="operation" value="div" class="btn btn-secondary w-50">División</button>
                </div>
            </div>
        </form>


        <?php

        function sanitize_input($data)
        {
            return htmlspecialchars(stripslashes(trim($data)));
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $num1 = isset($_POST['num1']) ? sanitize_input($_POST['num1']) : '';
            $num2 = isset($_POST['num2']) ? sanitize_input($_POST['num2']) : '';
            $operation = isset($_POST['operation']) ? sanitize_input($_POST['operation']) : '';


            if (!is_numeric($num1) || !is_numeric($num2)) {
                echo '<div class="alert alert-danger mt-3">Error: Ambos valores deben ser números.</div>';
                exit();
            }

            $num1 = (float)$num1;
            $num2 = (float)$num2;

            $result = 0;
            switch ($operation) {
                case 'sum':
                    $result = $num1 + $num2;
                    break;
                case 'sub':
                    $result = $num1 - $num2;
                    break;
                case 'mul':
                    $result = $num1 * $num2;
                    break;
                case 'div':
                    $result = $num1 / $num2;
                    break;
                default:
                    echo '<div class="alert alert-danger mt-3">Error: Operación no válida.</div>';
                    exit();
            }

            try {
                echo '<div class="alert alert-success mt-3">Resultado: ' . $result . '</div>';
            } catch (Exception $e) {
                error_log($e->getMessage());
                echo '<div class="alert alert-danger mt-3">Ocurrió un error al calcular el resultado.</div>';
            }
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>