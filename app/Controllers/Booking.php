<?php

namespace App\Controllers;

use Config\Database;

class Booking extends BaseController
{
    public function index()
    {
        $db = Database::connect();

        $bookings = $db->query("
            SELECT b.*, v.name AS vehicle_name, v.plate_number, d.name AS driver_name
            FROM bookings b
            JOIN vehicles v ON v.id = b.vehicle_id
            JOIN drivers d ON d.id = b.driver_id
            ORDER BY b.id DESC
        ")->getResultArray();

        return view('admin/bookings/index', ['bookings' => $bookings]);
    }

    public function create()
    {
        $db = Database::connect();

        $vehicles = $db->table('vehicles')->get()->getResultArray();
        $drivers  = $db->table('drivers')->get()->getResultArray();
        $approvers = $db->table('users')->where('role', 'approver')->get()->getResultArray();

        return view('admin/bookings/create', [
            'vehicles' => $vehicles,
            'drivers' => $drivers,
            'approvers' => $approvers,
        ]);
    }

    public function store()
    {
        $db = Database::connect();

        $data = [
            'vehicle_id'   => $this->request->getPost('vehicle_id'),
            'driver_id'    => $this->request->getPost('driver_id'),
            'booking_date' => $this->request->getPost('booking_date'),
            'purpose'      => $this->request->getPost('purpose'),
            'approver1_id' => $this->request->getPost('approver1_id'),
            'approver2_id' => $this->request->getPost('approver2_id'),
            'status_level1' => 'PENDING',
            'status_level2' => 'WAITING',
            'final_status'  => 'PENDING',
        ];

        // validasi minimal
        foreach (['vehicle_id','driver_id','booking_date','purpose','approver1_id','approver2_id'] as $field) {
            if (empty($data[$field])) {
                return redirect()->back()->withInput()->with('error', 'Semua field wajib diisi.');
            }
        }

        $db->table('bookings')->insert($data);

        return redirect()->to('/admin/bookings')->with('success', 'Booking berhasil dibuat.');
    }

    public function export()
    {
        $db = Database::connect();

        $rows = $db->query("
            SELECT b.id, b.booking_date, b.purpose, b.final_status,
                   v.name AS vehicle_name, v.plate_number,
                   d.name AS driver_name
            FROM bookings b
            JOIN vehicles v ON v.id = b.vehicle_id
            JOIN drivers d ON d.id = b.driver_id
            ORDER BY b.id DESC
        ")->getResultArray();

        // Header CSV
        $filename = 'laporan_booking_' . date('Y-m-d_His') . '.csv';
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename);

        $out = fopen('php://output', 'w');

        // judul kolom
        fputcsv($out, ['ID', 'Tanggal', 'Kendaraan', 'Plat', 'Driver', 'Tujuan', 'Status']);

        foreach ($rows as $r) {
            fputcsv($out, [
                $r['id'],
                $r['booking_date'],
                $r['vehicle_name'],
                $r['plate_number'],
                $r['driver_name'],
                $r['purpose'],
                $r['final_status'],
            ]);
        }

        fclose($out);
        exit;
    }
}