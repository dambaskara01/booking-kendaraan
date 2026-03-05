# Booking Kendaraan - Technical Test

## Stack
- PHP 8.2
- CodeIgniter 4
- MySQL
- Bootstrap 5
- Chart.js

## Fitur
- Login multi-role: Admin & Approver
- Booking kendaraan oleh Admin
- Approval 2 level (Approver 1 dan Approver 2)
- Dashboard grafik jumlah booking per bulan
- Export laporan (CSV, dapat dibuka dengan Excel)

## Akun Demo
- Admin: admin@mail.com / password
- Approver 1: spv@mail.com / password
- Approver 2: mgr@mail.com / password

## Cara Menjalankan
1. Jalankan MySQL (XAMPP)
2. Buat database: `booking_kendaraan`
3. Import `database.sql` ke database tersebut
4. Atur koneksi di file `.env`
5. Jalankan:
   ```bash
   php spark serve