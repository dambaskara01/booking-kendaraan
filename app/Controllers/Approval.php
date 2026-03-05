<?php

namespace App\Controllers;

use Config\Database;

class Approval extends BaseController
{
    public function index()
    {
        $db = Database::connect();
        $userId = session()->get('user_id');

        // Booking yang menunggu persetujuan si user ini
        // level 1: status_level1 = PENDING & approver1_id = user
        // level 2: status_level1 = APPROVED & status_level2 = PENDING & approver2_id = user
        $bookings = $db->query("
            SELECT b.*, v.name AS vehicle_name, v.plate_number, d.name AS driver_name
            FROM bookings b
            JOIN vehicles v ON v.id = b.vehicle_id
            JOIN drivers d ON d.id = b.driver_id
            WHERE
              (b.approver1_id = ? AND b.status_level1 = 'PENDING' AND b.final_status = 'PENDING')
              OR
              (b.approver2_id = ? AND b.status_level1 = 'APPROVED' AND b.status_level2 = 'PENDING' AND b.final_status = 'PENDING')
            ORDER BY b.id DESC
        ", [$userId, $userId])->getResultArray();

        return view('approvals/index', ['bookings' => $bookings]);
    }

    public function approve($id)
    {
        $db = Database::connect();
        $userId = session()->get('user_id');

        $booking = $db->table('bookings')->where('id', $id)->get()->getRowArray();
        if (!$booking) return redirect()->to('/approvals');

        // Level 1 approve
        if ($booking['approver1_id'] == $userId && $booking['status_level1'] === 'PENDING') {
            $db->table('bookings')->where('id', $id)->update([
                'status_level1' => 'APPROVED',
                'status_level2' => 'PENDING',
            ]);
            return redirect()->to('/approvals')->with('success', 'Approved Level 1.');
        }

        // Level 2 approve
        if ($booking['approver2_id'] == $userId && $booking['status_level1'] === 'APPROVED' && $booking['status_level2'] === 'PENDING') {
            $db->table('bookings')->where('id', $id)->update([
                'status_level2' => 'APPROVED',
                'final_status'  => 'APPROVED',
            ]);
            return redirect()->to('/approvals')->with('success', 'Approved Level 2. Booking selesai.');
        }

        return redirect()->to('/approvals')->with('error', 'Anda tidak berhak approve booking ini.');
    }

    public function reject($id)
    {
        $db = Database::connect();
        $userId = session()->get('user_id');

        $booking = $db->table('bookings')->where('id', $id)->get()->getRowArray();
        if (!$booking) return redirect()->to('/approvals');

        // Level 1 reject
        if ($booking['approver1_id'] == $userId && $booking['status_level1'] === 'PENDING') {
            $db->table('bookings')->where('id', $id)->update([
                'status_level1' => 'REJECTED',
                'final_status'  => 'REJECTED',
            ]);
            return redirect()->to('/approvals')->with('success', 'Rejected Level 1.');
        }

        // Level 2 reject
        if ($booking['approver2_id'] == $userId && $booking['status_level1'] === 'APPROVED' && $booking['status_level2'] === 'PENDING') {
            $db->table('bookings')->where('id', $id)->update([
                'status_level2' => 'REJECTED',
                'final_status'  => 'REJECTED',
            ]);
            return redirect()->to('/approvals')->with('success', 'Rejected Level 2.');
        }

        return redirect()->to('/approvals')->with('error', 'Anda tidak berhak reject booking ini.');
    }
}