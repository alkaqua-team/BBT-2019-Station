<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web']], function () {
    //Route::any('station/index', ['uses' => 'StationController@index']);
    Route::post('station/save', ['uses' => 'StationController@save']);
    //Route::any('station/success', ['uses' => 'StationController@success']);
    //Route::any('station/draw', ['uses' => 'StationController@draw']);
    //Route::any('station/ticket', ['uses' => 'StationController@ticket']);
    //Route::any('station/portal', ['uses' => 'StationController@portal']);
    //Route::any('station/update', ['uses' => 'StationController@update']);
    Route::post('station/modify', ['uses' => 'StationController@modify']);
    Route::post('station/ticket', ['uses' => 'StationController@ticket']);
    Route::post('station/update', ['uses' => 'StationController@update']);
    Route::post('station/checkTime', ['uses' => 'StationController@checkTime']);
    Route::any('station/checkOpenid', ['uses' => 'StationController@checkOpenid']);
    Route::post('station/getStationName', ['uses' => 'StationController@getStationName']);
    Route::post('station/returnStationName', ['uses' => 'StationController@returnStationName']);
});
Route::get('/', function () {
    return view('welcome');
});
Route::post('station/img', function () {
    $stations = array('秀发号', '满绩号', '暴富号', '超越号', '脱单号', '暴瘦号', '吃鸡号');

    $station = DB::table('station')->where('id', session()->get('id'))->first();
    $passenger1 = $station->passenger1;
    $passenger2 = $station->passenger2;
    $passenger3 = $station->passenger3;
    $destination = $station->destination;
    $comment = $station->comment;

    $img = Image::make('public/initial.png');

    $img->text('恭喜你成为第'.session()->get('id').'位搭上列车的乘客', 42, 400, function ($font) {
        $font->file('public/QingYuanRegular.ttf');

        $font->size(18);

        $font->valign('top');

        $font->color('#D98247');
    });
    $img->text($passenger1, 150, 560, function ($font) {
        $font->file('public/QingYuanRegular.ttf');

        $font->size(25);

        $font->valign('top');

        $font->color('#FFFFFF');
    });
    $img->text($passenger2, 200, 560, function ($font) {
        $font->file('public/QingYuanRegular.ttf');

        $font->size(25);

        $font->valign('top');

        $font->color('#FFFFFF');
    });
    $img->text($passenger3, 250, 560, function ($font) {
        $font->file('public/QingYuanRegular.ttf');

        $font->size(25);

        $font->valign('top');

        $font->color('#FFFFFF');
    });
    $img->text($destination, 355, 445, function ($font) {
        $font->file('public/QingYuanRegular.ttf');

        $font->size(31);

        $font->valign('top');

        $font->color('#FFFFFF');
    });
    $img->text($comment, 150, 620, function ($font) {
        $font->file('public/QingYuanRegular.ttf');

        $font->size(25);

        $font->valign('top');

        $font->color('#FFFFFF');
    });
    $img->text($stations[session()->get('code')], 245, 446, function ($font) {
        $font->file('public/QingYuanRegular.ttf');

        $font->size(20);

        $font->valign('top');

        $font->color('#FFFFFF');
    });

    return $img->response('jpeg');
});
