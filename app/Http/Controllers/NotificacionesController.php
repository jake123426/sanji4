<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    public function create(){
        foreach (auth()->user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return redirect()->back()->with('info', 'Notificaciones Leidas');
    }
}
