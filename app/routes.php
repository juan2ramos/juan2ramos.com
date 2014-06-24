<?php


Route::get('/', function(){return View::make('front.home');});

Route::get('mail',function(){
    $data = ['pass' => 'jajaj'];
    Mail::send('emails.password', $data, function ($message) {
        $message->subject('Restart password');
        $message->to('juan2ramos@gmail.com');
    });
    return Response::json(['success' => 1]);
});