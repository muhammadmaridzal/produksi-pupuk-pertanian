<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 40%;
            margin: 30px auto;
            padding: 20px;
        }

        .form-container label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .form-container textarea {
            height: 120px;
        }

        .form-container input[type="file"] {
            padding: 5px;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        .form-container .cancel-btn {
            background-color: #f44336;
            margin-top: 10px;
        }

        .form-container .cancel-btn:hover {
            background-color: #da190b;
        }
    </style>
</head>

<body>
    <h1>Tambah Produk</h1>
    <div class="form-container">
        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" required><br>

            <label for="harga_produk">Harga Produk</label>
            <input type="text" name="harga_produk" required><br>

            <label for="deskripsi_produk">Deskripsi Produk</label>
            <textarea name="deskripsi_produk" required></textarea><br>

            <label for="foto_produk">Foto Produk</label>
            <input type="file" name="foto_produk" required><br>

            <button type="submit">Tambah Produk</button>
        </form>
    </div>
</body>