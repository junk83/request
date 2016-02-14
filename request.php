<?php

require_once "RequestController.php";


if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    //GETパラメータにactionが未設定の場合はnullとする
    $action = isset($_GET['action']) ? htmlspecialchars($_GET['action']) : null;

    $request = new RequestController();

    //headerメソッドの呼び出し
    $request->header();

    //actioパラメータに対応するメソッドが存在するかチェック
    if(!method_exists($request, $action))
    {
        //メソッドが存在しない場合はpageNotFoundメソッドを呼び出す
        $request->pageNotFound();
    }
    //actionパラメータがheader、footer、pageNotFoundの場合はpageNotFoundメソッドを呼び出す
    elseif($action == 'header' || $action == 'footer' || $action == 'pageNotFound')
    {
        $request->pageNotFound();
    }
    else
    {
        //メソッドが存在する場合は呼び出す
        $request->$action();
    }

    //footerメソッドの呼び出し
    $request->footer();

    //レスポンスの取得
    $responses = $request->getResponse();

    //レスポンスの出力
    foreach($responses as $response)
    {
        echo $response.'<br>';
    }
}

 ?>