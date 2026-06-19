### 1. Get All Items with Filter
Mengambil semua daftar item produk yang tersedia di database atau memfilternya berdasarkan kategori tertentu.

- **Endpoint:** `GET /api/v1/items`
- **Method:** `GET`
- **Headers:**
  - `Accept: application/json`
  - `Authorization: Bearer <your_token>` (jika menggunakan Sanctum)
- **Query Parameter (Opsional):**
  - `category_id` (integer) : ID Kategori untuk memfilter barang (contoh: `category_id=1` atau `category_id=2`).

- **Contoh Request:**
  `GET http://127.0.0.1:8000/api/v1/items?category_id=1`

- **Contoh Response Sukses (200 OK):**
  ```json
  {
      "status": "success",
      "message": "Berhasil menarik semua data Item",
      "data": [
          {
              "id": 1,
              "name": "Laptop Lenovo IdeaPad",
              "category_id": 1,
              "price": 9500000,
              "stock": 12,
              "created_at": "2026-06-19T12:00:00.000000Z",
              "updated_at": "2026-06-19T12:00:00.000000Z"
          }
      ]
  }
  