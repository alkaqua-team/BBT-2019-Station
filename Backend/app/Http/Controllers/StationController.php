<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function save(Request $request)
    {
        $timezone = 'Asia/Shanghai';
        date_default_timezone_set($timezone);
        session_start();
        $passenger1 = $request->input('data.passenger1');
        $passenger2 = $request->input('data.passenger2');
        $passenger3 = $request->input('data.passenger3');
        $destination = $request->input('data.destination');
        $comment = $request->input('data.comment');
        $key = DB::table('station')->insertGetId(['openid' => $_SESSION['openid'], 'passenger1' => $passenger1, 'passenger2' => $passenger2, 'passenger3' => $passenger3,
        'destination' => $destination, 'comment' => $comment, 'created_at' => now(), ]);
        session()->put('id', $key);

        return response()->json([
            'errcode' => 0,
        ]);
    }

    public function modify(Request $request)
    {
        $timezone = 'Asia/Shanghai';
        date_default_timezone_set($timezone);
        session_start();
        $passenger1 = $request->input('data.passenger1');
        $passenger2 = $request->input('data.passenger2');
        $passenger3 = $request->input('data.passenger3');
        $destination = $request->input('data.destination');
        $comment = $request->input('data.comment');
        DB::table('station')->where('id', session()->get('id'))->update(
            ['openid' => $_SESSION['openid'], 'passenger1' => $passenger1, 'passenger2' => $passenger2, 'passenger3' => $passenger3, 'destination' => $destination, 'comment' => $comment, 'updated_at' => now()]
        );

        return response()->json([
            'errcode' => 0,
        ]);
    }

    public function ticket(Request $request)
    {
        $station = DB::table('station')->where('id', session()->get('id'))->first();
        $passenger1 = $station->passenger1;
        $passenger2 = $station->passenger2;
        $passenger3 = $station->passenger3;
        $destination = $station->destination;
        $comment = $station->comment;

        return response()->json([
            'errcode' => 0,
            'passenger1' => $passenger1,
            'passenger2' => $passenger2,
            'passenger3' => $passenger3,
            'destination' => $destination,
            'comment' => $comment,
            'num' => session()->get('id'),
        ]);
    }

    public function update(Request $request)
    {
        $station = DB::table('station')->where('id', session()->get('id'))->first();
        $passenger1 = $station->passenger1;
        $passenger2 = $station->passenger2;
        $passenger3 = $station->passenger3;
        $destination = $station->destination;
        $comment = $station->comment;

        return response()->json([
            'errcode' => 0,
            'passenger1' => $passenger1,
            'passenger2' => $passenger2,
            'passenger3' => $passenger3,
            'destination' => $destination,
            'comment' => $comment,
        ]);
    }

    public function checkTime(Request $request)
    {
        $timezone = 'Asia/Shanghai';
        date_default_timezone_set($timezone);
        $nowTime = now();
        $startTime = '2019-05-29 00:00:00';
        $closeTime = '2019-06-01 00:00:00';
        if ($nowTime < $startTime) {
            return response()->json([
                'errcode' => 440,
                'errmsg' => '活动还未开始',
            ]);
        }
        if ($nowTime > $closeTime) {
            return response()->json([
                'errcode' => 441,
                'errmsg' => '活动已结束',
            ]);
        }
    }

    public function checkOpenid(Request $request)
    {
        session_start();
        $_SESSION['openid'] = 'wxlj';
        if (isset($_SESSION['openid'])) {
            return response()->json([
                'errcode' => 0,
                'errmsg' => '已授权',
            ]);
        } else {
            return response()->json([
                'errcode' => 540,
                'errmsg' => '未授权',
            ]);
        }
    }

    public function getStationName(Request $request)
    {
        session()->put('code', $request->input('data.code'));
    }

    public function returnStationName(Request $request)
    {
        return response()->json([
            'code' => session()->get('code'),
        ]);
    }
}
