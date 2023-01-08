<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Models\Attachment;
use App\Models\SupportTicket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class SupportTicketController extends AdminBaseController
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $merchants = User::query()->where('role', 'merchant')->get();
        return view('panel.support_ticket.index', compact('merchants'));
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'user_id' => ['required'],
            'subject' => ['required'],
            'content' => ['required'],
        ]);
        $attachment = null;

        if($request->hasFile('attachment')) {
            $fileExt = $request->file('attachment')->getClientOriginalExtension();
            $size = $request->file('attachment')->getSize();
            $type = $request->file('attachment')->getMimeType();

            $path = '/upload/support-ticket';
            $name = Carbon::now()->format('YmdHis') . '-' . uniqid() .'.'.$fileExt;
            $image = $request->file('attachment')->storeAs($path, $name, 'local');

            $attachment = Attachment::query()->create([
                'name' => $name,
                'type' => $type,
                'size' => $size,
                'path' => $image,
            ]);
        }

        $ticket = SupportTicket::query()->create([
            'user_id' => $request->input('user_id'),
            'ticket_id' => mt_rand(11111, 99999),
            'subject' => $request->input('subject'),
            'content' => $request->input('content'),
            'attachment_id' => $attachment ?: null,
        ]);

        return response()->json($ticket);
    }

    public function tickets(): JsonResponse
    {
        $tickets = SupportTicket::query()
                        ->orderByDesc('id')
                        ->paginate($this->limit());
        $tickets->load('merchant');
        $counts = $tickets->groupBy('status')->map->count();
        $data = [
            'tickets' => $tickets,
            'counts' => $counts

        ];
        return response()->json($data);
    }
}
