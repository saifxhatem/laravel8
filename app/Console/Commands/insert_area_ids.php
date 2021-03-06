<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Addresses;
use Illuminate\Support\Facades\DB;
use Exception;

class insert_area_ids extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:area_id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserts randomized area_id in customer_addresses table';

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
     * @return int
     */
    public function handle()
    {
        try
        {
            foreach (Addresses::where('area_id', null)->get() as $address)
            {
                $address->area_id = rand(1, 30);
                $address->save();
            }
            echo "Successfully inserted ids\n";
            return 0;
        }
        catch(Exception $e)
        {
            $this->info($e->getMessage());
        }
    }
}
