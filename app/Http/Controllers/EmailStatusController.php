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

        if ($request->has('status') && $request->has('message')) {
            $status = $request->input('status');
            $toEmail = $request->input('message.to');
        } elseif ($request->has('original_message') && $request->has('bounce')) {
            $status = "Message Bounces";
            $toEmail = $request->input('original_message.to');
        } elseif ($request->has('message') && $request->has('user_agent')) {
            $status = "Message Click";
            $toEmail = $request->input('message.to');
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
