<?php

require_once "RequestController.php";


if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    //GETパラメータにactionが未設定の場合はnullとする
    $action = isset($_GET['action']) ? $_GET['action'] : null;

    $request = new RequestController();

    //headerメソッドの呼び出し
    $request->header();

    //actioパラメータに対応するメソッドが存在するかチェック
    if(!method_exists($request, $action))
    {
        //メソッドが存在しない場合はpageNotFoundメソッドを呼び出す
        $request->pageNotFound();
    }
    //actioパラメータがactionから始まる場合は該当メソッドを呼び出す
    elseif(strpos($action, "action") === 0)
    {
        $request->$action();
    }
    else
    {
        //actionから始まっていない場合はpageNotFoundメソッドを呼び出す
        $request->pageNotFound();
    }

    //footerメソッドの呼び出し
    $request->footer();

    //レスポンスの取得
    $responses = $request->getResponse();

    //レスポンスの出力    {
    echo implode('<br>', $responses);
}

 ?>