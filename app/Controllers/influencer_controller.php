<?php
namespace App\Controllers;


use CodeIgniter\Controller;


class influencer_controller extends BaseController
{
    public function index()
    {
        $db63 = \Config\Database::connect('database63');
        $db24 = \Config\Database::connect('database24');
        $txtKeywords = $this->request->getGet('txtKeyword');
        $strNetwork = $this->request->getGet('network');

        $query63 = $db63->query("SELECT rawdata,follower FROM influencer_stat_post_recent 
        WHERE network = '$strNetwork' AND influencer_id = '$txtKeywords'
        ORDER BY create_date DESC
        LIMIT 0,1");

        $query24 = $db24->query("SELECT facebook_engage_average,facebook_engage_rate,facebook_link
        ,instagram_engage_average, instagram_engage_rate,instagram_link
        ,twitter_engage_average,twitter_engage_rate,twitter_link
        ,tiktok_engage_average,tiktok_engage_rate,tiktok_link
        FROM influencer WHERE   influencer_id = '$txtKeywords'
        ORDER BY created_date DESC
        LIMIT 0, 1");

        $query3 = $db63->query("SELECT influencer_id, network, follower, post_total,create_date 
        FROM influencer_stat_post_recent 
        WHERE influencer_id = '$txtKeywords'
        ORDER BY create_date DESC
        LIMIT 0, 50");

        $results['id63'] = $query63->getResultArray();
        $results['id24'] = $query24->getResultArray();
        $results['id25'] = $query3->getResultArray();

        return view('demo_view',$results);
        
        
    }

    
}
