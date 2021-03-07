<?php

namespace LaravelForum\Notifications;

use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerfiyEmail;

class VerifyEmail extends BaseVerfiyEmail implements ShouldQueue
{
    use Queueable;

  
}
