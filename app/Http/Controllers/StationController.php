<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Station;
use Illuminate\Support\Facades\DB;

class StationController extends Controller
{
    public function index()
    {
        return view('station.index');
    }

    public function success()
    {
        return view('station.success');
    }

    public function save()
    {
        /* if ($request->isMethod('POST')) {
            $this->validate($request, [
                'Station.passenger1' => ['required', 'min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.passenger2' => ['min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.passenger3' => ['min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.destination' => ['required', 'min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.comment' => ['required', 'min:2', 'max:200', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'max' => ':attribute 内容过长',
                'regex' => ':attribute 必须为汉字',
            ], [
                'Station.passenger1' => '乘客1',
                'Station.passenger2' => '乘客2',
                'Station.passenger3' => '乘客3',
                'Station.destination' => '目的地',
                'Station.comment' => '想说的话',
            ]
        );
            $data = $request->input('Station');
            if (Station::create($data)) {
                return redirect('station/success');
            } else {
                return redirect()->back();
            }
        } */
        $passenger1 = $_POST['passenger1'];
        $passenger2 = $_POST['passenger2'];
        $passenger3 = $_POST['passenger3'];
        $destination = $_POST['destination'];
        $comment = $_POST['comment'];
        DB::insert('insert into station(passenger1,passenger2,passenger3,destination,comment,created_at) values(?,?,?,?,?,?)', [
            $passenger1, $passenger2, $passenger3, $destination, $comment, now(),
        ]);
    }
}
