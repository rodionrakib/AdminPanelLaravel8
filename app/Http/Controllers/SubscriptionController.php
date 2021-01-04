<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    	public function store(Request $request)
    	{
    		$request->validate([
    			'email' => 'required|email|unique:newsletter_subscriptions'
    		]);	

    		NewsletterSubscription::create([
    			'email' => $request->get('email')
    		]);

    		return redirect()->back()->with('success','Email added to the newsletter successfully');	
    	}
}
