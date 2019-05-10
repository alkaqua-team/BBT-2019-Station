<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /*  public function index()
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
     } */

    public function save(Request $request)
    {
        //if ($request->isMethod('POST')) {
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
        /* $validator = \Validator::make($request->input(), [
            'Station.passenger1' => ['required', 'min:2', 'max:20', 'regex:/^(?:[\u4e00-\u9fa5]+)(?:·[\u4e00-\u9fa5]+)*$|^[a-zA-Z]+\s?[\.·\-()a-zA-Z]*[a-zA-Z]+$/'],
            'Station.passenger2' => ['max:20', 'regex:/^(?:[\u4e00-\u9fa5]+)(?:·[\u4e00-\u9fa5]+)*$|^[a-zA-Z]+\s?[\.·\-()a-zA-Z]*[a-zA-Z]+$/'],
            'Station.passenger3' => ['max:20', 'regex:/^(?:[\u4e00-\u9fa5]+)(?:·[\u4e00-\u9fa5]+)*$|^[a-zA-Z]+\s?[\.·\-()a-zA-Z]*[a-zA-Z]+$/'],
            'Station.destination' => ['required', 'min:1', 'max:20', 'regex:/^(?:[\u4e00-\u9fa5]+)(?:·[\u4e00-\u9fa5]+)*$|^[a-zA-Z]+\s?[\.·\-()a-zA-Z]*[a-zA-Z]+$/'],
            'Station.comment' => ['required', 'min:1', 'max:200'],
        ], [
            'required' => ':attribute 为必填项',
            'min' => ':attribute 长度不符合要求',
            'max' => ':attribute 内容过长',
            'regex' => ':attribute 格式不正确（注：只能包含中文或英文，中文中可以包含 · ，英文中可以包含 . · - ）',
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
        } */
        //}
        $timezone = 'Asia/Shanghai';
        date_default_timezone_set($timezone);
        $passenger1 = htmlspecialchars($_POST['passenger1']);
        $passenger2 = htmlspecialchars($_POST['passenger2']);
        $passenger3 = htmlspecialchars($_POST['passenger3']);
        $destination = htmlspecialchars($_POST['destination']);
        $comment = htmlspecialchars($_POST['comment']);
        DB::insert('insert into station(passenger1,passenger2,passenger3,destination,comment,created_at) values(?,?,?,?,?,?)', [
            $passenger1, $passenger2, $passenger3, $destination, $comment, now(),
        ]);
        $key = DB::table('station')->where('passenger1', $passenger1)->pluck('id')[0];
        session_start();
        $_SESSION['id'] = $key;
        $result = [
                'errcode' => 0,
            ];
        echo json_encode($result);
    }

    public function modify(Request $request)
    {
        // if ($request->isMethod('POST')) {
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
        /* $validator = \Validator::make($request->input(), [
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
        } */
        /* $data = $request->input('Station');
        $station = Station::find(session()->get('key'));
        $station->passenger1 = $data['passenger1'];
        $station->passenger2 = $data['passenger2'];
        $station->passenger3 = $data['passenger3'];
        $station->destination = $data['destination'];
        $station->comment = $data['comment'];
        if ($station->save()) {
            return redirect('station/ticket')->withInput();
        } else {
            return redirect()->back();
        } */
        //}
        $timezone = 'Asia/Shanghai';
        date_default_timezone_set($timezone);
        $passenger1 = htmlspecialchars($_POST['passenger1']);
        $passenger2 = htmlspecialchars($_POST['passenger2']);
        $passenger3 = htmlspecialchars($_POST['passenger3']);
        $destination = htmlspecialchars($_POST['destination']);
        $comment = htmlspecialchars($_POST['comment']);
        DB::table('station')->where('id', $_SESSION['id'])->update(
            ['passenger1' => $passenger1, 'passenger2' => $passenger2, 'passenger3' => $passenger3, 'destination' => $destination, 'comment' => $comment, 'updated_at' => now()]
        );
        $result = [
            'errcode' => 0,
        ];
        echo json_encode($result);
    }
}
