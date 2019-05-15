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
        header('Content-Type: application/json; charset=utf-8');
        $timezone = 'Asia/Shanghai';
        date_default_timezone_set($timezone);
        $passenger1 = htmlspecialchars($_POST['passenger1']);
        $passenger2 = htmlspecialchars($_POST['passenger2']);
        $passenger3 = htmlspecialchars($_POST['passenger3']);
        $destination = htmlspecialchars($_POST['destination']);
        $comment = htmlspecialchars($_POST['comment']);
        DB::insert('insert into station(openid,passenger1,passenger2,passenger3,destination,comment,created_at) values(?,?,?,?,?,?,?)', [
            'wxlj', $passenger1, $passenger2, $passenger3, $destination, $comment, now(),
        ]);
        $key = DB::table('station')->whereRaw('openid=? and passenger1=? and passenger2=? and passenger3=? and destination=? and comment=?', ['wxlj', $passenger1, $passenger2, $passenger3, $destination, $comment])->pluck('id')[0];
        session_start();
        $_SESSION['id'] = $key;
        $result = array(
                'errcode' => 0,
        );

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
        header('Content-Type: application/json; charset=utf-8');
        $timezone = 'Asia/Shanghai';
        date_default_timezone_set($timezone);
        $passenger1 = htmlspecialchars($_POST['passenger1']);
        $passenger2 = htmlspecialchars($_POST['passenger2']);
        $passenger3 = htmlspecialchars($_POST['passenger3']);
        $destination = htmlspecialchars($_POST['destination']);
        $comment = htmlspecialchars($_POST['comment']);
        session_start();
        DB::table('station')->where('id', $_SESSION['id'])->update(
            ['openid' => 'wxlj', 'passenger1' => $passenger1, 'passenger2' => $passenger2, 'passenger3' => $passenger3, 'destination' => $destination, 'comment' => $comment, 'updated_at' => now()]
        );
        $result = array(
            'errcode' => 0,
        );

        echo json_encode($result);
    }

    public function ticket(Request $request)
    {
        header('Content-Type: application/json; charset=utf-8');
        session_start();
        $num = $_SESSION['id'];
        $passenger1 = DB::table('station')->where('id', $_SESSION['id'])->pluck('passenger1')[0];
        $passenger2 = DB::table('station')->where('id', $_SESSION['id'])->pluck('passenger2')[0];
        $passenger3 = DB::table('station')->where('id', $_SESSION['id'])->pluck('passenger3')[0];
        $destination = DB::table('station')->where('id', $_SESSION['id'])->pluck('destination')[0];
        $comment = DB::table('station')->where('id', $_SESSION['id'])->pluck('comment')[0];
        $result = array(
            'errcode' => 0,
            'passenger1' => $passenger1,
            'passenger2' => $passenger2,
            'passenger3' => $passenger3,
            'destination' => $destination,
            'comment' => $comment,
            'num' => $num,
        );

        echo json_encode($result);
    }

    public function update(Request $request)
    {
        header('Content-Type: application/json; charset=utf-8');
        session_start();
        $passenger1 = DB::table('station')->where('id', $_SESSION['id'])->pluck('passenger1')[0];
        $passenger2 = DB::table('station')->where('id', $_SESSION['id'])->pluck('passenger2')[0];
        $passenger3 = DB::table('station')->where('id', $_SESSION['id'])->pluck('passenger3')[0];
        $destination = DB::table('station')->where('id', $_SESSION['id'])->pluck('destination')[0];
        $comment = DB::table('station')->where('id', $_SESSION['id'])->pluck('comment')[0];
        $result = array(
            'errcode' => 0,
            'passenger1' => $passenger1,
            'passenger2' => $passenger2,
            'passenger3' => $passenger3,
            'destination' => $destination,
            'comment' => $comment,
        );

        echo json_encode($result);
    }

    public function checkTime(Request $request)
    {
        header('Content-Type: application/json; charset=utf-8');
        $timezone = 'Asia/Shanghai';
        date_default_timezone_set($timezone);
        $nowTime = now();
        $startTime = '2019-05-29 00:00:00';
        $closeTime = '2019-06-01 00:00:00';
        if ($nowTime < $startTime) {
            $result = array(
                'errcode' => 440,
                'errmsg' => '活动还未开始',
            );
            echo json_encode($result);
        }
        if ($nowTime > $closeTime) {
            $result = array(
                'errcode' => 441,
                'errmsg' => '活动已结束',
            );
            echo json_encode($result);
        }
    }

    public function checkOpenid(Request $request)
    {
        header('Content-Type: application/json; charset=utf-8');
        session_start();
        if (isset($_SESSION['openid'])) {
            $result = array(
                'errcode' => 0,
                'errmsg' => '已授权',
            );
            echo json_encode($result);
        } else {
            $result = array(
                'errcode' => 540,
                'errmsg' => '未授权',
            );
            echo json_encode($result);
        }
    }

    public function getStationName(Request $request)
    {
        header('Content-Type: application/json; charset=utf-8');
        session_start();
        $_SESSION['code'] = htmlspecialchars($_POST['code']);
    }

    public function returnStationName(Request $request)
    {
        header('Content-Type: application/json; charset=utf-8');
        session_start();
        $result = array(
                'code' => $_SESSION['code'],
            );
        echo json_encode($result);
    }
}
