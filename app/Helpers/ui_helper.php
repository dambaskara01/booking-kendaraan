<?php

function status_badge(string $status): string
{
    $status = strtoupper($status);

    return match ($status) {
        'APPROVED' => '<span class="badge text-bg-success">APPROVED</span>',
        'REJECTED' => '<span class="badge text-bg-danger">REJECTED</span>',
        'PENDING'  => '<span class="badge text-bg-warning">PENDING</span>',
        'WAITING'  => '<span class="badge text-bg-secondary">WAITING</span>',
        default    => '<span class="badge text-bg-light">'.esc($status).'</span>',
    };
}