<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function allorders()
    {
        $orders = Order::paginate(3);
        $orders->transform(function ($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('all-orders', ['orders' => $orders]);
    }

    public function allusers()
    {
        $users=User::all();
        $role=Role::find(1);
        $userss=[];
        foreach ($users as $user)
        {
            if(!$user->userHasRole('Admin'))
            {
                $userss[]=$user;
            }
        }
        return view('all-users', ['users' => $userss,'role'=>$role]);
    }
    public function alladmins()
    {
        $admins = User::whereHas(
            'roles', function($q){
            $q->where('name', 'Admin');
        }
        )->get();
        $role=Role::find(1);

        return view('all-admins', ['admins' => $admins,'role'=>$role]);
    }
    public function destroyUser(User $user)
    {
        $user->delete();
        return back();
    }
    public function attach(User $user)
    {
        $user->roles()->attach(request('role'));
        return back();
    }
    public function detach(User $user)
    {
        $user->roles()->detach(request('role'));
        return back();
    }
}
