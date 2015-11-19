<?php

class SiteController extends BaseController
{
    public function showMessages()
    {
        // Only show the messages from this day
        $messages = Message::orderBy('published_at', 'desc')
            ->get();
        Log::error("done!");
        return View::make('live', compact('messages'));
    }
}
