<?php

namespace App\Controllers;

use Config\Database;

class Dashboard extends BaseController
{
    public function admin()
    {
        $db = Database::connect();

        $rows = $db->query("
            SELECT DATE_FORMAT(booking_date, '%Y-%m') AS ym, COUNT(*) AS total
            FROM bookings
            GROUP BY ym
            ORDER BY ym ASC
        ")->getResultArray();

        $labels = [];
        $data = [];
        foreach ($rows as $r) {
            $labels[] = $r['ym'];
            $data[] = (int)$r['total'];
        }

        return view('admin/dashboard', [
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}