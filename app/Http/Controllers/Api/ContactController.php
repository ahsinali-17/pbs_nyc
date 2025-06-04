<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Exception;

class ContactController extends Controller
{
    /**
     * Handle contact form submission
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submit(Request $request)
    {
        try {
            Log::info('Contact form submission started', ['data' => $request->all()]);

            // Validate the request
            $validator = Validator::make($request->all(), [
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'message' => 'required|string|max:5000'
            ]);

            if ($validator->fails()) {
                Log::warning('Contact form validation failed', ['errors' => $validator->errors()]);
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Process the contact form submission
            $contactData = $validator->validated();

            try {
                // Log mail configuration for debugging
                Log::info('Mail configuration', [
                    'driver' => config('mail.driver'),
                    'host' => config('mail.host'),
                    'port' => config('mail.port'),
                    'from_address' => config('mail.from.address'),
                    'encryption' => config('mail.encryption'),
                    'to_address' => config('mail.from.address'), // Log where we're sending to
                    'username' => config('mail.username')  // Log SMTP username
                ]);

                // Create the mailable instance
                $mail = new ContactFormMail($contactData);
                
                // Log that we're about to send
                Log::info('Attempting to send email', [
                    'to' => 'mail@pbs.nyc',
                    'subject' => 'New Contact Form Submission'
                ]);

                // Send email notification with error catching
                try {
                    Mail::to('mail@pbs.nyc')->send($mail);
                    Log::info('Email sent successfully');
                } catch (\Swift_TransportException $e) {
                    Log::error('Swift Transport Exception', [
                        'message' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                    throw $e;
                } catch (\Exception $e) {
                    Log::error('Email sending exception', [
                        'message' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                    throw $e;
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Thank you for contacting us. We will get back to you soon.',
                    'data' => $contactData
                ], 200);
            } catch (Exception $mailError) {
                // Log the detailed mail error
                Log::error('Contact form email error', [
                    'error' => $mailError->getMessage(),
                    'trace' => $mailError->getTraceAsString(),
                    'mail_config' => [
                        'driver' => config('mail.driver'),
                        'host' => config('mail.host'),
                        'port' => config('mail.port'),
                        'from_address' => config('mail.from.address'),
                        'encryption' => config('mail.encryption')
                    ]
                ]);
                
                return response()->json([
                    'success' => false,
                    'message' => 'Your message was received but there was an error sending the confirmation email. We will still contact you.',
                    'error' => config('app.debug') ? $mailError->getMessage() : 'Email sending failed'
                ], 500);
            }

        } catch (Exception $e) {
            // Log the detailed error
            Log::error('Contact form submission error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request. Please try again later.',
                'error' => config('app.debug') ? $e->getMessage() : 'Server error'
            ], 500);
        }
    }
} 