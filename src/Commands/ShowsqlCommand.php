<?php

namespace Dietercoopman\Showsql\Commands;

use Illuminate\Console\Command;

class ShowsqlCommand extends Command
{
    public $signature = 'showsql';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
