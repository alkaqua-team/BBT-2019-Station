<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function index()
    {
        return view('station.index');
    }

    public function update()
    {
        return view('station.update');
    }

    public function success()
    {
        return view('station.success');
    }

    public function draw()
    {
        return view('station.draw');
    }

    public function ticket(Request $request)
    {
        return view('station.ticket');
    }

    public function portal()
    {
        return view('station.portal');
    }

    public function save(Request $request)
    {
        if ($request->isMethod('POST')) {
            /* $this->validate($request, [
                'Station.passenger1' => ['required', 'min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.passenger2' => ['min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.passenger3' => ['min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.destination' => ['required', 'min:1', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.comment' => ['required', 'min:1', 'max:200'],
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
        ); */
            $validator = \Validator::make($request->input(), [
                'Station.passenger1' => ['required', 'min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.passenger2' => ['min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.passenger3' => ['min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.destination' => ['required', 'min:1', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.comment' => ['required', 'min:1', 'max:200'],
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
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = $request->input('Station');
            if (Station::create($data)) {
                $key = DB::table('station')->where('passenger1', $data['passenger1'])->pluck('id')[0];
            session()->put('key', $key);
                return redirect('station/ticket')->withInput();
            } else {
                return redirect()->back();
            }
        }
        /* $passenger1 = $_POST['passenger1'];
        $passenger2 = $_POST['passenger2'];
        $passenger3 = $_POST['passenger3'];
        $destination = $_POST['destination'];
        $comment = $_POST['comment'];
        DB::insert('insert into station(passenger1,passenger2,passenger3,destination,comment,created_at) values(?,?,?,?,?,?)', [
            $passenger1, $passenger2, $passenger3, $destination, $comment, now(),
        ]); */
    }

    public function modify(Request $request)
    {
        if ($request->isMethod('POST')) {
            /* $this->validate($request, [
                'Station.passenger1' => ['required', 'min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.passenger2' => ['min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.passenger3' => ['min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.destination' => ['required', 'min:1', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.comment' => ['required', 'min:1', 'max:200'],
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
        ); */
            $validator = \Validator::make($request->input(), [
                'Station.passenger1' => ['required', 'min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.passenger2' => ['min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.passenger3' => ['min:2', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.destination' => ['required', 'min:1', 'max:20', 'regex:/^[\x{4e00}-\x{9fa5}]+$/u'],
                'Station.comment' => ['required', 'min:1', 'max:200'],
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
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = $request->input('Station');
            $station=Station::find(session()->get('key'));
            $station->passenger1=$data['passenger1'];
            $station->passenger2=$data['passenger2'];
            $station->passenger3=$data['passenger3'];
            $station->destination=$data['destination'];
            $station->comment=$data['comment'];
            if ($station->save()){
                return redirect('station/ticket')->withInput();
            } else {
                return redirect()->back();
            }
        }
        /* $passenger1 = $_POST['passenger1'];
        $passenger2 = $_POST['passenger2'];
        $passenger3 = $_POST['passenger3'];
        $destination = $_POST['destination'];
        $comment = $_POST['comment'];
        DB::insert('insert into station(passenger1,passenger2,passenger3,destination,comment,created_at) values(?,?,?,?,?,?)', [
            $passenger1, $passenger2, $passenger3, $destination, $comment, now(),
        ]); */
    }
}
