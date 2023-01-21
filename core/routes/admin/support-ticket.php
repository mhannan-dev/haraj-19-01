<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'tickets', 'as' => 'tickets.'], function () {
      Route::get('index', ['middleware' => 'acl:view_tickets', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\SupportTicketController@tickets']);
      Route::get('pending', ['middleware' => 'acl:view_pending_tickets', 'as' => 'pending', 'uses' => '\App\Http\Controllers\Admin\SupportTicketController@pendingTicket']);
      Route::get('closed', ['middleware' => 'acl:view_closed_tickets', 'as' => 'closed', 'uses' => '\App\Http\Controllers\Admin\SupportTicketController@closedTicket']);
      Route::get('answered', ['middleware' => 'acl:view_answered_tickets', 'as' => 'answered', 'uses' => '\App\Http\Controllers\Admin\SupportTicketController@answeredTicket']);
      Route::get('view/{id}', ['middleware' => 'acl:view_answered_tickets', 'as' => 'view', 'uses' => '\App\Http\Controllers\Admin\SupportTicketController@ticketReply']);
      Route::post('reply/{id}', ['middleware' => 'acl:view_answered_tickets', 'as' => 'reply', 'uses' => '\App\Http\Controllers\Admin\SupportTicketController@ticketReplySend']);
      Route::get('download/{ticket}', ['middleware' => 'acl:download_tickets', 'as' => 'download', 'uses' => '\App\Http\Controllers\Admin\SupportTicketController@ticketDownload']);
      Route::post('delete', ['middleware' => 'acl:delete_ticket', 'as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\SupportTicketController@ticketDelete']);

});
