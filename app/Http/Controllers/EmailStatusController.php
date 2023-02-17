<?php

namespace App\Http\Controllers;

use App\Models\EmailStatus;
use Illuminate\Http\Request;

class EmailStatusController extends Controller
{
    public function index()
    {
        $data = EmailStatus::paginate(20);

        return view('email-status.index', compact('data'));
    }

    public function webhook(Request $request)
    {
        $status = null;
        $toEmail = null;

        if ($request->has('payload.status') && $request->has('payload.message')) {
            $status = $request->input('payload.status');
            $toEmail = $request->input('payload.message.to');
        } elseif ($request->has('payload.original_message') && $request->has('payload.bounce')) {
            $status = "Message Bounces";
            $toEmail = $request->input('payload.original_message.to');
        } elseif ($request->has('payload.message') && $request->has('payload.user_agent')) {
            $status = "Message Click";
            $toEmail = $request->input('payload.message.to');
        } else {
            // write to a text file
            $file = fopen('webhook.txt', 'a');
            fwrite($file, json_encode($request->all()));
            fwrite($file, "\n");
            fclose($file);
        }

        // check $status and $toEmail is not empty and $toEmail include friendspix
        if (!empty($status) && !empty($toEmail) && !strpos($toEmail, 'friendspix')) {
            // save to database
            EmailStatus::create([
                'to_email' => $toEmail,
                'status' => $status
            ]);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
