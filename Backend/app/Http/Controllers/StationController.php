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
        $passenger1 = $request->input('passenger1');
        $passenger2 = $request->input('passenger2');
        $passenger3 = $request->input('passenger3');
        $destination = $request->input('destination');
        $comment = $request->input('comment');
        $key = DB::table('station')->insertGetId(['openid' => session()->get('openid'), 'passenger1' => $passenger1, 'passenger2' => $passenger2, 'passenger3' => $passenger3,
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
        $passenger1 = $request->input('passenger1');
        $passenger2 = $request->input('passenger2');
        $passenger3 = $request->input('passenger3');
        $destination = $request->input('destination');
        $comment = $request->input('comment');
        DB::table('station')->where('id', session()->get('id'))->update(
            ['openid' => session()->get('openid'), 'passenger1' => $passenger1, 'passenger2' => $passenger2, 'passenger3' => $passenger3, 'destination' => $destination, 'comment' => $comment, 'updated_at' => now()]
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
        if ($request->isMethod('post')) {
            if ($request->session()->has('openid')) {
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
        if ($request->isMethod('get')) {
            $params = $request->all();
            $token = $params['token'];
            $sign = $params['sign'];
            $origin_token = $token;
            $token = json_decode(base64_decode($token), true);
            if (md5(sha1($origin_token.'')) !== $sign || empty($token['openid'])) {
                return redirect('http://182.254.161.213/BBT-2019-Station/Frontend/html/index.html');
            }
            $request->session()->put('openid', $token['openid']);

            return redirect('http://182.254.161.213/BBT-2019-Station/Frontend/html/index.html');
        }
    }

    public function getStationName(Request $request)
    {
        session()->put('code', $request->input('code'));
    }

    public function returnStationName(Request $request)
    {
        return response()->json([
            'code' => session()->get('code'),
        ]);
    }
}
