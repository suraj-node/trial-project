<?php

namespace App\Console\Commands;

use App\Repositories\PropetyRepository;
use App\Services\GuzzleService;
use Exception;
use Illuminate\Console\Command;

class fetchRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:records';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to fetch records from API and store into database';

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
    public function handle($page = 1)
    {
        try {

            $propertyRecords = GuzzleService::initiate($page);

        if(!isset($propertyRecords['data']) || count($propertyRecords['data']) == 0) {
            error_log("No records found to create");
            exit;
        }


        $dataRange = range(0, count($propertyRecords['data']));
        $progressBar = $this->output->createProgressBar(count($dataRange));
        $progressBar->start();
        $data = [];


        foreach($propertyRecords['data'] as $record)
        {
            //Preparing the data set for storing into database
            $data = [
                'property_uuid'         => $record['uuid'],
                'county'                => $record['county'],
                'country'               => $record['country'],
                'town'                  => $record['town'],
                'description'           => $record['description'],
                'display_address'       => $record['address'],
                'image'                 => $record['image_full'],
                'thumbnail'             => $record['image_thumbnail'],
                'latitude'              => $record['latitude'],
                'longitude'             => $record['longitude'],
                'number_of_bedrooms'    => $record['num_bedrooms'],
                'number_of_bathrooms'   => $record['num_bathrooms'],
                'price'                 => $record['price'],
                'property_type'         => $record['num_bathrooms'],
                'number_of_bathrooms'   => $record['num_bathrooms'],
                'property_type'         => $record['property_type']['title'],
                'type'                  => $record['type'],
                'if_updated'            =>  0,
                'page_number'           => $propertyRecords['current_page']
            ];

            sleep(1);
            $progressBar->advance();
            $propertyRepo->createOrUpdate($data);
            $data = [];
            $page++;
        }

        $progressBar->finish();
        $this->handle($page); // calling recursively same function untill the laste page
        return 0;

        }catch(Exception $e) {
            \Log::info(__CLASS__ . $e);
        }
    }

}
