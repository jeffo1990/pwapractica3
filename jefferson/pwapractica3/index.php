<?php
$productos = [
    [
        "id" => 1,
        "nombre" => "Camisa Casual",
        "descripcion" => "Camisa de algodón fresca para clima cálido.",
        "precio" => 19.99,
        "imagen" => "https://http2.mlstatic.com/D_NQ_NP_799900-MCO40780166595_022020-W.jpg"
    ],
    [
        "id" => 2,
        "nombre" => "Pantalón Jeans",
        "descripcion" => "Jeans azul clásico, resistente y cómodo.",
        "precio" => 29.99,
        "imagen" => "https://th.bing.com/th/id/OIP.iotFoOlRPRiA7xwfPOHcZAHaIn?cb=iwc2&rs=1&pid=ImgDetMain"
    ],
    [
        "id" => 3,
        "nombre" => "Zapatos de Cuero",
        "descripcion" => "Zapatos elegantes de cuero para hombre.",
        "precio" => 49.99,
        "imagen" => "https://hips.hearstapps.com/hmg-prod/images/zapatillas-geox-670fa28588436.jpg?resize=980:*"
    ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda Online</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
        }

        /* Video de fondo */
        .video-fondo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            object-fit: cover;
        }

        .contenido {
            padding: 20px;
            background: rgba(243, 240, 240, 0);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .productos {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .producto {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            padding: 15px;
            width: 250px;
            text-align: center;
        }

        .producto img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .producto h3 {
            margin: 10px 0 5px;
        }

        .producto p {
            margin: 5px 0;
        }

        button {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #218838;
        }

        #carrito {
            margin-top: 30px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<!-- Video de fondo -->
<video autoplay muted loop class="video-fondo">
    <source src="https://videos.pexels.com/video-files/1338596/1338596-hd_1920_1080_30fps.mp4" type="video/mp4">
    Tu navegador no soporta video HTML5.
</video>

<div class="contenido">
    <h1>Catálogo de Productos</h1>

    <div class="productos">
        <?php foreach ($productos as $producto): ?>
            <div class="producto">
                <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                <h3><?php echo $producto['nombre']; ?></h3>
                <p><?php echo $producto['descripcion']; ?></p>
                <p><strong>$<?php echo number_format($producto['precio'], 2); ?></strong></p>
                <button onclick="agregarAlCarrito('<?php echo $producto['nombre']; ?>', <?php echo $producto['precio']; ?>)">Agregar al carrito</button>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="carrito">
        <h2>Carrito de Compras</h2>
        <ul id="lista-carrito"></ul>
        <p><strong>Total: $<span id="total">0.00</span></strong></p>
    </div>
</div>

<script>
    let carrito = [];
    let total = 0;

    function agregarAlCarrito(nombre, precio) {
        carrito.push({nombre, precio});
        total += precio;
        mostrarCarrito();
    }

    function mostrarCarrito() {
        const lista = document.getElementById("lista-carrito");
        lista.innerHTML = "";
        carrito.forEach(item => {
            const li = document.createElement("li");
            li.textContent = `${item.nombre} - $${item.precio.toFixed(2)}`;
            lista.appendChild(li);
        });
        document.getElementById("total").textContent = total.toFixed(2);
    }
</script>

</body>
</html>
