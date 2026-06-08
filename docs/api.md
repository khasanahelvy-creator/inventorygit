# Panduan Inventory System API v1
Base URL: `http://localhost:8000/api/v1`

## Bagian 1: Fitur Otentikasi (Auth)
Di bawah ini adalah daftar link untuk mendaftar dan masuk ke sistem.

### 1. Register User Baru
- **Method:** `POST`
- **Link URL:** `/register`
- **Data yang dikirim (Body JSON):**
  ```json
  {
    "name": "Nama Lengkap",
    "email": "user@email.com",
    "password": "password123",
    "password_confirmation": "password123"
  }