<?php

namespace App\Console\Commands;

use App\Task;
use Illuminate\Console\Command;

class FakeTaskForTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fake-task-for-test-command {amount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria tasks para teste';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $amount = $this->argument('amount');

        $bar = $this->output->createProgressBar($amount);

        $bar->start();

        for($i = 0; $i < $amount; $i++) {
            Factory(Task::class)->create();

            $bar->advance();
        }

        $bar->finish();
    }
}
