<?php

namespace App\Jobs;

use App\Adapters\Shops\DummyShop;
use App\Models\Department;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class FetchProducts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        # Define first page
        $page = 1;

        # Fetch and process api data 
        do {

            # Get dummy shop instance
            $dummyShop = new DummyShop();

            # Get json decode body from api response
            $response = $dummyShop->getProducts($page);

            # If response is success
            if(!empty($response) && $response->success) {

                # Foreach response data
                foreach($response->data as $data) {

                    # Create new department if doesn't exists
                    $department = Department::updateOrCreate(
                        ['forward_id' => $data->product_departmentId],
                        [
                            'name' => $data->product_department, 
                            'forward_id' => $data->product_departmentId
                        ]
                    );

                    # Create new product if doesn't exists
                    Product::updateOrCreate(
                        ['forward_id' => $data->_id],
                        [
                            'forward_id' => $data->_id,
                            'name' => $data->product_name,
                            'type' => $data->product_type,
                            'stock' => $data->product_stock,
                            'color' => $data->product_color,
                            'price' => $data->product_price,
                            'material' => $data->product_material,
                            'rating' => $data->product_ratings,
                            'sales' => $data->product_sales,
                            'image' => $data->product_image_md,
                            'department_id' => $department->id
                        ]
                    );
                }
            }

            # Increment page
            $page++;
        }
        
        # While response success is true 
        while(!empty($response) && $response->success === true);
    }
}
