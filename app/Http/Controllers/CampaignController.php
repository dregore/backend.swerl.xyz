<?php

namespace App\Http\Controllers;

use App\Models\Campaigns;
use Illuminate\Http\Request;

class CampaignController extends Controller {
    public function showAllCampaigns()
    {
        return response()->json(Campaigns::all());
    }

    public function showOneCampaign($id)
    {
        return response()->json(Campaigns::where('campaign_id', $id)->firstOrFail());
    }
    public function create(Request $request)
    {
        $campaign = Campaigns::create($request->all()); // return all info
        // dd($request->all());

        // 1st version
        $countries = json_decode($request->input('countries'), true);
        $campaign->countries()->attach($countries);

        $oss = json_decode($request->input('oss'), true);
        $campaign->oss()->attach($oss);

        $niches = json_decode($request->input('niches'), true);
        $campaign->niches()->attach($niches);
        /*
        // 2nd version
        // insert countries
        $id = $campaign['campaign_id'] = '4h65n5ueb4n635'; // for test
        $countries = json_decode($request->input('countries'), true);
        $insert = [];
        foreach($countries as $country)
        {
            if(!empty($country))
            {
            $insert[] =[
                        'campaign_id' => $id,
                        'country' => $country,
                    ];                 
            }
        }
        Countries::insert($insert);
        */

        return response()->json($campaign, 201);
    }

    public function update($id, Request $request)
    {
        $campaign = Campaigns::where('campaign_id', $id)->firstOrFail();
        $campaign->update($request->all());

        // 1st version
        $countries = json_decode($request->input('countries'), true);
        $campaign->countries()->sync($countries);

        $oss = json_decode($request->input('oss'), true);
        $campaign->oss()->sync($oss);

        $niches = json_decode($request->input('niches'), true);
        $campaign->niches()->sync($niches);

        /*
        // 2nd version
        // update countries
        $countries = json_decode($request->input('countries'), true);

        // delete countries
        Countries::where('campaign_id', $campaign['campaign_id'])->delete();

        // insert countries
        $insert = [];
        foreach($countries as $country)
        {
            if(!empty($country))
            {
            $insert[] =[
                        'campaign_id' => $campaign['campaign_id'],
                        'country' => $country,
                    ];                 
            }
        }
        Countries::insert($insert);
        */

        return response()->json($campaign, 200);
    }

    public function delete($id)
    {
        Campaigns::where('campaign_id', $id)->firstOrFail()->delete();
        return response('Deleted Successfully', 200);
    }
}