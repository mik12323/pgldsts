<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('activities')->insert([
            [
            'activityName'=>'POW, ABC, PR Alobs, DUPA & Plans Recommending for approval'
                ],[
            'activityName'=>'20% DF Charging'
                ],[
            'activityName'=>'Obligation Request Approval	'
                ],[
            'activityName'=>'Advertisement'
                ],[
            'activityName'=>'Opening of Bids'
                ],[
            'activityName'=>'Bid Evaluation	'
                ],[
            'activityName'=>'Post-Qualification	'
                ],[
            'activityName'=>'Approval of Resolution/ Issuance of Notice of Award (BAC)'
                ],[
            'activityName'=>'Approval of Resolution/ Issuance of Notice of Award (PGO)'
                ],[
            'activityName'=>'Preperation & Approval of Contract (for by contract) (BAC)'
                ],[
            'activityName'=>'Preperation & Approval of Contract (for by contract) (PGO)'
                ],[
            'activityName'=>'Issuance of NTP/PO (BAC)'
                ],[
            'activityName'=>'Issuance of NTP/PO (PGO)'
                ],[
            'activityName'=>'Preparation of Voucher/ Budget Appropriation'
                ],[
            'activityName'=>'Certification of Availability of Funds'
                ],[
            'activityName'=>'Voucher Approval'
                ],[
            'activityName'=>'Issuance of Check'
                ],[
            'activityName'=>'Approval of Check (PTO)'
                ],[
            'activityName'=>'Approval of Check (PGO)'
                ],[
            'activityName'=>'Issuance of Check Advice'
                ],[
            'activityName'=>'Receipt of Supplier/Contractor'
                ]
        ]);
    }
}
