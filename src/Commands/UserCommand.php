<?php

namespace Iyngaran\User\Commands;

use Illuminate\Console\Command;

class UserCommand extends Command
{
    public $signature = 'laravel-users';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
